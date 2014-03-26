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
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/like_dislike.css">
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/modernizr.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.topbar.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.dropdown.js"></script>
		<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/jquery.js"></script> -->
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.alert.js"></script>
		<script type="text/javascript">
			$(function(){ 
				// on load
				$('#logged-content').hide();

		        // on signin click 
		        $("#signin").submit(function(e) {
					$.ajax({
	                    type: $("#signin").attr('method'),
	                    url: $("#signin").attr('action'),
	                    data: $("#signin").serialize(),
	                    dataType: "json",
	                    error : function(xhr, textStatus, errorThrown){
							alert("error : " + xhr.status + textStatus + errorThrown);
						},
	                    success: function(data){
							if (data.status == 'good') {
								$("#signin").hide();
            					$('#logged-content').show();
	                    	}
	                    	else if (data.status == 'notgood') {
	                    		alert(data.message);
	                    	}
	                    }  
	                });	
	                return false;
		        });

	   		});
		</script>
	</head>
	<body>
		<form method="get" action="<?php echo base_url(); ?>search">

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
									<input type="text" name="v_search" placeholder="Find Stuff" required="required">
								</div>
								<div class="large-2 small-3 columns">
									<input class="alert button expand" type="submit" value="Valider" />
							</div>
						</li>
					</form>
				</ul>
				
				<!-- Right Nav Section -->
				<ul class="right" id="signin-nav">
					<form action="<?php echo base_url().'member/login'; ?>"method="post" id="signin">
						<li class="has-form">
							<div class="row collapse">
								<div>
									<input type="text" name="email" id="email" placeholder="log-in" required="required">
								</div>
							</div>
						</li>
						<li class="has-form">
							<div class="row collapse">
								<div>
									<input type="text" name="password" id="password" placeholder="password" required="required">
								</div>
							</div>
						</li>
						<li class="has-form">
							<div class="row collapse">
								<div>
									<input class="button radius" type="submit" value="Sign in" />
								</div>
							</div>
						</li>
						<li class="has-form">
							<div class="row collapse">
								<a href="<?php echo base_url()."member/addMemberPage"?>" class="button radius">Sign up</a>
							</div>
						</li>
					</form>
					<div id="logged-content">
						<li class="has-form">
							<div class="row collapse">
								<div>
									<input type="text" name="email" id="email" placeholder="log-in" required="required">
								</div>
							</div>
						</li>
					</div>
				</ul>
			</section>
		</nav>
		</form>

	<div class="row full-width">
	<?php echo $menu; ?>
