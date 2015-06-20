<?php
		//echo $call_id;
//!!$qmpviewandrateuserlist_returnurl = 'qmp_viewandrateuserlist.php' . $_SESSION['qmpviewandrateuserlist_returnurl'];		
    //---------------------------------------------------------------code from actions.class.php slighly modified by ®yan™ 27 of 01 2014

//**********$asteriskip = 'http://208.80.180.209:8008';

//$filepath = 'dacx/var/ameyo/dacxdata/voicelogs/2014-08-10/EBDZamora/61243339421_EBDZamora_2014-08-10-17-02-23';
                   //'"https://208.80.180.209:8080/web/vl//dacx/var/ameyo/dacxdata/voicelogs/2014-08-10/EBDZamora/61243339421_EBDZamora_2014-08-10-17-02-23.wav"'
  //existing
//**********$filepath = 'dacx/var/ameyo/dacxdata/voicelogs/2014-08-08/Danielle_Hira/16042736735_Danielle_Hira_2014-08-08-15-34-12.wav';

//**********echo $filepathnowav."<hr color=green>";
  
//$recording_file_url ='https://208.80.180.209:8080/web/vl//dacx/var/ameyo/dacxdata/voicelogs/2014-08-10/EBDZamora/61243339421_EBDZamora_2014-08-10-17-02-23.wav'; //here 

  //existing
//**********$recording_file_url = 'https://208.80.180.209:8080/web/vl//dacx/var/ameyo/dacxdata/voicelogs/2014-08-08/Danielle_Hira/16042736735_Danielle_Hira_2014-08-08-15-34-12.wav';

  if (isset($_REQUEST["asteriskip"]))
   {
     $asteriskip = 	$_REQUEST["asteriskip"];
   }
  if (isset($_REQUEST["asteriskip"]))
   {
     $filepath = 	$_REQUEST["filepath"];
     $filepathnowav = str_replace(".wav","",$filepath);
   }
  if (isset($_REQUEST["recording_file_url"]))
   {
     $recording_file_url = 	$_REQUEST["recording_file_url"];
   }
  
