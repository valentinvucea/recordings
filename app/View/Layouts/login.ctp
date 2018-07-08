<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $this->Html->charset(); ?>
  	<title><?php echo $title_for_layout; ?></title>
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	
	<!--  meta info -->
	<?php
		echo $this->Html->meta(array("name"=>"viewport", "content"=>"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"));
		echo $this->Html->meta(array("name"=>"description", "content"=>"Login Form"));
		echo $this->Html->meta(array("name"=>"author", "content"=>"Valentin Vucea@Vav Creations"));
		echo $this->Html->meta(array("name"=>"apple-mobile-web-app-capable", "content"=>"yes"));
	?>

	<!-- styles -->
	<?php
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('bootstrap-responsive');
	?>
	
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">	
		
	<?php
		echo $this->Html->css('font-awesome.min');
		echo $this->Html->css('adminia-1.1');
		echo $this->Html->css('adminia-1.1-responsive');
		echo $this->Html->css('login');
	?>
	<!-- END styles-->
	
	<!-- scripts -->
	<?php
		echo $this->Html->script('jquery.min.js');
		echo $this->Html->script('bootstrap.js');
		echo $this->Html->script('jquery.unobtrusive-ajax.js');
		echo $this->Html->script('jquery.validate.js');
		echo $this->Html->script('jquery.validate.unobtrusive.js');
	?>
	<!-- END scripts-->
	
	<!-- FETCH -->
	<?php
		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
		
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

<body>
	
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 				
				</a>
				<a class="brand" href="#">Music Catalog</a>
				<!-- start nav collapse -->
	            <div class="nav-collapse">&nbsp;</div>
	            <!-- /nav-collapse -->
	    	</div> <!-- /container -->
		</div> <!-- /navbar-inner -->
	</div> <!-- /navbar -->


	<div id="login-container">
		
		<div id="login-header">
			<h3>Sign in</h3>
		</div> <!-- /login-header -->
		
		<!-- START LOGIN CONTENT -->
	    <div id="login-content" class="clearfix">
			<?php echo $this->Session->flash('flash', array('element' => 'alerta')); ?>
			<?php echo $content_for_layout; ?>
		</div> 
		<!-- /login-content -->
		
	</div> 
	<!-- /login-wrapper -->

	<?php
		echo $this->fetch('script');
	?>

</body>
</html>

