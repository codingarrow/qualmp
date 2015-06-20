<?php

class User_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function get($id)
	{
		return $this->db->from('users')->where('id', $id)->get()->row_array();
	}
	
	function get_members()
	{
		$this->db->select('meta.*');
		$this->db->from('meta');
		$this->db->where('users.group_id', 2);
		$this->db->join('users', 'users.id = meta.user_id');
		$this->db->order_by('last_name, first_name');
		
		return $this->db->get()->result_array();
	}
	
	function get_advertisers()
	{
		$this->db->select('meta.*');
		$this->db->from('meta');
		$this->db->where('users.group_id', 3);
		$this->db->join('users', 'users.id = meta.user_id');
		$this->db->order_by('last_name, first_name');
		
		return $this->db->get()->result_array();
	}
	
	function get_admins()
	{
		$this->db->select('meta.*');
		$this->db->from('meta');
		$this->db->where('users.group_id', 1);
		$this->db->join('users', 'users.id = meta.user_id');
		$this->db->order_by('last_name, first_name');
		
		return $this->db->get()->result_array();
	}
	
	function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('users', $data); 
	}
	
	function delete($id)
	{
		$this->db->delete('users', array('id' => $id)); 	
		$this->db->delete('meta', array('user_id' => $id)); 	
	}	
	
	function get_users()
	{
		$this->db->select('meta.first_name, meta.last_name, users.username, users.email, meta.user_id, users.id, groups.name');
		$this->db->from('meta');
		//$this->db->where('users.group_id', 2);
		$this->db->join('users', 'users.id = meta.user_id');
		$this->db->join('groups', 'groups.id = users.group_id');
		$this->db->order_by('last_name, first_name');
		
		return $this->db->get()->result_array();
	
	}
	
	// --------------------------------------------------------------------

	function deleteUser($u_id)
	{
		// Don't allow admins to be deleted this way
		if ($u_id === 0)
		{
			return FALSE;
		}
		else
		{
			/*$this->db->where('id', $u_id);
			$this->db->delete('users'); 
			
			$this->db->where('user_id', $u_id);
			$this->db->delete('meta'); */
			
			$this->db->delete('users', array('id' => $u_id)); 	
			$this->db->delete('meta', array('user_id' => $u_id)); 
			
			return TRUE;
		}
	}
	
	//-----------------------------------------------------
	
	function checkemail($email)
	{    
        $this->db->where('email', $email);
		$this->db->from('users');

		return $this->db->count_all_results();
	}
	
	//-----------------------------------------------------
	
	function checkusername($uname)
	{    
        $this->db->where('username', $uname);
		$this->db->from('users');

		return $this->db->count_all_results();
	}
	
}