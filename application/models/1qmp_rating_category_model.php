<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    //var $table_name = 'qmp_settings';

class Qmp_rating_category_model extends CI_Model {

    var $isvisible   = '';
    var $category = '';
    //var $ratingtopic = '';
    var $user_id = '';
    var $canbeeditedby = '';
    var $topic_id = '';
    //var $table_name = 'qmp_settings';
	
        //default 'A' in call_center.form comment out in the mean time
    //var $estatus = '';
            
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    //-------------------------------------------------------------------------------------------
    function get_all_entries()
    {
       
        $query = $this->db->get($this->config->item('TABLEquestions'));
        return $query->result();
    }
    //-------------------------------------------------------------------------------------------
    function get_multipledropdown_form()
    {
		$result=$this->db->get($this->config->item('TABLEquestions'));
		$dropdown=array();
		if( $result->num_rows() > 0 )
		{
			foreach($result->result_array() as $row)
			{
				$dropdown[$row['id']]=$row['nombre'];
			}
		}
		return $dropdown;        
    }
    //-------------------------------------------------------------------------------------------
    function get_dropdown_topics()
    {
		$result=$this->db->get($this->config->item('TABLEquestiontopics')); //->order_by('ratingtopic','ASC')
		$dropdown=array();
		if( $result->num_rows() > 0 )
		{
			foreach($result->result_array() as $row)
			{
				$dropdown[$row['topic_id']]=$row['ratingtopic'];
			}
		}
		return $dropdown;        
    }
    //-------------------------------------------------------------------------------------------
    
