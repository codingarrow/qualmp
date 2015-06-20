<?php
/**
 * voicelogs actions.
 *
 * @package    sf_sandbox
 * @subpackage voicelogs
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php,v 1.33.2.6 2013/04/08 17:51:26 manishyadav Exp $
 * @version    SVN: $Id: actions.class.php,v 1.33.2.6 2013/04/08 17:51:26 manishyadav Exp $
 */
class voicelogsActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 */
	private $ratingarr = array('a','b','c','d','e');
	public function executeDefault()
	{
		$this->forward('voicelogs','index');

	}

	public function convertolist($varname)
	{
		$varname_list1="";
		if ($varname){
			foreach ($varname as $t)  $varname_list1= $varname_list1 ."'$t',";
		}
		$varname_list1=rtrim($varname_list1,",");
		return $varname_list1 ;
	}




	public function executeIndex()
	{
		require('all_modules.php');
		require_once('myclass.php');
		require_once('lang/voicelog_lang.php');
		dacx::LazyLoadJs('fetchPrint,cal,checkChecked');
		$newwinscript = preg_replace('/\?viewtype=1/','',$_SERVER['REQUEST_URI']);
		$newwinscript = preg_replace('/viewtype=1/','',$newwinscript);
		myUsers::show_theme(voicelog_lang::getLocalizedString("Voicelogs"),0,myUser::getUserName($this->getUser()->getAttribute('userid')),$this->getUser()->getAttribute('id') ) ;
		$this->getUser()->shutdown();
		if($language == 'en' || $language == 'hi' || $language == 'ja') {
			echo "<script type='text/javascript' src='/web/js/calender/mycal-".$language.".js'></script>";
		}else {
			echo "<script type='text/javascript' src='/web/js//calender/mycal-en.js'></script>";
		}
		echo "
			<link rel='stylesheet' type='text/css' media='screen' href='/web/css/mycal.css' />
			<script>

			var arSelected = new Array();
		function getMultiple(ob)
		{
			arSelected = '';
			while (ob.selectedIndex != -1)
			{ if (ob.selectedIndex != 0)
				arSelected.push(ob.options[ob.selectedIndex].value);
				ob.options[ob.selectedIndex].selected = false; }
		}
		</script>

			";




		$this->data = '<form method="post" name=mainform enctype="multipart/form-data" action="showlogs" >';
		$this->data .= "<table align=center valign=middle class=border> ";
		$this->data .= "<th colspan=2 class=tbl_back>".voicelog_lang::getLocalizedString("Please.Select.A.Criteria")."</th>";


		if(( _SERVER_MODE_ ) && (_SERVER_MODE_ == 'expert'))
		{

			$this->data .= "<tr class=tbl_back_odd ><td><input name=ccc id='ccc' type=checkbox onClick=\"checkChecked('ccc','ccd') && fetchPrint('temp1','list?show=contactcenters','ccd');\">".voicelog_lang::getLocalizedString("Contact.Center")."</td><td><div id=ccd></div>&nbsp</td></tr><tr class=tbl_back_even>
			<td><input name=cprocess id=cprocess type=checkbox onClick=\"checkChecked('cprocess','cpro') && fetchPrint('temp6','list?show=process&cc='+ cc.options[cc.selectedIndex].value  ,'cpro') ;\"> ".voicelog_lang::getLocalizedString("Process")." </td><td> <div id=cpro> </div>&nbsp</td></tr><tr class=tbl_back_odd>
			<td><input name=ccamp id=ccamp type=checkbox onClick=\"checkChecked('ccamp','camp') && fetchPrint('temp2','list?show=campaigns&cc='+ cc.options[cc.selectedIndex].value  + '&process=' + process.options[process.selectedIndex].value ,'camp') ;\">".voicelog_lang::getLocalizedString("Campaign")."</td><td> <div id=camp> </div>&nbsp</td></tr><tr class=tbl_back_even> ";

}else
{
                $this->data .=" <tr class=tbl_back_odd><td>
                        <input name=ccamp id=ccamp type=checkbox onClick=\"checkChecked('ccamp','camp') && fetchPrint('temp2','list?show=campaigns','camp') ;\">".voicelog_lang::getLocalizedString("Campaign")."
                        </td><td> <div id=camp> </div>&nbsp</td></tr><tr class=tbl_back_even> " ;

}


/*
			<tr class=tbl_back_odd><td>
			<input name=ccamp id=ccamp type=checkbox onClick=\"checkChecked('ccamp','camp') && fetchPrint('temp2','list?show=campaigns','camp') ;\"> Campaign
			</td><td> <div id=camp> </div>&nbsp</td></tr><tr class=tbl_back_even> " ;
*/


		$this->data .= "<td><input name=cdisp id=cdisp type=checkbox onClick=\"checkChecked('cdisp','disp') && fetchPrint('temp5','list?show=disp' ,'disp') ;\">".voicelog_lang::getLocalizedString("User.Disposition")."</td><td> <div id=disp> </div>&nbsp</td></tr><tr class=tbl_back_odd>" ;


		$this->data .= "<td><input name=csdisp id=csdisp type=checkbox onClick=\"checkChecked('csdisp','sdisp') && fetchPrint('temp5','list?show=sdisp' ,'sdisp') ;\">".voicelog_lang::getLocalizedString("System.Disposition")."</td><td> <div id=sdisp> </div>&nbsp</td></tr>
		<tr class=tbl_back_even>
		<td><input name=cagentqueue id=cagentqueue type=checkbox onClick=\"

		if (document.getElementById('campaign'))
		{
			try
			{
				var tmp = campaign.options[campaign.selectedIndex].value         ;
			}catch (e)
			{
				alert ('".voicelog_lang::getLocalizedString("No.Campaign.Selected")."')
				document.getElementById('queues').innerHTML='' ;
				document.getElementById('cagentqueue').checked  = false;
	}



	checkChecked('cagentqueue','queues') &&  fetchPrint('temp3','list?show=queues&campaigns=' + campaign.options[campaign.selectedIndex].value  ,'queues');
	}else
	{
	alert ('".voicelog_lang::getLocalizedString("Please.Select.A.Campaign")."')
	document.getElementById('queues').innerHTML='' ;
	document.getElementById('cagentqueue').checked  = false;
	}
	\">".voicelog_lang::getLocalizedString("Queue")."</td>
	<td><div id=queues></div>&nbsp</td></tr>

	<tr class=tbl_back_even>
	<td><input name=cagent id=cagent type=checkbox onClick=\"

	if (document.getElementById('campaign'))
	{
	try
	{
	var tmp = campaign.options[campaign.selectedIndex].value         ;
	}catch (e)
	{
	alert ('".voicelog_lang::getLocalizedString("Sorry.No.Campaign.Selected")."')
	document.getElementById('agents').innerHTML='' ;
	document.getElementById('cagent').checked  = false;
	}



	checkChecked('cagent','agents') &&  fetchPrint('temp3','list?show=agents&campaigns=' + campaign.options[campaign.selectedIndex].value  ,'agents');
	}else
	{
	alert ('".voicelog_lang::getLocalizedString("Please.Select.A.Campaign.First")."')
	document.getElementById('agents').innerHTML='' ;
	document.getElementById('cagent').checked  = false;
	}
	\">".voicelog_lang::getLocalizedString("Users")."</td>
	<td><div id=agents></div>&nbsp</td></tr><tr class=tbl_back_odd><td>
	<input name=ctime id=ctime type=checkbox onClick=\"checkChecked('ctime','time') && fetchPrint('temp4','list?show=timewindow','time');\">".voicelog_lang::getLocalizedString("Date/Time.Range")."</td>
	<td> <div id=time> </div>&nbsp</td></tr>
	<tr class=tbl_back_even><td><input id=cphone name=cphone type=checkbox onClick=\"checkChecked('cphone','dphone') && fetchPrint('temp5','list?show=inbox&id=phone','dphone');\">".voicelog_lang::getLocalizedString("Phone.Number")."</td>
	<td valign=center> <div id=dphone> </div>&nbsp</td></tr>

	<tr class=tbl_back_odd><td><input id=cvlogfname  name=cvlogfname type=checkbox onClick=\" checkChecked('cvlogfname','dvlogfname') && fetchPrint('temp5','list?show=inbox&id=vlogfname','dvlogfname');\">".voicelog_lang::getLocalizedString("Filename")."</td>
	<td valign=center> <div id=dvlogfname> </div>&nbsp</td></tr>

	<tr class=tbl_back_even><td><input id=ccallid name=ccallid type=checkbox onClick=\"checkChecked('ccallid','dcallid') &&  fetchPrint('callid','list?show=inbox&id=callid','dcallid');\">".voicelog_lang::getLocalizedString("Call.Id")."</td>
	<td valign=center> <div id=dcallid valign=center> </div>&nbsp</td></tr>

	<tr class=tbl_back_odd><td><input id=ccomment name=ccomment type=checkbox onClick=\" checkChecked('ccomment','dcomment') && fetchPrint('comment','list?show=inbox&id=comment','dcomment');\">".voicelog_lang::getLocalizedString("Comments")."</td>
	<td valign=center> <div id=dcomment valign=center> </div>&nbsp</td></tr>

	<tr class=tbl_back_even><td><input name=crating id=crating type=checkbox onClick=\"checkChecked('crating','drating') &&  fetchPrint('rating','list?show=rating&id=rating','drating');\">".voicelog_lang::getLocalizedString("Rating")."
	<td> <div id=drating valign=center> </div>&nbsp</td></tr>

	<tr class=tbl_back_odd>	<td><input id=ccalltime name=ccalltime type=checkbox onClick=\"checkChecked('ccalltime','dcalltime') &&  fetchPrint('temp6','list?show=inbox&id=calltime','dcalltime');\">".voicelog_lang::getLocalizedString("Duration.Of.Call.Greater.Than.(in seconds)")."</td><td> <div id=dcalltime> </div>&nbsp</td></tr>
	<tr class=tbl_back_even><td><input id=ccalltime1 name=ccalltime1 type=checkbox onClick=\"checkChecked('ccalltime1','dcalltime1') &&  fetchPrint('temp7','list?show=inbox&id=calltime1','dcalltime1');\">".voicelog_lang::getLocalizedString("Duration.Of.Call.Less.Than.(in seconds)")."</td><td> <div id=dcalltime1> </div>&nbsp</td></tr>
	<tr class=tbl_back_odd><td align=center ><input name=list_proceed type=submit value='".voicelog_lang::getLocalizedString("List")."'> </td>
	<td align=center> <input  name=list_proceed type=submit value='".voicelog_lang::getLocalizedString("Proceed ->")."'> </td></tr></table> </form>";
	}

	public function executeComment()
	{
		require_once('myclass.php');
		# define global values
		$mydacx=new dacx();
		$DACXDB_IP = $mydacx->showDbValues('host') ;
		$PORT=$mydacx->showDbValues('port') ;
		$DBNAME=$mydacx->showDbValues('database') ;
		$USER=$mydacx->showDbValues('user') ;
		$PASSWORD="postgres";


		$filename=$this->getRequestParameter('filename');
		$asterisk_ip=$this->getRequestParameter('asterisk_ip');
		$callhistoryid = $this->getRequestParameter('callhistoryid');
		$rating=$this->getRequestParameter('rating');
		$comment=$this->getRequestParameter('comment');
		$dbconn = pg_connect("host=$DACXDB_IP user=$USER password=$PASSWORD dbname=$DBNAME");
		if($this->getRequestParameter('submit_comment')=="EDIT") {
			$query = "UPDATE voicelog_comment SET rating='$rating',comment='$comment' WHERE call_id='$callhistoryid'";
		}
		else {
			$query = "INSERT INTO voicelog_comment (call_id,rating,comment) VALUES ('$callhistoryid','$rating','$comment')";
		}
		$result=pg_query($dbconn,$query);
		if($result){
			echo '<script language="javascript">history.go(-1);</script>';
		}
		$this->setLayout(false);
		$this->setTemplate('list');

	}

	/*
	public function executeQMPlay()
	{
		$ingain=1;
		$outgain=1;
		if ($_SERVER['SERVER_ADDR']<>"127.0.0.1")
		{
		$vlCache=fopen('/dacx/ameyo/acp/cache/system/prod/config/voicelog_cache.php','w');
		fprintf($vlCache,'<?php'."\n") ;
		fprintf($vlCache,"\$ingain=$ingain;\n") ;
		fprintf($vlCache,"\$outgain=$outgain;\n") ;
		fprintf($vlCache,'?' .'>'."\n") ;
		fclose($vlCache);
		$FP=fopen ( "$asteriskip/dacx/fileoperation?fileoperation=get&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver=/$filepathnowav&ingain=1&outgain=1",'r')  ;

		$build_filepath = "/".$filepathnowav;
		if($FP) {
			//**********echo "<br />it opened!";
			
			$dirs = explode(DIRECTORY_SEPARATOR , $build_filepath);
			$count = count($dirs);
			$path = 'vl/';
			for ($i = 0; $i < $count - 1 ; ++$i) {
				echo '</br>'.$_SERVER['USER'] . ' ' .$dirs[$i];
				$path .= DIRECTORY_SEPARATOR . $dirs[$i];
				$res = mkdir($path, 0777) ;
			}
			$FP1=fopen ('vl/' . $build_filepath . '.wav' ,'w')  ;
			if ($FP1 == null)
			{
			}
			while (!feof($FP))
			{
				$line=fread($FP,4096) ;
				fwrite($FP1,$line) ;
			}
			fclose($FP) ;
		
			
		}
		echo 'this function called';
	}
	*/
	

	public function executePlay()
	{
		//require_once('myclass.php');
		//require_once('lang/voicelog_lang.php');
		$this->setLayout(false);
		$this->setTemplate('list');

		# define global values
		//!!$mydacx=new dacx();
		//!!$DACXDB_IP = $mydacx->showDbValues('host') ;
		//!!$PORT=$mydacx->showDbValues('port') ;
		//!!$DBNAME=$mydacx->showDbValues('database') ;
		//!!$USER=$mydacx->showDbValues('user') ;
		//!!$PASSWORD="postgres";
		//!!$dbconn = pg_connect("host=$DACXDB_IP user=$USER password=$PASSWORD dbname=$DBNAME");


		//$filepath=trim($this->getRequestParameter('filepath')) ;
		//$filename=$this->getRequestParameter('filename');
		//$asteriskip=$this->getRequestParameter('asteriskip');

		if (isset($_REQUEST["filepath"]))
		 {
		   $filepath = 	$_REQUEST["filepath"];
		 }
		if (isset($_REQUEST["filename"]))
		 {
		   $filename = 	$_REQUEST["filename"];
		   //$filepathnowav = str_replace(".wav","",$filepath);
		 }
		if (isset($_REQUEST["asteriskip"]))
		 {
		   $asteriskip = 	$_REQUEST["asteriskip"];
		 }
  		

		$ingain=1;
		$outgain=1;
		/*
		if ($this->getRequestParameter('ingain') != '' )
		{
			sfContext::getInstance()->getLogger()->log("ingain found as " . $this->getRequestParameter('ingain') , $priority = 1) ;
			$ingain=$this->getRequestParameter('ingain');
		}
		if ($this->getRequestParameter('outgain') != '' )
		{
			sfContext::getInstance()->getLogger()->log("outgain found  as " . $this->getRequestParameter('outgain') , $priority = 1) ;
			$outgain=$this->getRequestParameter('outgain');

		}			$loop=0;
		*/


		//!!sfContext::getInstance()->getLogger()->log("writing cache as ".SF_ROOT_DIR.DIRECTORY_SEPARATOR.'cache/system/prod/config/voicelog_cache.php' , $priority = 1) ;
		//!!$vlCache=fopen(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'cache/system/prod/config/voicelog_cache.php','w');
		/*
		$vlCache=fopen('/dacx/ameyo/acp/cache/system/prod/config/voicelog_cache.php','w');
		
		fprintf($vlCache,'<?php'."\n") ;
		fprintf($vlCache,"\$ingain=$ingain;\n") ;
		fprintf($vlCache,"\$outgain=$outgain;\n") ;
		fprintf($vlCache,'?' .'>'."\n") ;
		fclose($vlCache);
		
		http://208.80.180.209:8008/dacx/fileoperation?fileoperation=get&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver=/dacx/var/ameyo/dacxdata/voicelogs/2014-08-11/EBDCarandang/5202698633_EBDCarandang_2014-08-11-17-53-18&ingain=1&outgain=1
		*/
		$FP=fopen ( "http://$asteriskip:8008/dacx/fileoperation?fileoperation=get&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver=$filepath&ingain=$ingain&outgain=$outgain",'r')  ;
		//echo 'fopen value ' .$FP;
		
		//$ses=$this->get_session_id($data1);
		//echo "Using session $ses \n";
		//Print_r ($_SESSION);
		/*
		$user_session=    $this->getUser();
		$user_session->setAuthenticated(true);
		$user_session->setAttribute('userid',$user[0]->getId());
		*/
		//$user_session->setAuthenticated(true);
		$_SESSION['symfony/user/sfUser/authenticated'] = 1;
		//$session = $this->getRequest()->getSession();
		//echo $session;
		//echo $user->isAuthenticated();
		//echo $_SESSION['symfony/user/sfUser/authenticated'];
		
		//echo $_SERVER['PHP_SELF']; /web/system.php/voicelogs/play
		
		if($FP) {
			$dirs = explode(DIRECTORY_SEPARATOR , $filepath);
			$count = count($dirs);
			$path = 'vl/';
			for ($i = 0; $i < $count - 1 ; ++$i) {
				//echo '</br>'.$_SERVER['USER'] . ' ' .$dirs[$i];
				$path .= DIRECTORY_SEPARATOR . $dirs[$i];
				mkdir($path, 0777) ;
				//$res = mkdir($path, 0777) ;
				/*
				if ($res == 1) {
				    echo "<br /><br /><font color=green>" . "" . "</font>created";
				} else {
				    echo "<br /><br /><font color=red>" . "" . "</font>failed";
				}
				*/
				
			}
			//echo $path;


			$FP1=fopen ('vl/' . $filepath . '.wav' ,'w')  ;
			if ($FP1 == null)
			{
				//!!throw new Exception(voicelog_lang::getLocalizedString("Test")) ;
			//echo 'wav not exists';
			}

			//echo '<br /><br />vl/' . $filepath . '.wav';
                        //echo '<br /><br />'.SF_ROOT_DIR.DIRECTORY_SEPARATOR.'cache/system/prod/config/voicelog_cache.php';			
			
			while (!feof($FP))
			{
				$line=fread($FP,4096) ;
				fwrite($FP1,$line) ;
			}
			fclose($FP) ;
		}
		echo "<audio src='/web/vl/$filepath.wav' controls autoplay>";
		echo "<EMBED SRC='/web/vl/$filepath.wav' autostart='true' loop='false' volume='100' ></EMBED>";
		echo "</audio>";

	}

	public function executeList()
	{
		require_once('myclass.php');
		require_once('lang/voicelog_lang.php');
		# define global values
		$mydacx=new dacx();
		$DACXDB_IP = $mydacx->showDbValues('host') ;
		$PORT=$mydacx->showDbValues('port') ;
		$DBNAME=$mydacx->showDbValues('database') ;
		$USER=$mydacx->showDbValues('user') ;
		$PASSWORD="postgres";
		$dbconn = pg_connect("host=$DACXDB_IP user=$USER password=$PASSWORD dbname=$DBNAME");


		if ($this->getRequestParameter('show'))
		{
			if($this->getRequestParameter('show')=='voicelog_comment')
			{
				$but="ADD";
				$callhistoryid = $this->getRequestParameter('callhistoryid');
				$query1 = "SELECT * FROM voicelog_comment WHERE call_id='$callhistoryid'";
				$res=pg_query($dbconn,$query1);
				if(isset($res)) {
					$row=pg_fetch_array($res);
					if($row['call_id']!='') {
						$but="EDIT";
						$rating=$row['rating'];
						$comment=$row['comment'];
					}

				}



				$filename = $this->getRequestParameter('filename');
				$asterisk_ip=$this->getRequestParameter('asterisk_ip');




				$this->data='</form><form name="form1" method="post" action="comment">
				<table class="border" width="300"  cellpadding="10" cellspacing="5" border="0">
				<tr>
				<td>'.voicelog_lang::getLocalizedString("Rating:").'</td>
				<td>
				<select name=rating>';
				foreach($this->ratingarr as $val) {
					($rating==$val)?$select='selected':$select='';
					$this->data.='<option value="'.$val.'" '.$select.' >'.$val.'</option>';
				}
				$this->data.='</select>
				</td>
				</tr>
				<tr>
				<td>'.voicelog_lang::getLocalizedString("Comment:").'</td>
				<td><textarea name=comment rows=5 cols=30>'.$comment.'</textarea></td>
				</tr>
				<tr>
				<td colspan="2" align="center">
				<input type="hidden" name="call_id" value="'.$callhistoryid.'">
				<input type="submit" name="submit_comment" value="'.$but.'">
				</td>
				</tr>
				</table>
				<input type="hidden" name="callhistoryid" value="'.$callhistoryid.'">
				<input type="hidden" name="filename" value="'.$filename.'">
				<input type="hidden" name="asterisk_ip" value="'.$asterisk_ip.'">
				</form>';
			}
			elseif($this->getRequestParameter('show')=='upload')
			{

				$this->data="<input type=file id=source name=source value='".voicelog_lang::getLocalizedString("Browse")."'> <input type=submit name=myaction value='Upload' onclick='fade()'>  	</form> ";
			}elseif($this->getRequestParameter('show')=='campaigns')
			{


				$c=new Criteria();

				if($this->getRequestParameter('cc'))
				{
					$crit=$c->getNewCriterion(CampaignContextPeer::CONTACT_CENTER_ID,$this->getRequestParameter('cc'));
					$c->add($crit);
				}
				if($this->getRequestParameter('process'))
				{
					$crit=$c->getNewCriterion(CampaignContextPeer::PROCESS_ID,$this->getRequestParameter('process'));
					$c->add($crit);
				}








				//    Code for user id based campaign selection
				// ****************************************************
				global $mrUser ;
				$uid=$mrUser->getUserName() ;
				// Check if the user is_root
				$criIsRoot = new Criteria();
				$criSubIsRoot = $criIsRoot->getNewCriterion(ContactCenterUserPeer::USER_ID,$uid);
				$criIsRoot->add($criSubIsRoot);
				$isRootRecordSet = ContactCenterUserPeer::doSelect($criIsRoot);
				if (count($isRootRecordSet) > 0) {
					$isRoot = $isRootRecordSet[0]->getIsRoot();
				} else {
					echo "$uid ".voicelog_lang::getLocalizedString("is.not.a.contact.center.user")." ";
				}

				// if is_root then find out the contact centers
				if (!$isRoot) {

					$c1 = new Criteria() ;
					$crit=$c1->getNewCriterion(CampaignContextUserPeer::USER_ID,$uid);
					$c1->add($crit);
					$CIDObj=CampaignContextUserPeer::doSelect($c1) ;
					$cids=array() ;
					foreach($CIDObj  as $cidobj)
					{
						array_push($cids,$cidobj->getCampaignContextId()) ;
					}


					$crit=$c->getNewCriterion(CampaignContextPeer::ID,$cids,Criteria::IN);
					$c->add($crit);
				} else {
				}

				// ********************************************************



				//					$c->add($crit);

				$hostObj=CampaignContextPeer::doSelect($c) ;
				$count=0;
				$count=count($hostObj);

				if ($count < 4 ) {
					$count1=$count;
				} else { $count1=4;
				}

				if ($count == 0  )
				{
					$this->data .= voicelog_lang::getLocalizedString("No.Campaigns.Available");
					return 0 ;
				}




				if ($count < 4 ) {
					$count1=$count;
				} else { $count1=4;
				}
				$this->data=" <select style='width:100%'multiple=multiple size=$count1  name='campaign[]' id='campaign'> " ;
				for($i=0;$i<=$count-1;$i++)
				{
					$tmp=$hostObj[$i]->getId();
					$tmp2=$hostObj[$i]->getName();
					$this->data=$this->data . '<option value="'.$tmp . '">'."$tmp2" . '</option>' ;
				}

				$this->data=$this->data. "</select> ";

			}elseif($this->getRequestParameter('show')=='process')
			{

				$cc=$this->getRequestParameter('cc');
				if ($cc  == '')
				{
					$this->data=voicelog_lang::getLocalizedString("No.Contact.Center.Selected");

				}else
				{

					$this->data="<select name='process' id='process'>

					" ;
					$c=new Criteria();
					$crit=$c->getNewCriterion(ProcessPeer::CONTACT_CENTER_ID,$cc);
					$c->add($crit);
					$hostObj=ProcessPeer::doSelect($c) ;
					$count=count($hostObj);
					for($i=0;$i<=$count-1;$i++)
					{
						$tmp=$hostObj[$i]->getId();
						$tmp2=$hostObj[$i]->getName();
						$this->data=$this->data . '<option value="'.$tmp . '">'."$tmp2" . '</option>' ;
					}
					$this->data=$this->data. "</select> ";
				}

			} elseif( $this->getRequestParameter('show')=='contactcenters')
			{

				$this->data="<select name='cc' id='cc'>
				" ;
				$hostObj=ContactCenterPeer::doSelect(new Criteria()) ;
				$count=count($hostObj);

				for($i=0;$i<=$count-1;$i++)
				{
					$tmp=$hostObj[$i]->getId();
					$tmp2=$hostObj[$i]->getName();
					$this->data=$this->data . '<option value="'.$tmp . '">'."$tmp2" . '</option>' ;
				}

				$this->data=$this->data. "</select> ";

			}
			elseif( $this->getRequestParameter('show')=='queues')
			{
				$cc=$this->getRequestParameter('process');
				$campid=$this->getRequestParameter('campaigns');
				if ($campid)
				{
					$connection=Propel::getConnection() ;
					$statement=$connection->prepare("SELECT id as agent_queue_id, name as agent_queue_name from agent_queue where campaign_context_id in ($campid) order by name");
					$statement->execute();
					$count=0;

					while($fieldarray=$statement->fetch())
					{
						$count++;
						$agent_queue_id=$fieldarray[0] ;
						$agent_queue_name=$fieldarray[1] ;
						$this->data1 .= '<option value=' ."'$agent_queue_id'". '>'."$agent_queue_name" . '</option>' ;
					}
					if ($count < 4 ) {
						$count1=$count;
					} else { $count1=4;
					}

					if ($count != 0 )
					{
						$this->data="<select style='width:100%' multiple=multiple  size=$count1 name='queuesArray[]' id='queuesArray'> " ;
						$this->data .= $this->data1  ;
						$this->data=$this->data. "</select> ";
					}else
					{
						$this->data .= voicelog_lang::getLocalizedString("No.Queues.Available");
					}


				}else
				{
					$this->data .= voicelog_lang::getLocalizedString("No.Campaign.Selected");
				}


			}
			elseif( $this->getRequestParameter('show')=='agents')
			{
				$cc=$this->getRequestParameter('process');
				$campid=$this->getRequestParameter('campaigns');
				if ($campid)
				{
					$connection=Propel::getConnection() ;
					$statement=$connection->prepare("SELECT user_id from campaign_context_user where campaign_context_id in ($campid) ;");
					$statement->execute();
					$count=0;

					while($fieldarray=$statement->fetch())
					{
						$count++;
						$tmp=$fieldarray[0] ;
						$this->data1 .= '<option value=' ."'$tmp'". '>'."$tmp" . '</option>' ;
					}
					if ($count < 4 ) {
						$count1=$count;
					} else { $count1=4;
					}

					if ($count != 0 )
					{
						$this->data="<select style='width:100%' multiple=multiple  size=$count1 name='agentss[]' id='agentss'> " ;
						$this->data .= $this->data1  ;
						$this->data=$this->data. "</select> ";
					}else
					{
						$this->data .= voicelog_lang::getLocalizedString("No.Agents.Available");
					}


				}else
				{
					$this->data .= voicelog_lang::getLocalizedString("No.Campaign.Selected");
				}


			}
			elseif( $this->getRequestParameter('show')=='disp')
			{

				$connection=Propel::getConnection() ;
				$statement=$connection->prepare("SELECT DISTINCT dc.disposition_code_name from disposition_code dc, disposition_plan_definition dpd where dc.id=dpd.disposition_code_id and dpd.disposition_plan_id in (select disposition_plan_id from campaign_disposition_plan) order by dc.disposition_code_name");
				$statement->execute();
				$count=0;
				while($fieldarray=$statement->fetch())
				{
					$count++;
					$tmp=$fieldarray[0] ;
					$this->data1 .= '<option value=' ."'$tmp'". '>'."$tmp" . '</option>' ;

				}
				if ($count < 4 ) {
					$count1=$count;
				} else { $count1=4;
				}
				$this->data="<select style='width:100%' multiple=multiple size=$count1 name='disps[]' id='disps'>" ;
				$this->data .= $this->data1  ;
				$this->data=$this->data. "</select> ";
			}
			elseif( $this->getRequestParameter('show')=='sdisp')
			{


				$this->data="<select style='width:100%' multiple=multiple  size=4 name='sdisps[]' id='sdisps'>" ;
				$this->data=$this->data . '<option value="ATTEMPT_FAILED">'.voicelog_lang::getLocalizedString("ATTEMPT_FAILED").'</option>' ;
				$this->data=$this->data . '<option value="BUSY">'.voicelog_lang::getLocalizedString("BUSY").'</option>' ;
				$this->data=$this->data . '<option value="CALL_DROP">'.voicelog_lang::getLocalizedString("CALL_DROP").'</option>' ;
				$this->data=$this->data . '<option value="CALL_HANGUP">'.voicelog_lang::getLocalizedString("CALL_HANGUP").'</option>' ;
				$this->data=$this->data . '<option value="CONNECTED">'.voicelog_lang::getLocalizedString("CONNECTED").'</option>' ;
				$this->data=$this->data . '<option value="FAILED">'.voicelog_lang::getLocalizedString("FAILED").'</option>' ;
				$this->data=$this->data . '<option value="NO_ANSWER">'.voicelog_lang::getLocalizedString("NO_ANSWER").'</option>' ;
				$this->data=$this->data . '<option value="NOT_TRIED">'.voicelog_lang::getLocalizedString("NOT_TRIED").'</option>' ;
				$this->data=$this->data . '<option value="NUMBER_FAILURE">'.voicelog_lang::getLocalizedString("NUMBER_FAILURE").'</option>' ;
				$this->data=$this->data . '<option value="PROVIDER_FAILURE">'.voicelog_lang::getLocalizedString("PROVIDER_FAILURE").'</option>' ;
				$this->data=$this->data . '<option value="PROVIDER_TEMP_FAILURE">'.voicelog_lang::getLocalizedString("PROVIDER_TEMP_FAILURE").'</option>' ;
				$this->data=$this->data. "</select> ";
			}
			elseif( $this->getRequestParameter('show')=='timewindow')
			{
				$this->name1 = array() ;
				$this->name1[0]="Start" ;
				$this->name1[1]="End" ;
				$this->setTemplate('time');

			} elseif( $this->getRequestParameter('show')=='inbox')
			{
				if  ($this->getRequestParameter('id'))
				{
					$fname= $this->getRequestParameter('id') ;
					if ($fname == 'calltime' || $fname == 'calltime1')
					{
						echo '
						<input name='. "'$fname'". '     id='. "'$fname'". '   type=text onBlur="
						if(! IsNumeric(document.getElementById(' ."'$fname'".').value))
						{
						alert("'.voicelog_lang::getLocalizedString("Only.Integer.Value.Allowed").'") ;
						document.getElementById(' ."'$fname'".').value = '."''".';
					}


					">

					' ;

					}else
					{
						echo "<input name='$fname' id=$fname type=text>" ;
					}
				} else
				{
					echo "<input name='temp' type=text>" ;

				}





			} elseif( $this->getRequestParameter('show')=='rating')
			{
				echo "<select name=rating id=rating>";
				foreach($this->ratingarr as $val) {

					echo '<option value="'.$val.'" '.$select.' >'.$val.'</option>';
				}

				echo "</select>" ;

			}

			else
			{
				$this->data="showing ". $this->getRequestParameter('show') ;
			}
		}else
		{
			$this->data=voicelog_lang::getLocalizedString("Nothing.To.Display");
		}
	}
	public function executeShowlogs()
	{
		$this->showdebugdata=0;
		echo '<script src="/web/js/print_lib.js" type="text/javascript"></script>';

		require_once('myclass.php');
		require_once('lang/voicelog_lang.php');
		myUsers::show_theme('Voicelogs',0,myUser::getUserName($this->getUser()->getAttribute('userid')),$this->getUser()->getAttribute('id') ) ;
		$this->data='<h1>'.voicelog_lang::getLocalizedString("Voicelogs.Download").'</h1>' ;
		$nowpage=$this->getRequestParameter('page') ;
		if (!$nowpage)
		{
			$nowpage=1;
			$this->getUser()->getAttributeHolder()->remove('ccc');
			$this->getUser()->getAttributeHolder()->remove('cc');
			$this->getUser()->getAttributeHolder()->remove('cprocess');
			$this->getUser()->getAttributeHolder()->remove('process');
			$this->getUser()->getAttributeHolder()->remove('ccamp');
			$this->getUser()->getAttributeHolder()->remove('campaign');
			$this->getUser()->getAttributeHolder()->remove('cagent');
			$this->getUser()->getAttributeHolder()->remove('queuesArray');
			$this->getUser()->getAttributeHolder()->remove('agentss');
			$this->getUser()->getAttributeHolder()->remove('ctime');
			$this->getUser()->getAttributeHolder()->remove('Start');
			$this->getUser()->getAttributeHolder()->remove('End');
			$this->getUser()->getAttributeHolder()->remove('h_Start');
			$this->getUser()->getAttributeHolder()->remove('h_End');
			$this->getUser()->getAttributeHolder()->remove('m_Start');
			$this->getUser()->getAttributeHolder()->remove('m_End');
			$this->getUser()->getAttributeHolder()->remove('cphone');
			$this->getUser()->getAttributeHolder()->remove('phone');
			$this->getUser()->getAttributeHolder()->remove('cvlogfname');
			$this->getUser()->getAttributeHolder()->remove('vlogfname');
			$this->getUser()->getAttributeHolder()->remove('ccalltime');
			$this->getUser()->getAttributeHolder()->remove('calltime');
			$this->getUser()->getAttributeHolder()->remove('ccalltime1');
			$this->getUser()->getAttributeHolder()->remove('calltime1');
			$this->getUser()->getAttributeHolder()->remove('cdisp');
			$this->getUser()->getAttributeHolder()->remove('disp');
			$this->getUser()->getAttributeHolder()->remove('csdisp');
			$this->getUser()->getAttributeHolder()->remove('sdisps');
			$this->getUser()->getAttributeHolder()->remove('ccallid');
			$this->getUser()->getAttributeHolder()->remove('callid');
			$this->getUser()->getAttributeHolder()->remove('ccomment');
			$this->getUser()->getAttributeHolder()->remove('crating');

		}
		$c=new Criteria();
		$crit=$c->getNewCriterion(CallHistoryPeer::RECORDING_FILE_URL,'',Criteria::NOT_EQUAL);
		$c->add($crit);
		if (($this->getRequestParameter('ccc') == 'on') && (  $this->getRequestParameter('cc') ) )
		{
			$this->getUser()->setAttribute('ccc',$this->getRequestParameter('ccc'));
			$this->getUser()->setAttribute('cc',$this->getRequestParameter('cc'));

		}
		if (($this->getRequestParameter('cprocess') == 'on') && (  $this->getRequestParameter('process') ))
		{
			$this->getUser()->setAttribute('cprocess',$this->getRequestParameter('cprocess'));
			$this->getUser()->setAttribute('process',$this->getRequestParameter('process'));
		}


		if (($this->getRequestParameter('ccamp') == 'on') && (  $this->getRequestParameter('campaign') ))
		{
			$this->getUser()->setAttribute('ccamp',$this->getRequestParameter('ccamp'));
			$this->getUser()->setAttribute('campaign',$this->getRequestParameter('campaign'));
		}
		if (($this->getRequestParameter('cdisp') == 'on') && (  $this->getRequestParameter('disps') ) )
		{
			$this->getUser()->setAttribute('cdisp',$this->getRequestParameter('cdisp'));
			$this->getUser()->setAttribute('disps',$this->getRequestParameter('disps'));

		}

		if (($this->getRequestParameter('csdisp') == 'on') && (  $this->getRequestParameter('sdisps') ) )
		{
			$this->getUser()->setAttribute('csdisp',$this->getRequestParameter('csdisp'));
			$this->getUser()->setAttribute('sdisps',$this->getRequestParameter('sdisps'));

		}

		if (($this->getRequestParameter('cagentqueue') == 'on')&& ($this->getRequestParameter('queuesArray') ))
		{
			$this->getUser()->setAttribute('cagentqueue',$this->getRequestParameter('cagentqueue'));
			$this->getUser()->setAttribute('queuesArray',$this->getRequestParameter('queuesArray'));
		}

		if (($this->getRequestParameter('cagent') == 'on')&& ($this->getRequestParameter('agentss') ))
		{
			$this->getUser()->setAttribute('cagent',$this->getRequestParameter('cagent'));
			$this->getUser()->setAttribute('agentss',$this->getRequestParameter('agentss'));
		}

		if (($this->getRequestParameter('ctime') == 'on') && (	 $this->getRequestParameter('Start') ) && (   $this->getRequestParameter('End') ) )
		{

			$stime= $this->getRequestParameter('Start') . ' ' . $this->getRequestParameter('h_Start') . ':'.sprintf('%02d',$this->getRequestParameter('m_Start')).':00' ;
			$etime= $this->getRequestParameter('End')  . ' ' . $this->getRequestParameter('h_End') . ':'.sprintf('%02d',$this->getRequestParameter('m_End')).':00' ;
			$this->getUser()->setAttribute('ctime',$this->getRequestParameter('ctime'));
			$this->getUser()->setAttribute('Start',$this->getRequestParameter('Start'));
			$this->getUser()->setAttribute('End',$this->getRequestParameter('End'));
			$this->getUser()->setAttribute('h_Start',$this->getRequestParameter('h_Start'));
			$this->getUser()->setAttribute('h_End',$this->getRequestParameter('h_End'));
			$this->getUser()->setAttribute('m_Start',$this->getRequestParameter('m_Start'));
			$this->getUser()->setAttribute('m_End',$this->getRequestParameter('m_End'));

		}
		if (($this->getRequestParameter('cphone') == 'on')	&& ( $this->getRequestParameter('phone')))
		{
			$this->getUser()->setAttribute('cphone',$this->getRequestParameter('cphone'));
			$this->getUser()->setAttribute('phone',$this->getRequestParameter('phone'));
		}
		if (($this->getRequestParameter('cvlogfname') == 'on')      && ( $this->getRequestParameter('vlogfname')))
		{
			$this->getUser()->setAttribute('cvlogfname',$this->getRequestParameter('cvlogfname'));
			$this->getUser()->setAttribute('vlogfname',$this->getRequestParameter('vlogfname'));
		}

		if (($this->getRequestParameter('ccallid') == 'on')	&& ( $this->getRequestParameter('callid')))
		{
			$this->getUser()->setAttribute('ccallid',$this->getRequestParameter('ccallid'));
			$this->getUser()->setAttribute('callid',$this->getRequestParameter('callid'));
		}

		if (($this->getRequestParameter('ccomment') == 'on')     && ( $this->getRequestParameter('comment')))
		{
			$this->getUser()->setAttribute('ccomment',$this->getRequestParameter('ccomment'));
			$this->getUser()->setAttribute('comment',$this->getRequestParameter('comment'));
		}

		if (($this->getRequestParameter('crating') == 'on')     && ( $this->getRequestParameter('rating')))
		{
			$this->getUser()->setAttribute('crating',$this->getRequestParameter('crating'));
			$this->getUser()->setAttribute('rating',$this->getRequestParameter('rating'));
		}


		if (($this->getRequestParameter('ccalltime') == 'on')	&& ( $this->getRequestParameter('calltime') ))
		{
			$this->getUser()->setAttribute('ccalltime',$this->getRequestParameter('ccalltime'));
			$this->getUser()->setAttribute('calltime',$this->getRequestParameter('calltime'));
		}
		if (($this->getRequestParameter('ccalltime1') == 'on')   && ( $this->getRequestParameter('calltime1') ))
		{
			$this->getUser()->setAttribute('ccalltime1',$this->getRequestParameter('ccalltime1'));
			$this->getUser()->setAttribute('calltime1',$this->getRequestParameter('calltime1'));
		}
		#		print $this->getRequestParameter('ccalltime');
		#		print $this->getRequestParameter('ccalltime1');


		// finding some information from session

		if (($this->getUser()->getAttribute('ccc') == 'on') && (  $this->getUser()->getAttribute('cc') ) )
		{

			$crit=$c->getNewCriterion(CallHistoryPeer::CONTACT_CENTER_ID, $this->getUser()->getAttribute('cc'));
			$c->add($crit);

			$this->debugdata= $this->debugdata . 'Selecting CC as ' . $this->getUser()->getAttribute('cc') . '<br>';
		}


		if (($this->getUser()->getAttribute('cprocess') == 'on') && (  $this->getUser()->getAttribute('process') ))
		{
			$crit=$c->getNewCriterion(CallHistoryPeer::PROCESS_ID, $this->getUser()->getAttribute('process'));
			$c->add($crit);
			$this->debugdata= $this->debugdata . 'Selecting Process as  ' . $this->getUser()->getAttribute('process') . '<br>'  ;
		}

		if (($this->getUser()->getAttribute('csdisp') == 'on') && (  $this->getUser()->getAttribute('sdisps') ))
		{
			foreach ( $this->getUser()->getAttribute('sdisps') as $parm)
			{
				$this->debugdata= $this->debugdata . 'Selecting System Disposition as  ' . $parm . '<br>'  ;
			}
			$crit=$c->getNewCriterion(CallHistoryPeer::SYSTEM_DISPOSITION, $this->getUser()->getAttribute('sdisps'),Criteria::IN);
			$c->add($crit);

		}

		if (($this->getUser()->getAttribute('ccamp') == 'on') && (  $this->getUser()->getAttribute('campaign') ))
		{
			foreach ( $this->getUser()->getAttribute('campaign') as $parm)
			{
				$this->debugdata= $this->debugdata . 'Selecting Campaign as ' . $parm . '<br>' ;
			}

			$crit=$c->getNewCriterion(CallHistoryPeer::CAMPAIGN_ID, $this->getUser()->getAttribute('campaign') ,Criteria::IN);
			$c->add($crit);


		}

		//Ranjan
		else {
			//    Code for user id based campaign selection
			// ****************************************************
			global $mrUser ;
			$uid=$mrUser->getUserName() ;
			// Check if the user is_root
			$criIsRoot = new Criteria();
			$criSubIsRoot = $criIsRoot->getNewCriterion(ContactCenterUserPeer::USER_ID,$uid);
			$criIsRoot->add($criSubIsRoot);
			$isRootRecordSet = ContactCenterUserPeer::doSelect($criIsRoot);
			if (count($isRootRecordSet) > 0) {
				$isRoot = $isRootRecordSet[0]->getIsRoot();
			} else {
				echo "$uid".voicelog_lang::getLocalizedString("is.not.a.contact.center.user");
			}

			if (!$isRoot) {
				$c1 = new Criteria() ;
				$crit=$c1->getNewCriterion(CampaignContextUserPeer::USER_ID,$uid);
				$c1->add($crit);
				$CIDObj=CampaignContextUserPeer::doSelect($c1) ;
				$cids=array() ;
				foreach($CIDObj  as $cidobj)
				{
					array_push($cids,$cidobj->getCampaignContextId()) ;
				}

				$crit=$c->getNewCriterion(CallHistoryPeer::CAMPAIGN_ID,$cids,Criteria::IN);
				$c->add($crit);
			} else {

			}

			// ********************************************************


		}
		/*************************/



		if (($this->getUser()->getAttribute('cdisp') == 'on') && (  $this->getUser()->getAttribute('disps') ))
		{

			foreach ( $this->getUser()->getAttribute('disps') as $parm)
			{
				$this->debugdata= $this->debugdata . 'Selecting Disposition as ' . $parm  . '<br>' ;
			}
			$c->addJoin(CallHistoryPeer::CALL_ID,UserDispositionHistoryPeer::CALL_ID) ;
			$c->add(UserDispositionHistoryPeer::DISPOSITION_CODE,$this->getUser()->getAttribute('disps') ,Criteria::IN) ;

		}

		if (($this->getUser()->getAttribute('cagentqueue') == 'on')&& ($this->getUser()->getAttribute('queuesArray') ))
		{
			foreach ( $this->getUser()->getAttribute('queuesArray') as $parm)
			{
				$this->debugdata= $this->debugdata . 'Selecting Queues as ' . $parm . '<br>' ;
			}

			$crit=$c->addJoin(CallHistoryPeer::CRT_OBJECT_ID,VoiceCampaignAqRequestHistoryPeer::CRT_OBJECT_ID) ;

		}
		if (($this->getUser()->getAttribute('cagentqueue') == 'on')&& ($this->getUser()->getAttribute('queuesArray') ))
		{
			foreach ( $this->getUser()->getAttribute('queuesArray') as $parm)
			{
				$this->debugdata= $this->debugdata . 'Selecting Queues as ' . $parm . '<br>' ;
			}

			$crit=$c->addJoin(AgentQueueRequestHistoryPeer::REQUEST_ID,VoiceCampaignAqRequestHistoryPeer::REQUEST_ID) ;
			$c->add(AgentQueueRequestHistoryPeer::AGENT_QUEUE_ID, $this->getUser()->getAttribute('queuesArray') ,Criteria::IN) ;

		}

		if (($this->getUser()->getAttribute('cagent') == 'on')&& ($this->getUser()->getAttribute('agentss') ))
		{

			foreach ( $this->getUser()->getAttribute('agentss') as $parm)
			{
				$this->debugdata= $this->debugdata . 'Selecting Agent as ' . $parm . '<br>' ;
			}
			$c->addJoin(CallHistoryPeer::CALL_ID,UserDispositionHistoryPeer::CALL_ID) ;
			$c->add(UserDispositionHistoryPeer::USER_ID, $this->getUser()->getAttribute('agentss') ,Criteria::IN) ;

		}

		if (($this->getUser()->getAttribute('ctime') == 'on') && ( $this->getUser()->getAttribute('Start') ) && (   $this->getUser()->getAttribute('End') ) )
		{
			$sarray=split('-',$this->getUser()->getAttribute('Start'));
			$earray=split('-',$this->getUser()->getAttribute('End'));
			$stime= $sarray[2] .'-' .$sarray[0] . '-' . $sarray[1]  . ' ' . $this->getUser()->getAttribute('h_Start') . ':'.sprintf('%02d',$this->getUser()->getAttribute('m_Start')).':00' ;
			$etime= $earray[2] .'-' .$earray[0] . '-' . $earray[1]   . ' ' . $this->getUser()->getAttribute('h_End') . ':'.sprintf('%02d',$this->getUser()->getAttribute('m_End')).':00' ;
			if ($stime == $etime)
			{
				echo "<font color=RED>".voicelog_lang::getLocalizedString("Please.Select.Different.Start.And.End.Time")."</font> " ;
				exit ;
			}
			$this->debugdata= $this->debugdata . 'Selecting Time from  ' . $stime . ' to '  . $etime . '<br>' ;
			$crit=$c->getNewCriterion(CallHistoryPeer::DATE_ADDED, "'$stime'" ,Criteria::GREATER_THAN);
			$crit1=$c->getNewCriterion(CallHistoryPeer::DATE_ADDED, "'$etime'" ,Criteria::LESS_THAN);
			$crit->addAnd($crit1) ;
			$c->add($crit);


		}
		if (($this->getUser()->getAttribute('cphone') == 'on')	&& ( $this->getUser()->getAttribute('phone')))
		{

			$crit=$c->getNewCriterion(CallHistoryPeer::PHONE, '%' . $this->getUser()->getAttribute('phone') . '%' ,Criteria::LIKE);
			$c->add($crit);

			$this->debugdata= $this->debugdata . 'Selecting Phone pattren  ' . $this->getUser()->getAttribute('phone')  . '<br>' ;
		}
		if (($this->getUser()->getAttribute('cvlogfname') == 'on')  && ( $this->getUser()->getAttribute('vlogfname')))
		{

			$crit=$c->getNewCriterion(CallHistoryPeer::RECORDING_FILE_URL, '%' . $this->getUser()->getAttribute('vlogfname') . '%' ,Criteria::LIKE);
			$c->add($crit);

			$this->debugdata= $this->debugdata . 'Selecting Voicelog Filename pattren  ' . $this->getUser()->getAttribute('phone')  . '<br>' ;
		}

		if (($this->getUser()->getAttribute('ccallid') == 'on')	&& ( $this->getUser()->getAttribute('callid')))
		{

			$crit=$c->getNewCriterion(CallHistoryPeer::CALL_ID, trim($this->getUser()->getAttribute('callid')),Criteria::IN  );
			$c->add($crit);

			$this->debugdata= $this->debugdata . 'Selecting callid ' . $this->getUser()->getAttribute('callid')  . '<br>' ;
		}


		if (($this->getUser()->getAttribute('ccomment') == 'on') && ( $this->getUser()->getAttribute('comment')))
		{

			$crit=$c->getNewCriterion(VoicelogCommentPeer::COMMENT, '%' . trim($this->getUser()->getAttribute('comment')) . '%' ,Criteria::LIKE  );
			$c->addJoin(CallHistoryPeer::CALL_ID,VoicelogCommentPeer::CALL_ID) ;
			$c->add($crit);

			$this->debugdata= $this->debugdata . 'Selecting comment ' . $this->getUser()->getAttribute('comment')  . '<br>' ;
		}

		if (($this->getUser()->getAttribute('crating') == 'on') && ( $this->getUser()->getAttribute('rating')))
		{
			$crit=$c->getNewCriterion(VoicelogCommentPeer::RATING, trim($this->getUser()->getAttribute('rating')),Criteria::IN  );
			$c->addJoin(CallHistoryPeer::CALL_ID,VoicelogCommentPeer::CALL_ID) ;
			$c->add($crit);

			$this->debugdata= $this->debugdata . 'Selecting rating ' . $this->getUser()->getAttribute('rating')  . '<br>' ;
		}


		if (($this->getUser()->getAttribute('ccalltime') == 'on')	&& ( $this->getUser()->getAttribute('calltime') ))
		{
			#echo $this->getUser()->getAttribute('calltime');
			$crit=$c->getNewCriterion(CallHistoryPeer::TALK_TIME, $this->getUser()->getAttribute('calltime').'000',Criteria::GREATER_THAN);
			$c->add($crit);
			$this->debugdata= $this->debugdata . 'Selecting Call time more than ' . $this->getUser()->getAttribute('calltime') . ' Seconds <br>' ;
		}
		if (($this->getUser()->getAttribute('ccalltime1') == 'on') && ( $this->getUser()->getAttribute('calltime1') ))
		{
			#echo $this->getUser()->getAttribute('calltime1');
			$crit1=$c->getNewCriterion(CallHistoryPeer::TALK_TIME, $this->getUser()->getAttribute('calltime1').'000',Criteria::LESS_THAN);
			$crit->addAnd($crit1);
			$c->add($crit);
			$this->debugdata= $this->debugdata . 'Selecting Call time less than ' . $this->getUser()->getAttribute('calltime1') . ' Seconds <br>' ;
		}
		// session information search ends here

		$c->addAscendingOrderByColumn(CallHistoryPeer::DATE_ADDED);

		if ($this->getRequestParameter('list_proceed') == voicelog_lang::getLocalizedString("List") )
		{
			$abc=CallHistoryPeer::doCount($c) ;
			$pagelen=50;

			$startcount=$nowpage * $pagelen ;
			$endcount=$pagelen	 ;
			$lastcount=$startcount + $pagelen ;
			$totalpage=  round ($abc / $pagelen) ;

			if ($totalpage==0 ) 	$totalpage=1;
			if ($abc== 0 )
			{
				$this->data= $this->data . '<br>' . '<font color=RED >'.voicelog_lang::getLocalizedString("No.Entry.Found").'</font>';
				$this->data= $this->data . '<br>' . '<input type=button value="'.voicelog_lang::getLocalizedString("Back").'" onclick="history.go(-1)" > <br>';
				return ;
			}
			$pager = new sfPropelPager('CallHistory', $pagelen);
			$pager->setCriteria($c);
			$pager->setPage($this->getRequestParameter('page', 1));
			$pager->init();
			echo " <script> function disable(divid,disableIt)
			{
			var divid1=divid + '1' ;
			if (disableIt == true)
			{
			document.getElementById(divid).value = '0';
		}else
		{

		document.getElementById(divid).value = document.getElementById(divid1).value ;
		}
		document.getElementById(divid1).disabled = disableIt;

		}
		</script>
		";

			$this->data=$this->data . '<table class=border>';
			$this->data=$this->data . '<tr class=tbl_back_even><td colspan=5><span class=small-bold>

			'.voicelog_lang::getLocalizedString("Volume.Control:").'</span>&nbsp;'.voicelog_lang::getLocalizedString("Output.Gain:").'&nbsp;
			<select id="output_gain1" name="output_gain1" ' .
			" onclick=\"
			document.getElementById('output_gain').value = document.getElementById('output_gain1').value ;
			\"  >";
			if (file_exists(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'cache/system/prod/config/voicelog_cache.php') )
			{
				require_once(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'cache/system/prod/config/voicelog_cache.php');
			}
			for ($i=1;$i<=10;$i++) {
				if ($i != 0)
				{
					if ($i == $outgain)
						$this->data=$this->data . '<option selected value="'.$i.'">'.$i.'</option>' ;
					else
						$this->data=$this->data . '<option value="'.$i.'">'.$i.'</option>' ;
				}
			}
			$this->data=$this->data . "</select>&nbsp".voicelog_lang::getLocalizedString("Output.Mute:")."
			<input type=checkbox onclick=\"disable('output_gain',this.checked); \">     &nbsp &nbsp &nbsp
			".voicelog_lang::getLocalizedString("Input.Gain:")."&nbsp;" .
			'<input type=hidden name="output_gain" id="output_gain" ' ."value=$outgain" .' >
			<input type=hidden name="input_gain" id="input_gain" value= ' . $ingain . ' >
			<select id="input_gain1" name="input_gain1" ' .
			"onclick=\"
			document.getElementById('input_gain').value = document.getElementById('input_gain1').value ;
			\" >
			";
			for ($j=1;$j<=10;$j++) {
				if ($j != 0)
				{
					if ( $j == $ingain)
						$this->data=$this->data . '<option selected value="'.$j.'">'.$j.'</option>' ;
					else
						$this->data=$this->data . '<option value="'.$j.'">'.$j.'</option>' ;

				}
			}
			$this->data=$this->data . "</select> &nbsp ".voicelog_lang::getLocalizedString("Input.Mute:")." <input type=checkbox onclick=\"disable('input_gain',this.checked); \"> </td></tr>";
			$this->data=$this->data . '<tr class=tbl_back_even><td colspan=5><font color="green">'.voicelog_lang::getLocalizedString("GREEN").'</font>&nbsp;'.voicelog_lang::getLocalizedString("Verified").'</td></tr><tr  class=tbl_back_even><td colspan=5><font color="BLUE">'.voicelog_lang::getLocalizedString("BLUE").'</font>&nbsp;'.voicelog_lang::getLocalizedString("Not.Verified").'</td></tr>'   ;
			$this->data= $this->data . '<span class=small-bold>' . voicelog_lang::getLocalizedString("Listing.Page.No.") . $nowpage . '-' . $totalpage . '</b></td></tr><tr class=tbl_back> <td class=tbl_back_even>' ;
			$odd='tbl_back_even';
			#			$this->data .= '</form>' ;

			foreach( $pager->getResults() as $result )
			{
				//echo get_class($result);
				//print_r($result);
				$tmp=$result->getRecordingFileUrl();
				$callhistoryid=$result->getCallId();




				require_once('myclass.php');
				require_once('lang/voicelog_lang.php');
				# define global values
				$mydacx=new dacx();
				$DACXDB_IP = $mydacx->showDbValues('host') ;
				$PORT=$mydacx->showDbValues('port') ;
				$DBNAME=$mydacx->showDbValues('database') ;
				$USER=$mydacx->showDbValues('user') ;
				$PASSWORD="postgres";


				$dbconn = pg_connect("host=$DACXDB_IP user=$USER password=$PASSWORD dbname=$DBNAME");
				$query2 = "SELECT * FROM voicelog_comment WHERE call_id='$callhistoryid'";
				$res2=pg_query($dbconn,$query2);
				if(isset($res2)) {
					$row2=pg_fetch_array($res2);
					if($row2['call_id']!='') {
						$colour="green";
						$rating 		= $row['rating'];
					} else {
						$colour="blue";
					}
				}



				if ($odd == 'tbl_back_odd')
					$odd='tbl_back_even' ;
				else
					$odd='tbl_back_odd';

				$parseurl_arr=parse_url($tmp);
				$asterisk_id=$parseurl_arr["user"];
				$astc=new Criteria () ;
				$astcrit=$astc->getNewCriterion(AsteriskVoiceResourceSettingsPeer::VOICE_RESOURCE_ID,$asterisk_id);
				$astc->add($astcrit);
				$astObj=AsteriskVoiceResourceSettingsPeer::doSelect($astc) ;
				$asterisk_ip=$astObj[0]->getHostName();
				$filepath=$parseurl_arr["path"];

				$filename=split('/',$filepath);
				dacx::debugEcho($filepath . '<br>');
				$flen=count($filename) -1 ;
				$this->data=$this->data . '<tr class='.$odd.'><td><form name=' .$filepath .' target="_blank" action=downloadall >';
				$this->data=$this->data . '<input type=hidden name=fnames value="' . $filepath .'">' ;
				$this->data=$this->data . '<input type=hidden name=asterisk value="' . $asterisk_ip .'">' ;
				$this->data=$this->data . '<input type=hidden name=viewtype value="1">' ;
				$this->data=$this->data . '<input type=hidden id=ingain name=ingain value="">' ;
				$this->data=$this->data . '<input type=hidden id=outgain name=outgain value="">' ;

				$this->data=$this->data . '<input type=checkbox id='  . "chk_$filepath" . '  name=' . "chk_$filepath" . ' value="' . $filepath . '" onclick="appendElement(' . "'fnames'," . "'$filepath'," . "'chk_$filepath'"  . ' ) ;  appendElement(' . "'asterisk'," . "'$asterisk_ip'," . "'chk_$filepath'"  . ') ;  " ></td>' ;
				$this->data=$this->data . '<input type=hidden name=fileonserver value="' . $filepath .'">' ;


				$this->data=$this->data . '<td><a href=# onclick="document.forms['."'$filepath'".'].elements['."'ingain'".'].value=document.getElementById('."'input_gain'".').value;  document.forms['."'$filepath'".'].elements['."'outgain'".'].value=document.getElementById('."'output_gain'".').value  ; document.forms['. "'" .$filepath ."'". '].submit();"> <font color='.$colour.'>'. urldecode($filename[$flen])  . '</font></a></td>';

				$this->data=$this->data . '<td>'. $callhistoryid . '</td>';

				$this->data=$this->data . '<td><input type="button" name="play" value="'.voicelog_lang::getLocalizedString("Play").'" onclick="javascript:window.open(\'/web/system.php/voicelogs/play?filepath='.$filepath.'&filename='.$filename[$flen].'&asteriskip='.$asterisk_ip.'&callhistoryid='.$callhistoryid.'&ingain=\'+document.getElementById('."'input_gain'".').value+\'&outgain=\'+document.getElementById('."'output_gain'".').value'.',null,
				\'height=200,width=350,top=100, left=150,status=yes,toolbar=no,menubar=no,location=no\');"></td>' ;
				$this->data=$this->data . '<td><input type="button" name="comment" value="'.voicelog_lang::getLocalizedString("Comment").'" onclick="javascript:window.open(\'list?viewtype=1&show=voicelog_comment&callhistoryid='.$callhistoryid.'&filename='.$filename[$flen].'\&asterisk_ip='.$asterisk_ip.'\',null,
				\'height=200,width=450,top=200, left=150,status=yes,toolbar=no,menubar=no,location=no\');"></td></tr>' ;
				$this->data=$this->data . '</form>' ;
				$this->data=$this->data . ''   ;
			}
			if ($odd == 'tbl_back_odd')
				$odd='tbl_back_even' ;
			else
				$odd='tbl_back_odd';
			$this->data=$this->data . "</table><table><tr><td class=$odd>"   ;

			if ( $totalpage == 1)
			{
				$this->data=$this->data . "<form name=main method=POST>
				<input type=hidden name=page value=1>
				<input type=hidden name=list_proceed value=" .  $this->getRequestParameter('list_proceed') . " >
				<input type=Submit name=next value='".voicelog_lang::getLocalizedString("First.Page")."' > </form>"   ;
			}

			// footer
			if ( $nowpage != 1)
			{
				$this->data=$this->data . "<form name=main method=POST>
				<input type=hidden name=page value=1>
				<input type=hidden name=list_proceed value=" .  $this->getRequestParameter('list_proceed') . " >
				<input type=Submit name=next value='".voicelog_lang::getLocalizedString("First.Page")."' > </form>"   ;
				$this->data=$this->data . '</td><td>'   ;
				$prevpage=$nowpage-1;
				$this->data=$this->data . "<form name=main method=POST>
				<input type=hidden name=page value=$prevpage>
				<input type=hidden name=list_proceed value=" .  $this->getRequestParameter('list_proceed') . " >
				<input type=Submit name=next value='".voicelog_lang::getLocalizedString("Previous.Page")."' > </form>"   ;
			}


			$delta=5;

			for ( $i=$nowpage-$delta ; $i<=$nowpage+$delta;$i++)
			{
				if (($i > 0)  && ($i < $totalpage))
				{
					$this->data=$this->data . '</td><td>'   ;
					$this->data=$this->data . "<form name=main method=POST>
					<input type=hidden name=page value=$i>
					<input type=hidden name=list_proceed value=" .  $this->getRequestParameter('list_proceed') . " >
					<input type=Submit name=next value='$i' > </form>"   ;
					$this->data=$this->data . '</td><td>'   ;
				}
			}

			$this->data=$this->data . '</td><td>'   ;

			if ($nowpage < $totalpage)
			{
				$nextpage=$nowpage+1;
				$this->data=$this->data . "<form name=main method=POST>
				<input type=hidden name=page value=$nextpage>
				<input type=hidden name=list_proceed value=" .  $this->getRequestParameter('list_proceed') . " >
				<input type=Submit name=next value='".voicelog_lang::getLocalizedString("Next.Page")."' > </form>"   ;
			}
			$this->data=$this->data . '</td><td>'   ;
			if ($nowpage < $totalpage)
			{
				$nextpage=$nowpage+1;
				$this->data=$this->data . "<form name=main method=POST>
				<input type=hidden name=page value=$totalpage>
				<input type=hidden name=list_proceed value=" .  $this->getRequestParameter('list_proceed') . " >
				<input type=Submit name=next value='".voicelog_lang::getLocalizedString("Last.Page")."' > </form>"   ;
			}

			$this->data=$this->data . '</td><td>'   ;
			$this->data=$this->data . '</td></tr></table>'   ;
			$this->data=$this->data . '<table>'   ;
			$this->data=$this->data . '<tr><td>'   ;
			$sourcePage = $this->getRequestParameter('source_page');
			if(!$sourcePage) {
				$this->data = $this->data . '<a href=index?viewtype=1><input type=button name=index Value="'.voicelog_lang::getLocalizedString("Back").'" > </a> ' ;
			}
			else {
				$ipAddress = $_SERVER['SERVER_ADDR'];
				if($sourcePage=='Debug'){
					$this->data = $this->data . "<a href=https://$ipAddress:8080/web/system.php/tcmon/index?viewtype=1viewtype=1><input type=button name=index Value='".voicelog_lang::getLocalizedString("Back")."'> </a> " ;
				} elseif($sourcePage='Dashboard'){
					$start_time=$this->getRequestParameter('start_time');
					$interval=$this->getRequestParameter('interval');
					$host=$this->getRequestParameter('host');
					$user=$this->getRequestParameter('user');
					$dbname=$this->getRequestParameter('dbname');
					$disposition_code=$this->getRequestParameter('disposition_code');
					$contact_center=$this->getRequestParameter('contact_center');
					$this->data = $this->data . "<a href=https://$ipAddress:8080/web/system.php/ContactCenterDashboard/dashboarddetails?start_time=$start_time&interval=$interval&host=$host&dbuser=$dbuser&dbname=$dbname&disposition_code=$disposition_code&contact_center=$contact_center><input type=button name=index Value='".voicelog_lang::getLocalizedString("Back")."'> </a> " ;
				}
			}
			$this->data=$this->data . '<form name=downloadall id=downloadall method=post action="downloadall" onsubmit="submitit(\"downloadall\")">' ;
			$this->data=$this->data . '<input type=hidden id=fnames name=fnames value="" >' ;
			$this->data=$this->data . '<input type=hidden id=f1 name=f1 value="" >' ;
			$this->data=$this->data . '<input type=hidden id=a1 name=a1 value="" >' ;
			$this->data=$this->data . '<input type=hidden id=ingain name=ingain value="" >' ;
			$this->data=$this->data . '<input type=hidden id=outgain name=outgain value="" >' ;
			$this->data=$this->data . '<input type=hidden id=viewtype name=viewtype value=1 >' ;
			$this->data=$this->data . '<input type=hidden id=debugview name=debugview value=1 >' ;
			$this->data=$this->data . '<input type=hidden id=asterisk name=asterisk value="" >' ;
			$this->data=$this->data . '<div id=downloadall1 > </div>' ;
			$this->data=$this->data . '</td><td><input type=submit name=index Value="'.voicelog_lang::getLocalizedString("Download.Checked").'"></td><td>'   ;
			$this->data=$this->data . '</td><td><input type=submit name=index Value="'.voicelog_lang::getLocalizedString("Download.Mp3").'"></td><td>'   ;

			$this->data=$this->data . '<input type="button" name="CheckAll" value="'.voicelog_lang::getLocalizedString("Check.All").'"
			onClick="checkAll(document.main.list)"> </td><td>
			<input type="button" name="UnCheckAll" value="'.voicelog_lang::getLocalizedString("UnCheck.All").'"
			onClick="uncheckAll(document.main.list)"> ';
			$this->data=$this->data . '</td><td><input type=submit name=index Value="'.voicelog_lang::getLocalizedString("Delete.Checked").'" ></td><td>'   ;
			$this->data=$this->data . '</td></tr></table></form>'   ;
		}

		elseif ($this->getRequestParameter('list_proceed') == voicelog_lang::getLocalizedString("Proceed ->") )
		{

			#$this->data= $this->data . 'This module in under construction ' ;
			$abc=CallHistoryPeer::doCount($c) ;
			$pagelen=50;

			$startcount=$nowpage * $pagelen ;
			$endcount=$pagelen	 ;
			$lastcount=$startcount + $pagelen ;
			$totalpage=  round ($abc / $pagelen) ;

			if ($totalpage==0 ) 	$totalpage=2;



			$this->data= $this->data . "<form><table align=center>" ;
			$this->data= $this->data . "<tr><td><b>$abc ".voicelog_lang::getLocalizedString("Voice.Files.Found")."</b></td> " ;
			if ($abc > 0)
				$this->data= $this->data . "<td><input type=submit name='list_proceed' value='".voicelog_lang::getLocalizedString("Continue")."'></td>" ;
			$this->data= $this->data . '<td>' . '<input type=button value="'.voicelog_lang::getLocalizedString("Back").'" onclick="javascript:history.go(-1)" ></td> ';

			$this->data=$this->data . '</td>
			<input type=hidden name=page value=1>
			<td>'   ;
			$this->data= $this->data . "</tr></table></form>" ;


		}
		elseif ($this->getRequestParameter('list_proceed') == voicelog_lang::getLocalizedString("Continue") )
		{

			$abc=CallHistoryPeer::doCount($c) ;
			$pagelen=50;

			$startcount=$nowpage * $pagelen ;
			$endcount=$pagelen	 ;
			$lastcount=$startcount + $pagelen ;
			$totalpage=  round ($abc / $pagelen) ;

			if ($totalpage==0 ) 	$totalpage=1;
			if ($abc== 0 )
			{
				$this->data= $this->data . '<br>' . '<font color=RED >'.voicelog_lang::getLocalizedString("No.Entry.Found").'</font>';
				$this->data= $this->data . '<br>' . '<input type=button value="'.voicelog_lang::getLocalizedString("Back").'" onclick="history.go(-1)" > <br>';
				return ;
			}

			system(' echo  "<script language=\"javascript\" src=\"/web/js/xp_progress.js\"> </script>"  ;');
			system ('echo "<script type=\"text/javascript\"> var bar2= createBar(300,15,\'white\',1,\'black\',\'blue\',85,7,3,\"\",\"'.voicelog_lang::getLocalizedString("Please.wait.while.generating.file.list").'\"); </script> " ;');

			echo "<script type=\"text/javascript\"> var bar1= progressBarInit();  </script> "  ;
			echo "<script type=\"text/javascript\"> setCount(1) ; bar2.hideBar() ; </script> " ;
			ob_end_flush();
			flush();



			$pager = new sfPropelPager('CallHistory', $pagelen);
			$pager->setCriteria($c);
			$pager->setPage($this->getRequestParameter('page', 1));
			$pager->init();

			$maxtime=$totalpage*20 ;
			ini_set('max_execution_time',$maxtime);
			$this->data=$this->data . '<br> <table class=border><tr class=tbl_back><td></td><td class=tbl_back_even>'   ;

			echo "<div id=status>".voicelog_lang::getLocalizedString("No.Status")."</div>";

			echo "<script> document.getElementById('status').innerHTML= '' </script>";
			echo "<script>
			function updateStatus(msg)
			{
			document.getElementById('status').innerHTML= document.getElementById('status').innerHTML + msg  + '<br>';
		}
		</script>
		" ;





			echo "<script> updateStatus('".voicelog_lang::getLocalizedString("Please.wait.generating.file.list")."'); </script>";
			$odd='tbl_back_even';
			$this->data .=   '<form name="test"  action=downloadall >' ;
			$astArr = array();
			$tmpfilename='tmpvldl.' .rand() ;
			$FP=fopen($tmpfilename,'w');

			for($page=1;$page<=$totalpage+1;$page++)
			{
				$pager->setPage($page);
				$pager->init();

				$per=round($page*100/$totalpage) ;


				foreach( $pager->getResults() as $result )
				{
					$tmp=$result->getRecordingFileUrl();
					if ($odd == 'tbl_back_odd')
						$odd='tbl_back_even' ;
					else
						$odd='tbl_back_odd';


					$parseurl_arr=parse_url($tmp);
					$asterisk_id=$parseurl_arr["user"];
					$astc=new Criteria () ;
					$astcrit=$astc->getNewCriterion(AsteriskVoiceResourceSettingsPeer::VOICE_RESOURCE_ID,$asterisk_id);
					$astc->add($astcrit);
					$astObj=AsteriskVoiceResourceSettingsPeer::doSelect($astc) ;
					$asterisk_ip=$astObj[0]->getHostName();
					$filepath=$parseurl_arr["path"];


					$filename=split('/',$filepath);
					$flen=count($filename) -1 ;
					// Done to escape special character %
					$filepath = str_replace("%", "%%", $filepath);
					fprintf($FP,$asterisk_ip. ':' . $filepath . "\n");

				}

				echo "<script type=\"text/javascript\"> setCount($per) ; </script> " ; ob_flush(); flush();
			}

			fclose($FP);
			$this->data .=  '<input type=hidden name=downloadtype Value="file" >' ;
			$this->data .=   "<input type=hidden name=tmpfile Value='$tmpfilename' >" ;
			$this->data .=   "<input type=hidden name=viewtype Value='1' >" ;
			$this->data .=   "<input type=hidden name=totalfiles Value='$abc' >" ;
			$this->data .=   "<input type=hidden name=index id=index Value='".voicelog_lang::getLocalizedString("Download.Checked")."' >" ;
			$this->data .=   "<table><tr><td colspan=3>" ;

			$this->data=$this->data . '<table class=border>';
			$this->data=$this->data . '<tr class=tbl_back_even><td colspan=4><span class=small-bold>'.voicelog_lang::getLocalizedString("Volume.Control:").'</span>&nbsp;'.voicelog_lang::getLocalizedString("Output.Gain:").'&nbsp;<select id="outgain" name="outgain">';
			if (file_exists(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'cache/system/prod/config/voicelog_cache.php') )
			{
				require_once(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'cache/system/prod/config/voicelog_cache.php');
			}
			for ($i=1;$i<=10;$i++) {
				if ($i != 0)
				{
					if ($i == $outgain)
						$this->data=$this->data . '<option selected value="'.$i.'">'.$i.'</option>' ;
					else
						$this->data=$this->data . '<option value="'.$i.'">'.$i.'</option>' ;
				}
			}
			$this->data=$this->data . '</select>&nbsp;'.voicelog_lang::getLocalizedString("Input.Gain:").'&nbsp;<select id="ingain" name="ingain">';
			for ($j=1;$j<=10;$j++) {
				if ($j != 0)
				{
					if ( $j == $ingain)
						$this->data=$this->data . '<option selected value="'.$j.'">'.$j.'</option>' ;
					else
						$this->data=$this->data . '<option value="'.$j.'">'.$j.'</option>' ;
				}
			}
			$this->data=$this->data . '</select></td></tr></table></td></tr>';

			$this->data .=   "<tr><th colspan=3 >".voicelog_lang::getLocalizedString("Select.An.Action")."</th></tr>" ;
			$this->data .=   "<tr><th colspan=3>".voicelog_lang::getLocalizedString("Total")." $abc ".voicelog_lang::getLocalizedString("file.names.are.cached")."</th></tr>" ;

			$this->data .=   '<tr><td><lable test><input type=Submit name=submit Value="'.voicelog_lang::getLocalizedString("Download.All").'" onClick="return confirm(\''.voicelog_lang::getLocalizedString("This.might.take.long.time.depending.on.number.of.voicelogs.generated").'\'); " </td>' ;
			$this->data .=   '<td><input type=Submit name=submit Value="'.voicelog_lang::getLocalizedString("Convert.To.Mp3").'" onClick="return confirm(\''.voicelog_lang::getLocalizedString("This.might.take.long.time.depending.on.number.of.voicelogs.generated").'\'); " </td>' ;
			$this->data .=   '<td><input type=Submit name=submit Value="'.voicelog_lang::getLocalizedString("Delete.All").'" onClick="document.getElementById('."'index'".').value=\"'.voicelog_lang::getLocalizedString("Delete.Checked").'\"; return confirm('.voicelog_lang::getLocalizedString("WARNING.You.are.about.to.delete.all.selected.voicelogs").'); " </td>' ;
			$this->data .=   '<td><a href="javascript:history.go(-1);"><input type=button name=index Value="'.voicelog_lang::getLocalizedString("Back").'"> </a></td></tr>' ;

			$this->data .=   '</table></form>' ;
			if ($odd == 'tbl_back_odd')
				$odd='tbl_back_even' ;
			else
				$odd='tbl_back_odd';
			$this->data=$this->data . "</td></tr></table><table><tr><td class=$odd>"   ;

			echo "<script> document.getElementById('status').innerHTML= '' </script>";
		}
	}
	/**
	 * closes the connection to ZIP file and openes the connection again.
	 *
	 * @return bool
	 */
	public function zipReopen($zip, $archiveFileName) {
		if ( ! $zip->close() ) {
			return false;
		}
		return $zip->open($archiveFileName, ZIPARCHIVE::CREATE);
	}


	public function executeDownloadall()
	{
		require_once('lang/voicelog_lang.php');
		system(' echo  "<script language=\"javascript\" src=\"/web/js/xp_progress.js\"> </script>"  ;');
		system ('echo "<script type=\"text/javascript\"> var bar2= createBar(300,15,\'white\',1,\'black\',\'blue\',85,7,3,\"\",\"Please wait while Downloading voicelogs\"); </script> " ;');
		echo "<script type=\"text/javascript\"> var bar1= progressBarInit();  </script> "  ;
		echo "<script type=\"text/javascript\"> setCount(1) ; bar2.hideBar() ; </script> " ;
		$input_gain=$this->getRequestParameter('input_gain');
		$output_gain=$this->getRequestParameter('output_gain');
		ob_end_flush();
		flush();

		#################################################################################
		// download section

		if (($this->getRequestParameter('index')== voicelog_lang::getLocalizedString("Download.Checked") ) || ($this->getRequestParameter('index')== '' ) || ($this->getRequestParameter('index')== voicelog_lang::getLocalizedString("Download.Mp3") ))
		{

			$ingain=1;
			$outgain=1;
			$mydate= date("m_d_y-H_i_s") ;
			sfContext::getInstance()->getLogger()->log("executeDownloadall Called at $mydate", $priority = 1) ;

			if ($this->getRequestParameter('ingain') != '' )
			{
				sfContext::getInstance()->getLogger()->log("ingain found as " . $this->getRequestParameter('ingain') , $priority = 1) ;
				$ingain=$this->getRequestParameter('ingain');
			}
			if ($this->getRequestParameter('outgain') != '' )
			{
				sfContext::getInstance()->getLogger()->log("outgain found  as " . $this->getRequestParameter('outgain') , $priority = 1) ;
				$outgain=$this->getRequestParameter('outgain');

			}			$loop=0;


			sfContext::getInstance()->getLogger()->log("writing cache as ".SF_ROOT_DIR.DIRECTORY_SEPARATOR.'cache/system/prod/config/voicelog_cache.php' , $priority = 1) ;
			$vlCache=fopen(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'cache/system/prod/config/voicelog_cache.php','w');
			fprintf($vlCache,'<?php'."\n") ;
			fprintf($vlCache,"\$ingain=$ingain;\n") ;
			fprintf($vlCache,"\$outgain=$outgain;\n") ;
			fprintf($vlCache,'?'.'>'."\n") ;
			fclose($vlCache);

			echo "<script>
			function updateStatus(msg)
			{
			document.getElementById('status').innerHTML= document.getElementById('status').innerHTML + msg  + '<br>';
		}
		</script>
		" ;

			echo "<div id=status>".voicelog_lang::getLocalizedString("No.Status")."</div>";

			echo "<script> document.getElementById('status').innerHTML= '' </script>";
			echo "<script> updateStatus('".voicelog_lang::getLocalizedString("Mixing.Please.wait....")."'); </script>";
			$downloadArr = array();


			if ($this->getRequestParameter('downloadtype')== 'file' )
			{
				$tomp3=0;
				if ($this->getRequestParameter('submit') == voicelog_lang::getLocalizedString("Convert.To.Mp3"))
					$tomp3=1;

				$total=0;
				$mycount=0;
				$tmpfile=$this->getRequestParameter('tmpfile');

				$total=$this->getRequestParameter('totalfiles');

				$oldper=0;
				if ($total > 1)
				{
					$maxtime=$total*10 ;
					ini_set('max_execution_time',$maxtime);
				}
				$notfound=0;

				$hostupArr= array();

				$myfilelist = array();

				exec("cat $tmpfile | sort|uniq >$tmpfile.sort ; \cp -rf  $tmpfile.sort $tmpfile ; rm -rf $tmpfile.sort  ");
				$FPM=fopen($tmpfile,'r');
				if ($FPM == NULL)
				{
					echo "<script>alert('".voicelog_lang::getLocalizedString("Cache.has.been.removed.Please.select.Criteria.again")."');</script>";
					throw new sfException(voicelog_lang::getLocalizedString("File")." $tmpfile ".voicelog_lang::getLocalizedString("not.found.on.server"));
				}
				$newcount=0;
				while($fname=fgets($FPM))
				{
					$newcount++;
					$fname=trim($fname);
					$farray=split(':',$fname);
					$filename=trim($farray[1]);
					$astip=trim($farray[0]) ;

					if ($filename != '' )
					{
						array_push($myfilelist,$filename);

						$loop++;

						if ($astip)
						{
							if (! $hostupArr["$astip"])
							{
								$output=`nmap $astip -p 8008 | grep open` ;
								$hostupArr["$astip"]="$output";
							}else
							{
								$output="found";
							}

							if ($output == '')
							{
								echo "<script> updateStatus('".voicelog_lang::getLocalizedString("Cannot.Download")." $filename ".voicelog_lang::getLocalizedString("from")." $astip ".voicelog_lang::getLocalizedString("Connectivity.Failure")."'); </script>";
								throw new sfException(voicelog_lang::getLocalizedString("Cannot.Download")." $filename ". voicelog_lang::getLocalizedString("from") ." $astip ". voicelog_lang::getLocalizedString("Connectivity Failure")) ;
							}

						}else
						{
							$notfound--;
							echo "<script> updateStatus('".voicelog_lang::getLocalizedString("Cannot.Download")." $filename ".voicelog_lang::getLocalizedString("from")." $astip ".voicelog_lang::getLocalizedString("Connectivity.Failure")."'); </script>";
						}

						flush();

						sfContext::getInstance()->getLogger()->log("Downloading http://$astip:8008/dacx/fileoperation?fileoperation=get&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver=$filename&ingain=$ingain&outgain=$outgain", $priority = 1) ;
						$filenameud=urlencode($filename);
						$FP=fopen ( "http://$astip:8008/dacx/fileoperation?fileoperation=get&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver=$filenameud&ingain=$ingain&outgain=$outgain",'r')  ;
						if ( $FP == NULL )
						{
							$notfound++ ;
							if ($total == 1 )
							{
								throw new sfException(voicelog_lang::getLocalizedString("Cannot.Download")." $filename ".voicelog_lang::getLocalizedString("from")." $astip <br>
										". voicelog_lang::getLocalizedString("Try") ."<a href=\"http://$astip:8008/dacx/fileoperation?fileoperation=get&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver=$filename&ingain=$ingain&outgain=$outgain\">$filename </a> ") ;
							}else
							{
								sfContext::getInstance()->getLogger()->log("MP3:($notfound) Cannot Download $filename from $astip ", $priority = 1) ;
								$loop++;
								continue ;
							}
						} else
						{
							$filename = urldecode($filename);
							$this->data=$this->data;
							$dirs = explode(DIRECTORY_SEPARATOR , $filename);
							$count = count($dirs);
							$path = 'vl/';
							for ($i = 0; $i < $count - 1 ; ++$i) {
								$path .= DIRECTORY_SEPARATOR . $dirs[$i];
								mkdir($path, 0777) ;
							}
							$FP1=fopen ('vl/' . $filename . '.wav' ,'w')  ;
							while (!feof($FP))
							{
								$line=fread($FP,4096) ;
								fwrite($FP1,$line) ;
							}
							fclose($FP) ;
							if ($tomp3==1)
							{
								$last=exec('which lame',$lame,$ret) ;
								if ( ! $lame)
								{
									throw new sfException(voicelog_lang::getLocalizedString("OOPS !!! Lame.not.found.on.machine.Please.install.Lame.first"));
									exit ;
								}
								$lame[0]='lame -b 48 --resample 22.05' ;
								$last=exec("$lame[0] --quiet 'vl/$filename.wav' 'vl/$filename.mp3'",$out,$retval);
								if ($retval == 0)
								{
									unlink("vl/$filename.wav");
									array_push($downloadArr,"$filename.mp3");
								}else
								{
									array_push($downloadArr,"$filename.wav");

								}
							}else
								array_push($downloadArr,"$filename.wav");
						}
						fclose($FP1) ;
					}else
					{
						$total-- ;
					}
					$per=round($loop*100/$total) ;
					if ($per != $oldper)
					{
						echo "<script type=\"text/javascript\"> setCount($per) ; </script> " ; ob_flush(); flush();
						$oldper=$per ;
					}
					$mycount++;
				}

				fclose($FPM);
				unlink($tmpfile);
				sfContext::getInstance()->getLogger()->log("file $tmpfile deleted", $priority = 1) ;
			}else {

				if ($this->getRequestParameter('fnames'))
				{
					$myfilelist=split(',',$this->getRequestParameter('fnames'))  ;
					$astips=split(',',$this->getRequestParameter('asterisk') ) ;
				}elseif($this->getRequestParameter('f1'))
				{
					$myfilelist=split(',',$this->getRequestParameter('f1'))  ;
					$astips=split(',',$this->getRequestParameter('a1') ) ;
				}else
				{
					$this->data .= voicelog_lang::getLocalizedString("No.file.selected");
				}
				$mycount=0;
				$total=count($myfilelist) ;

				if ($total > 1)
				{
					$maxtime=$total*10 ;
					ini_set('max_execution_time',$maxtime);
				}
				$notfound=0;

				foreach($myfilelist as $filename)
				{
					if ($filename != '' )
					{
						if ( $astips[$mycount])
						{
							$output=`nmap $astips[$mycount] -p 8008 | grep open` ;
							if ($output == '')
							{
								echo "<script> updateStatus('".voicelog_lang::getLocalizedString("Cannot.Download")." $filename ".voicelog_lang::getLocalizedString("from")." $astips[$mycount] ".voicelog_lang::getLocalizedString("Connectivity.Failure")."'); </script>";
								throw new sfException(voicelog_lang::getLocalizedString("Cannot.Download")." $filename ".voicelog_lang::getLocalizedString("from")." $astips[$mycount] ".voicelog_lang::getLocalizedString("Connectivity.Failure")) ;
							}

						}else
						{
							$notfound--;
							echo "<script> updateStatus('".voicelog_lang::getLocalizedString("Cannot.Download")." $filename ".voicelog_lang::getLocalizedString("from")." $astips[$mycount] ".voicelog_lang::getLocalizedString("Connectivity.Failure")."'); </script>";

						}

						flush();

						sfContext::getInstance()->getLogger()->log("Downloading http://$astips[$mycount]:8008/dacx/fileoperation?fileoperation=get&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver=$filename&ingain=$ingain&outgain=$outgain", $priority = 1) ;
						$filenameud=urlencode($filename);
						$FP=fopen ( "http://$astips[$mycount]:8008/dacx/fileoperation?fileoperation=get&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver=$filenameud&ingain=$ingain&outgain=$outgain",'r')  ;
						if ( $FP == NULL )
						{
							$notfound++ ;
							if ($total == 1 )
							{
								throw new sfException(voicelog_lang::getLocalizedString("Cannot.Download")." $filename ".voicelog_lang::getLocalizedString("from")." $astips[$mycount] <br>
										". voicelog_lang::getLocalizedString("Try") ."<a href=\"http://$astips[$mycount]:8008/dacx/fileoperation?fileoperation=get&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver=$filename&ingain=$ingain&outgain=$outgain\">$filename </a> ") ;
							}else
							{
								echo "<script> updateStatus('[<font color=RED>".voicelog_lang::getLocalizedString("WARNING")."</font>]".voicelog_lang::getLocalizedString("Cannot.Download")." $filename ".voicelog_lang::getLocalizedString("from")." $astips[$mycount] '); </script>";
								sfContext::getInstance()->getLogger()->log("111 Cannot Download $filename from $astips[$mycount] ", $priority = 1) ;
								$loop++;
								continue ;
							}
						} else
						{
							$filename = urldecode($filename);
							$this->data=$this->data ;
							$dirs = explode(DIRECTORY_SEPARATOR , $filename);
							$count = count($dirs);
							$path = 'vl/';
							for ($i = 0; $i < $count - 1 ; ++$i) {
								$path .= DIRECTORY_SEPARATOR . $dirs[$i];
								mkdir($path, 0777) ;
							}
							$FP1=fopen ('vl/' . $filename . '.wav' ,'w')  ;
							while (!feof($FP))
							{
								$line=fread($FP,4096) ;
								fwrite($FP1,$line) ;
							}

							fclose($FP) ;
							if ($this->getRequestParameter('index')== voicelog_lang::getLocalizedString("Download.Mp3") )
							{
								$tomp3=1;
								$last=exec('which lame',$lame,$ret) ;
								if ( ! $lame)
								{
									throw new sfException(voicelog_lang::getLocalizedString("OOPS !!! Lame.not.found.on.machine.Please.install.Lame.first"));
									exit ;
								}
								$lame[0]='lame -b 48 --resample 22.05' ;
								$last=exec("$lame[0] --quiet 'vl/$filename.wav' 'vl/$filename.mp3'",$out,$retval);
								if ($retval == 0)
								{
									unlink("vl/$filename.wav");
									array_push($downloadArr,"$filename.mp3");
								}else
								{
									array_push($downloadArr,"$filename.wav");
								}
							}else
							{
								array_push($downloadArr,"$filename.wav");
							}
						}
						fclose($FP1) ;

						$loop++;
						$per=$loop*100/$total ;
						echo "<script type=\"text/javascript\"> setCount($per) ; </script> " ; ob_flush(); flush();

						sfContext::getInstance()->getLogger()->log("loop $loop", $priority = 1) ;

					}else
					{
						$total-- ;
					}

					$mycount++;
				}
			}

			if ($total < 2 )
			{
				if ($notfound == 0 )
				{
					echo "<script> document.getElementById('status').innerHTML= '' </script>";
					if ($total > 0)

					{
						$filename=urlencode($filename);
						if ($tomp3 == 1)
						{
							$this->data=$this->data . '<br>'.voicelog_lang::getLocalizedString("Click"). "<a href=downloadone?fnames=$filename.mp3 > ".voicelog_lang::getLocalizedString("Here")." </a> " . voicelog_lang::getLocalizedString("To.Download");
						}
						else
						{
							$this->data=$this->data . '<br>'.voicelog_lang::getLocalizedString("Click"). "<a href=downloadone?fnames=$filename.wav > ".voicelog_lang::getLocalizedString("Here")." </a> " . voicelog_lang::getLocalizedString("To.Download");
						}
					}

					else
						$this->data=$this->data . '<br>'.voicelog_lang::getLocalizedString("No.file.selected");
					echo "<script> document.getElementById('status').innerHTML= '' </script>";
					ob_end_flush();
					ob_flush();
					flush();


				}
			}else
			{
				echo "<script> updateStatus('".voicelog_lang::getLocalizedString("Archiving")."'); </script>";
				$zip = new ZipArchive();
				$tmpbasefile = "VoiceFiles_backup_".date("Ymd_His") ;

				$max_file_in_zip=100;
				$downloadArrCount = count($downloadArr);
				$numberOfBackups=ceil($downloadArrCount/$max_file_in_zip);

				//old-----------------------
				$loop=0;
				$zloop=1;
				$cacheLimit=$max_file_in_zip*$zloop;
				$allowaddzip='true';

				//echo "notfound=$notfound, total=$total";
				echo '<table bgcolor="#ECF3F9" border="1" cellpadding="2" cellspacing="0" width=\"60%\">';
				echo '<tr><td>';
				echo voicelog_lang::getLocalizedString("Total.Records.Found:")."<b>$downloadArrCount</b>". voicelog_lang::getLocalizedString("and.each.archive.can.contains.maximim") ."<b> $max_file_in_zip </b> ". voicelog_lang::getLocalizedString("Records");
				echo '</td></tr></table>';
				foreach($downloadArr as $filename)
				{

					$loop++;
					if ( $loop <= $cacheLimit && $allowaddzip=='true') {
						$tmpfile = $tmpbasefile."_".$zloop.".zip" ;
						$allowaddzip='false';
						if ($zip->open("vl/$tmpfile", ZIPARCHIVE::CREATE)!==TRUE) {
							exit(voicelog_lang::getLocalizedString("Cannot.Open")." <$tmpfile>\n");
						}

					}

					if ($filename != '')
					{
						if ( file_exists('/dacx/ameyo/acp/web/vl' . "$filename" ))
						{
							$zip->addFile( '/dacx/ameyo/acp/web/vl' . "$filename","$filename" );
							if (! $this->zipReopen($zip, "vl/$tmpfile")) {
								sfContext::getInstance()->getLogger()->log("Unable to write zip archive");
								exit(voicelog_lang::getLocalizedString("Unable.to.write.zip.archive"));
							}
							unlink('/dacx/ameyo/acp/web/vl' . $filename );
							sfContext::getInstance()->getLogger()->log("file '/dacx/ameyo/acp/web/vl/$filename' added and deleted", $priority = 1) ;
						}else
						{
							echo "<script> updateStatus('".voicelog_lang::getLocalizedString("Cannot.Add")." $filename ...'); </script>";
						}
					}
					if ($loop == $cacheLimit) {
						$allowaddzip='true';
						$zloop=$zloop + 1;
						$zip->close();
						$this->data=$this->data . '<br>'.voicelog_lang::getLocalizedString("Click"). "<a href=downloadone?fnames=$tmpfile ><b>$tmpfile </b></a> " . voicelog_lang::getLocalizedString("To.Download") ;
					}
					$cacheLimit=$max_file_in_zip*$zloop;
				}
				$zip->close();

				ob_end_flush();
				ob_flush();
				flush();


				if ($notfound == $total)
				{
					$this->data=$this->data . '<br><b>'.voicelog_lang::getLocalizedString("No.recording.files.found").' </b><br>('.voicelog_lang::getLocalizedString("Please check Voice files present on Call Server or dagent service is running").') </br>' ;
				}else
				{
					if (($downloadArrCount%$max_file_in_zip) != 0 ) {
						$this->data=$this->data . '<br>' .voicelog_lang::getLocalizedString("Click"). "<a href=downloadone?fnames=$tmpfile onclick='return blockdownload();'> <b>$tmpfile </b></a> " . voicelog_lang::getLocalizedString("To.Download") ;
					}
				}
				if (($notfound > 0 ) && ($notfound < $total))
					$this->data=$this->data . '<br>' . "$notfound ".voicelog_lang::getLocalizedString("out.of")." $total ".voicelog_lang::getLocalizedString("files.cannot.be.downloaded");

				echo "<script> document.getElementById('status').innerHTML= '' </script>";


			}

			// download section end

		}elseif ($this->getRequestParameter('index')== voicelog_lang::getLocalizedString("Delete.Checked") )
		{
			// delete section start

			$mydate= date("m_d_y-H_i_s") ;
			sfContext::getInstance()->getLogger()->log("executeDeleteall Called at $mydate", $priority = 1) ;
			$loop=0;
			echo "<script>
			function updateStatus(msg)
			{
			document.getElementById('status').innerHTML= document.getElementById('status').innerHTML + msg  + '<br>';
		}
		</script>
		" ;

			echo "<div id=status>".voicelog_lang::getLocalizedString("No.Status")."</div>";

			echo "<script> document.getElementById('status').innerHTML= '' </script>";
			echo "<script> updateStatus('".voicelog_lang::getLocalizedString("Deleting.Please.Wait")."'); </script>";
			$downloadArr = array();


			if ($this->getRequestParameter('downloadtype')== 'file' )
			{

				$total=0;
				$mycount=0;
				$tmpfile=$this->getRequestParameter('tmpfile');

				$total=$this->getRequestParameter('totalfiles');

				$oldper=0;
				if ($total > 1)
				{
					$maxtime=$total*10 ;
					ini_set('max_execution_time',$maxtime);
				}
				$notfound=0;

				$hostupArr= array();

				$myfilelist = array();

				exec("cat $tmpfile | sort|uniq >$tmpfile.sort ; \cp -rf  $tmpfile.sort $tmpfile ; rm -rf $tmpfile.sort  ");
				$FPM=fopen($tmpfile,'r');
				if ($FPM == NULL)
				{
					echo "<script>alert('".voicelog_lang::getLocalizedString("Cache.has.been.removed.Please.select.Criteria.again")."');</script>";
					throw new sfException(voicelog_lang::getLocalizedString("File")." $tmpfile ".voicelog_lang::getLocalizedString("not.found.on.server"));

				}
				$newcount=0;
				while($fname=fgets($FPM))
				{
					$newcount++;
					$fname=trim($fname);
					$farray=split(':',$fname);
					$filename=trim($farray[1]);
					$astip=trim($farray[0]) ;

					if ($filename != '' )
					{
						array_push($myfilelist,$filename);

						$loop++;



						if ($astip)
						{
							if (! $hostupArr["$astip"])
							{
								$output=`nmap $astip -p 8008 | grep open` ;
								$hostupArr["$astip"]="$output";
							}else
							{
								$output="found";
							}

							if ($output == '')
							{


								echo "<script> updateStatus('".voicelog_lang::getLocalizedString("Cannot.Delete")." $filename ".voicelog_lang::getLocalizedString("from")." $astip ".voicelog_lang::getLocalizedString("Connectivity.Failure")." '); </script>";
								throw new sfException(voicelog_lang::getLocalizedString("Cannot.Delete")." $filename ".voicelog_lang::getLocalizedString("from")." $astip ".voicelog_lang::getLocalizedString("Connectivity.Failure")) ;

							}

						}else
						{
							$notfound--;
							echo "<script> updateStatus('".voicelog_lang::getLocalizedString("Cannot.Delete")." $filename ".voicelog_lang::getLocalizedString("from")." $astip ".voicelog_lang::getLocalizedString("Connectivity.Failure")." '); </script>";

						}



						flush();

						sfContext::getInstance()->getLogger()->log("calling http://$astip:8008/dacx/fileoperation?fileoperation=delete&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver=%22$filename%22*", $priority = 1) ;
						$filenameud=urlencode($filename);
						$FP=fopen ( "http://$astip:8008/dacx/fileoperation?fileoperation=delete&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver=%22$filenameud%22*",'r')  ;
						if ( $FP == NULL )
						{
							$notfound++ ;
							if ($total == 1 )
							{
								throw new sfException(voicelog_lang::getLocalizedString("Cannot.Delete")." $filename ".voicelog_lang::getLocalizedString("from")." $astip <br>
										". voicelog_lang::getLocalizedString("Try") ."<a href=\"http://$astip:8008/dacx/fileoperation?fileoperation=delete&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver='$filename'*\">$filename </a> ") ;
							}else
							{
								sfContext::getInstance()->getLogger()->log("($notfound) Cannot Delete $filename from $astip ", $priority = 1) ;
								$loop++;
								continue ;
							}
						} else
						{

							array_push($downloadArr,"$filename.wav");

							fclose($FP) ;

						}



					}else
					{
						$total-- ;
					}
					$per=round($loop*100/$total) ;
					if ($per != $oldper)
					{
						echo "<script type=\"text/javascript\"> setCount($per) ; </script> " ; ob_flush(); flush();
						$oldper=$per ;
					}


					$mycount++;
				}

				fclose($FPM);
				unlink($tmpfile);
				sfContext::getInstance()->getLogger()->log("file $tmpfile deleted", $priority = 1) ;
			}else {




				if ($this->getRequestParameter('fnames'))
				{
					$myfilelist=split(',',$this->getRequestParameter('fnames'))  ;
					$astips=split(',',$this->getRequestParameter('asterisk') ) ;
				}elseif($this->getRequestParameter('f1'))
				{
					$myfilelist=split(',',$this->getRequestParameter('f1'))  ;
					$astips=split(',',$this->getRequestParameter('a1') ) ;
				}else
				{
					$this->data .= voicelog_lang::getLocalizedString("No.file.selected");
				}
				$mycount=0;
				$total=count($myfilelist) ;

				if ($total > 1)
				{
					$maxtime=$total*10 ;
					ini_set('max_execution_time',$maxtime);
				}
				$notfound=0;



				foreach($myfilelist as $filename)
				{

					if ($filename != '' )
					{



						if ( $astips[$mycount])
						{
							$output=`nmap $astips[$mycount] -p 8008 | grep open` ;
							if ($output == '')
							{
								echo "<script> updateStatus('".voicelog_lang::getLocalizedString("Cannot.Delete")." $filename ".voicelog_lang::getLocalizedString("from")." $astips[$mycount] ".voicelog_lang::getLocalizedString("Connectivity.Failure")." '); </script>";
								throw new sfException(voicelog_lang::getLocalizedString("Cannot.Delete")." $filename ".voicelog_lang::getLocalizedString("from")." $astips[$mycount] ".voicelog_lang::getLocalizedString("Connectivity.Failure")) ;
							}
						}else
						{
							$notfound--;
							echo "<script> updateStatus('".voicelog_lang::getLocalizedString("Cannot.Delete")." $filename ".voicelog_lang::getLocalizedString("from")." $astips[$mycount] ".voicelog_lang::getLocalizedString("Connectivity.Failure")." '); </script>";
						}



						flush();

						sfContext::getInstance()->getLogger()->log("calling http://$astips[$mycount]:8008/dacx/fileoperation?fileoperation=delete&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver=$filename*", $priority = 1) ;
						$filenameud=urlencode($filename);
						$FP=fopen ( "http://$astips[$mycount]:8008/dacx/fileoperation?fileoperation=delete&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver=%22$filenameud%22*",'r')  ;
						if ( $FP == NULL )
						{
							$notfound++ ;
							if ($total == 1 )
							{
								throw new sfException(voicelog_lang::getLocalizedString("Cannot.Delete")." $filename ".voicelog_lang::getLocalizedString("from")." $astips[$mycount] <br>
										". voicelog_lang::getLocalizedString("Try") ."<a href=\"http://$astips[$mycount]:8008/dacx/fileoperation?fileoperation=delete&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver='$filename'*\">$filename </a> ") ;
							}else
							{
								echo "<script> updateStatus('[<font color=RED>".voicelog_lang::getLocalizedString("WARNING")." </font>]".voicelog_lang::getLocalizedString("Cannot.Delete")." $filename ".voicelog_lang::getLocalizedString("from")." $astips[$mycount] '); </script>";
								sfContext::getInstance()->getLogger()->log("111 Cannot Delete $filename from $astips[$mycount] ", $priority = 1) ;
								$loop++;
								continue ;
							}
						} else
						{
							fclose($FP) ;
						}
						$loop++;
						$per=$loop*100/$total ;
						echo "<script type=\"text/javascript\"> setCount($per) ; </script> " ; ob_flush(); flush();
						sfContext::getInstance()->getLogger()->log("loop $loop", $priority = 1) ;
					}else
					{
						$total-- ;
					}

					$mycount++;
				}
			}

			if ($total < 2 )
			{
				if ($notfound == 0 )
				{

					echo "<script> document.getElementById('status').innerHTML= '' </script>";
					if ($total > 0)

					{
						$this->data=$this->data . '<br> '.voicelog_lang::getLocalizedString("File"). " $filename.wav " .voicelog_lang::getLocalizedString("Deleted") ;
					}

					else
						$this->data=$this->data . '<br>'.voicelog_lang::getLocalizedString("No.file.selected") ;
					echo "<script> document.getElementById('status').innerHTML= '' </script>";
					ob_end_flush();
					ob_flush();
					flush();
				}
			}else
			{
				$loop=0;
				foreach($downloadArr as $filename)
				{
					$loop++;
					if ($filename != '')
					{
						{
							echo "<script> updateStatus('$filename ".voicelog_lang::getLocalizedString("Deleted")."'); </script>";
							$this->data .= "$filename ".voicelog_lang::getLocalizedString("Deleted")."<br>";
						}
					}
				}
				ob_end_flush();
				ob_flush();
				flush();

				$this->data=$this->data . '<script>
				function blockdownload()
				{
					if (downloaded == 0)
					{	downloaded++;
						return true ;
					}
					else
					{
						alert("'.voicelog_lang::getLocalizedString("File.already.downloaded.Please.select.criteria.again.to.download.voice.files").'");
						return false ;
					}
				}
			</script>'   ;

				$this->data=$this->data . '<script> var downloaded=0; </script>'   ;
				if ($notfound == $total)
				{
					$this->data=$this->data . '<br>'.voicelog_lang::getLocalizedString("Sorry!!!.No.voicelog.could.be.deleted.Please.check.dagent.and/or.files.on.asterisk.machines");
				}else
				{
				}
				if (($notfound > 0 ) && ($notfound < $total))
					$this->data=$this->data . '<br>' . "$notfound ".voicelog_lang::getLocalizedString("out.of")." $total ".voicelog_lang::getLocalizedString("files.cannot.be.deleted");

				echo "<script> document.getElementById('status').innerHTML= '' </script>";
			}
		}

		// deleted section end

		################################################################################

		return false ;
	}

	public function executeDownloadone()
	{
		require_once('lang/voicelog_lang.php');
		if (preg_match('/zip$/', $this->getRequestParameter('fnames')) )
		{
			$myfile=$this->getRequestParameter('fnames') ;
			$ftype='octet-stream';
		}elseif(preg_match('/wav$/', $this->getRequestParameter('fnames')) )
		{
			$ftype='wav';
			$myfile=$this->getRequestParameter('fnames') ;
		}
		elseif(preg_match('/mp3$/', $this->getRequestParameter('fnames')) )
		{
			$ftype='mp3';
			$myfile=$this->getRequestParameter('fnames') ;
		}
		$myfile = urldecode($myfile);
		if ($myfile != '' )
		{
			//echo "'vl/' . $myfile";
			if (file_exists('vl/' . $myfile))
			{
				$dlname=basename($myfile);
				header("Pragma: public"); // required
				header("Expires: 0");
				header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
				header("Cache-Control: private",false); // required for certain browsers
				header("Content-Type: application/$ftype");
				header("Content-Disposition: attachment; filename=\"$dlname\"");
				header("Content-Transfer-Encoding: binary");
				header("Content-Length: " . filesize('vl/' . $myfile));
				$FP=fopen('vl/' . $myfile, 'r');
				while(!feof($FP))
					echo fread($FP,4096);
				fclose($FP);
				unlink('vl/' . $myfile);
				sfContext::getInstance()->getLogger()->log("file $myfile deleted", $priority = 1) ;

			}else
			{
				echo voicelog_lang::getLocalizedString("Could.not.Download.Voice.files.Kindly.re-select.the.criteria");
			}
		}else
		{
			echo voicelog_lang::getLocalizedString("Cannot.Provide.This.type.of.File");
		}
		exit ;
	}


}


## end of first else
