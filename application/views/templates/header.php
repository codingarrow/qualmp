<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Quality Management Portal">
    <meta name="keyword" content="Quality Management Portal">
    <link rel="shortcut icon" href="img/favicon.png">

  <title>Quality Management Portal</title>
		<?php $base_url = base_url(); ?>
		<script type="text/javascript">
		root = "<?php echo $base_url; ?>";
		</script>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $base_url; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo $base_url; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <?php //required in tabs ?>
    <link href="<?php echo $base_url; ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet"/>
    
     <?php
        $needle = "search_call_list";
        $haystack = current_url();
        if (strpos($haystack, $needle) !== false)
        {
     ?>
    <link href="<?php echo $base_url; ?>assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="<?php echo $base_url; ?>assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
     <?php    
        }
     ?>
	<link href="<?php echo $base_url; ?>css/table-responsive.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo $base_url; ?>assets/data-tables/DT_bootstrap.css" />
	
    <!--<link href="css/navbar-fixed-top.css" rel="stylesheet">-->

      <!-- Custom styles for this template -->
    <link href="<?php echo $base_url; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo $base_url; ?>js/html5shiv.js"></script>
      <script src="<?php echo $base_url; ?>js/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body class="full-width">

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>

              <!--logo start-->
              <a href="index.html" class="logo" >Q M<span> P</span></a>
              <!--logo end-->
                    <?php
                      //<li><a href="#">Components</a></li>
			$userlevel = $this->session->userdata('userlevel');
				   switch ($userlevel) 
						  {
						    case -1:
							       //ok to proceed
						     $startpage = '/crmcontroller/show_surveyform';
						     $pagename="Survey Form";
						     break;
						    default:
						     $startpage = '/crmcontroller/search_call_list';
						     $pagename="Call List";
						  }
		    ?>
              <div class="horizontal-menu navbar-collapse collapse ">
                  <ul class="nav navbar-nav">
                      <li><a href="<?php echo site_url().$startpage; ?>"><?php echo $pagename; ?></a></li>
                    <?php
			$userlevel = $this->session->userdata('userlevel');
				   switch ($userlevel) 
						  {
						    case -1:
		    ?>
                      <li class="dropdown">
                          <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">Admin Tools<b class=" icon-angle-down"></b></a>
                          <ul class="dropdown-menu">
                              <li><a href="<?php echo site_url(); ?>/create/viewsite_question">Questions</a></li>
                              <li><a href="<?php echo site_url(); ?>/create/viewsite_topic">Topic</a></li>
                              <li><a href="<?php echo site_url(); ?>/create/viewsite_setting">Site</a></li>
                          </ul>
                      </li>
                    <?php
						     break;
						    default:
							               
						  }
		    
					/*
					 *class="active"
                      <li class="dropdown">
                          <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">UI Element <b class=" icon-angle-down"></b></a>
                          <ul class="dropdown-menu">
                              <li><a href="general.html">General</a></li>
                              <li><a href="buttons.html">Buttons</a></li>
                              <li><a href="widget.html">Widget</a></li>
                              <li><a href="slider.html">Slider</a></li>
                              <li><a href="nestable.html">Nestable</a></li>
                              <li><a href="font_awesome.html">Font Awesome</a></li>
                          </ul>
                      </li>
                      <li><a href="basic_table.html">Tables</a></li>
                      
                      <li class="dropdown">
                          <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">Extra <b class=" icon-angle-down"></b></a>
                          <ul class="dropdown-menu">
                              <li><a href="blank.html">Blank Page</a></li>
                              <li><a href="boxed_page.html">Boxed Page</a></li>
                              <li><a href="profile.html">Profile</a></li>
                              <li><a href="invoice.html">Invoice</a></li>
                              <li><a href="search_result.html">Search Result</a></li>
                              <li><a href="404.html">404 Error Page</a></li>
                              <li><a href="500.html">500 Error Page</a></li>
                          </ul>
                      </li>
					*/
					?>
                  </ul>

              </div>
              <div class="top-nav ">
                  <ul class="nav pull-right top-menu">
                    <?php
					/*
                      <li>
                          <input type="text" class="form-control search" placeholder=" Search">
                      </li>
					  Only show this when there are users logged in
					*/
					//if (@$_SESSION[EW_SESSION_USER_PROFILE_USER_NAME] != "")
                    if($this->session->userdata('isLoggedIn'))					
					{
					?>
					  
                      <!-- user login dropdown start-->
                      <li class="dropdown">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                              <!--img alt="" src="img/avatar1_small.jpg"-->
                              <span class="username"><?php echo $this->session->userdata('user_id') . " " . $this->session->userdata('userlevel'); ?></span>
                              <b class="caret"></b>
                          </a>
                          <ul class="dropdown-menu extended logout">
                              <div class="log-arrow-up"></div>
                              <li><a href="#"><i class=" icon-suitcase"></i>Profile</a></li>
                              <li><a href="#"><i class="icon-cog"></i> Settings</a></li>
                              <li><a href="#"><i class="icon-bell-alt"></i> Notification</a></li>
                              <li><a href="<?php echo site_url(); ?>/login/logout_user"><i class="icon-key"></i> Log Out</a></li>
                          </ul>
                      </li>
                      <!-- user login dropdown end -->
                    <?php
					}
					?>   					  
                  </ul>
              </div>

          </div>

      </header>
      <!--header end-->
      <!--sidebar start-->
