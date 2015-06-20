<?php //include('templates/header.php'); ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
        <!--link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="screen"/-->	
	<script src="<?php echo base_url();?>assets/javascripts/jquery.dataTables.min.js"></script>
         <?php 
            //calls the stylesheet for this particular data table to be displayed correctly   
              include('templates/datatablestyle.php'); ?>



        <div class="span9">
            <h1 class="page-title">Settings</h1>
<div class="btn-toolbar">
    <!--button class="btn btn-primary"><i class="icon-plus"></i> New Settings</button-->
	<a href="<?php echo site_url();?>/create/newform" class="btn btn-primary pull-right">New Settings</a>
    <!--button class="btn">Import</button>
    <button class="btn">Export</button-->
	<p>&nbsp;</p>
  <div class="btn-group">
  </div>
</div>
                                        <?php //------LOAD DATATABLE BEGIN--------------------------------------------------- ?>
                                    
                                    
                                        <?php //------LOAD DATATABLE END--------------------------------------------------- ?>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-danger" data-dismiss="modal">Delete</button>
    </div>
</div>

        </div>
    </div>                  
<?php //include('templates/footer.php'); ?>
