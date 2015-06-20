<script src="<?php echo base_url();?>js/191jquery.min.js"></script> 
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
                  
                  <div class="col-md-12">

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
                                      <button id="btn_list" class="btn btn-info "><i class="icon-refresh"></i> To List</button>                                      
                                  </p>
                              </div>
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
                          <div class="panel-body">
                          <?php
                            //------------------------------------------ratings code------------------------------------------------
                            $call_id = $this->input->get_post('call_id', TRUE);
                            $yescounts = $this->show_call_model->qmp_getcountofquestions($call_id,1);
                            $nocounts = $this->show_call_model->qmp_getcountofquestions($call_id,2);
                            //Not Applicable
                            $nacounts = $this->show_call_model->qmp_getcountofquestions($call_id,3);
                            
                              //trick by http://stackoverflow.com/questions/5614879/how-to-hide-the-divide-by-zero-exception-in-php
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
                            if (isset($_POST['btn_clearrating'])) {
                                 $this->show_call_model->qmp_clearratings();
                            }
                            //------------------------------------------ratings code------------------------------------------------
                          
                          ?>
                              <div class="tab-content tasi-tab">
                                
                                    <?php $i=0;
                                foreach( $items1 as $item1 ):
                                $activeclass="";
                                if ($i==0) {$activeclass='active';}
                                    ?>                                
                                  <div id="camp<?php echo $item1['campaignid']; ?>" class="tab-pane <?php echo $activeclass; ?>">
                                    <!--table cellpadding="0" cellspacing="0" border="0" id="hidden-table-info"-->
                                    <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                    <th></th>
                                                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10
                                                    9&nbsp;
                                                    8&nbsp;
                                                    7&nbsp;
                                                    6&nbsp;
                                                    5&nbsp;
                                                    4&nbsp;
                                                    3&nbsp;
                                                    2&nbsp;
                                                    1&nbsp;
                                                    0&nbsp;
                                                    </th>
                                            </tr>
                                            </thead>
                                            <tbody>                                        
                                    <?php
                                           $query = $this->surveyform_model->get_questionsundercampaign($item1['campaignid']);
                                           $subquestions = $query ? count($query) : 0;
                                           if ( $subquestions ) :
                                            foreach( $query as $squestions ) :
                                    ?><tr>
                                      <td colspan="2"><h4 class="pro-d-head"><?php echo $squestions['ratingtopic']; ?></h4></td>
                                      </tr>
                                    <?php
                                          //-------------------------loop questions here-------------------------
                                              $que = $this->surveyform_model->get_questionsundertopic(  $squestions['topic_id']);
                                               $subque = $que ? count($que) : 0;
                                               if ( $subque ) :
                                                foreach( $que as $sque ) :
                                    ?>
                                    <tr>
                                      <td><p> <?php echo $sque['category']; ?> </p></td>
                                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input disabled name="rdo32" id="rdo32" type="radio" value="1,32,1" />&nbsp;
                                          <input disabled name="rdo32" id="rdo32" type="radio" value="1,32,1" />&nbsp;
                                          <input disabled name="rdo32" id="rdo32" type="radio" value="1,32,1" />&nbsp;
                                          <input disabled name="rdo32" id="rdo32" type="radio" value="1,32,1" />&nbsp;
                                          <input disabled name="rdo32" id="rdo32" type="radio" value="1,32,1" />&nbsp;
                                          <input disabled name="rdo32" id="rdo32" type="radio" value="1,32,1" />&nbsp;
                                          <input disabled name="rdo32" id="rdo32" type="radio" value="1,32,1" />&nbsp;
                                          <input disabled name="rdo32" id="rdo32" type="radio" value="1,32,1" />&nbsp;
                                          <input disabled name="rdo32" id="rdo32" type="radio" value="1,32,1" />&nbsp;
                                          <input disabled name="rdo32" id="rdo32" type="radio" value="1,32,1" />&nbsp;
                                          <input disabled name="rdo32" id="rdo32" type="radio" value="1,32,1" />&nbsp;
                                          </td>
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
            
           $("#btn_list").click(function(e){
                    $(location).attr('href', '<?php echo site_url();?>/crmcontroller/search_call_list');
                   });
                                            
        });
   </script>      

      <!--footer start-->
      <!--footer end-->



