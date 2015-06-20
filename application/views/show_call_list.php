<?php //include('templates/header.php'); ?>
        <!--script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script-->
        <script src="<?php echo base_url();?>js/191jquery.min.js"></script> 
	
        <!--link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="screen"/-->	
	    <script src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>
        <!--script src="//cdn.datatables.net/1.10.1/js/jquery.dataTables.js"></script--> 


      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
			  <?php
			  /*
              <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="#"><i class="icon-home"></i> Home</a></li>
                          <li><a href="#">Library</a></li>
                          <li class="active">Data</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
	      
             <div class="row">

                 <div class="col-lg-6">
                      <div id="accordion" class="panel-group m-bot20">
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h4 class="panel-title">
                                      <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle">
                                          Collapsible Group Item #1
                                      </a>
                                  </h4>
                              </div>
                              <div class="panel-collapse collapse in" id="collapseOne">
                                  <div class="panel-body">
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  </div>
                              </div>
                          </div>
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h4 class="panel-title">
                                      <a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle">
                                          Collapsible Group Item #2
                                      </a>
                                  </h4>
                              </div>
                              <div class="panel-collapse collapse" id="collapseTwo">
                                  <div class="panel-body">
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  </div>
                              </div>
                          </div>
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h4 class="panel-title">
                                      <a href="#collapseThree" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle">
                                          Collapsible Group Item #3
                                      </a>
                                  </h4>
                              </div>
                              <div class="panel-collapse collapse" id="collapseThree">
                                  <div class="panel-body">
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>			 
			  </div> 
			  //trick from http://thewebthought.blogspot.com/2011/04/asp-resulting-recordset-in-two-columns.html
			  //http://www.qualitycodes.com/tutorial.php?articleid=33&title=Displaying-Records-in-Multiple-Columns-Using-PHP
			  */
			  ?>
	  
    <form accept-charset="utf-8" action="<?php echo $_SESSION['host_']?>index.php/crmcontroller/search_call_list/" class="form-horizontal tasi-form" id="tab" method="POST">
						     <?php
							 /*
	
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                                          Please select questions below to be assigned on a form.
										  &nbsp;&nbsp;&nbsp;&nbsp;
										  
                                  <button id="btn_update" class="btn btn-info "><i class="icon-refresh"></i> Search</button>
                          </header>
																												
														
                      </section>
                  </div>
              </div>			  
							 */
							 ?>
									
              <div class="row">
                          <div class="col-lg-12">
                              <section class="panel">
                                  <header class="panel-heading">
                                      Call List Search
                                  </header>
                                  <div class="panel-body">
									   <?php
									   /*
                                      <form action="#" method="get" accept-charset="utf-8">
									    *
                                          <div class="checkboxes">
                                              <label class="label_check">
                                                  <input name=ccamp id=ccamp  value="1" type="checkbox" onClick="checkChecked('ccamp','camp') && fetchPrint('temp2','qmp_haildivpages.php?show=campaigns','camp') ;" /> Campaigns
                                              </label>
                                              <label class="label_check">
                                              <input name=cdisp id=cdisp value="1" type="checkbox" onClick="checkChecked('cdisp','disp') && fetchPrint('temp5','qmp_haildivpages.php?show=disp' ,'disp') ;" /> User Disposition </label>
                                              <label class="label_check">
                                              <input name="sample-checkbox-02" id="checkbox-03" value="1" type="checkbox" /> This is nice checkbox.</label>
                                          </div>
										  class="display table table-bordered"
										  
									   <div class="adv-table">
												  <table cellpadding="0" cellspacing="0" border="0" id="hidden-table-info">
									      <table class="table table-bordered table-striped table-condensed cf">
										<table border="0" class="table table-hover">
													      <!--table class="table table-striped table-hover table-bordered" id="editable-sample"-->
										<!--thead class="cf"-->
												    
													  <!--thead>
													  <tr>
														  <th>#</th>
														  <th>First Name</th>
													  </tr>
													  </thead-->
									      
									   */
									   ?>
									    <!--section id="flip-scroll"-->
									   <div>
												  <table cellpadding="0" cellspacing="0" id="hidden-table-info">
													  <thead>
													  <tr>
														  <td colspan="2">
                                  <button id="btn_search" class="btn btn-info "><i class="icon-refresh"></i> Search</button>
				  <p>&nbsp;</p>
														  </td>
													  </tr>
													  </thead>
													  <tbody>
													  <tr>
														  <td>
														   <div class="checkboxes"><label class="label_check">
															<input name=ccamp id=ccamp type=checkbox onClick="checkChecked('ccamp','camp') && fetchPrint('temp2','<?php echo site_url();?>/crmcontroller/show_call_list/?show=campaigns','camp') ;" /> Campaign
                                                           </label></div>															
														  </td>
														  <td> <div id=camp> </div>&nbsp;</td>
													  </tr>
													  <tr>
														  <td>
														   <div class="checkboxes"><label class="label_check">
															<input name=cdisp id=cdisp type=checkbox onClick="checkChecked('cdisp','disp') && fetchPrint('temp5','<?php echo site_url();?>/crmcontroller/show_call_list/?show=disp' ,'disp') ;" /> User Disposition
                                                           </label></div>															
														  </td>
														  <td> <div id=disp> </div>&nbsp;</td>
													  </tr>
													  <tr>
														  <td>
														   <div class="checkboxes"><label class="label_check">
															<input name=csdisp id=csdisp type=checkbox onClick="checkChecked('csdisp','sdisp') && fetchPrint('temp5','<?php echo site_url();?>/crmcontroller/show_call_list/?show=sdisp' ,'sdisp') ;" /> System Disposition
                                                           </label></div>															
														  </td>
														  <td> <div id=sdisp> </div>&nbsp;</td>
													  </tr>
													  <tr>
														  <td>
														   <div class="checkboxes"><label class="label_check">
															<input name=cagentqueue id=cagentqueue type=checkbox onClick="

																	if (document.getElementById('campaign'))
																	{
																		try
																		{
																			var tmp = campaign.options[campaign.selectedIndex].value         ;
																		}catch (e)
																		{
																			alert ('No Campaign Selected')
																			document.getElementById('queues').innerHTML='' ;
																			document.getElementById('cagentqueue').checked  = false;
																}



																checkChecked('cagentqueue','queues') &&  fetchPrint('temp3','<?php echo site_url();?>/crmcontroller/show_call_list/?show=queues&campaigns=' + campaign.options[campaign.selectedIndex].value  ,'queues');
																}else
																{
																alert ('Please Select A Campaign')
																document.getElementById('queues').innerHTML='' ;
																document.getElementById('cagentqueue').checked  = false;
																}
																" /> Queue								
                                                           </label></div>															
														  </td>
														  <td> <div id=queues></div>&nbsp;</td>
													  </tr>
													  <tr>
														  <td>
														   <div class="checkboxes"><label class="label_check">
															<input name=cagent id=cagent type=checkbox onClick="

																if (document.getElementById('campaign'))
																{
																try
																{
																var tmp = campaign.options[campaign.selectedIndex].value         ;
																}catch (e)
																{
																alert ('Sorry No Campaign Selected')
																document.getElementById('agents').innerHTML='' ;
																document.getElementById('cagent').checked  = false;
																}

																checkChecked('cagent','agents') &&  fetchPrint('temp3','<?php echo site_url();?>/crmcontroller/show_call_list/?show=agents&campaigns=' + campaign.options[campaign.selectedIndex].value  ,'agents');
																}else
																{
																alert ('Please Select A Campaign First')
																document.getElementById('agents').innerHTML='' ;
																document.getElementById('cagent').checked  = false;
																}
																" /> Users
                                                           </label></div>															
														  </td>
														  <td> <div id=agents></div>&nbsp;</td>
													  </tr>
													  <tr>
														  <td>
														   <div class="checkboxes"><label class="label_check">
															<input id=ctime name=ctime type=checkbox onClick="checkChecked('ctime','dtime') && fetchPrint('temp4','<?php echo site_url();?>/crmcontroller/show_call_list/?show=timewindow','dtime');" /> Date/Time Range								
                                                           </label></div>															
														  </td>
														  <td> <div id=dtime> </div>&nbsp;</td>
													  </tr>
													  
													  <tr>
														  <td>
														   <div class="checkboxes"><label class="label_check">
															<input id=cphone name=cphone type=checkbox onClick="checkChecked('cphone','dphone') && fetchPrint('temp5','<?php echo site_url();?>/crmcontroller/show_call_list/?show=inbox&id=phone','dphone');" /> Phone number								
                                                           </label></div>															
														  </td>
														  <td> <div id=dphone> </div>&nbsp;</td>
													  </tr>
													  <tr>
														  <td>
														   <div class="checkboxes"><label class="label_check">
															<input id=cvlogfname  name=cvlogfname type=checkbox onClick=" checkChecked('cvlogfname','dvlogfname') && fetchPrint('temp5','<?php echo site_url();?>/crmcontroller/show_call_list/?show=inbox&id=vlogfname','dvlogfname');" /> Filename								
                                                           </label></div>															
														  </td>
														  <td> <div id=dvlogfname> </div>&nbsp;</td>
													  </tr>
													  <tr>
														  <td>
														   <div class="checkboxes"><label class="label_check">
															<input id=ccallid name=ccallid type=checkbox onClick="checkChecked('ccallid','dcallid') &&  fetchPrint('callid','<?php echo site_url();?>/crmcontroller/show_call_list/?show=inbox&id=callid','dcallid');" /> Call id								
                                                           </label></div>															
														  </td>
														  <td> <div id=dcallid valign=center> </div>&nbsp;</td>
													  </tr>
													  <tr>
														  <td>
														   <div class="checkboxes"><label class="label_check">
															<input id=ccalltime name=ccalltime type=checkbox onClick="checkChecked('ccalltime','dcalltime') &&  fetchPrint('temp6','<?php echo site_url();?>/crmcontroller/show_call_list/?show=inbox&id=calltime','dcalltime');" /> Duration of Call Greater than ( in seconds)
                                                           </label></div>															
														  </td>
														  <td>  <div id=dcalltime> </div>&nbsp;</td>
													  </tr>
													  <tr>
														  <td>
														   <div class="checkboxes"><label class="label_check">
															<input id=ccalltime1 name=ccalltime1 type=checkbox onClick="checkChecked('ccalltime1','dcalltime1') &&  fetchPrint('temp7','<?php echo site_url();?>/crmcontroller/show_call_list/?show=inbox&id=calltime1','dcalltime1');" /> Duration of Call Less than ( in seconds)								
                                                           </label></div>															
														  </td>
														  <td>  <div id=dcalltime1> </div>&nbsp;</td>
													  </tr>
						  
													  
													  </tbody>
												  </table>
								            <!--/section-->
									    
									      
										 </div>
                                      </form>
                                  </div>

                              </section>

                          </div>
              </div>				  
			  
    </form>
    <?php
    /*
             <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Call List
                          </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                <thead>
                                <tr>
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th class="hidden-phone">Platform(s)</th>
                                    <th class="hidden-phone">Engine version</th>
                                    <th class="hidden-phone">CSS grade</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="gradeX">
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 4.0</td>
                                    <td class="hidden-phone">Win 95+</td>
                                    <td class="center hidden-phone">4</td>
                                    <td class="center hidden-phone">X</td>
                                </tr>
                                <tr class="gradeC">
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 5.0</td>
                                    <td class="hidden-phone">Win 95+</td>
                                    <td class="center hidden-phone">5</td>
                                    <td class="center hidden-phone">C</td>
                                </tr>

                                <tr class="gradeU">
                                    <td>Other browsers</td>
                                    <td>All others</td>
                                    <td class="hidden-phone">-</td>
                                    <td class="center hidden-phone">-</td>
                                    <td class="center hidden-phone">U</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>				
                    </div>
                      </section>
                  </div>
             </div>
    */
    ?>
    
    
	    <?php if($results == 0):?>
	    
	    <?php else:?>

             <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Call List
                          </header>
                          <div class="panel-body">
                              <section id="flip-scroll">
                                <table class="table table-bordered table-striped table-condensed cf">
								<!--table class="table table-striped table-hover table-bordered" id="editable-sample"-->
                                  <thead class="cf">
                                  <tr>
					<th>Call ID</th>
					<th>Call Date</th>
					<th class="numeric">Call Time</th>
					<!--th>Process Name</th-->
					<th>Campaign Name</th>
					<th class="numeric">Phone</th>
					<th class="numeric">Customer ID</th>
					<!--th>Call Type</th-->
					<!--th>System Disposition</th-->
					<th class="numeric">Hangup First</th>
					<th>User ID</th>
					<th>Disposition Code</th>
					<!--th class="numeric">Transfer To</th>
					<th class="numeric">Setup Time</th>
					<th>Ringing Time</th>
					<th>Call Time</th>
					<th>Wrap Time</th-->
					<th class="numeric">Percent Quality Score</th>
                                  </tr>
                                  </thead>
                                  <tbody>
								  <?php
								  /*
                                  <tr>
                                      <td>AAC</td>
                                      <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                                      <td class="numeric">$1.38</td>
                                      <td class="numeric">-0.01</td>
                                      <td class="numeric">-0.36%</td>
                                      <td class="numeric">$1.39</td>
                                      <td class="numeric">$1.39</td>
                                      <td class="numeric">$1.38</td>
                                      <td class="numeric">9,395</td>
                                  </tr>
								  */
								  ?>
								  
					    <?php foreach($results as $r):
					    
		$call_idLinktoCallRating = "		
		<!--span id=\"el1_qmp_settings_copy\" class=\"qmp_settings_copy\"-->
		                              <a class=\"ewRowLink ewCopy\" data-caption=\"Rate this call ".$r->call_id."\" href=\"".site_url()."/crmcontroller/search_call_details?call_id=".$r->call_id."\">
									    <img data-phrase=\"CopyLink\" src=\"".base_url()."assets/img/smallphone.png\" style=\"width:35px; height:35px;\" width=\"16\" height=\"16\" style=\"border: 0;\" alt=\"Rate this call\" title=\"Rate this call\">
									  </a>
								   <!--/span-->";					    
					    ?>
                                  <tr>
						<td><?php echo $call_idLinktoCallRating; ?></td>
						<td><?php echo $r->calldate; ?></td>
						<td class="numeric"><?php echo $r->calltime; ?></td>
						<!--td><?php echo $r->processname; ?>&nbsp;</td-->
						<td><?php echo $r->campaign_name; ?></td>
						<td class="numeric"><?php echo $r->phone; ?></td>
						<td class="numeric"><?php echo $r->customer_id; ?></td>
						<!--td><?php echo $r->call_type; ?>&nbsp;</td>
						<td><?php echo $r->system_disposition; ?>&nbsp;</td-->
						<td class="numeric"><?php echo $r->hangup_first; ?></td>
						<td><?php echo $r->user_id; ?></td>
						<td><?php echo $r->disposition_code; ?></td>
						<!--td class="numeric"><?php echo $r->transfer_to; ?></td>
						<td class="numeric"><?php echo $r->setup_time; ?></td>
						<td><?php echo $r->ringing_time; ?></td>
						<td><?php echo $r->calltime; ?></td>
						<td><?php echo $r->wrap_time; ?></td-->
						<td class="numeric"><?php echo $r->percentqualityscore; ?></td>
                                  </tr>
					    <?php endforeach;?>
				    <!--tr>
					<td colspan="18"></td>
				    </tr-->
								  
                                </tbody>
                            </table>
			    <table cellpadding="0" cellspacing="0" border="0" id="hidden-table-info">
			    <!--table class="table table-bordered table-striped table-condensed cf"-->
				   <tr>
				       <td colspan="15"><?php echo $links; ?></td>
				   </tr>
			    </table>
				
                           </section>								
                          </div>
                      </section>
                  </div>
              </div>
	    <?php endif;?>


                  <?php
				  /*
              <div class="row">
                          <div class="col-lg-12">
                              <section class="panel">
                                  <div class="panel-body">
					    <div class="adv-table">
					    </div>	
                                  </div>
                              </section>
                          </div>
              </div>
              
                  <div class="col-sm-6">
                      <section class="panel">
                          <header class="panel-heading">
                              Handle Contact
                          </header>
                          <table class="table table-striped">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>First Name</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td>1</td>
                                  <td>Mark</td>
                              </tr>
                              </tbody>
                          </table>
                      </section>
                  </div>
				  */
				  ?>
		
				  
	              <!-- page end-->
          </section>
      </section>
      <!--main content end-->	 
	  
	  <?php
	  /*GUIDE DON'T PURGE
<div class="samplebox">
	<div id="checkboxlistDemo">
		<div><input type="checkbox" id="checkbox03[]" value="1" class="chkDemo"> Value 1</div>
		<div><input type="checkbox" id="checkbox03[]" value="2" class="chkDemo"> Value 2</div>
		<div><input type="checkbox" id="checkbox03[]" value="3" class="chkDemo"> Value 3</div>
		<div><input type="checkbox" id="checkbox03[]" value="4" class="chkDemo"> Value 4</div>
		<div><input type="checkbox" id="checkbox03[]" value="5" class="chkDemo"> Value 5</div>
		<div>
    		 <input type="button" value="Get Value Using Class" id="buttonClassDemo" class="samplebutton"> 
             <!--button id="buttonClassDemo" class="samplebutton"><i class="icon-refresh"></i> Update</button-->
			 
    		 <input type="button" value="Get Value Using Parent Tag" id="buttonParentDemo" class="samplebutton">
		</div>
	</div>
</div>		  
	  */
	  ?>
	  
 <script>
     $(document).ready(function () {
	 //alert('jq ok');
          
/*
					$("#btn_update").click(function(e){
		var number_of_checked_checkbox= $("input[id=checkbox-03]:checked").length;
		if(number_of_checked_checkbox==0){
		alert("select any one");
		else{
		$("#qmp_form").submit();
						}
		});

					
		$("input[type='checkbox']").click(function() {
		$("#btn_update").attr("disabled", !$("input[type='checkbox']").is(":checked"));
		});
          */
		$("#btn_update").click(function(e){
		 
		//var number_of_checked_checkbox= $("input[name='checkbox-03[]']:checked").length;
		var nbox= $('input[id^="ccamp"]:checked').length;
				 //var nbox= $('[name="checkbox-03[]"]:checked').length;
		var count_ = 0;
		 
		//var allCheckBox = $("[id^='checkbox-03']");
		//var count_checked = allCheckBox.filter(":checked").length; 
/*
			nbox.each(function() {
		count++;
				});
		
*/
	      
/*
			if($("input[name='checkbox-03[]']:checked").length > 0)) {
            alert("At least 1 checkbox checked!");
			 }			
			*/
            //alert(nbox+' Should be chosen');
			
			if(nbox < 10) {
            //alert('You\'ve chosen '+ nbox+' questions.  At least 10 is required to continue.');
            alert('You did not make any selection.');
			
			return false;

			}
			
//return false;
		});
					 
     });
</script>
 
      
      
      <!--script>
          jQuery(document).ready(function() {
              EditableTable.init();
          });
      </script-->
	
	<?php
	/*
	
    <script type="text/javascript" language="javascript" src="<?php echo $base_url; ?>assets/advanced-datatable/media/js/jquery.js"></script>	
    <script type="text/javascript" language="javascript" src="<?php echo $base_url; ?>assets/advanced-datatable/media/js/jquery.dataTables.js"></script>	
     */
	 ?>
  
	
         <?php 
            //calls the stylesheet for this particular data table to be displayed correctly   
              //include('templates/datatablestyle.php'); ?>



<?php //include('templates/footer.php'); ?>