  <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 &copy; Quality Management Portal.
              <a href="#" class="go-top">
                  <i class="icon-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

<?php $base_url = base_url(); ?>
  
    <!-- js placed at the end of the document so the pages load faster -->
    <!--script src="<?php echo $base_url;?>js/jquery.js"></script-->
    <script src="<?php echo $base_url;?>js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo $base_url;?>js/jquery.dcjqaccordion.2.7.js"></script>
    <script type="text/javascript" src="<?php echo $base_url;?>js/hover-dropdown.js"></script>
    <script src="<?php echo $base_url;?>js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo $base_url;?>js/jquery.nicescroll.js" type="text/javascript"></script>
    
    <?php //required in tabs ?>
    <script src="<?php echo $base_url;?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo $base_url;?>js/jquery.customSelect.min.js" ></script>
    
    <script src="<?php echo $base_url;?>js/respond.min.js" ></script>
    
    <script src="<?php echo $base_url;?>js/form-component.js"></script>

    <!--common script for all pages-->
    <script src="<?php echo $base_url;?>js/common-scripts.js"></script>
    
     <?php
        $needle = "show_surveyform";
        $haystack = current_url();
        if (strpos($haystack, $needle) !== false)
        {
     ?>
    <script src="<?php echo $base_url;?>js/jquery.stepy.js"></script>
     <?php
        }
     ?>
    
     <?php
        $needle = "search_call_list";
        $haystack = current_url();
        if (strpos($haystack, $needle) !== false)
        {
     ?>
        <script src='<?php echo $base_url; ?>web/js/print_lib.js' type='text/javascript'></script>
	<script src='<?php echo $base_url; ?>web/js/calendar-setup.js' type='text/javascript'></script>
	<script src='<?php echo $base_url; ?>web/js/calendar.js' type='text/javascript'></script>
	<script src='<?php echo $base_url; ?>web/js/calendar-core.js' type='text/javascript'></script>
	<script type='text/javascript' src='<?php echo $base_url; ?>web/js/calender/mycal-en.js'></script>
	<link rel='stylesheet' type='text/css' media='screen' href='<?php echo $base_url; ?>web/css/mycal.css' />

        <!--script type="text/javascript" language="javascript" src="<?php echo $base_url; ?>assets/advanced-datatable/media/js/jquery.js"></script-->    
        <script type="text/javascript" src="<?php echo $base_url; ?>assets/data-tables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo $base_url; ?>assets/data-tables/DT_bootstrap.js"></script>
        <!--script type="text/javascript" language="javascript" src="<?php echo $base_url; ?>assets/advanced-datatable/media/js/jquery.dataTables.js"></script-->
      <!--script for this page only-->
        <!--script src="<?php echo $base_url; ?>js/editable-table.js"></script-->

      <!-- END JAVASCRIPTS -->
      
     <?php    
        }
     ?>
    
    

    <?php //required in tabs ?>
      <script type="text/javascript">

          $(document).ready(function() {

              $(function(){
                  $('select.styled').customSelect();
              });
          });


      </script>

  </body>
</html>