    function get_multipledropdown_formselection()
    {
             /*
                select `id_campaign`, `id_form`, f.nombre
                   from `campaign_form` c
                     join form f on f.id=c.id_form
                       and `id_campaign`=5
    
                $this->db->select('*');
                $this->db->from('blogs');
                $this->db->join('comments', 'comments.id = blogs.id');
    
                //$this->db->select('title')->from('mytable')->where('id', $id)->limit(10, 20);
              */
              //method chaining as exemplified in http://ellislab.com/codeigniter/user-guide/database/active_record.html
                //echo $id_campaign. ' evaluated';
		$result = $this->db->select('id_campaign, id_form, form.nombre')->from('campaign_form')->join($this->config->item('TABLEquestions'), 'form.id = campaign_form.id_form')->where('id_campaign', $_SESSION['idofcampaign'])->get(); //$idcampaign
                //$result = $this->db->get();
                //!!echo $result->affected_rows();
		//$result=$this->db->get('qmp_settings');
		$dropdown=array();
                //echo $result->num_rows();
		if( $result->num_rows() > 0 )
		{
			foreach($result->result_array() as $row)
			{
				$dropdown[$row['id_form']]=$row['nombre'];
			}
		}
		return $dropdown;        
    }
    //-------------------------------------------------------------------------------------------
    //http://stackoverflow.com/questions/10839147/php-iterating-through-a-simple-comma-separated-list    
    function insert_multipledropdown_form() {
       //these are the comma delimited form.id 's
       $saveid = $this->input->post('saveid');
       $idofcampaign = $this->input->post('id');
       //save to session since for some reason the $idform variable cannot be saved on this scope :o
       $_SESSION['idofcampaign'] = $idofcampaign;
       //echo $idform . ' post';
       //exit();
       /*
        foreach($id_campaign as $seat){
            echo $seat ."<br />";
        } 
        * 
        */
       
                    if(!isset($saveid) || $saveid == ""){
                         echo "no action";
                    }       
                    else
                    {
                        //echo $idform . ' id value';
                        //exit();
                        
                        //-- handles it all in one pass
                        $output = preg_split('/[\.,\s]/', $saveid, -1, PREG_SPLIT_NO_EMPTY);

                        //cleanup first
                        //$this->db->delete('campaign_form', array('id_form' => $saveid));
                        /*
                        if(substr($saveid, -1)==",") $saveid = rtrim ($saveid , ",");
                        $this->db->where('id_form', $_SESSION['idform']);
                        //$this->db->where_in('id_campaign',$saveid);
                        $this->db->where_in('id_campaign',$saveid);
                        //!!$this->db->delete('campaign_form', array('id_campaign' => $saveid));
                        $this->db->delete('campaign_form');
                         * 
                         */
                        $this->db->where('id_campaign', $_SESSION['idofcampaign']);
                        $this->db->where_in('id_form', $output);
                        $this->db->delete('campaign_form'); 
                        echo $saveid . ' ' .$this->db->affected_rows();
                        //!!exit();
                        //-- just output or insert
                        array_walk($output, function(&$item, $idx) {
                            //echo $_SESSION['idform'] . ' id value';
                            //echo $idx . ': ' . $item . '<br/>';  //PHP_EOL
                            $this->db->insert('campaign_form',array('id_campaign'=>$_SESSION['idofcampaign'],'id_form'=>$item));
                        });                        
                        /*
                            foreach($id_campaign as $id_individualvals)
                            {
                             //echo $id_campaign . ' saved</br>';
                                
                              //$insert_data->EMPLOYEES_id = $employee_id;
                              //$this->db->insert('user_group',array('cid'=>$cntact,'wid' => $cbo_name, 'uid' => $uid));
                              // !guide! $this->db->insert('campaign_form',array('id_campaign'=>$cntact,'id_form' => $cbo_name));
                              $this->db->insert('campaign_form',array('id_campaign'=>$id_individualvals,'id_form' => $id_form));
                            }
                         * 
                         */
                        
                    }
       $_SESSION['idofcampaign'] = "";
       //exit();
    }
    //guides
    //http://stackoverflow.com/questions/23615855/value-of-dropdown-in-codeigniter-cannot-be-called
    //http://stackoverflow.com/questions/10721733/code-igniter-form-multiselect
    function OLD_insert_multipledropdown_form() {
       //$id_campaign = $this->input->post('formularios_elegidos');        
       $id_campaign = $this->input->post('formularios_elegidos');     //formulario   
       $id_form = $this->input->post('id');
       //will print Array to string conversion
       //echo $id_form . ' ' . $id_campaign . ' post';

       //echo $this->input->post('formularios');
       //if(is_array($id_campaign)) { echo 'is array';}
      /*
        foreach ($_POST['formulario'] as $names)
        {
                print "You are selected $names<br/>";
        }
       */
       //     echo $this->input->post('saveid') ."<br />";
        foreach($id_campaign as $seat){
            echo $seat ."<br />";
        } 
       
       exit();
         
        
                    if(!isset($id_campaign) || $id_campaign == ""){
                         echo "no action";
                    }       
                    else
                    {
                        //cleanup first
                        
                        //proceed with insert
                            //foreach($this->input->post('EMPLOYEES_id') as $employee_id)
                            //foreach($fid)
                            foreach($id_campaign as $id_individualvals)
                            {
                             //echo $id_campaign . ' saved</br>';
                                
                              //$insert_data->EMPLOYEES_id = $employee_id;
                              //$this->db->insert('user_group',array('cid'=>$cntact,'wid' => $cbo_name, 'uid' => $uid));
                              // !guide! $this->db->insert('campaign_form',array('id_campaign'=>$cntact,'id_form' => $cbo_name));
                              $this->db->insert('campaign_form',array('id_campaign'=>$id_individualvals,'id_form' => $id_form));
                            }
                        
                    }
    }
    //-------------------------------------------------------------------------------------------
    function insert_entry($data)
    {
	/*
    var $isvisible   = '';
    var $category = '';
    var $ratingtopic = '';
    var $user_id = '';
    var $canbeeditedby = '';
    */
	
        $this->isvisible   = $data['isvisible']; // please read the below note
        $this->category = $data['category'];
        $this->user_id = $data['user_id'];
        $this->canbeeditedby = $data['canbeeditedby'];
        $this->topic_id = $data['topic_id'];
        //default 'A' in call_center.form comment out in the mean time
        //$this->estatus = $data['estatus'];
        //$this->date    = time();

        $this->db->insert($this->config->item('TABLEquestions'), $this);
    }
    //-------------------------------------------------------------------------------------------
    function update_entry($data)
    {
        $this->isvisible   = $data['isvisible']; // please read the below note
        $this->category = $data['category'];
        $this->user_id = $data['user_id'];
        $this->canbeeditedby = $data['canbeeditedby'];
        $this->topic_id = $data['topic_id'];
        //default 'A' in call_center.form comment out in the mean time
        //$this->estatus = $data['estatus'];
        //$this->date    = time();
        $this->db->update($this->config->item('TABLEquestions'), $this, array('categoryid' => $data['id']));
    }
    //-------------------------------------------------------------------------------------------
    function delete_entry($id)
    {
        $this->db->delete($this->config->item('TABLEquestions'), array('categoryid' => $id));
    }
    //-------------------------------------------------------------------------------------------
    function get_entry($id){
        $this->db->where('categoryid', $id);
        $query = $this->db->get($this->config->item('TABLEquestions'), 1);
        return $query->result();
    }
    //-------------------------------------------------------------------------------------------



}