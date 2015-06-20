<script src="<?php echo base_url();?>js/191jquery.min.js"></script> 
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                                          <?php
                                          //$sitename = $_SERVER['REQUEST_URI'];
                                          //  $url = "http".(!empty($_SERVER['HTTPS'])?"s":""). "://" .$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

                                          //$url=parse_url($url);
                                          //echo $url["fragment"];
                                          //echo $url;
                                          ?>
                                          These are the questions assigned to campaigns.  Or you can
                                          <button id="btn_assign" class="btn btn-info "><i class="icon-refresh"></i> Assign</button>
                                          again.
										  &nbsp;&nbsp;&nbsp;&nbsp;
                          </header>
																												
														
                      </section>
                  </div>
              </div>			  
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
                  
                  <div class="col-md-12">
                      <?php
                      /*
                      <section class="panel">
                          <div class="panel-body">
                              <div class="col-md-6">
                                  <div class="pro-img-details">
                                      jQuery Player here
                                      <img src="img/product-list/pro-thumb-big.jpg" alt=""/>
                                  </div>
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
                                  <h4 class="pro-d-title">
                                      <a href="#" class="">
                                          Call ID
                                      </a>
                                  </h4>
                                  <p>
                                      Praesent ac condimentum felis. Nulla at nisl orci, at dignissim dolor, The best product descriptions address your ideal buyer directly and personally. The best product descriptions address your ideal buyer directly and personally.
                                  </p>
                                  <?php
                                  
                                  <div class="product_meta">
                                      <span class="posted_in"> <strong>Categories:</strong> <a rel="tag" href="#">Jackets</a>, <a rel="tag" href="#">Men</a>, <a rel="tag" href="#">Shirts</a>, <a rel="tag" href="#">T-shirt</a>.</span>
                                      <span class="tagged_as"><strong>Tags:</strong> <a rel="tag" href="#">mens</a>, <a rel="tag" href="#">womens</a>.</span>
                                  </div>
                                  <div class="m-bot15"> <strong>Price : </strong> <span class="amount-old">$544</span>  <span class="pro-price"> $300.00</span></div>
                                  <div class="form-group">
                                      <label>Quantity</label>
                                      <input type="quantiy" placeholder="1" class="form-control quantity">
                                  </div>
                                  
                                  <p>
                                      <button class="btn btn-round btn-danger" type="button"><i class="icon-shopping-cart"></i> Return to List</button>
                                  </p>
                              </div>
                          </div>
                      </section>
                      */
                      ?>
          
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
                                      <a id="tabcampaignid" data-toggle="tab" href="#camp<?php echo $item['campaignid']; ?>">
                                           <?php echo $item['campaigname']; ?>
                                      </a>
                                  </li>
                                <?php $i+=1;endforeach;?>
                              </ul>
                          </header>
                                <?php
                                  //-----------------------------------------------------------
                                   if (isset($_POST['btn_purge']))
                                    {   //$frm_campaignid = $this->input->post('frm_campaignid');
                                        //echo $frm_campaignid;
                                          if (isset($_REQUEST[""."checkbox_quest".""]))
                                                 {
                                                    //$checkbox_quest = $_REQUEST[""."checkbox_quest".""];
                                                    $checkbox_quest = $this->input->post('checkbox_quest');
                                                    //echo $checkbox_quest;
                                                    $where_in = substr(implode(', ', $this->input->post('checkbox_quest')), 0);
                                                    $this->surveyform_model->qmp_purgeAssignedQuestions($where_in);
                                                    //echo $where_in;
                                                 }
                                    }
                                  //-----------------------------------------------------------
                                ?>
                          <div class="panel-body">
                            <form action="<?php echo $_SESSION['host_']?>index.php/crmcontroller/survey_details/" class="form-horizontal tasi-form" id="tab" method="POST">
                              <div class="tab-content tasi-tab">
                                   <button id="btn_purge" OnClick="return confirm('Delete records?');" name="btn_purge" class="btn btn-info "><i class="icon-refresh"></i> Purge</button>
                                    <?php $i=0;
                                foreach( $items1 as $item1 ):
                                $activeclass="";
                                if ($i==0) {$activeclass='active';}
                                    ?>                                
                                  <div id="camp<?php echo $item1['campaignid']; ?>" class="tab-pane <?php echo $activeclass; ?>">
                                    <?php
                                           $frm_campaignid = $item1['campaignid'];
                                           $query = $this->surveyform_model->get_questionsundercampaign($item1['campaignid']);
                                           $subquestions = $query ? count($query) : 0;
                                           if ( $subquestions ) :
                                            foreach( $query as $squestions ) :
                                    ?>
                                      <h4 class="pro-d-head"><?php echo $squestions['ratingtopic']; ?></h4>
                                    <?php
                                          //-------------------------loop questions here-------------------------
                                              $que = $this->surveyform_model->get_questionsundertopic(  $squestions['topic_id']);
                                               $subque = $que ? count($que) : 0;
                                               if ( $subque ) :
                                                foreach( $que as $sque ) :
                                    ?>
                                      <p> <input class="chkDemoCL03" name="checkbox_quest[]" id="checkbox_quest[]" value="<?php echo $sque['categoryid']; ?>" type="checkbox" />&nbsp;<?php echo $sque['category']; ?> </p>
                                    <?php
                                                endforeach;
                                               endif;
                                          
                                          //-------------------------loop questions here-------------------------
                                            endforeach;
                                           endif;
                                    ?>
                                    
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
                              <input type="hidden" name="frm_campaignid" />
                              </form>
                          </div>
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
                */
                ?>
                  
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
    <script>
        $(document).ready(function () {
            
           $("#btn_assign").click(function(e){
                    $(location).attr('href', '<?php echo site_url();?>/crmcontroller/show_surveyform');
                   });
           
           $("#tabcampaignid").click(function(e){
                    //alert($("#tabcampaignid").attr('href'));
                    //$('#frm_campaignid').val($("#tabcampaignid").attr('href'));
                   });
        /*           
        $('#myInputText').keyup(function() {
                    $('#myOutputText').val($(this).val());
                    $('#myDIVTag').html('<b>' + $(this).val() + '</b>');
                });           
        */           
                                            
        });
   </script>

      <!--footer start-->
      <!--footer end-->



