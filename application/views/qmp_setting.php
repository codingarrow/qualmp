<?php //include('templates/header.php'); ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
        <!--link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="screen"/-->	
	    <!--script src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script-->
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
	      */
	      ?>
              
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
			  
	    <?php if($results == 0):?>
	    
	    <?php else:?>

             <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Settings List
			      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			      <a href="<?php echo site_url();?>/create/newsetting" data-toggle="modal" class="btn btn-success">New Settings</a>
                          </header>
                          <div class="panel-body">
                              <section id="flip-scroll">
                                <table class="table table-bordered table-striped table-condensed cf">
								<!--table class="table table-striped table-hover table-bordered" id="editable-sample"-->
                                  <thead class="cf">
                                  <tr>
					<th>Setting ID</th>
					<th>Setting Name</th>
					<th>Setting Value</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
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
					    
					    //$call_idLinktoCallRating = "";
					    $id = $r->setting_id;
					    $update ='<a title="Edit '.$r->setting_name.'" alt="Edit '.$r->setting_name.'" href="'.  site_url().'/create/index_setting/'.$id.'"><i class="icon-pencil"></i></a> ';
					    $purge  ='<a title="Delete '.$r->setting_name.'" alt="Delete '.$r->setting_name.'" onclick="return confirm(\'Delete this record?\');" href="'.  site_url().'/create/delete_setting/'.$id.'" role="button" data-toggle="modal"><i class="icon-remove"></i></a>';	
		
					    ?>
                                  <tr>
						<td><?php echo $id; ?>&nbsp;</td>
						<td><?php echo $r->setting_name; ?>&nbsp;</td>
						<td><?php echo $r->setting_value; ?>&nbsp;</td>
						<td><?php echo $update; ?>&nbsp;</td>
						<td><?php echo $purge; ?>&nbsp;</td>
                                  </tr>
					    <?php endforeach;?>
				    <!--tr>
					<td colspan="18"></td>
				    </tr-->
								  
                                </tbody>
                            </table>
			    <table cellpadding="0" cellspacing="0" border="0" id="hidden-table-info">
				   <tr>
				       <td colspan="5"><?php echo $links; ?></td>
				   </tr>
			    </table>
				
                           </section>								
                          </div>
                      </section>
                  </div>
              </div>
	    <?php endif;?>	              <!-- page end-->
          </section>
      </section>
      <!--main content end-->	 
	  
						  
	  
         <?php 
            //calls the stylesheet for this particular data table to be displayed correctly   
              //include('templates/datatablestyle.php'); ?>



<?php //include('templates/footer.php'); ?>