<?php
		//echo $call_id;
//!!$qmpviewandrateuserlist_returnurl = 'qmp_viewandrateuserlist.php' . $_SESSION['qmpviewandrateuserlist_returnurl'];		
    //---------------------------------------------------------------code from actions.class.php slighly modified by ®yan™ 27 of 01 2014

$asteriskip = 'http://208.80.180.209:8008';

//$filepath = 'dacx/var/ameyo/dacxdata/voicelogs/2014-08-10/EBDZamora/61243339421_EBDZamora_2014-08-10-17-02-23';
                   //'"https://208.80.180.209:8080/web/vl//dacx/var/ameyo/dacxdata/voicelogs/2014-08-10/EBDZamora/61243339421_EBDZamora_2014-08-10-17-02-23.wav"'
$filepath = 'dacx/var/ameyo/dacxdata/voicelogs/2014-08-08/EBDCarandang/17743225046_EBDCarandang_2014-08-08-11-52-28.wav';
  //existing
  $filepath = 'dacx/var/ameyo/dacxdata/voicelogs/2014-08-08/EBDCarandang/9493505486_EBDCarandang_2014-08-08-13-27-25.wav';
  $filepath = 'dacx/var/ameyo/dacxdata/voicelogs/2014-08-08/Danielle_Hira/16042736735_Danielle_Hira_2014-08-08-15-34-12.wav';

  $filepathnowav = str_replace(".wav","",$filepath);
  echo $filepathnowav."<hr color=green>";
  
//$recording_file_url ='https://208.80.180.209:8080/web/vl//dacx/var/ameyo/dacxdata/voicelogs/2014-08-10/EBDZamora/61243339421_EBDZamora_2014-08-10-17-02-23.wav'; //here 
$recording_file_url = 'https://208.80.180.209:8080/web/vl//dacx/var/ameyo/dacxdata/voicelogs/2014-08-08/EBDCarandang/17743225046_EBDCarandang_2014-08-08-11-52-28.wav';

  //existing
  $recording_file_url = 'https://208.80.180.209:8080/web/vl//dacx/var/ameyo/dacxdata/voicelogs/2014-08-08/EBDCarandang/9493505486_EBDCarandang_2014-08-08-13-27-25.wav';
  $recording_file_url = 'https://208.80.180.209:8080/web/vl//dacx/var/ameyo/dacxdata/voicelogs/2014-08-08/Danielle_Hira/16042736735_Danielle_Hira_2014-08-08-15-34-12.wav';

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
  
*/

		define('SF_ROOT_DIR',    realpath(dirname(__FILE__).'/../../..'));
		define('SF_APP',         'system');
		define('SF_ENVIRONMENT', 'prod');
		define('SF_DEBUG',       false);

		
		$ingain=1;
		$outgain=1;
		if ($_SERVER['SERVER_ADDR']<>"127.0.0.1")
		{
			
		echo SF_ROOT_DIR.DIRECTORY_SEPARATOR."cache/system/prod/config/voicelog_cache.php";
		echo '<hr />this processed '."$asteriskip/dacx/fileoperation?fileoperation=get&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver=$filepathnowav&ingain=1&outgain=1";
			
		$vlCache=fopen(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'cache/system/prod/config/voicelog_cache.php','w');
		fprintf($vlCache,'<?php'."\n") ;
		fprintf($vlCache,"\$ingain=$ingain;\n") ;
		fprintf($vlCache,"\$outgain=$outgain;\n") ;
		fprintf($vlCache,'?' .'>'."\n") ;
		fclose($vlCache);
		$FP=fopen ( "$asteriskip/dacx/fileoperation?fileoperation=get&componentType=com-drishti-dacx-core-callmanager-asterisk-IAsteriskComponent&fileonserver=/$filepathnowav&ingain=1&outgain=1",'r')  ;
		
			echo "<br /><h4>".'/dacx/ameyo/acp/web/vl<h2>' . $filepath . '</h2>.wav'."</h4>";
		
		
		if($FP) {
			echo "<br />it opened!";
			$dirs = explode(DIRECTORY_SEPARATOR , $filepath);
			$count = count($dirs);
			$path = 'vl/';
			for ($i = 0; $i < $count - 1 ; ++$i) {
				$path .= DIRECTORY_SEPARATOR . $dirs[$i];
				mkdir($path, 0777) ;
			}

            //echo '<p>&nbsp;</p>vl' . $filepath . '.wav';
			//!!$FP1=fopen ('vl' . $filepath . '.wav' ,'w')  ;
			
			//!!$FP1=fopen ('/dacx/ameyo/acp/web/vl' . $filepath . '.wav' ,'w')  ;
			//'dacx/var/ameyo/dacxdata/voicelogs/2014-08-08/Danielle_Hira/16042736735_Danielle_Hira_2014-08-08-15-34-12.wav'
		        //filepath = /dacx/var/ameyo/dacxdata/voicelogs/2014-08-08/EBDCarandang/9493505486_EBDCarandang_2014-08-08-13-27-25
			
			$FP1=fopen ('vl/' . $filepath . '' ,'w')  ;
			
			
			//$FP1=fopen ('vl/' . $filepath . '' ,'w')  ;

			
			
			// https://208.80.180.209:8080/web/vl//dacx/var/ameyo/dacxdata/voicelogs/2014-01-24/Janice_Hira/12133812861_Janice_Hira_2014-01-24-14-49-34.wav
			/*
			$fileToWrite = '/dacx/ameyo/acp/web/vl' . $filepath . '.wav';
			if (!is_writable($fileToWrite)) { // Test if the file is writable
				echo "<hr color=red>"."Cannot write {$fileToWrite}<p>&nbsp;</p>";
				//exit;
			}
			*/

			if ($FP1 == null)
			{
			    //this might be symfony2 class or function comment out this line
				//throw new Exception(voicelog_lang::getLocalizedString("Test")) ;
			echo "<br />FP1";
			}
			while (!feof($FP))
			{
				$line=fread($FP,4096) ;
				fwrite($FP1,$line) ;
			}
			fclose($FP) ;
		}
		}
		/*
		echo "<audio src='$recording_file_url' controls autoplay>";
		echo "<EMBED SRC='$recording_file_url' autostart='true' loop='false' volume='100' ></EMBED>";
		echo "</audio>";
		*/
	//---------------------------------------------------------------

