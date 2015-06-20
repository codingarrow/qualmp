<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crmcontroller extends CI_Controller{

	
  public function __construct()
  {
    parent::__construct();
		$this->load->helper ( 'url' );
        //make sure user is logged in via session before anything else
        if( !$this->session->userdata('isLoggedIn') ) {
	
        //if( $_SESSION['qmp_log_user'] == "-1" ) {
        //if( $this->session->userdata('qmp_login') == "-1" ) {
            redirect('/login/show_login');
        }
        //!!$this->load->library('Datatables');
        //!!$this->load->library('table');
        //not working try to include on databases_helper.php
        //$this->load->library('Pest');
        $this->load->database();    
  }
    /*
     * for simulation & testing purposes
     */
    //-------------------------------------------------------------------------------------------
   function tinawag(){
       $test = '';
   }
    //-------------------------------------------------------------------------------------------
    function connect_ARI() {
        // Connect to ARI
        $user = "asteriskryan";
        $password = "ast3R1sK";
        $pest = new Pest('127.0.0.1:8088');
        $pest->setupAuth($user, $password);
        $pest->curl_opts[CURLOPT_FOLLOWLOCATION] = false;
        // Store PEST in session
        $_SESSION['pest'] = $pest;
    }
    //-------------------------------------------------------------------------------------------
    function stasis_ARI() {
        // Connect to ARI
         //if(isset($_GET['login'])) 
         if(isset($_SESSION['loginsipuser'])) 
         {
             //sip_string from users database table
             //id  username  password  level  group  name  sip_string
             //1   admin     *****     100    -1     Admin SIP/ryan
             $_SESSION['my_id'] = trim(create_channel($_SESSION['pest'], $_SESSION['sip_string']));
             $status = "Down";
             //------------Please wait...
             //------------Logging in...
               while ($status != "Up")
                    {
                      $response = $_SESSION['pest']->get('/ari/channels/'.$_SESSION['my_id']);
                      $decoded = json_decode($response);
                      $status = $decoded->state;
                      flush();
                      ob_flush();
                      sleep(1);
                    }
             $_SESSION['in_call'] = true;
             //------------redirect call started...
             //------------call footer...
             exit(0);
         }
         //if(isset($_GET['logout'])) 
         if(isset($_SESSION['logoutsipuser'])) 
         {
             try {
                 $response = $_SESSION['pest']->delete('/ari/channels/'.$_SESSION['my_id']);
             } catch (Exception $e) {
                 print_r($e);
             }
             $_SESSION['in_call'] = false;
             //------------redirect call ended...
             //------------call footer...
             exit(0);
         }
         //if(isset($_GET['disconnect_caller'])) 
         if(isset($_SESSION['disconnect_caller'])) 
         {
             try {
                 $response = $_SESSION['pest']->delete('/ari/channels/'.$_SESSION['my_peer']);
             } catch (Exception $e) {
                 print_r($e);
             }
             unset($_SESSION['my_peer']);
             //------------redirect call ended...
             //------------call footer...
             exit(0);
         }
         //if(isset($_GET['play_audio'])) 
         if(isset($_SESSION['play_audio'])) 
         {
             try {
                 $result = $_SESSION['pest']->delete('/ari/playback/'.$_SESSION['audio_playing']);
             } catch (Exception $e) {
                 print_r($e);
             }
             try {
                 $result = $_SESSION['pest']->post('/ari/bridges/'.$_SESSION['my_bridge'].'/play?media=sound%3A'.$_GET['play_audio'].'&lang=en');
             } catch (Exception $e) {
                 print_r($e);
             }
             $response=  json_decode($result);
             $_SESSION['audio_playing'] = $response->id;
             //------------...
             //------------...
             //exit(0);
         }
         //if(isset($_GET['stop_audio'])) 
         if(isset($_SESSION['stop_audio'])) 
         {
             try {
                 $result = $_SESSION['pest']->delete('/ari/playback/'.$_SESSION['audio_playing']);
             } catch (Exception $e) {
                 print_r($e);
             }
             
         }
         //if(isset($_GET['create_bridge'])) 39:22
         if(isset($_SESSION['create_bridge'])) 
         {
             try {
                 $result = $_SESSION['pest']->delete('/ari/bridges?type=mixing'); //.$_SESSION['audio_playing']
                 $decoded = json_decode($result);
                 $_SESSION['my_bridge'] = $decoded->id;
                 $result = $_SESSION['pest']->post('/ari/bridges/'.$_SESSION['my_bridge'].'/addChannel?channel='.$_SESSION['my_id']);
                 $result = $_SESSION['pest']->post('/ari/bridges/'.$_SESSION['my_bridge'].'/addChannel?channel='.$_SESSION['my_peer']);
                 //redirect("index.php?play_audio=hello","",0);
             } catch (Exception $e) {
                 print_r($e);
             }
             
         }
         //if(isset($_GET['dial_new']))
         if(isset($_SESSION['dial_new'])) 
         {
                 $_SESSION['my_peer'] = trim(create_channel($_SESSION['pest'], "IAX2/venturepoint/".$_GET['dial_new']));
             //------------please wait calling $_GET['dial_new']... 
                 $status = "Down";
                 while ($status != "Up"){
                     $response = $_SESSION['pest']->get('/ari/channels'.$_SESSION['my_peer']);
                     $decoded = json_decode($response);
                     $status = $decoded->state;
                     flush();
                     ob_flush();
                     //sleep(1);
                 }
                 //redirect("index.php?create_bridge=1","Call Started",0);
                 //require "footer.php";
                 exit(0);
         }
         
    }
    //-------------------------------------------------------------------------------------------
    function delete_files_old($target) {
	if(is_dir($target)){
	    $files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned
	    
	    foreach( $files as $file )
	    {
		$this->delete_files_old( $file );      
	    }
	  
	    //rmdir( $target );
	    if(rmdir($target)) { //success;
	                                   }
	    
	} elseif(is_file($target)) {
	    unlink( $target );  
	}
    }
    //-------------------------------------------------------------------------------------------
    function delete_files($path)
    {
	if (is_dir($path) === true)
	{
	    $files = array_diff(scandir($path), array('.', '..'));
    
	    foreach ($files as $file)
	    {
		$this->delete_files(realpath($path) . '/' . $file);
	    }
    
	    return rmdir($path);
	}
    
	else if (is_file($path) === true)
	{
	    return unlink($path);
	}
    
	return false;
    }
    //-------------------------------------------------------------------------------------------
 
    //  https://208.80.180.209:8080/web/system.php/voicelogs/play?filepath=/dacx/var/ameyo/dacxdata/voicelogs/2014-08-12/EBDFajardo/13073212334_EBDFajardo_2014-08-12-17-26-51&filename=61732636170_EBDZamora_2014-08-10-20-14-21&asteriskip=208.80.180.209&callhistoryid=&ingain=1&outgain=1&userId=SankashSupervisor&login_id=SankashSupervisor&login_password=SankashSupervisor&fromqmp=yes

    //-------------------------------------------------------------------------------------------
    function prepaudioFile() 
    {
    }  
      
    //-------------------------------------------------------------------------------------------
    function purgeaudioFile() 
    {
      // $this->delete_files('/dacx/ameyo/acp/web/vl/dacx/var/ameyo/dacxdata/voicelogs/2014-08-11/EBDCarandang');
      //if (isset($this->session->userdata('purge_userDIR')))
      // {
	//echo "/dacx/ameyo/acp/web/vl/dacx/var/ameyo/dacxdata/voicelogs/".$_SESSION['purge_userDIR'];
        //!!!$this->delete_files("/dacx/ameyo/acp/web/vl/dacx/var/ameyo/dacxdata/voicelogs/". $this->session->userdata('purge_userDIR')."");
        $this->delete_files("/dacx/ameyo/crm/html/qmp/voicelogs/". $this->session->userdata('purge_userDIR')."");
      // }
    }  
      
    //-------------------------------------------------------------------------------------------
  
    function _show_agent() 
    {
	$data = '';
		$this->load->view('templates/header', $data);
		//$this->load->view('pages/'.$page, $data);
		$this->load->view('welcome_message');
		$this->load->view('templates/footer', $data);	        
    }  
    //-------------------------------------------------------------------------------------------AGENTS
    //function index()
    function show_agent() 
    {
     //for testing
     //      
     //$pest = new Pest('127.0.0.1:8088');  
     //$pest->HelloRyan();
     //echo APPPATH."/phprest/Pest.php";
        //set table id in table open tag
        $tmpl = array ( 'table_open'  => '<table id="big_table" border="0" cellpadding="2" cellspacing="1" class="table">' );  //class="table table-striped table-bordered bootstrap-datatable datatable"
        $this->table->set_template($tmpl); 
        //$this->table->set_heading('Number','Name','Status','Options');
        $this->table->set_heading('type','number','name','estatus','actions');
       $this->load->view('templates/header');
        $this->load->view('show_agent');
       $this->load->view('templates/footer');
        
    }  
    //-------------------------------------------------------------------------------------------
    function agentdatatable()
    {
        //->unset_column('avatar')
        //->add_column('avatar', '<img src="$1"/>','avatar')
        
        $this->datatables->select('id,type,number,name,estatus')
        ->unset_column('id')
        ->add_column('Actions', get_buttons('$1'),'id')
        ->from('agent');
        
        echo $this->datatables->generate();
    }  
    //-------------------------------------------------------------------------------------------BREAKS
    function show_break() 
    {
        //set table id in table open tag
        $tmpl = array ( 'table_open'  => '<table id="big_table" border="0" cellpadding="2" cellspacing="1" class="table">' );  //class="table table-striped table-bordered bootstrap-datatable datatable"
        $this->table->set_template($tmpl); 
        //$this->table->set_heading('Number','Name','Status','Options');
        $this->table->set_heading('id','name','description','status','actions');
       $this->load->view('templates/header');
        $this->load->view('show_break');
       $this->load->view('templates/footer');
        
    }  
    //-------------------------------------------------------------------------------------------
    function breakdatatable()
    {
        //->unset_column('avatar')
        //->add_column('avatar', '<img src="$1"/>','avatar')
        
        $this->datatables->select('id,name,description,status')
        //->unset_column('id')
        //->unset_column('tipo')
        ->add_column('Actions', break_buttons('$1'),'id')
        ->from('break');
        
        echo $this->datatables->generate();
    }  
    //-------------------------------------------------------------------------------------------TEST CODE
	function updateinsideDIV(){
	$this->load->model('surveyform_model');
	//$this->surveyform_model->updateinsideDIVexample();
	$this->surveyform_model->updatesurveyquestions();
	}
    //-------------------------------------------------------------------------------------------POSTGRE qmp_rating_category
    function show_list() {
	$data = "";
	/*
	$show = $this->input->get_post('show', TRUE);
	
    $this->load->model('show_call_model');	
	$call_list = $this->show_call_model->show_call_list($show);
    if ($call_list) {
      $data['call_list'] = $call_list;
    }	
	*/
	$this->load->model('show_call_model');	
	$calls = $this->show_call_model->get_call_list(  );
	
    if ($calls) {
      $data['calls'] = $calls;
    }
	
    $data['max_posts'] = $calls ? count($calls) : 0;
	/*
	*/
       $this->load->view('templates/header');
        $this->load->view('Feb28show_call_list',$data);
       $this->load->view('templates/footer');
	
	}	
    //-------------------------------------------------------------------------------------------for debugging 19 Aug 2014
      function srch_call_details() {
	//$call_id = $this->input->get_post('call_id', TRUE);
	$data = "";
	
	$this->load->model('show_call_model');
	//------------------------------------------ratings code------------------------------------------------
	// placed on application\VIEWS\show_call_details
	//------------------------------------------ratings code------------------------------------------------
	
	//echo $call_id;
	
	$this->load->model('surveyform_model');
	//only allow assigned campaigns for the logged in user
	//$items = $this->surveyform_model->get_campaignswithquestions(  );
	$items = $this->surveyform_model->get_campaignswithquestionsperuserid(  );
	
	$items1 = $items;
	
	if ($items) {
	  $data['items'] = $items;
	}
	
    $data['max_posts'] = $items ? count($items) : 0;
    
	if ($items1) {
	  $data['items1'] = $items1;
	}
    
	
       $this->load->view('templates/header');
        $this->load->view('show_call_details',$data);
       $this->load->view('templates/footer');
      }
    //-------------------------------------------------------------------------------------------
    
      function search_call_details() {
	//$call_id = $this->input->get_post('call_id', TRUE);
	$data = "";
	
	$this->load->model('show_call_model');
	//------------------------------------------ratings code------------------------------------------------
	// placed on application\VIEWS\show_call_details
	//------------------------------------------ratings code------------------------------------------------
	
	//echo $call_id;
	
	$this->load->model('surveyform_model');
	//only allow assigned campaigns for the logged in user
	//$items = $this->surveyform_model->get_campaignswithquestions(  );
	$items = $this->surveyform_model->get_campaignswithquestionsperuserid(  );
	
	$items1 = $items;
	
	if ($items) {
	  $data['items'] = $items;
	}
	
    $data['max_posts'] = $items ? count($items) : 0;
    
	if ($items1) {
	  $data['items1'] = $items1;
	}
    
	
       $this->load->view('templates/header');
        $this->load->view('shw_call_details',$data);
       $this->load->view('templates/footer');
      }
    //-------------------------------------------------------------------------------------------
       function survey_details()
         {
	$data = "";
	$this->load->model('surveyform_model');	
	$items = $this->surveyform_model->get_campaignswithquestions(  );
	$items1 = $items;
	
	if ($items) {
	  $data['items'] = $items;
	}
	
    $data['max_posts'] = $items ? count($items) : 0;
    
	if ($items1) {
	  $data['items1'] = $items1;
	}
    
	
       $this->load->view('templates/header');
        $this->load->view('show_survey_details',$data);
       $this->load->view('templates/footer');
	 }
    //-------------------------------------------------------------------------------------------
      function search_call_list() {
	        //echo basename("/dacx/var/ameyo/dacxdata/voicelogs/2014-08-12/EBDFajardo/13073212334_EBDFajardo_2014-08-12-17-26-51");
	        $this->purgeaudioFile();
	
	        $this->load->model('show_call_model');
		
		//
		//!!$users_page = $this->show_call_model->limit_assigned_user();
		//$searchterm = $this->search_model->searchterm_handler($this->input->get_post('searchterm', TRUE));
	
		$limit = ($this->uri->segment(3) > 0)?$this->uri->segment(3):0;
		
		$config['base_url'] = site_url(). '/crmcontroller/search_call_list';
		//$config['total_rows'] = $this->search_model->search_record_count($searchterm);
		$config['total_rows'] = $this->show_call_model->search_record_count();
		
		$config['per_page'] = 20;
		$config['uri_segment'] = 3;
		$choice = $config['total_rows']/$config['per_page'];
		
		//$config['num_links'] = round($choice);
		$config['num_links'] = 15; //round($choice);		
		
		$this->pagination->initialize($config);
		
		//$data['results'] = $this->search_model->search($searchterm,$limit);
		$data['results'] = $this->show_call_model->search($limit);
		
		$data['links'] = $this->pagination->create_links();
		//$data['searchterm'] = $searchterm;
		$this->load->view('templates/header');
		 $this->load->view('show_call_list',$data);
		$this->load->view('templates/footer');		
      }
    //-------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------

    
    function show_call_list() {
	$data = "";
	$show = $this->input->get_post('show', TRUE);
	
    $this->load->model('show_call_model');	
	$call_list = $this->show_call_model->show_call_list($show);
    if ($call_list) {
      $data['call_list'] = $call_list;
    }	
       //$this->load->view('templates/header');
        $this->load->view('show_call_div',$data);
       //$this->load->view('templates/footer');
	
	}
    //-------------------------------------------------------------------------------------------
	
    function show_surveyform() 
    {
	$this->load->model('surveyform_model');
	$topics = $this->surveyform_model->get_surveyquestions( );
    // If posts were fetched from the database, assign them to $data
    // so they can be passed into the view.
	
	//survey questions
    if ($topics) {
      $data['topics'] = $topics;
    }
    $data['max_posts'] = $topics ? count($topics) : 0;

    //campaigns
    $campaigns = $this->surveyform_model->get_campaigns();
    if ($campaigns) {
      $data['campaigns'] = $campaigns;
    }
    $data['max_campaigns'] = $campaigns ? count($campaigns) : 0;
	
	
    //$questions = get_surveysubquestions
	
       $this->load->view('templates/header');
        $this->load->view('show_surveyform',$data);
       $this->load->view('templates/footer');
	   
    }  
	
    //-------------------------------------------------------------------------------------------
	
	
    function show_surfeyform_keep() 
    {
        //set table id in table open tag
        $tmpl = array ( 'table_open'  => '<table id="big_table" border="0" cellpadding="2" cellspacing="1" class="table table-bordered table-hover table-striped">' );  //class="table table-striped table-bordered bootstrap-datatable datatable"
        $this->table->set_template($tmpl); 
        //$this->table->set_heading('Number','Name','Status','Options');
        $this->table->set_heading('cat id','questions','topic','edited by','actions');
       $this->load->view('templates/header');
        $this->load->view('show_surfeyform');
       $this->load->view('templates/footer');
        
    }  
    //-------------------------------------------------------------------------------------------
    function ratingcategorydatatable_keep()
    {
        //->unset_column('avatar')
        //->add_column('avatar', '<img src="$1"/>','avatar')
        
        $this->datatables->select('categoryid,category,topic_id,user_id')
        //->unset_column('id')
        //->unset_column('tipo')
        ->add_column('Actions', qmp_rating_category_buttons('$1'),'categoryid')
        ->from('qmp_rating_category');
        
        echo $this->datatables->generate();
    }  
    //-------------------------------------------------------------------------------------------POSTGRE qmp_settings
    //transferred to application/controllers/CREATE.php, all ADMIN RELATED functions
    //-------------------------------------------------------------------------------------------CAMPAIGNS
    function show_campaign() 
    {
        //set table id in table open tag
        $tmpl = array ( 'table_open'  => '<table id="big_table" border="0" cellpadding="2" cellspacing="1" class="table">' );  //class="table table-striped table-bordered bootstrap-datatable datatable"
        $this->table->set_template($tmpl); 
        //$this->table->set_heading('Number','Name','Status','Options');
        $this->table->set_heading('id','name','datetime_init','datetime_end','actions');
       $this->load->view('templates/header');
        $this->load->view('show_campaign');
       $this->load->view('templates/footer');
        
    }  
    //-------------------------------------------------------------------------------------------
    function campaigndatatable()
    {
        //->unset_column('avatar')
        //->add_column('avatar', '<img src="$1"/>','avatar')
        
        $this->datatables->select('id,name,datetime_init,datetime_end')
        //->unset_column('id')
        //->unset_column('tipo')
        ->add_column('Actions', campaign_buttons('$1'),'id')
        ->from('campaign');
        
        echo $this->datatables->generate();
    }  
    //-------------------------------------------------------------------------------------------
  /**
   * This is the controller method that drives the application.
   * After a user logs in, show_main() is called and the main
   * application screen is set up.
   */
    //-------------------------------------------------------------------------------------------
    //below are guide functions that may be used later XD
    //-------------------------------------------------------------------------------------------
  function show_main() {
    $this->load->model('post_m');

    // Get some data from the user's session
    $user_id = $this->session->userdata('id');
    $is_admin = $this->session->userdata('isAdmin');
    $team_id = $this->session->userdata('teamId');

    // Load all of the logged-in user's posts
    $posts = $this->post_m->get_posts_for_user( $user_id, 5 );

    // If posts were fetched from the database, assign them to $data
    // so they can be passed into the view.
    if ($posts) {
      $data['posts'] = $posts;
    }

    // Load posts based on the user's permission. Admins can see
    // everything, and regular users can only see posts from
    // their own team.
    $other_users_posts = $this->post_m->get_all_other_posts( $user_id, $team_id, $is_admin );
    if( $other_users_posts ) {
      $data['other_posts'] = $other_users_posts;
    }

    $data['is_admin'] = $is_admin;
    $data['max_posts'] = $posts ? count($posts) : 0;
    $data['post_count'] = $this->post_m->get_post_count_for_user( $user_id );
    $data['email'] = $this->session->userdata('email');
    $data['name'] = $this->session->userdata('name');
    $data['avatar'] = $this->session->userdata('avatar');
    $data['tagline'] = $this->session->userdata('tagline');
    $data['teamId'] = $this->session->userdata('teamId');

    $this->load->view('main',$data);
  }

  function post_message() {
    $message = $this->input->post('message');

    if ( $message ) {
      $this->load->model('post_m');
      $saved = $this->post_m->save_post($message);
    }

    if ( isset($saved) && $saved ) {
       echo "<tr><td>". $saved['body'] ."</td><td>". $saved['createdDate'] ."</td></tr>";
    } else {

    }
  }

  function create_new_user() {
    $userInfo = $this->input->post(null,true);

    if( count($userInfo) ) {
      $this->load->model('user_m');
      $saved = $this->user_m->create_new_user($userInfo);
    }

    if ( isset($saved) && $saved ) {
       echo "success";
    }
  }

  function update_tagline() {
    $new_tagline = $this->input->post('message');
    $user_id = $this->session->userdata('id');

    if( isset($new_tagline) && $new_tagline != "" ) {
      $this->load->model('user_m');
      $saved = $this->user_m->update_tagline($user_id, $new_tagline);
    }

    if ( isset($saved) && $saved ) {
      $this->session->set_userdata(array('tagline'=>$new_tagline));
      echo "success";
    }
  }

}
