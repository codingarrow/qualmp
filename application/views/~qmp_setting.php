<?php //include('templates/header.php'); ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
        <!--link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="screen"/-->	
	<script src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>
         <?php 
            //calls the stylesheet for this particular data table to be displayed correctly   
              include('templates/datatablestyle.php'); ?>

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
			  <?php
			  /*
              <div class="row">
                  <div class="col-sm-6">
                      <section class="panel">
                          <header class="panel-heading no-border">
                              Border Table
                          </header>
                          <table class="table table-bordered">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Username</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td rowspan="2">1</td>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                  <td>@mdo</td>
                              </tr>
                              <tr>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                  <td>@TwBootstrap</td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td>Jacob</td>
                                  <td>Thornton</td>
                                  <td>@fat</td>
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td colspan="2">Larry the Bird</td>
                                  <td>@twitter</td>
                              </tr>
                              </tbody>
                          </table>
                      </section>
                  </div>
                  <div class="col-sm-6">
                      <section class="panel">
                          <header class="panel-heading">
                              Hover Table
                          </header>
                          <table class="table table-hover">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Username</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td>1</td>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                  <td>@mdo</td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td>Jacob</td>
                                  <td>Thornton</td>
                                  <td>@fat</td>
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td colspan="2">Larry the Bird</td>
                                  <td>@twitter</td>
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td>Sumon</td>
                                  <td>Mosa</td>
                                  <td>@twitter</td>
                              </tr>
                              </tbody>
                          </table>
                      </section>
                  </div>
              </div>
			  */
			  ?>
			  
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Advanced Table
                          </header>
						  <?php
						  /*
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th><i class="icon-bullhorn"></i> Company</th>
                                  <th class="hidden-phone"><i class="icon-question-sign"></i> Descrition</th>
                                  <th><i class="icon-bookmark"></i> Profit</th>
                                  <th><i class=" icon-edit"></i> Status</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td><a href="#">Vector Ltd</a></td>
                                  <td class="hidden-phone">Lorem Ipsum dorolo imit</td>
                                  <td>12120.00$ </td>
                                  <td><span class="label label-info label-mini">Due</span></td>
                                  <td>
                                      <button class="btn btn-success btn-xs"><i class="icon-ok"></i></button>
                                      <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                                      <button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
                                  </td>
                              </tr>
                             </tbody>
                          </table>
						  */
						  ?>
                      </section>
                  </div>
              </div>
														<?php //------LOAD DATATABLE BEGIN--------------------------------------------------- ?>
									<!--div class="well"-->
														<!--div class="wrapper"-->
														<script type="text/javascript">
																$(document).ready(function() {
																//$(window).load(function(){
																var oTable = $('#big_table').dataTable( {
																		"bProcessing": true,
																		"bServerSide": true,
																		"bFilter": false,
																		"sAjaxSource": '<?php echo base_url(); ?>index.php/crmcontroller/qmp_settingdatatable',
																		"bJQueryUI": true,
																		"sPaginationType": "full_numbers",
																		"iDisplayStart ":50,
																		"oLanguage": {
																	"sProcessing": "<img src='<?php echo base_url(); ?>assets/img/ajax-loaders/ajax-loader-7.gif'>"
																},  
																"fnInitComplete": function() {
																		//oTable.fnAdjustColumnSizing();
																 },
																		'fnServerData': function(sSource, aoData, fnCallback)
																	{
																	  $.ajax
																	  ({
																		'dataType': 'json',
																		'type'    : 'POST',
																		'url'     : sSource,
																		'data'    : aoData,
																		'success' : fnCallback
																	  });
																	}
																} );
														} );
														</script>
														<!--h1>Agent management</h1-->
														<?php echo $this->table->generate(); ?>
														
									<!--/div-->                                    
														<?php //------LOAD DATATABLE END--------------------------------------------------- ?>
              <!-- page end-->
          </section>
      </section>
	  
	  
      <!--main content end-->
<?php //include('templates/footer.php'); ?>