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
			  */
			  ?>
			  
              <div class="row">
                  <div class="col-lg-12">
                  <!--div class="col-sm-6"-->				  
                      <section class="panel">
                          <header class="panel-heading">
                              Setting
                          </header>
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
																		"sAjaxSource": '<?php echo base_url(); ?>index.php/crmcontroller/ratingcategorydatatable',
																		"bJQueryUI": true,
																		"sPaginationType": "full_numbers",
																		"iDisplayStart ":100,
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

                      </section>
                  </div>
              </div>				  
	              <!-- page end-->
          </section>
      </section>
      <!--main content end-->	 
	  
						  
	  
         <?php 
            //calls the stylesheet for this particular data table to be displayed correctly   
              include('templates/datatablestyle.php'); ?>



<?php //include('templates/footer.php'); ?>