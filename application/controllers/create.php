<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    //-------------------------------------------------------------------------------------------
        public function __construct()
        {
          parent::__construct();
            /*
          if( !$this->session->userdata('isLoggedIn') ) {
              redirect('/login/show_login');
          }
            $this->load->library('Datatables');
            $this->load->library('table');
            $this->load->database();
             */
          /*
           * can load agent_model here or on application/config/autoload.php's $autoload['model']
           */
                //make sure user is logged in before making any fo®m changes!
                if( !$this->session->userdata('isLoggedIn') ) {
                    redirect('/login/show_login');
                }                
      /*    
	  $this->load->model('agent_model');
	  $this->load->model('break_model');
	  $this->load->model('script_model');
	  $this->load->model('form_model');

	  $this->load->library('Datatables');
	  $this->load->library('table');
	  
	  */
	  $this->load->model('qmp_settings_model');
	  $this->load->model('qmp_rating_topic_model');
	  $this->load->model('qmp_rating_category_model');
	  
          //$this->load->library('form_validation'); 
          //$this->load->config('form_validation');
        }    
    //-------------------------------------------------------------------------------------------
	function tbl_search_record_count($table)
	{
	  $buildwhere = "";
	  $calltable = "";
	  $calltableid = "";
	  //echo 'HELLO'.$this->session->set_userdata('user_id');
        //change this to the real table once debugging's ok
        //!!$qmp_viewandrateuser = $this->config->item('qmp_table');
	  
	  $buildwhere = " WHERE (1=1) ";
	  //$buildwhere = $this->qmp_searchbuildwhere();
	  //!!$lenwhere = strlen($this->qmp_searchbuildwhere());
	  //!!if ($lenwhere>2) { $buildwhere = " WHERE (1=1) " . $this->qmp_searchbuildwhere();}
	  
	  //!!$buildwhere = $buildwhere . " AND " . $this->limit_assigned_user() ;
	  
		//$sql = "SELECT COUNT(*) As cnt FROM ".$qmp_viewandrateuser." WHERE Continent LIKE '%" . $searchterm . "%'";
		//$this->limit_assigned_user()
		//		  AND length(calldate::text) > 4

		    switch ($table) 
			           {
			             case "settings":$calltable = $this->config->item('TABLEsettings');
				                     $calltableid = "setting_id";
				      break;
			             case "questions":$calltable = $this->config->item('TABLEquestions');
				                     $calltableid = "categoryid";
				      break;
			             case "topics":$calltable = $this->config->item('TABLEquestiontopics');
				                     $calltableid = "topic_id";
				      break;
				   }
		
		$sql = "SELECT COUNT(".$calltableid.") As cnt FROM ".$calltable. $buildwhere . "  " . "" . "
				  --and isvisible=1
		";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}
    //-------------------------------------------------------------------------------------------
	function tbl_search($limit,$table)
	{
	  $buildwhere = "";
	  $calltable = "";
	  $calltableid = "";
	  $tablefieldtosort = "";
        //change this to the real table once debugging's ok
        //!!$qmp_viewandrateuser = $this->config->item('qmp_table');
	  
	       /*
		$sql = "SELECT * FROM ".$qmp_viewandrateuser." 
				WHERE Continent LIKE '%" . $searchterm . "%' LIMIT " .$limit . ",20";
	       */
	  $buildwhere = " WHERE (1=1) ";
	  //if strlen(this->qmp_searchbuildwhere())>2 { $buildwhere = this->qmp_searchbuildwhere();}
	  //!!$lenwhere = strlen($this->qmp_searchbuildwhere());
	  //!!if ($lenwhere>2) { $buildwhere = " WHERE (1=1) " . $this->qmp_searchbuildwhere();}

	  //!!$buildwhere = $buildwhere . " AND " . $this->limit_assigned_user() ;
	  //$buildwhere = $buildwhere . " AND ( " . $this->limit_assigned_user() ." ) ";
		    switch ($table) 
			           {
			             case "settings":$calltable = $this->config->item('TABLEsettings');
				                     $calltableid = "setting_id";
						     $tablefieldtosort = "setting_name";
				      break;
			             case "questions":$calltable = $this->config->item('TABLEquestions');
				                     $calltableid = "categoryid";
						     $tablefieldtosort = "category";
				      break;
			             case "topics":$calltable = $this->config->item('TABLEquestiontopics');
				                     $calltableid = "topic_id";
						     $tablefieldtosort = "ratingtopic";
				      break;
				   }
	  
	       
		$sql = "SELECT * FROM ".$calltable."  " . $buildwhere .  "
				  --and isvisible=1
				  order by ".$tablefieldtosort." ASC				 
				 LIMIT 20 OFFSET
				 ".$limit;

				 //" . $buildwhere . " LIMIT 20 OFFSET ".$limit;
				 //" . $buildwhere . " LIMIT " .$limit . ",20";
                //limit 10 offset 5 
		//!!echo $sql;		
		$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		else
		{
			return 0;
		}
	}    
    //-------------------------------------------------------------------------------------------
      function StopUserLevelFromMakingAdminChanges(){
	//echo $this->session->userdata('userlevel');
	/*
         if ($this->session->userdata('userlevel') > 1 || $this->session->userdata('userlevel') == -1) {
	 }
	 else
	 {
	        //take to call list
		redirect("/crmcontroller/search_call_list");        
	 }
	 */
         $userlevel = $this->session->userdata('userlevel');
		    switch ($userlevel) 
			           {
			             case -1:
				                //ok to proceed
				      break;
				     default:
				      		redirect("/crmcontroller/search_call_list");        
				   }

	
	
      }
    //-------------------------------------------------------------------------------------------
    function viewsite_setting() 
    {
        //set table id in table open tag
        //!!$tmpl = array ( 'table_open'  => '<table id="big_table" class="table table-bordered table-hover table-striped">' );  // display border="0" cellpadding="2" cellspacing="1" class="table table-striped table-bordered bootstrap-datatable datatable"
        //!!$this->table->set_template($tmpl); 
        //$this->table->set_heading('Number','Name','Status','Options');
        //!!$this->table->set_heading('setting id','name','value','edited by','actions');
       $this->StopUserLevelFromMakingAdminChanges();
       $tblTOcount = '';
       $tblTOlimit = '';

       $limit = ($this->uri->segment(3) > 0)?$this->uri->segment(3):0;
       $config['base_url'] = site_url(). '/create/viewsite_setting';
       
       $config['total_rows'] = $this->tbl_search_record_count("settings");
      
       $config['per_page'] = 20;
       $config['uri_segment'] = 3;
       $choice = $config['total_rows']/$config['per_page'];
       $config['num_links'] = round($choice);		
       $this->pagination->initialize($config);
       
       $data['results'] = $this->tbl_search($limit,"settings");
       $data['links'] = $this->pagination->create_links();
       
       $this->load->view('templates/header');
        $this->load->view('qmp_setting',$data);
       $this->load->view('templates/footer');
        
    }  
    //-------------------------------------------------------------------------------------------
    function viewsite_question() 
    {
        //set table id in table open tag
        //!!$tmpl = array ( 'table_open'  => '<table id="big_table" class="table table-bordered table-hover table-striped">' );  // display border="0" cellpadding="2" cellspacing="1" class="table table-striped table-bordered bootstrap-datatable datatable"
        //!!$this->table->set_template($tmpl); 
        //$this->table->set_heading('Number','Name','Status','Options');
        //!!$this->table->set_heading('setting id','name','value','edited by','actions');
       $this->StopUserLevelFromMakingAdminChanges();
       $tblTOcount = '';
       $tblTOlimit = '';

       $limit = ($this->uri->segment(3) > 0)?$this->uri->segment(3):0;
       $config['base_url'] = site_url(). '/create/viewsite_question';
       
       $config['total_rows'] = $this->tbl_search_record_count("questions");
      
       $config['per_page'] = 20;
       $config['uri_segment'] = 3;
       $choice = $config['total_rows']/$config['per_page'];
       $config['num_links'] = round($choice);		
       $this->pagination->initialize($config);
       
       $data['results'] = $this->tbl_search($limit,"questions");
       $data['links'] = $this->pagination->create_links();
       
       $this->load->model('surveyform_model');
       
       $this->load->view('templates/header');
        $this->load->view('qmp_question',$data);
       $this->load->view('templates/footer');
        
    }  
    //-------------------------------------------------------------------------------------------
    function viewsite_topic() 
    {
       $this->StopUserLevelFromMakingAdminChanges();
        //set table id in table open tag
        //!!$tmpl = array ( 'table_open'  => '<table id="big_table" class="table table-bordered table-hover table-striped">' );  // display border="0" cellpadding="2" cellspacing="1" class="table table-striped table-bordered bootstrap-datatable datatable"
        //!!$this->table->set_template($tmpl); 
        //$this->table->set_heading('Number','Name','Status','Options');
        //!!$this->table->set_heading('setting id','name','value','edited by','actions');
	
       $tblTOcount = '';
       $tblTOlimit = '';

       $limit = ($this->uri->segment(3) > 0)?$this->uri->segment(3):0;
       $config['base_url'] = site_url(). '/create/viewsite_topic';
       
       $config['total_rows'] = $this->tbl_search_record_count("topics");
      
       $config['per_page'] = 20;
       $config['uri_segment'] = 3;
       $choice = $config['total_rows']/$config['per_page'];
       $config['num_links'] = round($choice);		
       $this->pagination->initialize($config);
       
       $data['results'] = $this->tbl_search($limit,"topics");
       $data['links'] = $this->pagination->create_links();
       
       $this->load->view('templates/header');
        $this->load->view('qmp_topic',$data);
       $this->load->view('templates/footer');
        
    }  
    //-------------------------------------------------------------------------------------------
    //function formdatatable()
	function qmp_settingdatatable()
    {
        //->unset_column('avatar')
        //->add_column('avatar', '<img src="$1"/>','avatar')
        
        $this->datatables->select('setting_id,setting_name,setting_value,user_id')
        //->unset_column('id')
        //->unset_column('tipo')
        ->add_column('Actions', qmp_setting_buttons('$1'),'setting_id')
        ->from('qmp_settings');
		//->order_by('setting_id', 'desc');
        
        echo $this->datatables->generate();
    }  
    //-------------------------------------------------------------------------------------------
            /*
             * upon succesful login redirect to Agents page
        function show_agent() 
                {

                }
             */
	public function delete_setting(){
       $this->StopUserLevelFromMakingAdminChanges();
		if($this->uri->segment(3, 0) != ""){
			$this->qmp_settings_model->delete_entry($this->uri->segment(3, 0));	
		}
		redirect("/create/viewsite_setting");        
	}
    //-------------------------------------------------------------------------------------------
	public function delete_question(){
       $this->StopUserLevelFromMakingAdminChanges();
		if($this->uri->segment(3, 0) != ""){
			$this->qmp_rating_category_model->delete_entry($this->uri->segment(3, 0));	
		}
		redirect("/create/viewsite_question");        
	}	        
    //-------------------------------------------------------------------------------------------
	public function delete_topic(){
       $this->StopUserLevelFromMakingAdminChanges();
		if($this->uri->segment(3, 0) != ""){
			$this->qmp_rating_topic_model->delete_entry($this->uri->segment(3, 0));	
		}
		redirect("/create/viewsite_topic");        
	}	        
	
    //-------------------------------------------------------------------------------------------
	public function edit_settings()
	{
       $this->StopUserLevelFromMakingAdminChanges();
            if ($this->form_validation->run('create/edit_settings') == FALSE)
            {
                    $data['entry'] =  $this->qmp_settings_model->get_entry($this->input->post('id'));
                            //$_SESSION['agententry'] = $gurl;
                            //echo $_SESSION['agententry'];
                            $data['entry'] = $data['entry'][0];
                            $this->load->view('templates/header');
                            $this->load->view('settings_view', $data);
                            $this->load->view('templates/footer');
                
            }
              else
            {
                            //echo 'ok';
                            $data['isvisible'] = $this->input->post('isvisible');
                            $data['setting_name'] = $this->input->post('setting_name');
                            $data['setting_value'] = $this->input->post('setting_value');
                            $data['user_id'] = $this->session->userdata('user_id'); //$this->input->post('user_id');
							
                            //~~$data['status'] = $this->input->post('status');
                            //~~$data['tipo'] = $this->input->post('tipo');                            
                            $data['id'] = $this->input->post('id');
                            $this->qmp_settings_model->update_entry($data);
                            redirect("/create/viewsite_setting");
            }
	}            
    //-------------------------------------------------------------------------------------------
	public function edit_questions()
	{
       $this->StopUserLevelFromMakingAdminChanges();
            if ($this->form_validation->run('create/edit_questions') == FALSE)
            {
                    $data['entry'] =  $this->qmp_rating_category_model->get_entry($this->input->post('id'));
                            //$_SESSION['agententry'] = $gurl;
                            //echo $_SESSION['agententry'];
                            $data['entry'] = $data['entry'][0];
			    $data['print_topic'] = $this->qmp_rating_category_model->get_dropdown_topics();
                            $this->load->view('templates/header');
                            $this->load->view('question_view', $data);
                            $this->load->view('templates/footer');
                
            }
              else
            {
                            //echo 'ok';
                            $data['isvisible'] = $this->input->post('isvisible');
                            $data['category'] = $this->input->post('category');
                            $data['topic_id'] = $this->input->post('topic_id');
                            $data['canbeeditedby'] = $this->input->post('canbeeditedby');
                            $data['user_id'] = $this->session->userdata('user_id'); //$this->input->post('user_id');
							
                            //~~$data['status'] = $this->input->post('status');
                            //~~$data['tipo'] = $this->input->post('tipo');                            
                            $data['id'] = $this->input->post('id');
                            $this->qmp_rating_category_model->update_entry($data);
                            redirect("/create/viewsite_question");
            }
	}            
    //-------------------------------------------------------------------------------------------
	public function edit_topics()
	{
       $this->StopUserLevelFromMakingAdminChanges();
            if ($this->form_validation->run('create/edit_topics') == FALSE)
            {
                    $data['entry'] =  $this->qmp_rating_topic_model->get_entry($this->input->post('id'));
                            //$_SESSION['agententry'] = $gurl;
                            //echo $_SESSION['agententry'];
                            $data['entry'] = $data['entry'][0];
                            $this->load->view('templates/header');
                            $this->load->view('topics_view', $data);
                            $this->load->view('templates/footer');
                
            }
              else
            {
                            //echo 'ok';
                            $data['isvisible'] = $this->input->post('isvisible');
                            $data['ratingtopic'] = $this->input->post('ratingtopic');
                            //!!$data['topic_id'] = $this->input->post('topic_id');
                            $data['canbeeditedby'] = $this->input->post('canbeeditedby');
                            $data['user_id'] = $this->session->userdata('user_id'); //$this->input->post('user_id');
							
                            //~~$data['status'] = $this->input->post('status');
                            //~~$data['tipo'] = $this->input->post('tipo');                            
                            $data['id'] = $this->input->post('id');
                            $this->qmp_rating_topic_model->update_entry($data);
                            redirect("/create/viewsite_topic");
            }
	}            
    //-------------------------------------------------------------------------------------------
	public function index_setting()
	{
       $this->StopUserLevelFromMakingAdminChanges();
            $gurl = $this->uri->segment(3, 0);
			
                    $data['entry'] =  $this->qmp_settings_model->get_entry($gurl);
                    //$_SESSION['agententry'] = $this->agent_model->$entry->id;;
                    //echo $this->uri->segment(3, 0);
                    //if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
                    if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
                            echo "error";
                            //echo $_SESSION['agententry'];
		            redirect("/create/viewsite_setting");
                    }
                    else
                    {
                            $data['entry'] = $data['entry'][0];
                            //$_SESSION['agententry'] = $gurl;
                            //echo $_SESSION['agententry'];
                            $this->load->view('templates/header');
                            $this->load->view('settings_view', $data); //add_settings_view
                            $this->load->view('templates/footer');
                    }
	}           
	    
    //-------------------------------------------------------------------------------------------
	public function index_question()
	{
       $this->StopUserLevelFromMakingAdminChanges();
            $gurl = $this->uri->segment(3, 0);
			
                    $data['entry'] =  $this->qmp_rating_category_model->get_entry($gurl);
                    //$_SESSION['agententry'] = $this->agent_model->$entry->id;;
                    //echo $this->uri->segment(3, 0);
                    //if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
                    if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
                            echo "error";
                            //echo $_SESSION['agententry'];
		            redirect("/create/viewsite_question");
                    }
                    else
                    {
                            $data['entry'] = $data['entry'][0];
                            //$_SESSION['agententry'] = $gurl;
                            //echo $_SESSION['agententry'];
			    $data['print_topic'] = $this->qmp_rating_category_model->get_dropdown_topics();
                            $this->load->view('templates/header');
                            //$this->load->view('add_questions_view', $data);
			    $this->load->view('question_view', $data);
                            $this->load->view('templates/footer');
                    }
	}           
	    
    //-------------------------------------------------------------------------------------------
	public function index_topic()
	{
       $this->StopUserLevelFromMakingAdminChanges();
            $gurl = $this->uri->segment(3, 0);
			
                    $data['entry'] =  $this->qmp_rating_topic_model->get_entry($gurl);
                    //$_SESSION['agententry'] = $this->agent_model->$entry->id;;
                    //echo $this->uri->segment(3, 0);
                    //if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
                    if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
                            echo "error";
                            //echo $_SESSION['agententry'];
		            redirect("/create/viewsite_topic");
                    }
                    else
                    {
                            $data['entry'] = $data['entry'][0];
                            //$_SESSION['agententry'] = $gurl;
                            //echo $_SESSION['agententry'];
                            $this->load->view('templates/header');
                            $this->load->view('topics_view', $data);
                            $this->load->view('templates/footer');
                    }
	}           
	    
    //-------------------------------------------------------------------------------------------
	public function newsetting()
	{
	        //$this->load->model('form_model');
		$data['setting'] = "";
                //$data['print_form'] = $this->form_model->get_multipledropdown_form();
			$this->load->view('templates/header');
			$this->load->view('newsetting_view');
			$this->load->view('templates/footer');
			
	}        
    //-------------------------------------------------------------------------------------------
	public function newquestion()
	{
	        //$this->load->model('form_model');
		$data['question'] = "";
                //$data['print_form'] = $this->form_model->get_multipledropdown_form();
			$data['print_topic'] = $this->qmp_rating_category_model->get_dropdown_topics();
			$this->load->view('templates/header');
			$this->load->view('newquestion_view',$data);
			$this->load->view('templates/footer');
			
	}        
    //-------------------------------------------------------------------------------------------
	public function newtopic()
	{
		$data['topic'] = "";
			$this->load->view('templates/header');
			$this->load->view('newtopic_view');
			$this->load->view('templates/footer');
	}        
    //-------------------------------------------------------------------------------------------
    
	public function input_setting(){
       $this->StopUserLevelFromMakingAdminChanges();
            if ($this->form_validation->run('create/input_setting') == FALSE)
            {
                //error
                //echo validation_errors();
				//$this->load->view('try_view');
                //keep showing form until all fields are properly validated/keyed-in
                $this->newsetting();
		
            }
              else
            {
                //echo 'ok';
                $data['isvisible'] = $this->input->post('isvisible');
                $data['setting_name'] = $this->input->post('setting_name');
                $data['setting_value'] = $this->input->post('setting_value');
                $data['user_id'] = $this->session->userdata('user_id'); //$this->input->post('eccp_password');
                $this->qmp_settings_model->insert_entry($data);
		//redirect("/create/newsetting_view");
		redirect("/create/viewsite_setting");
            }
            
        }
    //-------------------------------------------------------------------------------------------
	public function input_question(){
       $this->StopUserLevelFromMakingAdminChanges();
            if ($this->form_validation->run('create/input_question') == FALSE)
            {
                //error
                //echo validation_errors();
				//$this->load->view('try_view');
                //keep showing form until all fields are properly validated/keyed-in
                $this->newquestion();
		
            }
              else
            {
                //echo 'ok';
                $data['isvisible'] = $this->input->post('isvisible');
                $data['category'] = $this->input->post('category');
                $data['topic_id'] = $this->input->post('topic_id');
                $data['user_id'] = $this->session->userdata('user_id'); //$this->input->post('eccp_password');
                $data['canbeeditedby'] = $this->session->userdata('user_id');
                $this->qmp_rating_category_model->insert_entry($data);
		//redirect("/create/newquestion_view");
		redirect("/create/viewsite_question");
            }
            
        }
    //-------------------------------------------------------------------------------------------
	public function input_topic(){
       $this->StopUserLevelFromMakingAdminChanges();
            if ($this->form_validation->run('create/input_topic') == FALSE)
            {
                //error
                //echo validation_errors();
				//$this->load->view('try_view');
                //keep showing form until all fields are properly validated/keyed-in
                $this->newtopic();
		
            }
              else
            {
                //echo 'ok';
                $data['isvisible'] = $this->input->post('isvisible');
                $data['ratingtopic'] = $this->input->post('ratingtopic');
                $data['user_id'] = $this->session->userdata('user_id'); //$this->input->post('eccp_password');
                $data['canbeeditedby'] = $this->session->userdata('user_id');
                $this->qmp_rating_topic_model->insert_entry($data);
		//redirect("/create/newtopic_view");
		redirect("/create/viewsite_topic");
            }
            
        }
    //-------------------------------------------------------------------------------------------
    
        //guide
	public function _index()
	{

		$data['agent'] = "";
			$this->load->view('header');
			$this->load->view('create_view');
			$this->load->view('footer');
	}
    //-------------------------------------------------------------------------------------------AGENT
	public function index()
	{
            $gurl = $this->uri->segment(3, 0);
            //~~$_SESSION['agententry'] = $this->uri->segment(3, 0); //$gurl;
            //~~!if(!isset($gurl) || $gurl == ""){
            //~~!    $gurl = $_SESSION['agententry'];
            //~~!}         
                    $data['entry'] =  $this->agent_model->get_entry($gurl);
                    //$_SESSION['agententry'] = $this->agent_model->$entry->id;;
                    //echo $this->uri->segment(3, 0);
                    //if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
                    if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
                            echo "error";
                            //echo $_SESSION['agententry'];
		            redirect("/crmcontroller/show_agent");
                    }
                    else
                    {
                            $data['entry'] = $data['entry'][0];
                            //$_SESSION['agententry'] = $gurl;
                            //echo $_SESSION['agententry'];
                            $this->load->view('templates/header');
                            $this->load->view('agent_view', $data);
                            $this->load->view('templates/footer');
                    }
	}        
        
    //-------------------------------------------------------------------------------------------
	public function newagent()
	{

		$data['agent'] = "";
			$this->load->view('templates/header');
			$this->load->view('newagent_view');
			$this->load->view('templates/footer');
	}        
    //-------------------------------------------------------------------------------------------
        
        /*
         * handles models/agent_model and views/agent_view
         */
	public function input_agent(){
            if ($this->form_validation->run('create/input_agent') == FALSE)
            {
                //error
                //echo validation_errors();
				//$this->load->view('try_view');
                //keep showing form until all fields are properly validated/keyed-in
                $this->newagent();
            }
              else
            {
                //echo 'ok';
                $data['number'] = $this->input->post('number');
                $data['name'] = $this->input->post('name');
                $data['password'] = $this->input->post('password');
                $data['eccp_password'] = $this->input->post('eccp_password');
                $this->agent_model->insert_entry($data);
		redirect("/crmcontroller/show_agent");
            }
            
        }
    //-------------------------------------------------------------------------------------------
	public function edit_agent()
	{
            if ($this->form_validation->run('create/edit_agent') == FALSE)
            {
                //error
                //echo validation_errors();
				//$this->load->view('try_view');
                //keep showing form until all fields are properly validated/keyed-in
                //!redirect("/create/index/".$_SESSION['agententry']);
                //$this->index();
                //$_SESSION['agententry'] = $gurl;
                //echo $_SESSION['agententry'];
                //show the form if entries aren't properly keyed in
                    //echo $this->input->post('id');
                    $data['entry'] =  $this->agent_model->get_entry($this->input->post('id'));
                            //$_SESSION['agententry'] = $gurl;
                            //echo $_SESSION['agententry'];
                            $data['entry'] = $data['entry'][0];
                            $this->load->view('templates/header');
                            $this->load->view('agent_view', $data);
                            $this->load->view('templates/footer');
                
            }
              else
            {
                //echo 'ok';
                $data['number'] = $this->input->post('number');
                $data['name'] = $this->input->post('name');
                $data['password'] = $this->input->post('password');
                $data['eccp_password'] = $this->input->post('eccp_password');
                $data['id'] = $this->input->post('id');
                $this->agent_model->update_entry($data);
		redirect("/crmcontroller/show_agent");
            }
			
	}        
    //-------------------------------------------------------------------------------------------
	public function delete_agent(){
		if($this->uri->segment(3, 0) != ""){
			$this->agent_model->delete_entry($this->uri->segment(3, 0));	
		}
		redirect("/crmcontroller/show_agent");
	}	        
    //-------------------------------------------------------------------------------------------
        /*
         * handles models/break_model and views/break_view
         * Elastix guide https://172.16.20.239/index.php?menu=break_administrator
         */
    //-------------------------------------------------------------------------------------------BREAK
	public function newbreak()
	{

		$data['agent'] = "";
			$this->load->view('templates/header');
			$this->load->view('newbreak_view');
			$this->load->view('templates/footer');
	}        
    //-------------------------------------------------------------------------------------------
	public function old_input_break(){

		if(
			$this->input->post('name') != "" &&
			$this->input->post('description') != "" &&
			$this->input->post('status') != "" &&
			$this->input->post('tipo') != ""
		)
		{
			$data['name'] = $this->input->post('name');
			$data['description'] = $this->input->post('description');
			$data['status'] = $this->input->post('status');
			$data['tipo'] = $this->input->post('tipo');
			$this->break_model->insert_entry($data);

		//	redirect("/home/index?action=success");
		}
		else{
			
		}
		redirect("/home/index");
	}	
    //-------------------------------------------------------------------------------------------
	public function input_break(){
            if ($this->form_validation->run('create/input_break') == FALSE)
            {
                //error
                //echo validation_errors();
				//$this->load->view('try_view');
                //keep showing form until all fields are properly validated/keyed-in
                $this->newbreak();
            }
              else
            {
                //echo 'ok';
                $data['name'] = $this->input->post('name');
                $data['description'] = $this->input->post('description');
                //~~$data['status'] = $this->input->post('status');
                //~~$data['tipo'] = $this->input->post('tipo');
                $this->break_model->insert_entry($data);
		redirect("/crmcontroller/show_break");
            }
        }        
    //-------------------------------------------------------------------------------------------
	public function delete_break(){
		if($this->uri->segment(3, 0) != ""){
			$this->break_model->delete_entry($this->uri->segment(3, 0));	
		}
		redirect("/crmcontroller/show_break");
	}	        
    //-------------------------------------------------------------------------------------------
	public function edit_break()
	{
            if ($this->form_validation->run('create/edit_break') == FALSE)
            {
                    $data['entry'] =  $this->break_model->get_entry($this->input->post('id'));
                            //$_SESSION['agententry'] = $gurl;
                            //echo $_SESSION['agententry'];
                            $data['entry'] = $data['entry'][0];
                            $this->load->view('templates/header');
                            $this->load->view('break_view', $data);
                            $this->load->view('templates/footer');
                
            }
              else
            {
                            //echo 'ok';
                            $data['name'] = $this->input->post('name');
                            $data['description'] = $this->input->post('description');
                            //~~$data['status'] = $this->input->post('status');
                            //~~$data['tipo'] = $this->input->post('tipo');                            
                            $data['id'] = $this->input->post('id');
                            $this->break_model->update_entry($data);
                            redirect("/crmcontroller/show_break");
            }
	}            
    //-------------------------------------------------------------------------------------------
	public function index_break()
	{
            $gurl = $this->uri->segment(3, 0);
                    $data['entry'] =  $this->break_model->get_entry($gurl);
                    //$_SESSION['agententry'] = $this->agent_model->$entry->id;;
                    //echo $this->uri->segment(3, 0);
                    //if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
                    if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
                            echo "error";
                            //echo $_SESSION['agententry'];
		            redirect("/crmcontroller/show_break");
                    }
                    else
                    {
                            $data['entry'] = $data['entry'][0];
                            //$_SESSION['agententry'] = $gurl;
                            //echo $_SESSION['agententry'];
                            $this->load->view('templates/header');
                            $this->load->view('break_view', $data);
                            $this->load->view('templates/footer');
                    }
	}        
    //-------------------------------------------------------------------------------------------SCRIPT
	public function newscript()
	{

		$data['agent'] = "";
			$this->load->view('templates/header');
			$this->load->view('newscript_view');
			$this->load->view('templates/footer');
	}        
    //-------------------------------------------------------------------------------------------
	public function input_script(){
            if ($this->form_validation->run('create/input_script') == FALSE)
            {
                //error
                //echo validation_errors();
				//$this->load->view('try_view');
                //keep showing form until all fields are properly validated/keyed-in
                $this->newscript();
            }
              else
            {
                //echo 'ok';
                $data['name'] = $this->input->post('name');
                $data['description'] = $this->input->post('description');
                //~~$data['status'] = $this->input->post('status');
                //~~$data['tipo'] = $this->input->post('tipo');
                $this->script_model->insert_entry($data);
		redirect("/crmcontroller/show_script");
            }
        }             
    //-------------------------------------------------------------------------------------------
	public function delete_script(){
		if($this->uri->segment(3, 0) != ""){
			$this->script_model->delete_entry($this->uri->segment(3, 0));	
		}
		redirect("/crmcontroller/show_script");        
	}	        
    //-------------------------------------------------------------------------------------------
	public function edit_script()
	{
            if ($this->form_validation->run('create/edit_break') == FALSE)
            {
                    $data['entry'] =  $this->script_model->get_entry($this->input->post('id'));
                            //$_SESSION['agententry'] = $gurl;
                            //echo $_SESSION['agententry'];
                            $data['entry'] = $data['entry'][0];
                            $this->load->view('templates/header');
                            $this->load->view('script_view', $data);
                            $this->load->view('templates/footer');
                
            }
              else
            {
                            //echo 'ok';
                            $data['name'] = $this->input->post('name');
                            $data['description'] = $this->input->post('description');
                            //~~$data['status'] = $this->input->post('status');
                            //~~$data['tipo'] = $this->input->post('tipo');                            
                            $data['id'] = $this->input->post('id');
                            $this->script_model->update_entry($data);
                            redirect("/crmcontroller/show_script");
            }
	}            
    //-------------------------------------------------------------------------------------------
	public function index_script()
	{
            $gurl = $this->uri->segment(3, 0);
                    $data['entry'] =  $this->script_model->get_entry($gurl);
                    //$_SESSION['agententry'] = $this->agent_model->$entry->id;;
                    //echo $this->uri->segment(3, 0);
                    //if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
                    if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
                            echo "error";
                            //echo $_SESSION['agententry'];
		            redirect("/crmcontroller/show_script");
                    }
                    else
                    {
                            $data['entry'] = $data['entry'][0];
                            //$_SESSION['agententry'] = $gurl;
                            //echo $_SESSION['agententry'];
                            $this->load->view('templates/header');
                            $this->load->view('script_view', $data);
                            $this->load->view('templates/footer');
                    }
	}        
    //-------------------------------------------------------------------------------------------FORM
	public function newform()
	{

		$data['agent'] = "";
			$this->load->view('templates/header');
			$this->load->view('newform_view');
			$this->load->view('templates/footer');
	}        
    //-------------------------------------------------------------------------------------------
	public function input_form(){
            if ($this->form_validation->run('create/input_form') == FALSE)
            {
                //error
                //echo validation_errors();
				//$this->load->view('try_view');
                //keep showing form until all fields are properly validated/keyed-in
                $this->newform();
            }
              else
            {
                //echo 'ok';
                $data['nombre'] = $this->input->post('nombre');
                $data['descripcion'] = $this->input->post('descripcion');
                //~~$data['status'] = $this->input->post('status');
                //~~$data['tipo'] = $this->input->post('tipo');
                $this->form_model->insert_entry($data);
		redirect("/crmcontroller/show_form");
            }
        }             
    //-------------------------------------------------------------------------------------------
        /*
         * handles models/form_model and views/form_view
         */
	public function old_input_form(){

		if(
			$this->input->post('nombre') != "" &&
			$this->input->post('descripcion') != "" &&
			$this->input->post('estatus') != ""
		)
		{
			$data['nombre'] = $this->input->post('nombre');
			$data['descripcion'] = $this->input->post('descripcion');
			$data['status'] = $this->input->post('estatus');
			$this->form_model->insert_entry($data);

		//	redirect("/home/index?action=success");
		}
		else{
			
		}
		redirect("/home/index");
	}	
    //-------------------------------------------------------------------------------------------CAMPAIGN
	public function newcampaign()
	{
		$data['campaign'] = "";
	        //$this->load->model('form_model');
                $data['print_form'] = $this->form_model->get_multipledropdown_form();
			$this->load->view('templates/header');
			//$this->load->view('newform_campaign');
                        $this->load->view('newform_campaign', $data);
			$this->load->view('templates/footer');
	}        
    //-------------------------------------------------------------------------------------------
	public function input_campaign(){
            if ($this->form_validation->run('create/input_campaign') == FALSE)
            {
                //error
                //echo validation_errors();
				//$this->load->view('try_view');
                //keep showing form until all fields are properly validated/keyed-in
                $this->newcampaign();
            }
              else
            {
                //echo 'ok';
                $data['name'] = $this->input->post('name');
                $data['datetime_init'] = $this->input->post('datetime_init');
                $data['datetime_end'] = $this->input->post('datetime_end');
                $data['daytime_init'] = $this->input->post('hora_ini_HH') . $this->input->post('hora_ini_MM');
                $data['daytime_end'] = $this->input->post('hora_fin_HH') . $this->input->post('hora_fin_MM');

                $data['id_url'] = $this->input->post('id_url');
                $data['trunk'] = $this->input->post('trunk');
                $data['max_canales'] = $this->input->post('max_canales');
                $data['context'] = $this->input->post('context');
                
                //dropdown values later
                //$data['queue'] = $this->input->post('queue');

                $data['retries'] = $this->input->post('retries');
                //to figure out validation later
                $data['phonefile'] = $this->input->post('phonefile');
                //encoding not in database will figure out later
                //$data['encoding'] = $this->input->post('encoding');
                
                $data['script'] = $this->input->post('script');
                
                //~~$data['status'] = $this->input->post('status');
                //~~$data['tipo'] = $this->input->post('tipo');
                $this->campaign_model->insert_entry($data);
		redirect("/crmcontroller/show_campaign");
            }
        }             
    //-------------------------------------------------------------------------------------------
	public function delete_campaign(){
		if($this->uri->segment(3, 0) != ""){
			$this->campaign_model->delete_entry($this->uri->segment(3, 0));	
		}
		redirect("/crmcontroller/show_campaign");        
	}	        
    //-------------------------------------------------------------------------------------------
	public function edit_campaign()
	{
	  //$this->load->model('campaign_form_model');
            
            if ($this->form_validation->run('create/edit_campaign') == FALSE)
            {
                    $data['entry'] =  $this->campaign_model->get_entry($this->input->post('id'));
                    
                    //this will populate all form names on the multiple dropdown
                    //~~$data['form_entry'] = $this->form_model->get_all_entries();
                    $data['print_form'] = $this->form_model->get_multipledropdown_form();

                    //the multiple dropdown values for picked box if there are any
                    $data['print_formselection'] = $this->form_model->get_multipledropdown_formselection($this->input->post('id'));
                    
                    
                            //$_SESSION['agententry'] = $gurl;
                            //echo $_SESSION['agententry'];
                            $data['entry'] = $data['entry'][0];
                            $this->load->view('templates/header');
                            $this->load->view('campaign_view', $data);
                            $this->load->view('templates/footer');
                
            }
              else
            {
                            //echo 'ok';
                            $data['name'] = $this->input->post('name');
                            $data['datetime_init'] = $this->input->post('datetime_init');
                            $data['datetime_end'] = $this->input->post('datetime_end');
                            $data['daytime_init'] = $this->input->post('hora_ini_HH') . $this->input->post('hora_ini_MM');
                            $data['daytime_end'] = $this->input->post('hora_fin_HH') . $this->input->post('hora_fin_MM');

                            $data['id_url'] = $this->input->post('id_url');
                            $data['trunk'] = $this->input->post('trunk');
                            $data['max_canales'] = $this->input->post('max_canales');
                            $data['context'] = $this->input->post('context');

                            //dropdown values later
                            //$data['queue'] = $this->input->post('queue');

                            $data['retries'] = $this->input->post('retries');
                            //to figure out validation later
                            $data['phonefile'] = $this->input->post('phonefile');
                            //encoding not in database will figure out later
                            //$data['encoding'] = $this->input->post('encoding');

                            $data['script'] = $this->input->post('script');
                            
                            //~~$data['status'] = $this->input->post('status');
                            //~~$data['tipo'] = $this->input->post('tipo');                            
                            
                            $data['id'] = $this->input->post('id');
                            //!!$_SESSION['idofcampaign'] = $this->input->post('id');
                            $this->campaign_model->update_entry($data);
                            //echo $data['datetime_init'] . ' ' . $data['datetime_end'];
                            
                            
                            //insert the multiple dropdown values
                            $this->form_model->insert_multipledropdown_form();
                            redirect("/crmcontroller/show_campaign");
            }
	}            
    //-------------------------------------------------------------------------------------------
	public function index_campaign()
	{
            $gurl = $this->uri->segment(3, 0);
            $_SESSION['idofcampaign'] = $gurl;
            
                    $data['entry'] =  $this->campaign_model->get_entry($gurl);
                    //$_SESSION['agententry'] = $this->agent_model->$entry->id;;
                    //echo $this->uri->segment(3, 0);
                    //if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
                    if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
                            echo "error";
                            //echo $_SESSION['agententry'];
		            redirect("/crmcontroller/show_campaign");
                    }
                    else
                    {
                    //this will populate all form names on the multiple dropdown
                    //~~$data['form_entry'] = $this->form_model->get_all_entries();
                    $data['print_form'] = $this->form_model->get_multipledropdown_form();
                    
                    //echo $data['entry'][0];
                    //exit();
                    //the multiple dropdown values for picked box if there are any
                    $data['print_form1'] = $this->form_model->get_multipledropdown_formselection();
                        
                            $data['entry'] = $data['entry'][0];
                            //$_SESSION['agententry'] = $gurl;
                            //echo $_SESSION['agententry'];
                            $this->load->view('templates/header');
                            $this->load->view('campaign_view', $data);
                            $this->load->view('templates/footer');
                    }
	}           
    //-------------------------------------------------------------------------------------------
        
        /*
         * handles models/queue_model and views/queue_view
            No remaining queues for incoming campaings
            No queues are currently reserved for incoming campaigns. For an incoming campaign to be created, 
            it is necessary to have at least one reserved queue. You can add queues here and configure them 
            as incoming queues here.         
         *  transferred asterisk.queues_config & queues_details to call_center.queues_config & queues_details
            SELECT *
            FROM `queues_config`
            LIMIT 0 , 300
         *          
         */
        
	public function input_queue(){

		if(
			$this->input->post('descr') != "" &&
			$this->input->post('grppre') != "" &&
			$this->input->post('alertinfo') != ""
                        
		)

		{
			$data['descr'] = $this->input->post('descr');
			$data['grppre'] = $this->input->post('grppre');
			$data['alertinfo'] = $this->input->post('alertinfo');
			$data['ringing'] = $this->input->post('ringing');
			$data['maxwait'] = $this->input->post('maxwait');
			$data['password'] = $this->input->post('password');
			$data['ivr_id'] = $this->input->post('ivr_id');
			$data['dest'] = $this->input->post('dest');
			$data['cwignore'] = $this->input->post('cwignore');
			$data['qregex'] = $this->input->post('qregex');
			$data['agentannounce_id'] = $this->input->post('agentannounce_id');
			$data['joinannounce_id'] = $this->input->post('joinannounce_id');
			$data['queuewait'] = $this->input->post('queuewait');
			$data['use_queue_context'] = $this->input->post('use_queue_context');
			$data['togglehint'] = $this->input->post('togglehint');
			$this->queue_model->insert_entry($data);

		//	redirect("/home/index?action=success");
		}
		else{
			
		}
		redirect("/home/index");
	}	
    //-------------------------------------------------------------------------------------------
        /*
         * handles models/script_model and views/script_view
         * needs new queuescript for this on call_center
        
	public function input_form(){

		if(
			$this->input->post('description') != "" &&
			$this->input->post('selectQueue') != ""
		)
		{
			$data['description'] = $this->input->post('description');
			$data['selectQueue'] = $this->input->post('selectQueue');
			$this->script_model->insert_entry($data);

		//	redirect("/home/index?action=success");
		}
		else{
			
		}
		redirect("/home/index");
	}	
         */

}

/* End of file create.php */
/* Location: ./application/controllers/create.php */