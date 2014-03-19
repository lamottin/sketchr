<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Sketchr</title>
		<link type="image/ico" rel="shortcut icon" href="<?php echo base_url(); ?>assets/logo/logo.ico">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/foundation/css/foundation.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqueryui-1.10.4/css/custom-theme/jquery-ui.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/foundation/css/app.css" />
		
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/modernizr.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.topbar.js"></script>
		<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/jquery.js"></script> -->
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.alert.js"></script>
	</head>
	<body>

	<nav class="top-bar" data-topbar>
		<ul class="title-area">
			<li class="name large-8 small-9 columns">
				<h1><a href="<?php echo base_url(); ?>">Sketchr</a></h1>
			</li>
			<li class="toggle-topbar menu-icon">
				<a href="#">Menu</a>
			</li>
		</ul>

		<section class="top-bar-section">
			<!-- Left Nav Section -->
			<ul class="left">
				<form action="">
					<li class="has-form">
						<div class="row collapse">
							<div class="large-10 small-9 columns">
								<input type="text" placeholder="Find Stuff">
							</div>
							<div class="large-2 small-3 columns">
								<a href="#" class="alert button expand">Search</a>
							</div>
						</div>
					</li>
				</form>
			</ul>
			
			<!-- Right Nav Section -->
			<ul class="right">
				<li class="has-form">
					<a href="http://foundation.zurb.com/docs" class="button radius">Sign in</a>
				</li>
			</ul>
		</section>
	</nav>


	<div class="row full-width">
	<?php echo $menu; ?>