/*
  http://208.80.180.209:8008/dacx/fileoperation?fileoperation=get&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver=dacx/var/ameyo/dacxdata/voicelogs/2014-08-08/EBDCarandang/17743225046_EBDCarandang_2014-08-08-11-52-28.wav&ingain=1&outgain=1

  
  SANKASH 2
  play button -->https://208.80.180.209:8080/web/system.php/voicelogs/play?filepath=/dacx/var/ameyo/dacxdata/voicelogs/2014-08-08/Danielle_Hira/16042733833_Danielle_Hira_2014-08-08-15-31-55&filename=16042733833_Danielle_Hira_2014-08-08-15-31-55&asteriskip=208.80.180.209&callhistoryid=d690-53abb9a7-vcall-411718&ingain=1&outgain=1
  <audio src='/web/vl//dacx/var/ameyo/dacxdata/voicelogs/2014-08-08/Danielle_Hira/16042733833_Danielle_Hira_2014-08-08-15-31-55.wav' controls autoplay>
   <EMBED SRC='/web/vl//dacx/var/ameyo/dacxdata/voicelogs/2014-08-08/Danielle_Hira/16042733833_Danielle_Hira_2014-08-08-15-31-55.wav' autostart='true' loop='false' volume='100' >
   </EMBED>
  </audio>

  old audio path tests
   /dacx/ameyo/acp/web/vl/dacx/var/ameyo/dacxdata/voicelogs/2014-08-08
   https://208.80.180.209:8080/web/vl//dacx/var/ameyo/dacxdata/voicelogs/2014-01-24/Janice_Hira/12133812861_Janice_Hira_2014-01-24-14-49-34.wav

  new audio path tests
   /dacx/var/ameyo/dacxdata/voicelogs/2014-08-08
   https://208.80.180.209:8080/dacx/var/ameyo/dacxdata/voicelogs/2014-08-08/EBDCarandang/9493505486_EBDCarandang_2014-08-08-13-27-25.wav
  
  to invoke wave files
  https://208.80.180.209:8080/web/system.php/voicelogs/play?filepath=/dacx/var/ameyo/dacxdata/voicelogs/2014-08-08/EBDCarandang/9493505486_EBDCarandang_2014-08-08-13-27-25&filename=9493505486_EBDCarandang_2014-08-08-13-27-25&asteriskip=208.80.180.209&callhistoryid=d690-53abb9a7-vcall-409575&ingain=1&outgain=1

  https://208.80.180.209:8080/web/system.php/voicelogs/play?filepath=/dacx/var/ameyo/dacxdata/voicelogs/2014-08-10/EBDZamora/61894466577_EBDZamora_2014-08-10-23-04-07&filename=61894466577_EBDZamora_2014-08-10-23-04-07&asteriskip=208.80.180.209&callhistoryid=d690-53abb9a7-vcall-354244&ingain=1&outgain=1

  https://208.80.180.209:8080/web/system.php/voicelogs/play?filepath=/dacx/var/ameyo/dacxdata/voicelogs/2014-08-10/EBDZamora/61741623800_EBDZamora_2014-08-10-23-25-33&filename=61741623800_EBDZamora_2014-08-10-23-25-33&asteriskip=208.80.180.209&callhistoryid=&ingain=1&outgain=1

  https://208.80.180.209:8080/web/system.php/voicelogs/play?filepath=/dacx/var/ameyo/dacxdata/voicelogs/2014-08-10/EBDZamora/61732636170_EBDZamora_2014-08-10-20-14-21&filename=61732636170_EBDZamora_2014-08-10-20-14-21&asteriskip=208.80.180.209&callhistoryid=&ingain=1&outgain=1
  
  12 Aug

  https://208.80.180.209:8080/web/system.php/voicelogs/play?filepath=/dacx/var/ameyo/dacxdata/voicelogs/2014-08-11/EBDCarandang/5202698633_EBDCarandang_2014-08-11-17-53-18&filename=5202698633_EBDCarandang_2014-08-11-17-53-18&asteriskip=208.80.180.209&callhistoryid=&ingain=1&outgain=1
  
  
*/
   if ($_SERVER['SERVER_ADDR']<>"127.0.0.1")
     {

		define('SF_ROOT_DIR',    realpath(dirname(__FILE__).'/../../..'));
		define('SF_APP',         'system');
		define('SF_ENVIRONMENT', 'prod');
		define('SF_DEBUG',       false);

		
		$ingain=1;
		$outgain=1;
		$path = '';
		if ($_SERVER['SERVER_ADDR']<>"127.0.0.1")
		{
			
		//**********echo SF_ROOT_DIR.DIRECTORY_SEPARATOR."cache/system/prod/config/voicelog_cache.php";
		//!!echo '<hr />this processed '."$asteriskip/dacx/fileoperation?fileoperation=get&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver=/$filepathnowav&ingain=1&outgain=1";
		
		//echo '<br/><br/>VLcache '.SF_ROOT_DIR.DIRECTORY_SEPARATOR.'cache/system/prod/config/voicelog_cache.php';
		//!!echo '<br/><br/>VLcache '.'/dacx/ameyo/acp/'.'cache/system/prod/config/voicelog_cache.php';
			
		//$vlCache=fopen(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'cache/system/prod/config/voicelog_cache.php','w');
		/*
		$vlCache=fopen('/dacx/ameyo/acp/cache/system/prod/config/voicelog_cache.php','w');
		fprintf($vlCache,'<?php'."\n") ;
		fprintf($vlCache,"\$ingain=$ingain;\n") ;
		fprintf($vlCache,"\$outgain=$outgain;\n") ;
		fprintf($vlCache,'?' .'>'."\n") ;
		fclose($vlCache);
		
		http://208.80.180.209:8008/dacx/fileoperation?fileoperation=get&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&
		fileonserver=/dacx/var/ameyo/dacxdata/voicelogs/2014-08-11/EBDCarandang/5202698633_EBDCarandang_2014-08-11-17-53-18&
		ingain=1&
		outgain=1
		
                qmp_EXEC_auDio.php?
		asteriskip=http://208.80.180.209:8008
		filepath=dacx/var/ameyo/dacxdata/voicelogs/2014-08-11/EBDCarandang/5202698633_EBDCarandang_2014-08-11-17-53-18
		recording_file_url=https://208.80.180.209:8080/web/vl//dacx/var/ameyo/dacxdata/voicelogs/2014-08-11/EBDCarandang/5202698633_EBDCarandang_2014-08-11-17-53-18.wav		
		*/
		$build_filepath = "/".$filepathnowav;
		
		echo dirname(__FILE__) . '<br/><br/>';
		echo "$asteriskip/dacx/fileoperation?fileoperation=get&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver=$build_filepath&ingain=1&outgain=1";
		
		$FP=file_get_contents ( "$asteriskip/dacx/fileoperation?fileoperation=get&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver=$build_filepath&ingain=1&outgain=1",'r')  ;
		
			//**********echo "<br /><h4>".'/dacx/ameyo/acp/web/vl<h2>' . $filepath . '</h2>.wav'."</h4>";
		//dacx/var/ameyo/dacxdata/voicelogs/2014-08-10/EBDZamora/61894466577_EBDZamora_2014-08-10-23-04-07
		    echo '<br /><br />fopen value ' .$FP;

		if (!$FP) {
		    echo "<p>Unable to open remote file for writing.\n";
		}
		    exit;
		//var_dump(ini_get('allow_url_fopen'));
		//fopen value Resource id #182
		if($FP) {
		$path = dirname(__FILE__) . $build_filepath;
		
		if(!mkdir($path, 0777, true)) {
		    echo "<br /><br />Failure";
		} else {
		    echo "<br /><br />Success";
		}			
			//**********echo "<br />it opened!";

				/*
			$dirs = explode(DIRECTORY_SEPARATOR , $build_filepath);
			$count = count($dirs);
			$path = 'vl/';
			for ($i = 0; $i < $count - 1 ; ++$i) {
				echo '</br>'.$_SERVER['USER'] . ' ' .$dirs[$i];
				$path .= DIRECTORY_SEPARATOR . $dirs[$i];
				mkdir($path, 0777) ;
				
				$res = mkdir($path, 0777) ;
				
				if ($res == 1) {
				    echo "<br /><br /><font color=green>" . "" . "</font>created";
				} else {
				    echo "<br /><br /><font color=red>" . "" . "</font>failed";
				}			
			}
				*/
			/*
                        echo "<br /><br />".$path . '';

			$dirPath = "/dacx/ameyo/acp/web/vl".$build_filepath;
			    //echo "<br /><br /><font color=red>" .$dirPath."</font>";
			$dirPath = "/dacx/ameyo/acp/web/vl/dacx/var/ameyo/dacxdata/voicelogs/2014-08-10/EBDZamora";
			$result = mkdir($dirPath, 0777);
			
			echo "<br /><br />".SF_ROOT_DIR;
			
			if ($result == 1) {
			    echo "<br /><br /><font color=green>" . $dirPath . "</font> has been created";
			} else {
			    echo "<br /><br /><font color=red>" . $dirPath . "</font> has NOT been created";
			}			

			if(!mkdir()) {
			    print_r(error_get_last());
			}			
			*/

            //echo '<p>&nbsp;</p>vl' . $filepath . '.wav';
			//!!$FP1=fopen ('vl' . $filepath . '.wav' ,'w')  ;
			
			//!!$FP1=fopen ('/dacx/ameyo/acp/web/vl' . $filepath . '.wav' ,'w')  ;
			//'dacx/var/ameyo/dacxdata/voicelogs/2014-08-08/Danielle_Hira/16042736735_Danielle_Hira_2014-08-08-15-34-12.wav'
		        //filepath = /dacx/var/ameyo/dacxdata/voicelogs/2014-08-08/EBDCarandang/9493505486_EBDCarandang_2014-08-08-13-27-25
			
			// ! ! !$FP1=fopen ('vl/' . $build_filepath . '.wav' ,'w')  ;
			
			
			//$FP1=fopen ('vl/' . $filepath . '' ,'w')  ;
                        //!!echo "<br /><br />".'vl/' . $build_filepath . '.wav';
			
			
			// https://208.80.180.209:8080/web/vl//dacx/var/ameyo/dacxdata/voicelogs/2014-01-24/Janice_Hira/12133812861_Janice_Hira_2014-01-24-14-49-34.wav
			/*
			$fileToWrite = '/dacx/ameyo/acp/web/vl' . $filepath . '.wav';
			if (!is_writable($fileToWrite)) { // Test if the file is writable
				echo "<hr color=red>"."Cannot write {$fileToWrite}<p>&nbsp;</p>";
				//exit;
			}
			*/

			// ! ! !if ($FP1 == null)
			// ! ! !{
			    //this might be symfony2 class or function comment out this line
				//throw new Exception(voicelog_lang::getLocalizedString("Test")) ;
			//**********echo "<br />FP1";
                        //****echo "<br /><br /> NO".'vl/' . $filepath . '.wav';
			//!!echo 'wav not exists';
			
			// ! ! !}
			// ! ! !while (!feof($FP))
			// ! ! !{
			// ! ! !	$line=fread($FP,4096) ;
			// ! ! !	fwrite($FP1,$line) ;
			// ! ! !}
			fclose($FP) ;
		}
		//!!echo "<audio src='/web/vl/$build_filepath.wav' controls autoplay>";
		//!!echo "<EMBED SRC='/web/vl/$build_filepath.wav' autostart='true' loop='false' volume='100' ></EMBED>";
		//!!echo "</audio>";

		
		}
     }
		
		/*
		echo "<audio src='$recording_file_url' controls autoplay>";
		echo "<EMBED SRC='$recording_file_url' autostart='true' loop='false' volume='100' ></EMBED>";
		echo "</audio>";
		*/
	//---------------------------------------------------------------

?>
