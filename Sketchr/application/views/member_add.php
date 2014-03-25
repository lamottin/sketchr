<div class="columns content-container">

	<div class="large-11 columns">
	 
	    <div class="row">
			<div class="large-12 columns">
				<h5>ADD MEMBER</h5>
			</div>
		</div>

		<div class="row">
			<form method="post" action="<?php echo base_url(); ?>member/add" name="member" id="member">
				<div class="small-8 columns">
					
					<label class="control-label" for="title">First Name</label>
					<?php echo "<input type=\"text\" name=\"firstname\" placeholder=\"Type the firstname here\" value=\""; echo set_value('firstname') ."\" class=\"required\" id=\"firstname\"/>";
					
						$error_firstname = form_error('firstname');
						$label = (!empty($error_firstname)) ? "<small class=\"error\">".$error_firstname."</small>" : "" ;
						echo $label;
					?>
					
					
					<label class="control-label" for="title">Last Name</label>
					<?php echo "<input type=\"text\" name=\"lastname\" value=\""; echo set_value('lastname') ."\" class=\"required\" id=\"lastname\"/>";
						$error_lastname = form_error('lastname');
						$label = (!empty($error_lastname)) ? "<small class=\"error\">".$error_lastname."</small>" : "" ;
						echo $label;
					?>


					<label class="control-label" for="title">Email Address</label>
					<?php echo "<input type=\"text\" name=\"email\" value=\""; echo set_value('email') ."\" class=\"required\" id=\"email\"/>";
						$error_email = form_error('email');
						$label = (!empty($error_email)) ? "<small class=\"error\">".$error_email."</small>" : "" ;
						echo $label;
					?>


					<label class="control-label" for="title">Password</label>
					<?php echo "<input type=\"password\" name=\"password\" value=\""; echo set_value('password') ."\" class=\"required\" id=\"password\"/>";
						$error_password = form_error('password');
						$label = (!empty($error_password)) ? "<small class=\"error\">".$error_password."</small>" : "" ;
						echo $label;
					?>


					<label class="control-label" for="title">Confirm Password</label>
					<?php echo "<input type=\"password\" name=\"confirm\" value=\""; echo set_value('confirm') ."\" class=\"required\" id=\"confirm\"/>";
						$error_confirm = form_error('confirm');
						$label = (!empty($error_confirm)) ? "<small class=\"error\">".$error_confirm."</small>" : "" ;
						echo $label;
					?>
					
					
					<label class="control-label" for="title">Country</label>
					<?php echo "<input type=\"text\" name=\"country\" value=\""; echo set_value('country') ."\" class=\"required\" id=\"country\"/>";
						$error_country = form_error('country');
						$label = (!empty($error_country)) ? "<small class=\"error\">".$error_country."</small>" : "" ;
						echo $label;
					?>


					<label class="control-label" for="title">Postcode</label>
					<?php echo "<input type=\"text\" name=\"postcode\" value=\""; echo set_value('postcode') ."\" class=\"required\" id=\"postcode\"/>";
						$error_postcode = form_error('postcode');
						$label = (!empty($error_postcode)) ? "<small class=\"error\">".$error_postcode."</small>" : "" ;
						echo $label;
					?>


					<label class="control-label" for="title">City</label>
					<?php echo "<input type=\"text\" name=\"city\" value=\""; echo set_value('city') ."\" class=\"required\" id=\"city\"/>";
						$error_city = form_error('city');
						$label = (!empty($error_city)) ? "<small class=\"error\">".$error_city."</small>" : "" ;
						echo $label;
					?>

					
					<label class="control-label" for="title">Birthdate</label>
					<?php echo "<input type=\"text\" name=\"birthdate\" placeholder=\"Type the birthdate here\" value=\""; echo set_value('birthdate') ."\" class=\"datepicker\" id=\"birthdate\" readonly='true'/>";
					
						$error_birthdate = form_error('birthdate');
						$label = (!empty($error_birthdate)) ? "<small class=\"error\">".$error_birthdate."</small>" : "" ;
						echo $label;
					?>

					
					<input type="submit" name="submit" id="submit" class="button" value="Submit" />
				</div>
			</form>
		</div>
	</div>
</div> 