<?php defined( '_JEXEC' ) or die( 'Restricted access' );?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >

<html>

<head>
	<meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=yes"/>
	<meta name="HandheldFriendly" content="true" />
	<jdoc:include type="head" />

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/favicon.png">
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/custom.css" rel="stylesheet" type="text/css">
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/html5shiv.js"></script>
		<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- jQuery -->
	<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/dropdown-hover.js"></script>
	
	<!-- Google Analytics Module Position -->
	<jdoc:include type="modules" name="analytics" />

	<?php

	// Function to return css font stacks
	function fontStack($font) {

		if ($font == 'Helvetica') {
			$fontstack = '"Helvetica Neue", Helvetica, Arial, sans-serif';
		} else if ($font == 'Georgia') {
			$fontstack = 'Georgia, Times, "Times New Roman", serif';
		} else if ($font == 'Arial') {
			$fontstack = 'Arial, "Helvetica Neue", Helvetica, sans-serif';
		} else if ($font == 'Courier') {
			$fontstack = '"Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace';
		} else if ($font == 'Verdana') {
			$fontstack = 'Verdana, Geneva, sans-serif';
		} else if ($font == 'Tebuchet') {
			$fontstack = '"Trebuchet MS", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Tahoma, sans-serif';
		} else if ($font == 'Times') {
			$fontstack = 'TimesNewRoman, "Times New Roman", Times, Baskerville, Georgia, serif';
		} else {
			$fontstack = 'sans-serif';
		}

		return $fontstack;
	}

	// Function to return background gradient
	function backgroundGradient($gradient) {

		if ($gradient == 'Dark-up') {
			$background = "gradient-dark-up.png";
		} else if ($gradient == 'Dark-down') {
			$background = "gradient-dark-down.png";
		} else if ($gradient == 'Light-up') {
			$background = "gradient-light-up.png";
		} else if ($gradient == 'Light-down') {
			$background = "gradient-light-down.png";
		} else {
			$background = "";
		}

		return $background;

	}

	?>

	<!-- Changeable Styles from within template -->
	<style>

		body { 
			background-color: <?php echo $this->params->get('backgroundcolor'); ?>; /* Overall background color */
			background-image: url('<?php echo $this->baseurl . '/templates/' . $this->template . '/img/' . backgroundGradient($this->params->get('backgroundgradient')); ?>');
			background-size: 100% 100%;
			color: <?php echo $this->params->get('textcolor'); ?>; /* Colour of the text on the site */
			font-family: <?php echo fontStack($this->params->get('bodyfont')); ?>;
			font-size: <?php echo $this->params->get('bodyfontsize'); ?>px;
		}

		#site-content { 
			background-color: <?php echo $this->params->get('bodybackgroundcolor'); ?>; /* Content background color */
		}

		.navbar {
			
			<?php if ($this->params->get('menudropshadow') == '1') { ?>	
				box-shadow: 0px 3px 4px #666; /* Add a drop shadow to the menu bar */
			<?php } ?>
		
		}

		.navbar-default, .dropdown-menu { 
			border-top: 2px solid <?php echo $this->params->get('menubordercolor'); ?>; /* Navbar top border */
			border-bottom: 2px solid <?php echo $this->params->get('menubordercolor'); ?>; /* Navbar bottom border */
			border-right: 0px; /* Remove right border */
			border-left: 0px; /* Remove left border */
			background-color: <?php echo $this->params->get('menubackgroundcolor'); ?>; /* Navbar background color */
			background-image: url('<?php echo $this->baseurl . '/templates/' . $this->template . '/img/' . backgroundGradient($this->params->get('menugradient')); ?>');
			background-size: 100% 100%;
		}

		.navbar-default .navbar-nav>li>a, .dropdown-menu>li>a, .navbar-default .navbar-nav .open .dropdown-menu>li>a {
			color: <?php echo $this->params->get('menulinkcolor'); ?>; /* Navbar link colour */
			font-family: <?php echo fontStack($this->params->get('menufont')); ?>;
			font-size: <?php echo $this->params->get('menufontsize'); ?>px;
			padding: <?php echo $this->params->get('menupaddingvertical'); ?>px <?php echo $this->params->get('menupaddinghorizontal'); ?>px;
		}

		.navbar-default .navbar-nav>li>a:hover, .navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:hover, .navbar-default .navbar-nav>.open>a:focus, .dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus, .navbar-default .navbar-nav .open .dropdown-menu>li>a:hover, .navbar-default .navbar-nav .open .dropdown-menu>li>a:focus {
			color: <?php echo $this->params->get('menulinkhovercolor'); ?>; /* Navbar link hover color */
			background-color: <?php echo $this->params->get('menulinkhoverbackground'); ?>; /* Navbar link hover background color */
		}

		.navbar-default .navbar-toggle, .navbar-default .navbar-toggle .icon-bar, .navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
			background-color: transparent; /* Mobile nav button background color */
			border: 1px solid <?php echo $this->params->get('menulinkcolor'); ?>; /* Outline colour of mobile nav button */
		}

		#sidebar h1, #sidebar h2, #sidebar h3, #sidebar h4, #sidebar h5, #sidebar h6 {
			background-color: <?php echo $this->params->get('sidebartitlebackground'); ?>; /* Sidebar header background color */
			border-bottom: 2px solid <?php echo $this->params->get('sidebartitleborder'); ?>; /* Solid line at the botom of the header */
			padding: 10px; /* Padding around the text */
			font-family: <?php echo fontStack($this->params->get('sidebartitlefont')); ?>;
			font-weight: normal; /* Stop headers being bold */
		}

		.navbar-default .navbar-brand {
			font-size: 18px;
			color: <?php echo $this->params->get('menulinkcolor'); ?>;
		}

		.navbar-default .navbar-brand:hover {
			color: <?php echo $this->params->get('menulinkcolor'); ?>;
		}

		#body h1, #body h2, #body h3, #body h4 {
			font-family: <?php echo fontStack($this->params->get('headingfont')); ?>;
			color: <?php echo $this->params->get('headingcolor'); ?>;
		}

		#site-body a:not(.btn) {
			color: <?php echo $this->params->get('textlinkcolor'); ?>;
			text-decoration: none;
		}

		#site-body a:not(.btn):hover {
			color: <?php echo $this->params->get('textlinkhovercolor'); ?>;
			text-decoration: underline;
		}
	</style>
