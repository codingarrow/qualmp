<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function test_index()
	{
		//$this->load->view('welcome_message');
		$this->load->view('try_view');
		
	}    
    function index() {
        if( $this->session->userdata('isLoggedIn') ) {
            //redirect('/main/show_main');
            //~~redirect('/create/show_agent');
			
			//echo $this->details->userlevel;
			//echo $this->session->userdata('user_level');
			//exit();
			
            //!!redirect('/crmcontroller/show_agent');
			$this->redirect_basedon_userlevel();
        } else {
            $this->show_login(false);
        }
    }

	function redirect_basedon_userlevel()
		{
		
			switch ($this->session->userdata('userlevel')) 
			{
				case -1:
				  //redirect('/crmcontroller/qmp_setting');
				  redirect('/crmcontroller/show_surveyform');
				  break;
				case 3:
				  //redirect('/crmcontroller/qmp_viewandrateuser');
				  redirect('/crmcontroller/show_surveyform');
				  break;
				case 2:
				  //redirect('/crmcontroller/qmp_viewandrateuser');
				  redirect('/crmcontroller/search_call_list');
				default:
				  //redirect('/crmcontroller/qmp_viewandrateuser');
				  redirect('/crmcontroller/search_call_list');
				  
			}
		}
	
    function login_user() {
        // Create an instance of the user model
        $this->load->model('user_m');

        // Grab the email and password from the form POST
        $email = $this->input->post('email');
        $pass  = $this->input->post('password');

        //Ensure values exist for email and pass, and validate the user's credentials
        if( $email && $pass && $this->user_m->validate_user($email,$pass)) {
            // If the user is valid, redirect to the main view
            //redirect('/main/show_main');
            //~~redirect('/create/show_agent');
      $_SESSION['qmp_log_user'] = "-1";

			//echo $this->details->userlevel;
			//echo $this->session->userdata('userlevel');
			//exit();
			
            //!!redirect('/crmcontroller/show_agent');
			$this->redirect_basedon_userlevel();
			
        } else {
            // Otherwise show the login screen with an error message.
            $this->show_login(true);
        }
    }

    function show_login( $show_error = false ) {
        $data['error'] = $show_error;

        $this->load->helper('form');
        $this->load->view('login',$data);
    }

    function logout_user() {
      $_SESSION['qmp_log_user'] = "0";
      $this->session->sess_destroy();
      $this->index();
    }

    function showphpinfo() {
        echo phpinfo();
    }


}
