<div class="columns content-container">

	<div class="large-11 columns">
	 
	    <div class="row">
			<div class="large-12 columns">
				<h5>ADD HUMORIST</h5>
			</div>
		</div>

		<div class="row">
			<form method="post" action="<?php echo base_url(); ?>humorist/add" name="humorist" id="humorist">
				<div class="small-8 columns">
					
					<label class="control-label" for="title">Firstname</label>
					<?php echo "<input type=\"text\" name=\"firstname\" placeholder=\"Type the firstname here\" value=\""; echo set_value('firstname') ."\" class=\"required\" id=\"firstname\"/>";
					
						$error_firstname = form_error('firstname');
						$label = (!empty($error_firstname)) ? "<small class=\"error\">".$error_firstname."</small>" : "" ;
						echo $label;
					?>
					
					
					<label class="control-label" for="title">Lastname</label>
					<?php echo "<input type=\"text\" name=\"lastname\" placeholder=\"Type the lastname here\" value=\""; echo set_value('lastname') ."\" class=\"required\" id=\"lastname\"/>";
						$error_lastname = form_error('lastname');
						$label = (!empty($error_lastname)) ? "<small class=\"error\">".$error_lastname."</small>" : "" ;
						echo $label;
					?>
					
					
					<label class="control-label" for="title">Birthdate</label>
					<?php echo "<input type=\"text\" name=\"birthdate\" placeholder=\"Type the birthdate here\" value=\""; echo set_value('birthdate') ."\" class=\"datepicker\" id=\"birthdate\" readonly='true'/>";
					
						$error_birthdate = form_error('birthdate');
						$label = (!empty($error_birthdate)) ? "<small class=\"error\">".$error_birthdate."</small>" : "" ;
						echo $label;
					?>
					
					
					<label class="control-label" for="image">Image</label>
					<?php echo "<input type=\"text\" name=\"image\" placeholder=\"Type the image's link here\" value=\""; echo set_value('image') ."\" class=\"required\" id=\"image\"/>";
					
						$error_image = form_error('image');
						$label = (!empty($error_image)) ? "<small class=\"error\">".$error_image."</small>" : "" ;
						echo $label;
					?>
					
					
					<input type="submit" name="submit" id="submit" class="button" value="Submit" />
				</div>
			</form>
		</div>
	</div>
</div> 