</head>

<body>

<!-- The whole site sits in a container -->
<div class="container" id="site-content">

	<!-- Header -->
	
	<!-- Hero Image -->
	<?php if ($this->countModules( 'hero-image-above' )) : ?>
		<div id="hero-image">
			<jdoc:include type="modules" name="hero-image-above" />
		</div>
	<?php endif; ?>
	
	<!-- Menu -->
	<div id="menu">
		<jdoc:include type="modules" name="menu" />
	</div>
	
	<!-- Hero Image -->
	<?php if ($this->countModules( 'hero-image-below' )) : ?>
		<div id="hero-image">
			<jdoc:include type="modules" name="hero-image-below" />
		</div>
	<?php endif; ?>
	
	
	<div id="site-body">
		<!-- Start Content -->
		
		<!-- Top banner -->
		<?php if ($this->countModules( 'above-content-full' )) : ?>
			<div>
				<jdoc:include type="modules" name="above-content-full" />
			</div>
		<?php endif; ?>
		
		<?php 
		// Get layout options
		$sidebar = 0;
		
		if ($this->countModules( 'sidebar-left' )) {
			$sidebar ++;	
		}
		
		if ($this->countModules( 'sidebar-right' )) {
			$sidebar ++;	
		}
		
		if ($sidebar == 0) {
			$bodylayout = '<div id="body" class="col-md-12">';
		} else if ($sidebar == 1) {
			if ($this->countModules( 'sidebar-left' )) {
				$bodylayout = '<div id="body" class="col-md-10 col-md-push-2">';
			} else {
				$bodylayout = '<div id="body" class="col-md-10">';
			}
		} else if ($sidebar == 2) {
			if ($this->countModules( 'sidebar-left' )) {
				$bodylayout = '<div id="body" class="col-md-8 col-md-push-2">';
			} else {
				$bodylayout = '<div id="body" class="col-md-8">';
			}
		}
		
		
		?>
		
		
		<?php echo $bodylayout;?>
			
			<!-- Top banner -->
			<?php if ($this->countModules( 'above-content' )) : ?>
				<div>
					<jdoc:include type="modules" name="above-content" />
				</div>
			<?php endif; ?>

			<jdoc:include type="component" />

			<!-- Top banner -->
			<?php if ($this->countModules( 'below-content' )) : ?>
				<div>
					<jdoc:include type="modules" name="below-content" />
				</div>
			<?php endif; ?>
			
		</div>
		
		<!-- Left sidebar -->
		<?php if ($this->countModules( 'sidebar-left' )) : ?>
			<?php if ($this->countModules( 'sidebar-right' )) { ?>
				<div id="sidebar" class="col-md-2 col-md-pull-8">
			<?php } else { ?>
				<div id="sidebar" class="col-md-2 col-md-pull-10">
			<?php } ?>
				<jdoc:include type="modules" name="sidebar-left" />
			</div>
		<?php endif; ?>

		<!-- Right sidebar -->
		<?php if ($this->countModules( 'sidebar-right' )) : ?>
			<div id="sidebar" class="col-md-2">
				<jdoc:include type="modules" name="sidebar-right" headerLevel="3" />
			</div>
		<?php endif; ?>
		
		<!-- Force new line -->
		<div style="clear: both;"></div>
		
		<!-- Bottom banner -->
		<?php if ($this->countModules( 'below-content-full' )) : ?>
			<div>
				<jdoc:include type="modules" name="below-content-full" />
			</div>
		<?php endif; ?>
	</div>

	<?php if ($this->countModules( 'footer' )) : ?>
		<div id="hero-image">
			<jdoc:include type="modules" name="footer" />
		</div>
	<?php endif; ?>
</div>


</body>
</html>
