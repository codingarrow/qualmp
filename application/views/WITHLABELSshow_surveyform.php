<?php //include('templates/header.php'); ?>
        <!--script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script-->
        <script src="<?php echo base_url();?>js/191jquery.min.js"></script>
        <!--script src="<?php echo base_url();?>js/jquery-1.11.1.min.js"></script--> 
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
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <!--header class="panel-heading">
                              Forms Wizard
                          </header-->
                          <div class="panel-body">
                              <div class="stepy-tab">
                                  <ul id="default-titles" class="stepy-titles clearfix">
                                      <li id="default-title-0" class="current-step">
                                          <div>Questions</div>
                                      </li>
                                      <li id="default-title-1" class="">
                                          <div>Campaigns</div>
                                      </li>
                                      <li id="default-title-2" class="">
                                          <div>Commit</div>
                                      </li>
                                  </ul>
                              </div>
                              <?php //<form class="form-horizontal" id="default"> ?>
                              <form class="form-horizontal tasi-form" id="default">
							  
							      <?php // ----------------------------------------------------STEP 1 ?>
							  
                                  <fieldset title="Step1" class="step" id="default-step-0">
								  
                                <?php
                                  /*								
                                      <div class="form-group">
                                          <label class="col-lg-2 control-label">Full Name</label>
                                          <div class="col-lg-10">
                                              <input type="text" class="form-control" placeholder="Full Name">
                                          </div>
									  
                                      </div>
								  
                                  */
                                  ?>
									  <div class="row">
										  <div class="col-lg-12">
											  <section class="panel">
												  <header class="panel-heading">Please select questions below.  Or click <button id="btn_assigned" class="btn btn-info "><i class="icon-refresh"></i> Assigned</button> to view assigned questions to campaigns.</header>
											  </section>
										  </div>
									  </div>			  
									  <?php //------------------------------------------------------------------------?>
									  
										<?php if ( $max_posts ) : ?>
										<div id="checkboxlistDemo03">
										  <?php $cols=2; $i = 0 ; foreach( $topics as $topic ) : ?>
												  <?php
													if ($i%2==1) {
												  ?>				  
												  <div class="col-sm-6">
												  <?php 
													}
													else 
													{
												  ?>				  
												  <div class="row"><div class="col-sm-6">
												  <?php 
													}
												  ?>				  
										  
													  <section class="panel">
													  
														  <header class="panel-heading">
															  <?php //echo $i%2 . ' ' . $topic['ratingtopic'] ?>
															  <?php echo $topic['ratingtopic'] ?>
														  </header>
													
														  <table class="table table-hover">
															  <thead>
															  <tr>
																  <th>Q id</th>
																  <th>Questions</th>
															  </tr>
															  </thead>
															  <div id="checkboxquestions">
															  <tbody>
																 <?php
																	$query = $this->surveyform_model->get_surveysubquestions($topic['topic_id']);
																	$subquestions = $query ? count($query) : 0;
																	if ( $subquestions ) :
																	 foreach( $query as $squestions ) :
																 ?>
															  <tr>
																  <td><div class="checkboxes"><label class="label_check"><input class="chkDemoCL03" name="checkbox-03[]" id="checkbox03[]" value="<?php echo $squestions['categoryid'];?>" type="checkbox" /><?php echo $squestions['categoryid'];?></label></div></td>
																  <td><?php echo $squestions['category']; ?></td>
															  </tr>
																 <?php
																	 endforeach;
																	endif;
																 ?>
															  
															  </tbody>
															  </div>
															  
														  </table>
													  </section>
													  
												  <?php
													if ($i%2==1) {
												  ?>				  
												  </div></div>
												  <?php 
													}
													else 
													{
												  ?>				  
												  </div>
												  <?php 
													}
												  ?>
											
										  <?php $i+=1; endforeach; ?>
										</div>
										<?php endif; ?>
									  <?php //------------------------------------------------------------------------?>
                                      <legend> </legend>
                                  </fieldset>

							      <?php // ----------------------------------------------------STEP 2 ?>
                                  <fieldset title="Step 2" class="step" id="default-step-1" >

                                <?php
                                  /*								
                                      <div class="form-group">
                                          <label class="col-lg-2 control-label">Address</label>
                                          <div class="col-lg-10">
                                              <textarea class="form-control" cols="60" rows="5"></textarea>
                                          </div>
                                      </div>

                                  */
                                  ?>								  
									  <?php //------------------------------------------------------------------------?>
									  <?php if ( $max_campaigns ) : ?>
									     <?php
										 /*
										  <div class="row">
											  <div class="col-lg-12">
												  <section class="panel">
													  <header class="panel-heading">
																	  Please select campaigns below to be assigned on a form.
																	  &nbsp;&nbsp;&nbsp;&nbsp;
															  <button id="btn_update" class="btn btn-info "><i class="icon-refresh"></i> Update</button>
													  </header>
												  </section>
											  </div>
										  </div>			  
										 */
										 ?>
									  <div class="row">
										  <div class="col-lg-12">
											  <section class="panel">
												  <header class="panel-heading">Select the campaigns that you would like to assign the questions.</header>
											  </section>
										  </div>
									  </div>			  
										 
										  <div class="row">
											  <div class="col-lg-12">
												  <section class="panel">
												  <header class="panel-heading">Campaigns</header>
													  <table class="table table-hover">
														  <thead>
														  <tr>
															  <th>id</th>
															  <th>Campaign</th>
														  </tr>
														  </thead>																												
														 <div id="checkboxcampaigns">
														  <tbody>
													   <?php foreach( $campaigns as $campaign ) : ?>							  
														  <tr>
															  <td><div class="checkboxes"><label class="label_check"><input  name="checkcampaign[]" id="checkcampaign[]" value="<?php echo $campaign['id'];?>" type="checkbox" /><?php echo $campaign['id']; ?></label></div></td>
															  <td><?php echo $campaign['name']; ?></td>
														  </tr>														
														<?php endforeach; ?>
														  </tbody>
														 </div>
													  </table>
												  </section>
											  </div>
										  </div>					  
									<?php endif; ?>
									  <?php //------------------------------------------------------------------------?>
                                      <legend> </legend>
                                  </fieldset>

							      <?php // ----------------------------------------------------STEP 3 ?>
								  
                                  <fieldset title="Step 3" class="step" id="default-step-2" >
								  
                                <?php
                                  /*								
                                      <div class="form-group">
                                          <label class="col-lg-2 control-label">Full Name</label>
                                          <div class="col-lg-10">
                                              <p class="form-control-static">Tawseef Ahmed</p>
                                          </div>
                                      </div>
								  
                                  */
                                  ?>								  
									  <?php //------------------------------------------------------------------------?>
									  
									    <?php
										/* retrieve values here before committing*/
										?>
										
									  <?php //------------------------------------------------------------------------?>
								  
                                      <legend> </legend>
                                  </fieldset>
								  
                                  <input type="button" id="btn_finish" class="finish btn btn-danger" value="Finish"/>
                              </form>
                          </div>
                      </section>
                  </div>
              </div>	
			  
              <?php
			  /*
              <div class="row">
                  <div class="col-lg-12">
                  <!--div class="col-sm-6"-->				  
                      <section class="panel">
                          <header class="panel-heading">
                                          Please select questions below to be assigned on a form.
										  &nbsp;&nbsp;&nbsp;&nbsp;
                                  <button id="btn_update" class="btn btn-info "><i class="icon-refresh"></i> Update</button>
                          </header>
																												
														
                      </section>
                  </div>
              </div>			  
				*/
              ?>				
				  

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
 <div style="display:none" id="b"></div>	  
 <script>
     $(document).ready(function () {
	 //alert('jq ok');
          
		  var selected;
          var campaigns;
		  var q_questions;
		  var q_campaigns;
		  var thesite;
		  thesite = "<?php echo site_url(); ?>";
		    var countofQuestions = 0;
		  
		  
                   $("#btn_assigned").click(function(e){
                    $(location).attr('href', '<?php echo site_url();?>/crmcontroller/survey_details');
                   });		  
  
		  function saveQuestions(){
				//save questions
						var chkArray = [];
							$('input[id^="checkbox03"]:checked').each(function() {
								chkArray.push($(this).val());
							});

						selected = chkArray.join(',') + ",";
		  }

		  function saveCampaigns(){
				//save questions
						var chkCrray = [];
							$('input[id^="checkcampaign"]:checked').each(function() {
								chkCrray.push($(this).val());
							});

						campaigns = chkCrray.join(',') + ",";
		  }
		  
    
          $('#default').stepy({
		  
			  next: function(index) {
				//alert('Going to step: ' + index);
	              saveQuestions();
		           <?php
			    /*
			     *check checkbox.length behavior in Safari 5.1.7
			     *updatesurveyquestions?surveyquestions=2,7,9,11,12,13,14,15,16,17,20,22,24,26&campaigns=13,11,17
			     *6,7,8,9,11,12,22,24,25,27,28
			     *10,11,12,13,16,17,18,18,21,22
					alert("Updating to database, questions " + selected+ " campaigns: "+campaigns);	
					$('#b').load('echo site_url();/crmcontroller/updateinsideDIV?surveyquestions='+selected+'&campaigns='+campaigns);
					
				  //q_questions = $('#checkboxquestions input[type=checkbox]').length;
				  //q_campaigns = $('#checkboxcampaigns input[type=checkbox]').length;
				  //q_questions = $('input[id^="checkboxquestions"]:checked').length;
				  //q_campaigns = $('input[id^="checkboxcampaigns"]:checked').length;
				  
				  q_questions = $('#checkboxquestions').find('input[type=checkbox]:checked').length;
				  q_campaigns = $('#checkboxcampaigns').find('input[type=checkbox]:checked').length;
				  
					
			     */
			   ?>
				  saveCampaigns();
				  q_questions = $('input[id^="checkbox03"]:checked').length;
				  q_campaigns = $('input[id^="checkcampaign"]:checked').length;
				  //q_questions = $('#checkboxquestions input:checkbox[id^="checkbox03"]:checked').length;
				  //q_campaigns = $('#checkboxcampaigns input:checkbox[id^="checkcampaign"]:checked').length;
				                    },
	
			  finish: function() {
				  //alert ($('input[id^="checkbox03"]:checked').length);
				  //alert ($('#default td input[id^="checkbox03"]:checked').length);
				  
				//if(selected.length > 0 && campaigns.length > 0)  {
				if(q_questions > 1 && q_campaigns > 0)  {
				        //alert(thesite+'crmcontroller/updateinsideDIV?surveyquestions='+selected+'&campaigns='+campaigns);
                                        $(location).attr('href', thesite+'/crmcontroller/updateinsideDIV?surveyquestions='+selected+'&campaigns='+campaigns);
					
				}
				  else if (q_questions < 2) {
				   alert('You\'ve chosen '+q_questions+' questions.  A minimum of 2 questions is required.'); //per campaign 
				 }
				  else if (q_campaigns < 1) {
				   alert('At least 1 campaign is required.');
				 }
				 /*
                 else
                {
				   alert('You did not assign any questions or campaigns.');
                }				
				*/
				return false;
			  },
  
              backLabel: 'Previous',
              block: true,
              nextLabel: 'Next',
              titleClick: true,
			  description: true,
			  transition: 'hide',
              titleTarget: '.stepy-tab'
          });
		  
					 
     });
</script>

	  
         <?php 
            //calls the stylesheet for this particular data table to be displayed correctly   
              //include('templates/datatablestyle.php'); ?>



<?php //include('templates/footer.php'); ?>