<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Script_model extends CI_Model {

    var $name   = '';
    var $description = '';
    var $status = '';
    //var $tipo = '';
            
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
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