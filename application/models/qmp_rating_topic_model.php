<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    //var $table_name = 'qmp_settings';

class Qmp_rating_topic_model extends CI_Model {

    var $isvisible   = '';
    //var $category = '';
    var $ratingtopic = '';
    var $user_id = '';
    var $canbeeditedby = '';
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
       
        $query = $this->db->get($this->config->item('TABLEquestiontopics'));
        return $query->result();
    }
    //-------------------------------------------------------------------------------------------
    function get_multipledropdown_form()
    {
		$result=$this->db->get($this->config->item('TABLEquestiontopics'));
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
		$result=$this->db->get($this->config->item('TABLEquestiontopics'))->order_by('ratingtopic','ASC');
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
		$result = $this->db->select('id_campaign, id_form, form.nombre')->from('campaign_form')->join($this->config->item('TABLEquestiontopics'), 'form.id = campaign_form.id_form')->where('id_campaign', $_SESSION['idofcampaign'])->get(); //$idcampaign
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
        $this->ratingtopic = $data['ratingtopic'];
        $this->user_id = $data['user_id'];
        $this->canbeeditedby = $data['canbeeditedby'];
        //default 'A' in call_center.form comment out in the mean time
        //$this->estatus = $data['estatus'];
        //$this->date    = time();

        $this->db->insert($this->config->item('TABLEquestiontopics'), $this);
    }
    //-------------------------------------------------------------------------------------------
    function update_entry($data)
    {
        $this->isvisible   = $data['isvisible']; // please read the below note
        $this->ratingtopic = $data['ratingtopic'];
        $this->user_id = $data['user_id'];
        $this->canbeeditedby = $data['canbeeditedby'];
        //default 'A' in call_center.form comment out in the mean time
        //$this->estatus = $data['estatus'];
        //$this->date    = time();
        $this->db->update($this->config->item('TABLEquestiontopics'), $this, array('topic_id' => $data['id']));
    }
    //-------------------------------------------------------------------------------------------
    function delete_entry($id)
    {
        $this->db->delete($this->config->item('TABLEquestiontopics'), array('topic_id' => $id));
    }
    //-------------------------------------------------------------------------------------------
    function get_entry($id){
        $this->db->where('topic_id', $id);
        $query = $this->db->get($this->config->item('TABLEquestiontopics'), 1);
        return $query->result();
    }
    //-------------------------------------------------------------------------------------------



}