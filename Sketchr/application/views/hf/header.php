<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Sketchr</title>
		<link type="image/ico" rel="shortcut icon" href="<?php echo base_url(); ?>assets/logo/logo.ico">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/foundation/css/foundation.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/foundation/css/app.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqueryui-1.10.4/css/custom-theme/jquery-ui.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/like_dislike.css">
		
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/example_comment.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery.autocomplete.css">

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/jquery.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/modernizr.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.topbar.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.dropdown.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.alert.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery.autocomplete.js"></script>
		<script type="text/javascript">
			
			$(function(){ 

				// on page load
				$(document).ready(function(e) {
					$.ajax({
						type: "post",
						url: "<?php echo base_url().'member/is_logged_in'; ?>", 
						dataType: "json",
						error : function(xhr, textStatus, errorThrown){
							alert("error : " + xhr.status + textStatus + errorThrown);
						},
						success : function(response) {
							if(response.logged_in == 'false') {
            					$('#loggedin-nav').hide();	
            					$('#signin-nav').show();
							} else {
								$('#signin-nav').hide();
            					$('#loggedin-nav').show();
							}
						}
					});
					return false;
				});

				function findValue(li) {
					if( li == null ) return alert("No match!");

					// if coming from an AJAX call, let's use the CityId as the value
					//if( !!li.extra ) var sValue = li.extra[0];

					// otherwise, let's just display the value in the text box
					var sValue = li.selectValue;

					//alert("The value you selected was: " + sValue);
				}

				function selectItem(li) {
					findValue(li);
				}

				function formatItem(row) {
					return row[0] ;//+ " (id: " + row[1] + ")";
				}

				function lookupAjax(){
					var oSuggest = $("#autocomplete_search")[0].autocompleter;
					oSuggest.findValue();
					return false;
				}

				  
				$("#autocomplete_search").autocomplete(
					$("#keyword").attr('action') + "/ajaxTitle",
					{
						delay:10,
						minChars:3, //When the user types at least 3 letters
						matchSubset:1,
						matchContains:1,
						cacheLength:10,
						onItemSelect:selectItem,
						onFindValue:findValue,
						formatItem:formatItem,
						autoFill:false //Avoid the input field to be filled, only display the results with a select
					}
				);
				/*on key up search_bar
				$("#searchBar").keyup(function() {
					var recherche = $(this).val();
					recherche = $.trim(recherche);
					if(recherche.length>3) {
						//alert(recherche);
						$("#resultatAjax").text(recherche);
					}
				});*/
				
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
	                    success: function(result){      
							if (result.status == 'good') {
								$('#signin-nav').hide();
            					$('#loggedin-nav').show();
	                    	}
	                    	else if (result.status == 'notgood') {
	                    		alert(result.message);
	                    	}
	                    }  
	                });	
	                return false;
		        });

		        // on logout click 
		        $("#logout").click(function(e) {
					$.ajax({
	                    type: "post",
	                    url: "<?php echo base_url().'member/logout'; ?>",
	                    dataType: "json",
	                    error : function(xhr, textStatus, errorThrown){
							alert("error : " + xhr.status + textStatus + errorThrown);
						},
	                    success: function(result){   
            				$('#loggedin-nav').hide();   
	                    	$('#signin-nav').show();
	                   	}
	                });	
	                return false;
		        });

	   		});
		</script>
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
					<form id="keyword" method="get" action="<?php echo base_url(); ?>search">
						<li class="has-form">
							<div class="row collapse">
								<div class="large-10 small-9 columns">
									<input id="autocomplete_search" class="ac_input" type="text" name="pv_search" placeholder="Find Stuff">
								</div>
								<div class="large-2 small-3 columns">
									<input class="alert button expand" type="submit" value="Valider" />
								</div>
							</div>	
						</li>
					</form>
				</ul>
				
				<!-- Right Nav Section -->
				<div id="login-content">
					<ul class="right">

						<div id="signin-nav">
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
											<input type="password" name="password" id="password" placeholder="password" required="required">
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
						</div>

						<div id="loggedin-nav">
							<li class="litext"><?php echo $user_session['first_name'].' '.$user_session['last_name'] ?></li>
							<li class="has-form">
								<div class="row collapse">
									<div>
										<button id="logout" class="button radius">Logout</button>
									</div>
								</div>
							</li>
						</div>

					</ul>
				</div>	
			</section>
		</nav>

	<div class="row full-width">
	<?php echo $menu; ?>
