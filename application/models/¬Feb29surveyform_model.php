<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surveyform_model extends CI_Model {

  /*
    var $name   = '';
    var $description = '';
    var $status = '';
    //var $tipo = '';
  */
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    //-------------------------------------------------------------------------------------------FOR TESTING PURPOSES DON'T REMOVE
	  function updateinsideDIVexample() {
		$data = array(
					   'rateduser' => 'ryan',
					   'form_id' => 'd622-5299867c-CARLO_CARLO-10691'
					);
        //"d622-5299867c-vcall-10691"
		$this->db->where('rated_by', $this->session->userdata('user_id'));
		$this->db->update('qmp_rating', $data); 
	    return $this->db->affected_rows() > 0; 
	  }
    //-------------------------------------------------------------------------------------------
	  function updatesurveyquestions() {
	    /*
		   this will delete any entries on qmp_rating and reload array/batch of questions and campaign
		   http://ellislab.com/codeigniter/user-guide/libraries/input.html
		   http://stackoverflow.com/questions/9050936/does-isset-work-with-get
		*/
		//$questions = $this->input->get_post('surveyquestions', TRUE);
		//echo 'hello' . $questions;
		//if isset($this->input->get_post('surveyquestions', TRUE))
		
		if($this->input->get_post('surveyquestions', TRUE)) 
		{
		//echo('happened');
		  $squestions    =   explode(',',$this->input->get_post('surveyquestions', TRUE));

		    //cleanup
			$data = array(
						   'rateduser' => 'RYAN',
					       'campaignid' => 17
						);
		    //$this->db->where_in('categoryid', trim($this->input->get_post('surveyquestions', TRUE), "'"));

			//!!$where_in = trim($this->input->get_post('surveyquestions', TRUE));
			//!!$where_in = preg_replace("/'/", "", $this->input->get_post('surveyquestions', TRUE));
			
			$where_in = explode(",", $this->input->get_post('surveyquestions', TRUE));
			//$where_in = array_map('intval', $this->input->get_post('surveyquestions', TRUE));
            
		    $this->db->where_in('categoryid', $where_in);
			$this->db->where('rated_by', $this->session->userdata('user_id'));
			$this->db->delete('qmp_rating', $data); 
		    //update
			foreach ($squestions as $questions)
			{
					$survey_questions = array(
					'ratingselectionid' => 1,
					'categoryid' => $questions,
					'campaignid' => 17,
					'rated_by' => $this->session->userdata('user_id'),
					'rateduser' => 'RYAN',
					'form_id' => 'RYAN',
					'topic_id' => '1'
					);		
			$this->db->insert('qmp_rating', $survey_questions);
			}		
		}
			
	  }
	
	  function get_campaigns(  ) {
		$this->db->from('campaign_context');
		$this->db->order_by('name','asc');

		$campaigns = $this->db->get()->result_array();

		if( is_array($campaigns) && count($campaigns) > 0 ) {
		  return $campaigns;
		}
		
		return false;
	  }
	
    //-------------------------------------------------------------------------------------------
	  //function get_posts_for_user( $user_id, $num_posts = 10 ) {
	  function get_surveyquestions(  ) {

	  /*
		$this->db->from('post');
		$this->db->where( array('userId'=>$user_id) );
		$this->db->limit( $num_posts );
		$this->db->order_by('createdDate','desc');
	  */
		$this->db->from('qmp_rating_topic');
        $this->db->where('isvisible', '1'); 

		$topics = $this->db->get()->result_array();

		if( is_array($topics) && count($topics) > 0 ) {
		  return $topics;
		}

		return false;
	  }
    //-------------------------------------------------------------------------------------------
	  function get_surveysubquestions(  $topic_id ) {
		$this->db->from('qmp_rating_category');
		$this->db->where('topic_id', $topic_id);
        $this->db->where('isvisible', '1'); 

		$questions = $this->db->get()->result_array();

		if( is_array($questions) && count($questions) > 0 ) {
		  return $questions;
		}

		return false;
	  }
	  
    //-------------------------------------------------------------------------------------------
    
    function get_all_entries()
    {
       
        $query = $this->db->get('crm_script');
        return $query->result();
    }

    function insert_entry($data)
    {
        $this->name   = $data['name']; // please read the below note
        $this->description = $data['description'];
        //get back on this http://stackoverflow.com/questions/6723941/codeigniter-inserts-empty-value-default-value-of-table-field-in-mysql-is-ignore have DEFAULT in MySQL
        $this->status = 'A'; //$this->status = $data['status'];
        //$this->tipo = 'B'; //$this->tipo = $data['tipo'];
        //$this->date    = time();

        $this->db->insert('crm_script', $this);
    }

    function update_entry($data)
    {
        $this->name   = $data['name']; // please read the below note
        $this->description = $data['description'];
        //get back on this http://stackoverflow.com/questions/6723941/codeigniter-inserts-empty-value-default-value-of-table-field-in-mysql-is-ignore have DEFAULT in MySQL
        $this->status = 'A'; //$this->status = $data['status'];
        //$this->tipo = 'B'; //$this->tipo = $data['tipo'];
        //$this->date    = time();
        $this->db->update('crm_script', $this, array('id' => $data['id']));
    }

    function delete_entry($id)
    {
        $this->db->delete('crm_script', array('id' => $id));
    }

    function get_entry($id){
        $this->db->where('id', $id);
        $query = $this->db->get('crm_script', 1);
        return $query->result();
    }



}