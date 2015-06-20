<?php //include('templates/header.php'); ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
        <!--link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="screen"/-->	
	    <script src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>
        <!--script src="//cdn.datatables.net/1.10.1/js/jquery.dataTables.js"></script--> 


      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
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
			  <?php
			  /*
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
	  
    <form class="form-horizontal tasi-form" id="tab" method="POST">
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
                                      <form action="#" method="get" accept-charset="utf-8">
									   <?php
									   /*
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
									   */
									   ?>
									   
									   <div class="adv-table">
												  <table cellpadding="0" cellspacing="0" border="0" id="hidden-table-info">
													  <!--thead>
													  <tr>
														  <th>#</th>
														  <th>First Name</th>
													  </tr>
													  </thead-->
													  <tbody>
													  <tr>
														  <td colspan="2">
                                  <button id="btn_search" class="btn btn-info "><i class="icon-refresh"></i> Search</button>
														  </td>
													  </tr>
													  <tr>
													  
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
										 </div>
                                      </form>
                                  </div>

                              </section>

                          </div>
              </div>				  
			  
    </form>
             <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Flip Scroll
                          </header>
                          <div class="panel-body">
                              <section id="flip-scroll">
                                <table class="table table-bordered table-striped table-condensed cf">
								<!--table class="table table-striped table-hover table-bordered" id="editable-sample"-->
                                  <thead class="cf">
                                  <tr>
                                      <th>Code</th>
                                      <th>Company</th>
                                      <th class="numeric">Price</th>
                                      <th class="numeric">Change</th>
                                      <th class="numeric">Change %</th>
                                      <th class="numeric">Open</th>
                                      <th class="numeric">High</th>
                                      <th class="numeric">Low</th>
                                      <th class="numeric">Volume</th>
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
								  
                                </tbody>
                            </table>
                           </section>								
                          </div>
                      </section>
                  </div>
              </div>

             <div class="row">
                  <div class="col-lg-12">
					 <!--section class="panel">
						  <header class="panel-heading">
							  Editable Table
						  </header>
				     </section-->
					  <div class="panel-body">
						  <div class="adv-table editable-table ">
						  <?php
						  /*
							  <div class="clearfix">
								  <div class="btn-group">
									  <button id="editable-sample_new" class="btn green">
										  Add New <i class="icon-plus"></i>
									  </button>
								  </div>
								  <div class="btn-group pull-right">
									  <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
									  </button>
									  <ul class="dropdown-menu pull-right">
										  <li><a href="#">Print</a></li>
										  <li><a href="#">Save as PDF</a></li>
										  <li><a href="#">Export to Excel</a></li>
									  </ul>
								  </div>
							  </div>
						  */
						  ?>


                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>Call ID</th>
                                  <th>Call Date</th>
                                  <th>Call Time</th>
                                  <th>Process Name</th>
                                  <th>Campaign Name</th>
                                  <th>Phone</th>
                                  <th>Customer ID</th>
                                  <th>Call Type</th>
                                  <th>System Disposition</th>
                                  <th>Hangup First</th>
                                  <th>User ID</th>
                                  <th>Disposition Code</th>
                                  <th>Transfer To</th>
                                  <th>Setup Time</th>
                                  <th>Ringing Time</th>
                                  <th>Call Time</th>
                                  <th>Wrap Time</th>
                                  <th>Percent Quality Score</th>
								  
								  <?php
								  /*
                                  <th>Edit</th>
                                  <th>Delete</th>
								  */
								  ?>
                              </tr>
                              </thead>
                              <tbody>
							  <?php
							  /*
                              <tr class="">
                                  <td>Jondi Rose</td>
                                  <td>Alfred Jondi Rose</td>
                                  <td>1234</td>
                                  <td class="center">super user</td>
                                  <td><a class="edit" href="javascript:;">Edit</a></td>
                                  <td><a class="delete" href="javascript:;">Delete</a></td>
                              </tr>
                              <tr class="">
                                  <td>Dulal</td>
                                  <td>Jonathan Smith</td>
                                  <td>434</td>
                                  <td class="center">new user</td>
                                  <td><a class="edit" href="javascript:;">Edit</a></td>
                                  <td><a class="delete" href="javascript:;">Delete</a></td>
                              </tr>
							  */
							  ?>
							  <?php if ( $max_posts ) : ?>
							  <?php foreach( $calls as $call ) : ?>
                              <tr>
                                  <td><?php echo $call['call_id']; ?></td>
                                  <td><?php echo $call['calldate']; ?></td>
                                  <td><?php echo $call['calltime']; ?></td>
                                  <td><?php echo $call['processname']; ?></td>
                                  <td><?php echo $call['campaign_name']; ?></td>
                                  <td><?php echo $call['phone']; ?></td>
                                  <td><?php echo $call['customer_id']; ?></td>
                                  <td><?php echo $call['call_type']; ?></td>
                                  <td><?php echo $call['system_disposition']; ?></td>
                                  <td><?php echo $call['hangup_first']; ?></td>
                                  <td><?php echo $call['user_id']; ?></td>
                                  <td><?php echo $call['disposition_code']; ?></td>
                                  <td><?php echo $call['transfer_to']; ?></td>
                                  <td><?php echo $call['setup_time']; ?></td>
                                  <td><?php echo $call['ringing_time']; ?></td>
                                  <td><?php echo $call['calltime']; ?></td>
                                  <td><?php echo $call['wrap_time']; ?></td>
                                  <td><?php echo $call['percentqualityscore']; ?></td>
                              </tr>
							  <?php endforeach; ?>
							  <?php endif; ?>
                              </tbody>
                          </table>

							 
						  </div>
					  </div>
					 
				  
				  </div>
			 </div>

                  <?php
				  /*
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
    <?php $base_url = base_url(); ?>
	<script src='<?php echo $base_url; ?>web/js/print_lib.js' type='text/javascript'></script>
	<script src='<?php echo $base_url; ?>web/js/calendar-setup.js' type='text/javascript'></script>
	<script src='<?php echo $base_url; ?>web/js/calendar.js' type='text/javascript'></script>
	<script src='<?php echo $base_url; ?>web/js/calendar-core.js' type='text/javascript'></script>
	<script type='text/javascript' src='<?php echo $base_url; ?>web/js/calender/mycal-en.js'></script>
	<link rel='stylesheet' type='text/css' media='screen' href='<?php echo $base_url; ?>web/css/mycal.css' />


    <script type="text/javascript" src="<?php echo $base_url; ?>assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo $base_url; ?>assets/data-tables/DT_bootstrap.js"></script>	

      <!--script for this page only-->
      <script src="<?php echo $base_url; ?>js/editable-table.js"></script>

      <!-- END JAVASCRIPTS -->
      <script>
          jQuery(document).ready(function() {
              EditableTable.init();
          });
      </script>
	
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