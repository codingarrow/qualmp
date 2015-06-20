<?php

/**
 * login actions.
 *
 * @package    ameyom
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php,v 1.16.6.1 2013/02/07 08:42:37 prashantmalik Exp $
 */
class loginActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 */
	public function executeWelcome()
	{
		$sessionId = $this->getRequestParameter('sessionId');
		if(!empty($sessionId) && !empty($_SESSION['ameyoSessionId']) && $sessionId != $_SESSION['ameyoSessionId']) {
			$_SESSION['ameyoSessionId'] = $sessionId;
		}
		echo '<script src="/web/js/print_lib.js" type="text/javascript"></script>';
		require_once('myclass.php');
		myUsers::show_theme('Welcome',0,myUser::getUserName($this->getUser()->getAttribute('userid')),$this->getUser()->getAttribute('id') ) ;
		$this->getUser()->shutdown();
		$this->data= $this->data . "<h1>Click On Menu</h1>" ;
		$this->data .= '<br><br> <h2>General information about common modules</h2> <br>' ;


		global $mrUser ;
		require('all_modules.php');
		foreach ( $modules as $mid => $val )
		{
			if ($mid != '')
			{
				$vals=$modules["$mid"];	
				$denied=0;
				try  {

					$val1=preg_replace("/\/.*$/",'/',$vals);
					sfContext::getInstance()->getLogger()->log("$val1 privilege checking ", $priority = 0) ;
					if (! $mrUser->isActionAllowed("$val1",false) )
					{
						$denied=1;
					}

				}
				catch(Exception $e)
				{
					sfContext::getInstance()->getLogger()->log("$val1 threw excep. now checking $vals ", $priority = 0) ;
					if (! $mrUser->isActionAllowed("$vals") )  
					{
						$denied=1;
					}

				}

				if ($mrUser->isActionAllowed("$vals") && ($denied == 0 ))

				{
					if (file_exists("/dacx/ameyo/acp/web/hlp/$mid.hlp"))
					{
						$this->data .= file_get_contents("/dacx/ameyo/acp/web/hlp/$mid.hlp");
						$this->data .= "<br>";

					}

				}

			}	
		}
























	}

	public function executeMyLogin()
	{
		global $mrUser;
		if ($_REQUEST['userId'])
		{
			//$url="?login_id=".$this->getRequestParameter('userId') ;
			$url="login_id=".$this->getRequestParameter('userId') ;
			if ($_REQUEST['password'])
			$url .= "&login_password=" . urlencode($this->getRequestParameter('password')) ;
			if ($_REQUEST['sessionId'])
			$url .= "&login_password=" . urlencode($this->getRequestParameter('sessionId')) ;
			$url .= "&passwordType=sessionid" ;
			if (! $mrUser)
			{
				$_SESSION['ameyoSessionId'] = $this->getRequestParameter('sessionId');
				//header("location: /web/system.php/login/welcome$url " ) ;
				sfContext::getInstance()->getController()->redirect(sfContext::getInstance()->getRequest()->getUri() . "&" . $url);
			}
			return  sfView::None;
		}
			$this->setTemplate("MyLogin");


	}

	public function executeIndex()
	{


		if ($this->getRequestParameter('username'))
		{

			require('myclass.php');
			$auth=dacx::authenticate($this->getRequestParameter('username'),$this->getRequestParameter('password') ) ;





			if ( $auth == 0 )
			{
				echo "<h1>Invalid username/Password </h1><a href='/web/system.php/login/index'>click here</a> to login again. ";
				exit ;	
			}else
			{
				$FP1=fopen('users.logged','a');
				$myuser=$this->getRequestParameter('username')	 ;
				$id=rand()%100000000;
				$myhost=$_SERVER[REMOTE_ADDR] ;
				$myuser=trim($myuser) ;
				fprintf($FP1,"$myuser:$id:$myhost\n") ;
				fclose($FP1) ;

				$this->getResponse()->setCookie('user', $this->getRequestParameter('username'));
				$this->getResponse()->setCookie('id', $id);
				$this->redirect('/');
				exit ;
			}
		}elseif($this->getRequestParameter('logout'))
		{
			unset($_SESSION['ameyoSessionId']);
			$fdata="";

			$FP1=fopen('users.logged','r');

			while($line=fgets($FP1))
			{	
				$myuser=$this->getRequest()->getCookie('user')  ;

				$id=$this->getUser()->getAttribute('id') ;
				$myuser=trim($myuser) ;
				$line=trim($line) ;
				if ( preg_match("/$myuser:$id/",$line) )
				{
				}else
				{
					$fdata=$fdata . $line . "\n"	;
				}
			}
			fclose($FP1) ;
			$FP1=fopen('users.logged','w');
			fprintf($FP1,"$fdata") ;
			fclose($FP1) ;

			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			sfContext::getInstance()->getLogger()->log("User ". $this->getRequestParameter('username'). " Logged out", $priority = 1) ;
		
setcookie('sesid', "" ,'-1','/'); 
setcookie('sesid', "" ,'','/'); 
			echo '<script>' . "window.top.location.href='https://$host$uri/welcome'" . '</script>' ;
			$this->getUser()->setAuthenticated(false) ;
			$this->data="<h1>You are sucessfully logged out </h1>
				<a href='/web/system.php/'>click here</a> to login again. ";

			echo '<script>' . "window.top.location.href='https://$host$uri/welcome'" . '</script>' ;
			exit ; 


		}else
		{




			if  ($this->getRequest()->getCookie('user') )
			{
				$tempuser=$this->getRequest()->getCookie('user') ;
				$this->data="
					<H1>Access Denied for user $tempuser </H1>	
					<a href='/web/system.php/login/index?logout=1'>click here</a> to logout. 
					<input type=button value='Back' onclick='history.go(-1);'>
					" ;
			}else
			{

				$this->data="

					<H1>Login page</H1>
					<form name=mainform method=GET>
					<table align=center>
					<tr><td>Enter Username</td><td> <input name=username value=''></td> </tr>
					<tr><td>Enter Password</td><td> <input type=password name=password value=''></td> </tr>
					<tr><td></td><td> <input type=submit name=action value='Login'></td> </tr>
					</table>
					</form>";
			}
		}
	}
}