?>
 <link href="http://208.80.180.209:8786/qmp/skin/premium-pixels/premium-pixels.css" rel="stylesheet" type="text/css" />
 <script src="http://208.80.180.209:8786/qmp/js/191jquery.min.js"></script>
 <script type="text/javascript" src="http://208.80.180.209:8786/qmp/jQplay/jquery.jplayer.min.js"></script>


<script type="text/javascript">
	//<![CDATA[
$(document).ready(function(){

	$("#jquery_jplayer_2").jPlayer({
		ready: function () {
			$(this).jPlayer("setMedia", {
			   <?php
				//wav: "https://208.80.180.209:8080/web/vl//dacx/var/ameyo/dacxdata/voicelogs/2013-08-26/pedrito_arbilon/19729260909_pedrito_arbilon_2013-08-26-12-02-48.wav"
				//wav: "https://208.80.180.209:8080/web/vl//dacx/var/ameyo/dacxdata/voicelogs/2013-10-18/Victor_Hira/01135321902126_Victor_Hira_2013-10-18-04-30-41.wav"
				//m4a: "http://www.jplayer.org/audio/m4a/Miaow-02-Hidden.m4a"
			   ?>
				wav: "<?php echo $recording_file_url;?>"
			});
		},
		play: function() { // To avoid multiple jPlayers playing together.
			$(this).jPlayer("pauseOthers");
		},
		swfPath: "js",
		supplied: "wav, m4a, oga",
		cssSelectorAncestor: "#jp_container_2",
		wmode: "window",
		smoothPlayBar: true,
		keyEnabled: true
	});
});
//]]>
</script>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
 <input type="hidden" name="campaignid" value="<?php echo $_SESSION['qmp_campaign_id'] ?>" />
 <input type="hidden" name="rateduser" value="<?php echo $hlduser_id ?>" />
 <input type="hidden" name="call_id" value="<?php echo $call_id ?>" />

<?php
 ?>

 		<table style="">
		  <td>

				<div id="jquery_jplayer_2" class="jp-jplayer"></div>

				<div id="jp_container_2" class="jp-audio">
					<div class="jp-type-single">
						<div class="jp-gui jp-interface">
							<ul class="jp-controls">
								<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
								<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
								<li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
								<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
								<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
								<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
							</ul>
							<div class="jp-progress">
								<div class="jp-seek-bar">
									<div class="jp-play-bar"></div>

								</div>
							</div>
							<div class="jp-volume-bar">
								<div class="jp-volume-bar-value"></div>
							</div>
							
							<ul class="jp-toggles">
								<li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
								<li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
							</ul>
						</div>

						
						<div class="jp-no-solution">
							<span>Update Required</span>
							To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
						</div>
					</div>
				</div>
		  
		  </td>
		  <td>
		  <?php echo $hldmessage?>&nbsp;&nbsp;&nbsp;&nbsp;
		  </td>
		</table>
</form> 

	  
 <script>
     $(document).ready(function () {
	 var number = 1 + Math.floor(Math.random() * 1000);
				    //var btnclicked = $(this).attr("id");
					//		if (btnclicked == 'qmp_btnCancel') 
			$("#qmp_btnCancel,#qmp_btnCancel1").on("click", function () {
			//alert('qmp_settingslist.php?setting_id='+number);
                 //$(location).attr('href', 'qmp_viewandrateuserlist.php?call_id='+number);
                 $(location).attr('href', '<?php echo $qmpviewandrateuserlist_returnurl; ?>');

					//parent.history.back();
							return false;				 
			});					
     });
</script>

      <?php /*----------------------------- */ ?>
	  
	  <?php /*----------------------------- */ ?>
	  
      <!--div class="tab-pane fade" id="profile">
    <form id="tab2">
        <label>New Password</label>
        <input type="password" class="input-xlarge">
        <div>
            <button class="btn btn-primary">Update</button>
        </div>
    </form>
      </div-->
  </div>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-danger" data-dismiss="modal">Delete</button>
    </div>
</div>

        </div>
    </div>
    
		<script type="text/javascript">

		// Write your table-specific startup script here
		// document.write("page loaded");

        </script>

		
    <!-- end of the document so the pages load faster -->
    <script src="lib/bootstrap/js/bootstrap.js"></script>
  </body>
</html>