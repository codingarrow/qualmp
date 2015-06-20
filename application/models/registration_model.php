<?php

class Registration_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	/*function get_some($offset, $row)
	{		
		$this->db->from('registrations');
		$this->db->where('date_created', date('Y-m-d'));
		$this->db->order_by('company_name, last_name, first_name');
		$this->db->limit($offset, $row);

		return $this->db->get()->result_array();		
	}*/
	
	//function get_some($offset, $row)
	function get_some()
	{		
		$this->db->from('tbl_memberinfo');
		//$this->db->where('date_created', date('Y-m-d'));
		$this->db->order_by('member_signupdate','desc');
		//$this->db->limit($offset, $row);

		return $this->db->get()->result_array();		
	}
	
	function getallmember()
	{		
		$this->db->from('tbl_memberinfo');
		//$this->db->where('date_created', date('Y-m-d'));
		$this->db->order_by('member_lastname');
		//$this->db->limit($offset, $row);

		return $this->db->get()->result_array();		
	}
	
	function getallcategories()
	{		
		$this->db->from('tbl_products_categories');
		//$this->db->where('date_created', date('Y-m-d'));
		$this->db->order_by('category_name');
		//$this->db->limit($offset, $row);

		return $this->db->get()->result_array();		
	}
	
	function get_catproducts()
	{		
		$this->db->from('tbl_products_categories');
		$this->db->where('parent', 8);
		//$this->db->order_by('category_name');
		//$this->db->limit($offset, $row);

		return $this->db->get()->result_array();		
	}
	
	function get_catservices()
	{		
		$this->db->from('tbl_products_categories');
		$this->db->where('parent', 9);
		//$this->db->order_by('category_name');

		//$this->db->limit($offset, $row);

		return $this->db->get()->result_array();		
	}
	
	function get_catbusiness()
	{		
		$this->db->from('tbl_products_categories');
		$this->db->where('parent', 10);
		//$this->db->order_by('category_name');

		return $this->db->get()->result_array();		
	}
	
	function getallproducts()
	{		
		$this->db->from('tbl_products');
		//$this->db->where('date_created', date('Y-m-d'));
		$this->db->order_by('product_name');
		//$this->db->limit($offset, $row);

		return $this->db->get()->result_array();		
	}
	
	function getallbanners()
	{		
		$this->db->from('tbl_banners');
		//$this->db->where('date_created', date('Y-m-d'));
		$this->db->order_by('id');
		//$this->db->limit($offset, $row);

		return $this->db->get()->result_array();		
	}
	
	function get_some_products($offset, $row)
	{		
		$this->db->from('tbl_products');
		//$this->db->where('date_created', date('Y-m-d'));
		$this->db->order_by('product_name');
		$this->db->limit($offset, $row);

		return $this->db->get()->result_array();		
	}
	
	function get_some_product2($pid)
	{		
		$this->db->from('tbl_products');
		$this->db->where('product_category', $pid);
		//$this->db->order_by('product_name');
		//$this->db->limit($offset, $row);

		return $this->db->get()->result_array();		
	}
	
	function get_product($pid)
	{		
		//$this->db->from('tbl_products');
		$this->db->where('ProductID', $pid);
		//$this->db->where('product_category', $pid);
		//$this->db->order_by('product_name');
		//$this->db->limit($offset, $row);

		//return $this->db->get()->result_array();		
		return $this->db->get('tbl_products')->row();
	}
	
	function get_profile($pid)
	{		
		//return $this->db->from('tbl_memberinfo')->where('ID', $pid)->get()->row_array();	
		//$this->db->from('tbl_memberinfo');
		$this->db->where('ID', $pid);
		//$this->db->order_by('member_lastname');
		//$this->db->limit($offset, $row);

		//return $this->db->get()->result_array();	
		return $this->db->get('tbl_memberinfo')->row();
	}
	
	
	function get_products($pid)
	{		
		//return $this->db->from('tbl_memberinfo')->where('ID', $pid)->get()->row_array();	
		$this->db->from('tbl_products');
		$this->db->where('product_category', $pid);
		//$this->db->order_by('member_lastname');
		//$this->db->limit($offset, $row);

		return $this->db->get()->result_array();	
		//return $this->db->get('tbl_products')->row();
	}
		
	function get_product_info($pid)
	{		
		//return $this->db->from('tbl_memberinfo')->where('ID', $pid)->get()->row_array();	
		//$this->db->from('tbl_products');
		$this->db->where('productID', $pid);
		//$this->db->order_by('member_lastname');
		//$this->db->limit($offset, $row);

		//return $this->db->get()->result_array();	
		return $this->db->get('tbl_products')->row();
	}
	
	function get_category($cid)
	{		
		//return $this->db->from('tbl_memberinfo')->where('ID', $pid)->get()->row_array();	
		//$this->db->from('tbl_memberinfo');
		$this->db->where('catID', $cid);
		//$this->db->order_by('member_lastname');
		//$this->db->limit($offset, $row);

		//return $this->db->get()->result_array();	
		return $this->db->get('tbl_products_categories')->row();
	}
	
	function get_order($oid)
	{		
		//return $this->db->from('tbl_memberinfo')->where('ID', $pid)->get()->row_array();	
		//$this->db->from('tbl_memberinfo');
		$this->db->where('orderID', $oid);
		//$this->db->order_by('member_lastname');
		//$this->db->limit($offset, $row);

		//return $this->db->get()->result_array();	
		return $this->db->get('tbl_orderdetails')->row();
	}
	
	function get_banner($bid)
	{		
		//return $this->db->from('tbl_memberinfo')->where('ID', $pid)->get()->row_array();	
		//$this->db->from('tbl_memberinfo');
		$this->db->where('id', $bid);
		//$this->db->order_by('member_lastname');
		//$this->db->limit($offset, $row);

		//return $this->db->get()->result_array();	
		return $this->db->get('tbl_banners')->row();
	}
		
	function count_some()
	{		
		$this->db->from('registrations');
		$this->db->where('date_created', date('Y-m-d'));
		$this->db->order_by('company_name, last_name, first_name');

		return $this->db->count_all_results();
	}
    
	function count_all()
	{		
        $this->db->where('date_created', date('Y-m-d'));
		$this->db->from('registrations');

		return $this->db->count_all_results();
	}
	
	function count_members()
	{		
        $this->db->where("member_id != ''");
		$this->db->from('tbl_memberinfo');

		return $this->db->count_all_results();
		
		//$query = 'SELECT COUNT(*) FROM tbl_memberinfo where member_id is not null';
        //$result = $this->db->query($query);

        //return $result->num_rows();
	}
	
	function count_nonmembers()
	{		
        $this->db->where('member_id','');
		$this->db->from('tbl_memberinfo');

		return $this->db->count_all_results();
		
		//$query = 'SELECT COUNT(*) FROM tbl_memberinfo where member_id is not null';
        //$result = $this->db->query($query);

        //return $result->num_rows();
	}
    
	function get_all()
	{
		$this->db->where('date_created', date('Y-m-d'));
		$this->db->order_by('company_name, last_name, first_name');
		return $this->db->from('registrations')->get()->result_array();
	}

	function get_all_export()
	{
        return $this->db->where('date_created', date('Y-m-d'))->order_by('company_name, last_name, first_name')->get('registrations');
	}
	
    function get($id)
	{
		return $this->db->from('registrations')->where('id', $id)->get()->row_array();
	}
    
    /*function insert($data)
    {
        $this->db->insert('registrations', $data);
    }*/
    
	/*function check($email)
	{    
        $this->db->where('email', $email);
		$this->db->from('registrations');

		return $this->db->count_all_results();
	}*/
	
	function check($email)
	{    
        $this->db->where('member_email', $email);
		$this->db->from('tbl_memberinfo');

		return $this->db->count_all_results();
	}
	
	
	function get_some_date($offset, $row, $start, $end)
	{		
		$this->db->from('registrations');
		$this->db->where("date_created BETWEEN '" . $start . "' AND '" . $end . "'");  
		$this->db->order_by('company_name, last_name, first_name');
		$this->db->limit($offset, $row);

		return $this->db->get()->result_array();		
	}
	
	
	function count_some_date($start, $end)
	{		
		$this->db->from('registrations');
		$this->db->where("date_created BETWEEN '" . $start . "' AND '" . $end . "'");  
		$this->db->order_by('company_name, last_name, first_name');

		return $this->db->count_all_results();
	}
    
	
	function count_all_date($start, $end)
	{		
        $this->db->where("date_created BETWEEN '" . $start . "' AND '" . $end . "'");  
		$this->db->from('registrations');

		return $this->db->count_all_results();
	}
    
	
	function get_all_date($start, $end)
	{
		$this->db->where("date_created BETWEEN '" . $start . "' AND '" . $end . "'");  
		$this->db->order_by('company_name, last_name, first_name');
		return $this->db->from('registrations')->get()->result_array();
	}

	
	function get_all_export_date($start, $end)
	{
        return $this->db->where("date_created BETWEEN '" . $start . "' AND '" . $end . "'")->order_by('company_name, last_name, first_name')->get('registrations');
	}
	
	
	function get_dropdown()
    {
		$result=$this->db->get('tbl_products');
		$dropdown=array();
		if( $result->num_rows() > 0 )
		{
			foreach($result->result_array() as $row)
			{
				$dropdown[$row['ProductID']]=$row['product_name'];
			}
		}
		return $dropdown;
	}
	
	
	function get_dropcategory()
    {
		$result=$this->db->get('tbl_products_categories');
		$dropdown=array();
		if( $result->num_rows() > 0 )
		{
			foreach($result->result_array() as $row)
			{
				$dropdown[$row['category_name']]=$row['category_name'];
			}
		}
		return $dropdown;
	}  
	
	function get_parentdrop()
    {
		$catid = array(8,9,10);
 		$this->db->where_in('catID', $catid);
		$result=$this->db->get('tbl_products_categories');
		$dropdown=array();
		if( $result->num_rows() > 0 )
		{
			$dropdown[0]='None';
			foreach($result->result_array() as $row)
			{
				$dropdown[$row['catID']]=$row['category_name'];
			}
		}
		return $dropdown;
	}  
	
	
	function get_orders($mid)
	{		
		$this->db->from('tbl_orderdetails');
		$this->db->where('member_ID', $mid);
		//$this->db->order_by('company_name, last_name, first_name');
		//$this->db->limit($offset, $row);

		return $this->db->get()->result_array();		
	}
	
	// --------------------------------------------------------------------
	
	function get_order_detail($oid)
	{		
	
		$this->db->select('*');
		$this->db->from('tbl_memberinfo t1');
		$this->db->join('tbl_orderdetails t2', 't1.ID = t2.member_ID');
		//$this->db->join('tbl_products t3', 't2.productOrdered = t3.productID');
		$this->db->where('orderID', $oid);
 
		return $this->db->get()->row();
 
		//return $query = $this->db->get();
 
	
	
		//$this->db->from('tbl_orderdetails');
		//$this->db->where('member_ID', $mid);
		//$this->db->order_by('company_name, last_name, first_name');
		//$this->db->limit($offset, $row);

		//return $this->db->get()->result_array();		
	}
	
	
	// --------------------------------------------------------------------

	function updateMember($mem_id, $memberInfo)
	{
		$this->db->where('ID', $mem_id);
		//$this->db->update('clients', $clientInfo);
		//$this->db->update('cc_address_book', $clientInfo);
		$this->db->update('tbl_memberinfo', $memberInfo);

		return TRUE;
	}
	
	// --------------------------------------------------------------------

	function deleteMember($m_id)
	{
		// Don't allow admins to be deleted this way
		if ($m_id === 0)
		{
			return FALSE;
		}
		else
		{
			$this->db->where('ID', $m_id);
			$this->db->delete('tbl_memberinfo'); 
			
			return TRUE;
		}
	}
	
	
	// --------------------------------------------------------------------

	function updateProduct($prod_id, $prodInfo)
	{
		$this->db->where('ProductID', $prod_id);
		//$this->db->update('clients', $clientInfo);
		//$this->db->update('cc_address_book', $clientInfo);
		$this->db->update('tbl_products', $prodInfo);

		return TRUE;
	}
	
	// --------------------------------------------------------------------

	function updateBanner($bid, $banInfo)
	{
		$this->db->where('id', $bid);
		//$this->db->update('clients', $clientInfo);
		//$this->db->update('cc_address_book', $clientInfo);
		$this->db->update('tbl_banners', $banInfo);

		return TRUE;
	}
	
	// --------------------------------------------------------------------

	function deleteProduct($p_id)
	{
		// Don't allow admins to be deleted this way
		if ($p_id === 0)
		{
			return FALSE;
		}
		else
		{
			$this->db->where('ProductID', $p_id);
			$this->db->delete('tbl_products'); 
			
			return TRUE;
		}
	}
	
	// --------------------------------------------------------------------

	function deleteBanner($b_id)
	{
		// Don't allow admins to be deleted this way
		if ($b_id === 0)
		{
			return FALSE;
		}
		else
		{
			$this->db->where('id', $b_id);
			$this->db->delete('tbl_banners'); 
			
			return TRUE;
		}
	}
	
	
	// --------------------------------------------------------------------

	function updateCategory($cat_id, $catInfo)
	{
		$this->db->where('catID', $cat_id);
		//$this->db->update('clients', $clientInfo);
		//$this->db->update('cc_address_book', $clientInfo);
		$this->db->update('tbl_products_categories', $catInfo);

		return TRUE;
	}
	
	// --------------------------------------------------------------------

	function deleteCategory($c_id)
	{
		// Don't allow admins to be deleted this way
		if ($c_id === 0)
		{
			return FALSE;
		}
		else
		{
			$this->db->where('catID', $c_id);
			$this->db->delete('tbl_products_categories'); 
			
			return TRUE;
		}
	}
	
	
	
	// --------------------------------------------------------------------

	function updateOrder($ord_id, $orderInfo)
	{
		$this->db->where('orderID', $ord_id);
		//$this->db->update('clients', $clientInfo);
		//$this->db->update('cc_address_book', $clientInfo);
		$this->db->update('tbl_orderdetails', $orderInfo);

		return TRUE;
	}
	
	// --------------------------------------------------------------------

	function deleteOrder($o_id)
	{
		// Don't allow admins to be deleted this way
		if ($o_id === 0)
		{
			return FALSE;
		}
		else
		{
			$this->db->where('orderID', $o_id);
			$this->db->delete('tbl_orderdetails'); 
			
			return TRUE;
		}
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
	
	// --------------------------------------------------------------------

	function get_member_ccnum($id)
	{
		
		$sql = "SELECT AES_DECRYPT(cardnumber,'12345') as cc_str FROM tbl_memberinfo WHERE ID = '$id'";
		$query = $this->db->query($sql);
	
		return $query->row();
	}
	
	
	// --------------------------------------------------------------------

	function get_mem_ccnum($oid)
	{
		
		$sql = "SELECT AES_DECRYPT(cardnumber,'12345') as cc_str FROM tbl_memberinfo t1, tbl_orderdetails t2 WHERE t1.ID = t2.member_ID and orderID = '$oid'";
		$query = $this->db->query($sql);
	
		return $query->row();
		
		//$this->db->select('*');
		//$this->db->from('tbl_memberinfo t1');
		//$this->db->join('tbl_orderdetails t2', 't1.ID = t2.member_ID');
		//$this->db->join('tbl_products t3', 't2.productOrdered = t3.productID');
		//$this->db->where('orderID', $oid);
 
		//return $this->db->get()->row();
	}

	
	// ----------- Search functions -------------
	
	function getfirstname($fname)
	{		
		$this->db->from('tbl_memberinfo');
		$this->db->where('member_firstname', $fname);

		return $this->db->get()->result_array();	
	}
	
	
	function getlastname($lname)
	{		
		$this->db->from('tbl_memberinfo');
		$this->db->where('member_lastname', $lname);

		return $this->db->get()->result_array();	
	}
	
	
	function getphone($phone)
	{		
		$this->db->from('tbl_memberinfo');
		$this->db->where('member_phonenumber', $phone);

		return $this->db->get()->result_array();	
	}
	
	
	function getemail($email)
	{		
		$this->db->from('tbl_memberinfo');
		$this->db->where('member_email', $email);

		return $this->db->get()->result_array();	
	}
	
	function getmemberccdnum($ccdnum)
	{		
		/*$this->db->from('tbl_memberinfo');
		$this->db->where("cardnumber like substr(-4,4,$ccdnum)");
		
		return $this->db->get()->result_array(); */

		$sql = "SELECT * FROM tbl_memberinfo WHERE substr(AES_DECRYPT(cardnumber, '12345'), -4) like '%$ccdnum%'";
		$query = $this->db->query($sql);
	
		//return $query->row();
		return $query->result_array();
		
	}
	
	function getccdnumfname($fname, $ccdnum)
	{
		/*$this->db->from('tbl_memberinfo');
		$this->db->where('member_firstname', $fname);
		$this->db->where("cardnumber like substr(-4,4,$ccdnum)");

		return $this->db->get()->result_array();*/
		
		$sql = "SELECT * FROM tbl_memberinfo WHERE substr(AES_DECRYPT(cardnumber, '12345'), -4) = '$ccdnum' AND member_firstname = '$fname'";
		$query = $this->db->query($sql);
	
		//return $query->row();
		return $query->result_array();
		
	}
	
	function getccdnumlname($lname, $ccdnum)
	{
		/*$this->db->from('tbl_memberinfo');
		$this->db->where('member_lastname', $lname);
		$this->db->where("cardnumber like substr(-4,4,$ccdnum)");

		return $this->db->get()->result_array();*/
		
		$sql = "SELECT * FROM tbl_memberinfo WHERE substr(AES_DECRYPT(cardnumber, '12345'), -4) = '$ccdnum' AND member_firstname like '%$fname%'";
		$query = $this->db->query($sql);
	
		//return $query->row();
		return $query->result_array();
	}
	
	function getccdnumname($fname, $lname, $ccdnum)
	{
		/*$this->db->from('tbl_memberinfo');
		$this->db->where('member_firstname', $fname);
		$this->db->where('member_lastname', $lname);
		$this->db->where("cardnumber like substr(-4,4,$ccdnum)");

		return $this->db->get()->result_array();*/
		
		$sql = "SELECT * FROM tbl_memberinfo WHERE substr(AES_DECRYPT(cardnumber, '12345'), -4) = '$ccdnum' AND member_firstname like '%$fname%' AND member_lastname like '%$lname%'";
		$query = $this->db->query($sql);
	
		//return $query->row();
		return $query->result_array();
		
	}
	
	function getccdemail($email, $ccdnum)
	{
		/*$this->db->from('tbl_memberinfo');
		$this->db->where('member_email', $email);
		$this->db->where("cardnumber like substr(-4,4,$ccdnum)");

		return $this->db->get()->result_array();*/
		
		$sql = "SELECT * FROM tbl_memberinfo WHERE substr(AES_DECRYPT(cardnumber, '12345'), -4) = '$ccdnum' AND member_email like '%$email%'";
		$query = $this->db->query($sql);
	
		//return $query->row();
		return $query->result_array();
		
	}
	
	function getccdphone($phone, $ccdnum)
	{
		/*$this->db->from('tbl_memberinfo');
		$this->db->where('member_phonenumber', $phone);
		$this->db->where("cardnumber like substr(-4,4,$ccdnum)");

		return $this->db->get()->result_array();*/
		
		$sql = "SELECT * FROM tbl_memberinfo WHERE substr(AES_DECRYPT(cardnumber, '12345'), -4) = '$ccdnum' AND member_phonenumber like '%$phone%'";
		$query = $this->db->query($sql);
	
		//return $query->row();
		return $query->result_array();
		
	}
	
	function getccdemailphone($email, $phone, $ccdnum)
	{
		/*$this->db->from('tbl_memberinfo');
		$this->db->where('member_email', $email);
		$this->db->where('member_phonenumber', $phone);
		$this->db->where("cardnumber like substr(-4,4,$ccdnum)");

		return $this->db->get()->result_array();*/
		
		$sql = "SELECT * FROM tbl_memberinfo WHERE substr(AES_DECRYPT(cardnumber, '12345'), -4) = '$ccdnum' AND member_email like '%$email%' AND member_phonenumber like '%$phone%'";
		$query = $this->db->query($sql);
	
		//return $query->row();
		return $query->result_array();
		
	}

	function getname($fname, $lname)
	{		
		$this->db->from('tbl_memberinfo');
		$this->db->where('member_firstname', $fname);
		$this->db->where('member_lastname', $lname);

		return $this->db->get()->result_array();	
	}
	
	function getnamephone($fname, $lname, $phone)
	{		
		$this->db->from('tbl_memberinfo');
		$this->db->where('member_firstname', $fname);
		$this->db->where('member_lastname', $lname);
		$this->db->where('member_phonenumber', $phone);

		return $this->db->get()->result_array();	
	}
	
	function getemailname($fname, $lname, $email)
	{		
		$this->db->from('tbl_memberinfo');
		$this->db->where('member_firstname', $fname);
		$this->db->where('member_lastname', $lname);
		$this->db->where('member_email', $email);

		return $this->db->get()->result_array();	
	}
	
	
	function getallsearch($fname, $lname, $email, $phone, $ccdnum)
	{		
		/*$this->db->from('tbl_memberinfo');
		$this->db->where('member_firstname', $fname);
		$this->db->where('member_lastname', $lname);
		$this->db->where('member_email', $email);
		$this->db->where('member_phonenumber', $phone);
		$this->db->where("cardnumber like substr(-4,4,$ccdnum)");

		return $this->db->get()->result_array();	*/
		
		$sql = "SELECT * FROM tbl_memberinfo WHERE substr(AES_DECRYPT(cardnumber, '12345'), -4) = '$ccdnum' AND member_firstname like '%$fname%' AND member_lastname like '%$lname%' AND member_email like '%$email%' AND member_phonenumber like '%$phone%'";
		$query = $this->db->query($sql);
	
		return $query->result();
		
	}
	
	function getemailfname($fname, $email)
	{		
		$this->db->from('tbl_memberinfo');
		$this->db->where('member_firstname', $fname);
		$this->db->where('member_email', $email);

		return $this->db->get()->result_array();	
	}
	
	function getemaillast($lname, $email)
	{		
		$this->db->from('tbl_memberinfo');
		$this->db->where('member_lastname', $lname);
		$this->db->where('member_email', $email);

		return $this->db->get()->result_array();	
	}
	
	
	function getphonefname($fname, $phone)
	{		
		$this->db->from('tbl_memberinfo');
		$this->db->where('member_firstname', $fname);
		$this->db->where('member_phonenumber', $phone);

		return $this->db->get()->result_array();	
	}
	
	function getphonelast($lname, $phone)
	{		
		$this->db->from('tbl_memberinfo');
		$this->db->where('member_lastname', $lname);
		$this->db->where('member_phonenumber', $phone);

		return $this->db->get()->result_array();	
	}
	
	
	function getemailphone($email, $phone)
	{		
		$this->db->from('tbl_memberinfo');
		$this->db->where('member_email', $email);
		$this->db->where('member_phonenumber', $phone);

		return $this->db->get()->result_array();	
	}
	
	
	function getemailphonelname($lname, $email, $phone)
	{		
		$this->db->from('tbl_memberinfo');
		$this->db->where('member_lastname', $lname);
		$this->db->where('member_email', $email);
		$this->db->where('member_phonenumber', $phone);

		return $this->db->get()->result_array();	
	}
	
	
	function getemailphonefname($fname, $email, $phone)
	{		
		$this->db->from('tbl_memberinfo');
		$this->db->where('member_firstname', $fname);
		$this->db->where('member_email', $email);
		$this->db->where('member_phonenumber', $phone);

		return $this->db->get()->result_array();	
	}
	
	
}