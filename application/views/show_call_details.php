<link href="<?php echo base_url();?>skin/premium-pixels/premium-pixels.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>js/191jquery.min.js"></script>
<--script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script-->
<script type="text/javascript" src="<?php echo base_url();?>jQplay/jquery.jplayer.min.js"></script>

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                <?php
                /*
                  <div class="col-md-3">
                      <section class="panel">
                          <div class="panel-body">
                              <input type="text" placeholder="Keyword Search" class="form-control">
                          </div>
                      </section>
                      <section class="panel">
                          <header class="panel-heading">
                              Category
                          </header>
                          <div class="panel-body">
                              <ul class="nav prod-cat">
                                  <li>
                                      <a href="#" class="active"><i class=" icon-angle-right"></i> Dress</a>
                                      <ul class="nav">
                                          <li class="active"><a href="#">- Shirt</a></li>
                                          <li><a href="#">- Pant</a></li>
                                          <li><a href="#">- Shoes</a></li>
                                      </ul>
                                  </li>
                                  <li><a href="#"><i class=" icon-angle-right"></i> Bags & Purses</a></li>
                                  <li><a href="#"><i class=" icon-angle-right"></i> Beauty</a></li>
                                  <li><a href="#"><i class=" icon-angle-right"></i> Coat & Jacket</a></li>
                                  <li><a href="#"><i class=" icon-angle-right"></i> Jeans</a></li>
                                  <li><a href="#"><i class=" icon-angle-right"></i> Jewellery</a></li>
                                  <li><a href="#"><i class=" icon-angle-right"></i> Electronics</a></li>
                                  <li><a href="#"><i class=" icon-angle-right"></i> Sports</a></li>
                                  <li><a href="#"><i class=" icon-angle-right"></i> Technology</a></li>
                                  <li><a href="#"><i class=" icon-angle-right"></i> Watches</a></li>
                                  <li><a href="#"><i class=" icon-angle-right"></i> Accessories</a></li>
                              </ul>
                          </div>
                      </section>
                      <section class="panel">
                          <header class="panel-heading">
                              Price Range
                          </header>
                          <div class="panel-body sliders">
                              <div id="slider-range" class="slider"></div>
                              <div class="slider-info">
                                  <span id="slider-range-amount"></span>
                              </div>
                          </div>
                      </section>
                      <section class="panel">
                          <header class="panel-heading">
                              Best Seller
                          </header>
                          <div class="panel-body">
                              <div class="best-seller">
                                  <article class="media">
                                      <a class="pull-left thumb p-thumb">
                                          <img src="img/product1.jpg">
                                      </a>
                                      <div class="media-body">
                                          <a href="#" class=" p-head">Item One Tittle</a>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                      </div>
                                  </article>
                                  <article class="media">
                                      <a class="pull-left thumb p-thumb">
                                          <img src="img/product2.png">
                                      </a>
                                      <div class="media-body">
                                          <a href="#" class=" p-head">Item Two Tittle</a>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                      </div>
                                  </article>
                                  <article class="media">
                                      <a class="pull-left thumb p-thumb">
                                          <img src="img/product3.png">
                                      </a>
                                      <div class="media-body">
                                          <a href="#" class=" p-head">Item Three Tittle</a>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                      </div>
                                  </article>
                              </div>
                          </div>
                      </section>
                  </div>
                */
                ?>
                
                
                          <?php
                            //------------------------------------------ratings code------------------------------------------------
                            $JMPurl = $this->config->item('qmp_url')."/index.php/crmcontroller/search_call_list";
                            $call_id = $this->input->get_post('call_id', TRUE);
                            
                            /*
                            $yescounts = $this->show_call_model->qmp_getcountofquestions($call_id,1);
                            $nocounts = $this->show_call_model->qmp_getcountofquestions($call_id,2);
                            //Not Applicable
                            $nacounts = $this->show_call_model->qmp_getcountofquestions($call_id,3);
                            */
                            
                            
                              //trick by http://stackoverflow.com/questions/5614879/how-to-hide-the-divide-by-zero-exception-in-php
                            /*
                              if ( ($yescounts + $nocounts) == 0 )
                                            {
                                                     $sumofyesANDno = 0;
                                            }
                                            else
                                            {
                                                     //$sumofyesANDno = 0;
                                                     $sumofyesANDno = $yescounts / ($yescounts + $nocounts);
                                            }
                    
                            $percentcallqualityscore = ( (double)$sumofyesANDno  ) * 100 ;
                            $percentcallqualityscore = number_format($percentcallqualityscore, 2);
                            */
                            $yescounts = 0;$nocounts=0;$percentcallqualityscore=0;
                            
                            $rowPostAnswers = $this->show_call_model->get_ALLsurveysubquestions();
                            $hlduser_id = $this->show_call_model->qmp_get_user_id($call_id);
                            $campaignid = $this->show_call_model->qmp_get_campaign_id($call_id);
                            
                            //echo $hlduser_id . " " . $campaignid;
                            
                            if (isset($_POST['btn_clearrating'])) {
                                 $getRatedUsers = $this->show_call_model->qmp_RevertRatedUser($call_id,$campaignid);
                                
                                 $this->show_call_model->qmp_clearratings($call_id,$hlduser_id);
                                                    //function for updating qmp_rating.rateduser to '_r', meaning questions are not assigned to ratings
                                                    //$this->show_call_model->qmp_updateratingQuestionState($valR['categoryid'],'_r');
                                                $rowRatedUsers = $getRatedUsers ? count($getRatedUsers) : 0;
                                                if ( $rowRatedUsers ) :
                                                  foreach( $getRatedUsers as $getRowRatedUsers ) :
                                                     $this->show_call_model->qmp_updateratingQuestionState($getRowRatedUsers['categoryid'],'_r');
                                                endforeach;
                                               endif;
                                 //reset the main table to zero
	                         $this->show_call_model->updateLISTqmp_qualityscore("0.00",$call_id,$hlduser_id);
                            }

                            if (isset($_POST['btnRate']))
                            {
                                //$this->show_call_model->qmp_clearratings($call_id);
                                    //echo "isset submit";
                                               $rowPost = $rowPostAnswers ? count($rowPostAnswers) : 0;
                                               if ( $rowPost ) :
                                               //cleanup 1st
                                               
                                                foreach( $rowPostAnswers as $valR ) :
                                                
                                                 if (isset($_REQUEST["rdo".$valR['categoryid'].""]))
                                                 {
                                                    $postrdo = $_REQUEST["rdo".$valR['categoryid'].""];
                                                    //echo $postrdo."</br>";
                                                    //perform check insert
                                                    
                                                    /* IF 1 existing skip insert 13 Aug 2014 �yan
                                                     **
                                                     **/
                                                    //---------------------------------------------------------------------------------------------------------------
                                                    /*
                                                    $verify = $this->show_call_model->checkqmp_postratingEXIST($call_id,$postrdo,$hlduser_id); // . '<br/>';
                                                    if ($verify == "1")
                                                     {
                                                      //echo 'skip ins <br/>';
                                                      $this->show_call_model->updqm_postrating($call_id,$postrdo,$hlduser_id);
                                                     }
                                                     else{
                                                      //echo  $this->show_call_model->updqm_postrating($call_id,$postrdo,$hlduser_id) .' ins <br/>';
                                                     }
                                                    */
                                                    //---------------------------------------------------------------------------------------------------------------
                                                      $this->show_call_model->qmp_add_radio_questions($campaignid,$call_id,$postrdo,$hlduser_id);
                                                     
                                                    //function for updating qmp_rating.rateduser to 'A', meaning questions are assigned to ratings
                                                    $this->show_call_model->qmp_updateratingQuestionState($valR['categoryid'],'A');
                                                 }
                                                  
                                                endforeach;
                                               endif;
                                //!!$this->show_call_model->qmp_check_exists_call_id($call_id,$hlduser_id,$yescounts,$nocounts,$percentcallqualityscore);
                                $this->show_call_model->qmp_update_qualityscore_call_id($call_id,$hlduser_id);
                            }
                            
			if ( strlen($call_id) < 3 )
			  {
									if ($JMPurl <> "") {
										if (!EW_DEBUG_ENABLED && ob_get_length())
											ob_end_clean();
										header("Location: " . $JMPurl);
									}
									exit();
			  }
                        $asteriskip = $this->show_call_model->qmp_asterisk_ip();
                        //echo $asteriskip;
                        $filepath = $this->show_call_model->qmp_showfilepath($call_id);
                        //echo '<br />' . $filepath;
                        $recording_file_url = $this->show_call_model->qmp_showrecordurl($call_id);
                        //echo '<br />' . $recording_file_url . " here";
                        
                            //------------------------------------------get Call Details Fields------------------------------------------------
                                              $quedetails = $this->show_call_model->qmp_call_details(  $call_id);
                                               $subdetails = $quedetails ? count($quedetails) : 0;
                                               if ( $subdetails ) :
                                                foreach( $quedetails as $squedetails ) :
                                                  $qmp_call_id = $squedetails['call_id'];
                                                  $qmp_calldate = $squedetails['calldate'];
                                                  $qmp_calltime = $squedetails['calltime'];
                                                  $qmp_processname = $squedetails['processname'];
                                                  $qmp_campaign_name = $squedetails['campaign_name'];
                                                  $qmp_phone = $squedetails['phone'];
                                                  $qmp_customer_id = $squedetails['customer_id'];
                                                  $qmp_call_type = $squedetails['call_type'];
                                                  $qmp_system_disposition = $squedetails['system_disposition'];
                                                  $qmp_hangup_first = $squedetails['hangup_first'];
                                                  $qmp_user_id = $squedetails['user_id'];
                                                  $qmp_disposition_code = $squedetails['disposition_code'];
                                                  $qmp_transfer_to = $squedetails['transfer_to'];
                                                  $qmp_setup_time = $squedetails['setup_time'];
                                                  $qmp_ringing_time = $squedetails['ringing_time'];
                                                  $qmp_calltime = $squedetails['calltime'];
                                                  $qmp_wrap_time = $squedetails['wrap_time'];
                                                  $qmp_percentqualityscore = $squedetails['percentqualityscore'];
                                                  $qmp_partialdate = $squedetails['partialdate'];
                                                endforeach;
                                               endif;
                            //------------------------------------------get Call Details Fields------------------------------------------------
                        
                            //------------------------------------------file jQuery player code------------------------------------------------
                            define('SF_ROOT_DIR',    realpath(dirname(__FILE__).'/../../..'));
                            define('SF_APP',         'system');
                            define('SF_ENVIRONMENT', 'prod');
                            define('SF_DEBUG',       false);
                            //echo SF_ROOT_DIR;
                            $filepathnowav = str_replace(".wav","",$filepath);
                            $build_filepath = "/".$filepathnowav;
                            $base_filepath= basename($build_filepath);
                            $ingain=1;
                            $outgain=1;
                            //$_SESSION['purge_userDIR'] = $qmp_partialdate . "/" . $hlduser_id;
                            //echo $_SESSION['purge_userDIR'];
                            $purge_userDIR = $qmp_partialdate . "/" . $hlduser_id;
                            //$this->session->set_userdata('purge_userDIR',$purge_userDIR);
                            $this->session->set_userdata( array(
                                    'purge_userDIR'=>$purge_userDIR
                                )
                            );
                            
                            if ($_SERVER['SERVER_ADDR']<>"127.0.0.1")
                            {
                            //echo SF_ROOT_DIR.DIRECTORY_SEPARATOR.'cache/system/prod/config/voicelog_cache.php';    
                
                            }
                            
                            $hldmessage = "<strong>".$this->session->userdata('user_id')."</strong> is rating ".$call_id ." made by <strong>".$hlduser_id."</strong>";
                            if ($this->session->userdata('user_id') == $hlduser_id) 
                               { $hldmessage = "<strong>".$hlduser_id."</strong> is viewing ".$call_id;
                                   }                            
                            
                            //------------------------------------------file jQuery player code------------------------------------------------
                            
                          ?>
                
                            <script type="text/javascript">
                                    //<![CDATA[
                            $(document).ready(function(){
                            <?php
                            /*
                            $("#exec_audio").load("qmp_EXEC_auDio.php?asteriskip=$asteriskip&filepath=$filepath&recording_file_url=$recording_file_url");
                            */
                            ?>
                            $('#exec_audio').attr('src', 'https://208.80.180.209:8080/web/system.php/voicelogs/play?filepath=<?php echo $build_filepath?>&filename=<?php echo $base_filepath?>&asteriskip=208.80.180.209&callhistoryid=<?php echo $call_id?>&ingain=1&outgain=1&userId=timothy&login_id=timothy&login_password=timothy&fromqmp=yes');
                                
                            
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
                                            swfPath: "<?php echo base_url();?>jQplay",
                                            supplied: "wav, m4a, oga",
                                            cssSelectorAncestor: "#jp_container_2",
                                            wmode: "window",
                                            smoothPlayBar: true,
                                            keyEnabled: true
                                    });
                            });
                            //]]>
                            </script>                          

                            <SCRIPT>
                            function qmp_openwindow()
                            {
                                    window.open("https://208.80.180.209:8080/web/system.php/voicelogs/play?filepath=<?php echo $build_filepath?>&filename=<?php echo $base_filepath?>&asteriskip=208.80.180.209&callhistoryid=<?php echo $call_id?>&ingain=1&outgain=1&userId=SankashSupervisor&login_id=SankashSupervisor&login_password=SankashSupervisor&fromqmp=yes","mywindow","scrollbars=no,titlebar=no,copyhistory=no,toolbar=no,location=no,status=no,menubar=no,resizable=no,width=450,height=450");
                            }
                            </SCRIPT>

                  
                  <div class="col-md-12">

                      <section class="panel">
                          <div class="panel-body">
                              <div class="col-md-6">
                                     <?php
                                      /*
                                      jQuery Player here
                                      <img src="img/product-list/pro-thumb-big.jpg" alt=""/>
                                  <div class="pro-img-details">
                                      */
                                      ?>
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
                                        
                                  <?php
                                  /*
                                  <div class="product_meta">
                                      <span class="posted_in"> <strong>Categories:</strong> <a rel="tag" href="#">Jackets</a>, <a rel="tag" href="#">Men</a>, <a rel="tag" href="#">Shirts</a>, <a rel="tag" href="#">T-shirt</a>.</span>
                                      <span class="tagged_as"><strong>Tags:</strong> <a rel="tag" href="#">mens</a>, <a rel="tag" href="#">womens</a>.</span>
                                  </div>
                                  <div class="m-bot15"> <strong>Price : </strong> <span class="amount-old">$544</span>  <span class="pro-price"> $300.00</span></div>
                                  </div>
                                  */
                                  ?>
                                        
                                      
                                  <!--div class="pro-img-list">
                                      <a href="#">
                                          <img src="img/product-list/pro-thumb-1.jpg" alt="">
                                      </a>
                                      <a href="#">
                                          <img src="img/product-list/pro-thumb-2.jpg" alt="">
                                      </a>
                                      <a href="#">
                                          <img src="img/product-list/pro-thumb-3.jpg" alt="">
                                      </a>
                                      <a href="#">
                                          <img src="img/product-list/pro-thumb-1.jpg" alt="">
                                      </a>
                                  </div-->
                              </div>
                              <div class="col-md-6">
                                  <?php
                                  /*
                                  <h4 class="pro-d-title">
                                      <a href="#" class="">
                                          Call ID
                                      </a>
                                  </h4>
                                  */
                                  ?>
                                  <p>
                                      <?php echo $hldmessage?>&nbsp;&nbsp;&nbsp;&nbsp;
                                  </p>
                                  <?php
                                  /*
                                  <div class="product_meta">
                                      <span class="posted_in"> <strong>Categories:</strong> <a rel="tag" href="#">Jackets</a>, <a rel="tag" href="#">Men</a>, <a rel="tag" href="#">Shirts</a>, <a rel="tag" href="#">T-shirt</a>.</span>
                                      <span class="tagged_as"><strong>Tags:</strong> <a rel="tag" href="#">mens</a>, <a rel="tag" href="#">womens</a>.</span>
                                  </div>
                                  <div class="m-bot15"> <strong>Price : </strong> <span class="amount-old">$544</span>  <span class="pro-price"> $300.00</span></div>
                                  <div class="form-group">
                                      <label>Quantity</label>
                                      <input type="quantiy" placeholder="1" class="form-control quantity">
                                  </div>
                                      <button class="btn btn-round btn-danger" type="button"><i class="icon-shopping-cart"></i> Return to List</button>
                                  */
                                  ?>
                                  <p>
                                      <button id="btn_list" class="btn btn-info "><i class="icon-refresh"></i> To Call List</button>
                                      <a class="btn btn-danger" data-toggle="modal" href="#myModal">Audio is not playing</a>
                                  </p>
                                          <!--a class="btn btn-danger" data-toggle="modal" href="#myModal">
                                              Audio Not Playing
                                          </a-->
                                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                          <h4 class="modal-title">Audio is not playing</h4>
                                                      </div>
                                                      <div class="modal-body">
                                                        <img src="<?php echo base_url(); ?>img/proceed.PNG" /><br />
                                                          The audio resides on a secure server and you need to accept the certificate
                                                          on your browser.  This step will open a page on new tab or window (depending on
                                                          your setting).
                                                          <br />
                                                          <br />
                                                          <strong>Once you have accepted the certificate, it will refresh a blank page</strong>.
                                                          You can then close that window.  And continue browsing this site.
                                                          <br />
                                                          <br />
                                                          When you are ready to do so, click <a href="javascript: qmp_openwindow();" >here</a>.
                                                      </div>
                                                      <div class="modal-footer">
                                                          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                          <!--button class="btn btn-success" type="button">Save changes</button-->
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>                              
                              </div>

                          <!--div class="panel-body"-->
                              <div class="col-sm-6">
                                <section class="panel">
                                <table class="table table-hover">
                                        <!--thead>
                                        <tr>
                                                <th>Q id</th>
                                                <th>Questions</th>
                                        </tr>
                                        </thead-->
                                        <tbody>
                                        <tr>
                                                <td><strong>Call ID</strong></td>
                                                <td><?php echo $qmp_call_id;?></td>
                                        </tr>
                                        <tr>
                                                <td><strong>Call Date</td>
                                                <td><?php echo $qmp_calldate;?></td>
                                        </tr>
                                        <tr>
                                                <td><strong>Call Time</strong></td>
                                                <td><?php echo $qmp_calltime;?></td>
                                        </tr>
                                        <tr>
                                                <td><strong>Process Name</strong></td>
                                                <td><?php echo $qmp_processname;?></td>
                                        </tr>
                                        <tr>
                                                <td><strong>Campaign Name</strong></td>
                                                <td><?php echo $qmp_campaign_name;?></td>
                                        </tr>
                                        <tr>
                                                <td><strong>Phone</strong></td>
                                                <td><?php echo $qmp_phone;?></td>
                                        </tr>
                                        <tr>
                                                <td><strong>Customer ID</strong></td>
                                                <td><?php echo $qmp_customer_id;?></td>
                                        </tr>
                                        <tr>
                                                <td><strong>Call Type</strong></td>
                                                <td><?php echo $qmp_call_type;?></td>
                                        </tr>
                                        <tr>
                                                <td><strong>System Disposition</strong></td>
                                                <td><?php echo $qmp_system_disposition;?></td>
                                        </tr>
                                        </tbody>
                                </table>
                                </section>
                              </div>
                              
                              
                              <div class="col-sm-6">
                                <section class="panel">
                                <table class="table table-hover">
                                        <!--thead>
                                        <tr>
                                                <th>Q id</th>
                                                <th>Questions</th>
                                        </tr>
                                        </thead-->
                                        <tbody>
                                        <tr>
                                                <td><strong>Hangup First</strong></td>
                                                <td><?php echo $qmp_hangup_first;?></td>
                                        </tr>
                                        <tr>
                                                <td><strong>User ID</strong></td>
                                                <td><?php echo $qmp_user_id;?></td>
                                        </tr>
                                        <tr>
                                                <td><strong>Disposition Code</strong></td>
                                                <td><?php echo $qmp_disposition_code;?></td>
                                        </tr>
                                        <tr>
                                                <td><strong>Transfer To</strong></td>
                                                <td><?php echo $qmp_transfer_to;?></td>
                                        </tr>
                                        <tr>
                                                <td><strong>Setup Time</strong></td>
                                                <td><?php echo $qmp_setup_time;?></td>
                                        </tr>
                                        <tr>
                                                <td><strong>Ringing Time</strong></td>
                                                <td><?php echo $qmp_ringing_time;?></td>
                                        </tr>
                                        <tr>
                                                <td><strong>Call Time</strong></td>
                                                <td><?php echo $qmp_calltime;?></td>
                                        </tr>
                                        <tr>
                                                <td><strong>Wrap Time</strong></td>
                                                <td><?php echo $qmp_wrap_time;?></td>
                                        </tr>
                                        <tr>
                                                <td><strong>Percent Quality Score</strong></td>
                                                <td><?php echo $qmp_percentqualityscore;?></td>
                                        </tr>
                                        </tbody>
                                </table>
                                </section>
                              </div>
                              
                          <!--/div-->
                      
                              
                          </div>
                          
                      </section>
                      
                      

                      <?php if($max_posts == 0):?>
                      <section class="panel">
                          <header class="panel-heading tab-bg-dark-navy-blue">
                              <ul class="nav nav-tabs ">
                                  <li class="active">
                                      <a data-toggle="tab" href="#description">
                                          No Survey Forms
                                      </a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content tasi-tab">
                                  <div id="description" class="tab-pane active">
                                      <!--h4 class="pro-d-head">Product Description</h4-->
                                      <p> No call survey has been prepared please contact your administrator. </p>
                                  </div>
                              </div>
                          </div>
                      </section>
                      <?php else:?>
                      <section class="panel">
                          <header class="panel-heading tab-bg-dark-navy-blue">
                              <ul class="nav nav-tabs ">
                                <?php $i=0;
                                foreach( $items as $item ):
                                $activeclass="";
                                if ($i==0) {$activeclass='class="active"';}
                                ?>
                                  <li <?php echo $activeclass; ?>>
                                      <a data-toggle="tab" href="#camp<?php echo $item['campaignid']; ?>">
                                           <?php echo $item['campaigname']; ?>
                                      </a>
                                  </li>
                                <?php $i+=1;endforeach;?>
                              </ul>
                          </header>
                          
                          
                          
                          
                         <form accept-charset="utf-8" action="<?php echo $_SESSION['host_']?>index.php/crmcontroller/search_call_details/" class="form-horizontal tasi-form" id="tab" method="POST">
                            <input type="hidden" name="campaignid" value="<?php echo $campaignid ?>" />
                            <input type="hidden" name="rateduser" value="<?php echo $hlduser_id ?>" />
                            <input type="hidden" name="call_id" value="<?php echo $call_id ?>" />
                         
                          <div class="panel-body">
                          
                              <div class="tab-content tasi-tab">
                                    <!--div class="row">
                                        <div class="col-lg-12">
                                                <section class="panel">
                                                        <header class="panel-heading">Please select questions below.  Or click <button id="btn_assigned" class="btn btn-info "><i class="icon-refresh"></i> Rate</button> to view assigned questions to campaigns.</header>
                                                </section>
                                        </div>
                                    </div-->
                                    <table cellpadding="0" cellspacing="0" border="0" id="hidden-table-info">
                                        <tr>
                                             <td colspan="12">
                                                        <?php					  
                                                            //if (CurrentUserID() != $hlduser_id) { 
                                                             $disrdo = "disabled";
                                                         if ($this->session->userdata('userlevel') > 1 || $this->session->userdata('userlevel') == -1) {
                                                             $disrdo = "";
                                                            ?>                                                
                                                        <button id="btn_rate" name="btnRate" class="btn btn-info "><i class="icon-refresh"></i> Rate</button>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                        <button name="btn_clearrating" id="qmp_btnRestart" OnClick="return confirm('Are you sure you want to clear ratings for <?php echo $call_id ?> made by <?php echo $hlduser_id?>?');" type="submit" class="btn btn-primary ewButton">Reset</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <?php } ?>	                                                        
                                             </td>
                                            
                                        </tr>
                                    </table>
                                    
                                    <?php $i=0;
                                    
                                $rowratingselection =  $this->show_call_model->get_rowratingselection();   
                                
                                foreach( $items1 as $item1 ):
                                $activeclass="";
                                if ($i==0) {$activeclass='active';}
                                    ?>                                
                                  <div id="camp<?php echo $item1['campaignid']; ?>" class="tab-pane <?php echo $activeclass; ?>">
                                    <!--table cellpadding="0" cellspacing="0" border="0" id="hidden-table-info"-->
                                    <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                    <th>&nbsp;</th>
                                                    <th>0&nbsp;</th>
                                                    <th>1&nbsp;</th>
                                                    <th>2&nbsp;</th>
                                                    <th>3&nbsp;</th>
                                                    <th>4&nbsp;</th>
                                                    <th>5&nbsp;</th>
                                                    <th>6&nbsp;</th>
                                                    <th>7&nbsp;</th>
                                                    <th>8&nbsp;</th>
                                                    <th>9&nbsp;</th>
                                                    <th>10&nbsp;</th>
                                            </tr>
                                            </thead>
                                            <tbody>                                        
                                    <?php
                                           $query = $this->surveyform_model->get_questionsundercampaign($item1['campaignid']);
                                           $subquestions = $query ? count($query) : 0;
                                           if ( $subquestions ) :
                                            foreach( $query as $squestions ) :
                                    ?><tr>
                                      <td colspan="12"><h4 class="pro-d-head"><?php echo $squestions['ratingtopic']; ?></h4></td>
                                      </tr>
                                    <?php
                                          //-------------------------loop questions here-------------------------
                                          $selectionid = 0;
                                              $que = $this->surveyform_model->get_questionsundertopic(  $squestions['topic_id']);
                                               $subque = $que ? count($que) : 0;
                                               if ( $subque ) :
                                                foreach( $que as $sque ) :
                                                $categoryid = $sque['categoryid'];
                                                //$topic_category = $sque['categoryid'] . "," . $this->surveyform_model->get_topic_id($categoryid) . "," . $item1['campaignid'];
                                                $idradio = $sque['categoryid']; //. "" . $this->surveyform_model->get_topic_id($categoryid);
                                                $y = "rdo".$idradio;
                                                
                                                //$rowRating = $this->show_call_model->verify_qmp_postrating($call_id,$hlduser_id,$squestions['topic_id'],$sque['categoryid'],$selectionid);
                                    ?>
                                    <tr>
                                      <td><p> <?php echo $sque['category']; ?> &nbsp;</p></td>
                                      
                                    <?php
                                        $subratingselection = $rowratingselection ? count($rowratingselection) : 0;
                                        if ( $subratingselection ) :
					//foreach ($rowratingselection as $keyrs => $valrs)
                                        foreach( $rowratingselection as $srselect ) :
					  {
					   //qmp_viewratingtopic.topic_id , qmp_viewratingcategory.category_id, qmp_viewratingselection.selectionid
			                   //!!$valueOfrdo = $squestions['topic_id'].",".$sque['categoryid'].",".$srselect['ratingselectionid'];
                                           $valueOfrdo = $sque['categoryid'] . "," . $this->surveyform_model->get_topic_id($categoryid) . "," . $item1['campaignid']. "," . $srselect['ratingselectionid'];
					   //find if that exists on the qmp_rating
                                                     /* GUIDE old CODE do not remove
                                                      * 
			                   $valueOfrdo = $val[0].",".$val1[0].",".$valrs[0];
                                                      * 
							$rowRating = ew_Execute("select
							   QMP.topic_id||','||QMP.categoryid||','||ratingselectionid as rdovalue
							from qmp_rating QMP
							 WHERE QMP.call_id in ('".$call_id."')
							   and rateduser in ('".$hlduser_id."')
							   and topic_id in (".$val[0].")
							   and categoryid in (".$val1[0].")
							   and ratingselectionid in (".$valrs[0].")");
                                                     */
                                                        $rowRating = $this->show_call_model->verify_qmp_postrating($call_id,$hlduser_id,$this->surveyform_model->get_topic_id($categoryid),$sque['categoryid'],$srselect['ratingselectionid']);
							$ratedstr = "";
                                                                $rowRatingcount = $rowRating ? count($rowRating) : 0;
								//foreach ($rowRating as $keyss => $valss)
                                                                if ( $rowRatingcount ) :
                                                                foreach( $rowRating as $rowRatingRow ) :
								  {
								     if ($rowRatingRow['rdovalue']==$valueOfrdo) $ratedstr = "<img data-phrase=\"Ratedcall\" src=\"".base_url()."/assets/img/insert.gif\" style=\"width:16px; height:16px;\" width=\"16\" height=\"16\" style=\"border: 0;\" />";
								  }
                                                                endforeach;
                                                                endif;
				  ?>
				  <td><?php echo '<input '.$disrdo.' name="'.$y.'" id="'.$y.'" type="radio" value="'.$valueOfrdo.'" />'.$ratedstr; ?>&nbsp;</td>
				  <?php
					  }
                                        endforeach;
                                        endif;
                                    ?>
                                    </tr>
                                    <?php
                                                endforeach;
                                               endif;
                                    ?>
                                    <?php
                                          //-------------------------loop questions here-------------------------
                                            endforeach;
                                           endif;
                                    ?>
                                          </tbody>
					</table>
                                  </div>
                                    <?php
                                $i+=1;endforeach;                                           
                                    ?>

                                  <?php
                                  /*
                                  <div id="reviews" class="tab-pane">
                                      <article class="media">
                                          <a class="pull-left thumb p-thumb">
                                              <img src="img/avatar-mini.jpg">
                                          </a>
                                          <div class="media-body">
                                              <a href="#" class="cmt-head">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                              <p> <i class="icon-time"></i> 1 hours ago</p>
                                          </div>
                                      </article>
                                      <article class="media">
                                          <a class="pull-left thumb p-thumb">
                                              <img src="img/avatar-mini2.jpg">
                                          </a>
                                          <div class="media-body">
                                              <a href="#" class="cmt-head">Nulla vel metus scelerisque ante sollicitudin commodo</a>
                                              <p> <i class="icon-time"></i> 23 mins ago</p>
                                          </div>
                                      </article>
                                      <article class="media">
                                          <a class="pull-left thumb p-thumb">
                                              <img src="img/avatar-mini3.jpg">
                                          </a>
                                          <div class="media-body">
                                              <a href="#" class="cmt-head">Donec lacinia congue felis in faucibus. </a>
                                              <p> <i class="icon-time"></i> 15 mins ago</p>
                                          </div>
                                      </article>
                                  </div>
                                  */
                                  ?>
                              </div>
                          </div>
                         </form>
                      </section>
                      <?php endif;?>
                <?php
                /*
                      <div class="row product-list">
                          <div class="col-md-4">
                              <section class="panel">
                                  <div class="pro-img-box">
                                      <img src="img/product-list/pro-1.jpg" alt=""/>
                                      <a href="#" class="adtocart">
                                          <i class="icon-shopping-cart"></i>
                                      </a>
                                  </div>

                                  <div class="panel-body text-center">
                                      <h4>
                                          <a href="#" class="pro-title">
                                              Leopard Shirt Dress
                                          </a>
                                      </h4>
                                      <p class="price">$300.00</p>
                                  </div>
                              </section>
                          </div>
                          <div class="col-md-4">
                              <section class="panel">
                                  <div class="pro-img-box">
                                      <img src="img/product-list/pro1.jpg" alt=""/>
                                      <a href="#" class="adtocart">
                                          <i class="icon-shopping-cart"></i>
                                      </a>
                                  </div>

                                  <div class="panel-body text-center">
                                      <h4>
                                          <a href="#" class="pro-title">
                                              Leopard Shirt Dress
                                          </a>
                                      </h4>
                                      <p class="price">$300.00</p>
                                  </div>
                              </section>
                          </div>
                          <div class="col-md-4">
                              <section class="panel">
                                  <div class="pro-img-box">
                                      <img src="img/product-list/pro2.jpg" alt=""/>
                                      <a href="#" class="adtocart">
                                          <i class="icon-shopping-cart"></i>
                                      </a>
                                  </div>

                                  <div class="panel-body text-center">
                                      <h4>
                                          <a href="#" class="pro-title">
                                              Leopard Shirt Dress
                                          </a>
                                      </h4>
                                      <p class="price">$300.00</p>
                                  </div>
                              </section>
                          </div>

                      </div>
                  </div>
                  <div id="exec_audio" style="display:none;"></div>
                */
                ?>
                  
              </div>
                  <iframe id="exec_audio" name="exec_audio" frameborder="0" style="display:none;"></iframe>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
    <script>
        $(document).ready(function () {
            
           $("#btn_list").click(function(e){
                    $(location).attr('href', '<?php echo site_url();?>/crmcontroller/search_call_list');
                   });
                                            
        });
   </script>      

      <!--footer start-->
      <!--footer end-->



