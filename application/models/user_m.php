<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_m extends CI_Model {

    var $details;

    function validate_user( $email, $password ) {
        // Build a query to retrieve the user's details
        // based on the received username and password
        $this->db->from('qmp_loginuser');
        $this->db->where('user_id',$email );
        //$this->db->where( 'password', sha1($password) );
        $this->db->where( 'password', $password );
        $login = $this->db->get()->result();

        // The results of the query are stored in $login.
        // If a value exists, then the user account exists and is validated
        if ( is_array($login) && count($login) == 1 ) {
            // Set the users details into the $details property of this class
            $this->details = $login[0];
            // Call set_session to set the user's session vars via CodeIgniter
            $this->set_session();
            return true;
        }

        return false;
    }

    function set_session() {
        // session->set_userdata is a CodeIgniter function that
        // stores data in CodeIgniter's session storage.  Some of the values are built in
        // to CodeIgniter, others are added.  See CodeIgniter's documentation for details.
		
		/*
        $this->session->set_userdata( array(
                'id'=>$this->details->id,
                'name'=> $this->details->firstName . ' ' . $this->details->lastName,
                'email'=>$this->details->email,
                'avatar'=>$this->details->avatar,
                'tagline'=>$this->details->tagline,
                'isAdmin'=>$this->details->isAdmin,
                'teamId'=>$this->details->teamId,
                'isLoggedIn'=>true
            )
        );
		*/
        $this->session->set_userdata( array(
                'user_id'=>$this->details->user_id,
                'qmp_login'=>"-1",
                'userlevel'=>$this->details->userlevel,
                'user_type'=>$this->details->user_type,
                'campaign_id'=>$this->details->campaign_id,
                'name'=>$this->details->name,
                'isLoggedIn'=>true
            )
        );
    }

    function  create_new_user( $userData ) {
      $data['firstName'] = $userData['firstName'];
      $data['lastName'] = $userData['lastName'];
      $data['teamId'] = (int) $userData['teamId'];
      $data['isAdmin'] = (int) $userData['isAdmin'];
      $data['avatar'] = $this->getAvatar();
      $data['email'] = $userData['email'];
      $data['tagline'] = "Click here to edit tagline.";
      $data['password'] = sha1($userData['password1']);

      return $this->db->insert('user',$data);
    }

    public function update_tagline( $user_id, $tagline ) {
      $data = array('tagline'=>$tagline);
      $result = $this->db->update('user', $data, array('id'=>$user_id));
      return $result;
    }

    private function getAvatar() {
      $avatar_names = array();

      foreach(glob('assets/img/avatars/*.png') as $avatar_filename){
        $avatar_filename =   str_replace("assets/img/avatars/","",$avatar_filename);
        array_push($avatar_names, str_replace(".png","",$avatar_filename));
      }

      return $avatar_names[array_rand($avatar_names)];
    }
}
