<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Quality Management Portal">
    <meta name="keyword" content="Quality Management Portal">
    <link rel="shortcut icon" href="img/favicon.png">
		<?php $base_url = base_url(); ?>
		<script type="text/javascript">
		root = "<?php echo $base_url; ?>";
		</script>

    <title>Quality Management Portal</title>


    <!-- Bootstrap core CSS -->
    <link href="<?php echo $base_url; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo $base_url; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo $base_url; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo $base_url; ?>js/html5shiv.js"></script>
    <script src="<?php echo $base_url; ?>js/respond.min.js"></script>
    <![endif]-->
	</head>

	
  <body class="login-body">

    <div class="container">

      <form class="form-signin" action="<?php echo site_url();?>/login/login_user" method="post" accept-charset="utf-8">
        <h2 class="form-signin-heading">sign in now</h2>
		
                  <?php if (isset($error) && $error): ?>
				    <br />
					<div class="alert alert-info">
						<?php //Please login with your Username and Password. ?>
                              <a class="close" data-dismiss="alert" href="#">×</a>Incorrect Username or Password!                                                
					</div>
                  <?php endif; ?>				
		
        <div class="login-wrap">
            <input type="text" name="email" id="email" class="form-control" placeholder="User ID" autofocus>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
			<?php
			/*
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label>
			
            <p>or you can sign in via social network</p>
            <div class="login-social-link">
                <a href="index.html" class="facebook">
                    <i class="icon-facebook"></i>
                    Facebook
                </a>
                <a href="index.html" class="twitter">
                    <i class="icon-twitter"></i>
                    Twitter
                </a>
            </div>
            <div class="registration">
                Don't have an account yet?
                <a class="" href="registration.html">
                    Create an account
                </a>
            </div>
			*/
			?>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>

        </div>


      </form>
	  
          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->
	  

    </div>
	
	    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo $base_url; ?>js/jquery.js"></script>
    <script src="<?php echo $base_url; ?>js/bootstrap.min.js"></script>

</body>
</html>