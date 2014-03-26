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
		<script type="text/javascript" >
			$(function(){ 
		        //alert(event.timeStamp); 
		        /*
		        $('.new-com-bt').click(function(event){    
		            $(this).hide();
		            $('.new-com-cnt').show();
		            $('#name-com').focus();
		        });*/

		        /* when start writing the comment activate the "add" button
		        $('.the-new-com').bind('input propertychange', function() {
		           $(".bt-add-com").css({opacity:0.6});
		           var checklength = $(this).val().length;
		           if(checklength){ $(".bt-add-com").css({opacity:1}); }
		        });
*/
		        /* on clic  on the cancel button 
		        $('.bt-cancel-com').click(function(){
		            $('.the-new-com').val('');
		            $('.new-com-cnt').fadeOut('fast', function(){
		                $('.new-com-bt').fadeIn('fast');
		            });
		        });
*/
		        // on signin click 
		        $("#signin").submit(function(e) {
		            var email = $('#email');
		            var password = $('#password');

		            alert(email.val());

	                $.ajax({
	                    type: "POST",
	                    url: "<?php echo base_url()."member/login"?>",
	                    data: 'email='+email.val()+'&password='+password.val(),
	                    error : function(xhr, textStatus, errorThrown){
							alert(textStatus + errorThrown);
						},
	                    success: function(data){
	                    	alert(data)
	                    	/*
	                        theCom.val('');
	                        theMail.val('');
	                        theName.val('');
	                        $('.new-com-cnt').hide('fast', function(){
	                            $('.new-com-bt').show('fast');
	                            $('.new-com-bt').before(html);  
	                        })
	                    }  */
	                });	
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
				<ul class="right">
					<form action="" id="signin" method="post" >
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
				</ul>
			</section>
		</nav>
		</form>

	<div class="row full-width">
	<?php echo $menu; ?>
