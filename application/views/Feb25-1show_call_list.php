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
                              Responsive table
                          </header>
                          <div class="panel-body">
                              <section id="unseen">
                                <table class="table table-bordered table-striped table-condensed">
                                  <thead>
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
								  
                                </tbody>
                            </table>

                        </div>
                  </div>
              </section>								
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

    <script type="text/javascript" language="javascript" src="<?php echo $base_url; ?>assets/advanced-datatable/media/js/jquery.js"></script>	
    <script type="text/javascript" language="javascript" src="<?php echo $base_url; ?>assets/advanced-datatable/media/js/jquery.dataTables.js"></script>	

   <script type="text/javascript">
      /* Formating function for row details */
      function fnFormatDetails ( oTable, nTr )
      {
          var aData = oTable.fnGetData( nTr );
          var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
          sOut += '<tr><td>Rendering engine:</td><td>'+aData[1]+' '+aData[4]+'</td></tr>';
          sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
          sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
          sOut += '</table>';

          return sOut;
      }

      $(document).ready(function() {
          /*
           * Insert a 'details' column to the table
           */
          var nCloneTh = document.createElement( 'th' );
          var nCloneTd = document.createElement( 'td' );
          nCloneTd.innerHTML = '<img src="<?php echo $base_url; ?>assets/advanced-datatable/examples/examples_support/details_open.png">';
          nCloneTd.className = "center";

          $('#hidden-table-info thead tr').each( function () {
              this.insertBefore( nCloneTh, this.childNodes[0] );
          } );

          $('#hidden-table-info tbody tr').each( function () {
              this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
          } );

          /*
           * Initialse DataTables, with no sorting on the 'details' column
           */
          var oTable = $('#hidden-table-info').dataTable( {
              "aoColumnDefs": [
                  { "bSortable": false, "aTargets": [ 0 ] }
              ],
              "aaSorting": [[1, 'asc']]
          });

          /* Add event listener for opening and closing details
           * Note that the indicator for showing which row is open is not controlled by DataTables,
           * rather it is done here
           */
          $('#hidden-table-info tbody td img').live('click', function () {
              var nTr = $(this).parents('tr')[0];
              if ( oTable.fnIsOpen(nTr) )
              {
                  /* This row is already open - close it */
                  this.src = "<?php echo $base_url; ?>assets/advanced-datatable/examples/examples_support/details_open.png";
                  oTable.fnClose( nTr );
              }
              else
              {
                  /* Open this row */
                  this.src = "<?php echo $base_url; ?>assets/advanced-datatable/examples/examples_support/details_close.png";
                  oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
              }
          } );
      } );
  </script>
  
	
         <?php 
            //calls the stylesheet for this particular data table to be displayed correctly   
              //include('templates/datatablestyle.php'); ?>



<?php //include('templates/footer.php'); ?>