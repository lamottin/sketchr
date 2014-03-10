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
					<input type="text" name="firstname" placeholder="Type the name here" class="required" id="firstname"/>
					<?php 
						$error_firstname = form_error('firstname');
						$label = (!empty($error_firstname)) ? "<small class=\"error\">".$error_firstname."</small>" : "" ;
						echo $label;
					?>
					
					
					<label class="control-label" for="title">Lastname</label>
					<input type="text" name="lastname" placeholder="Type the lastname here" class="required" id="lastname"/>
					<?php 
						$error_lastname = form_error('lastname');
						$label = (!empty($error_lastname)) ? "<small class=\"error\">".$error_lastname."</small>" : "" ;
						echo $label;
					?>
					
					
					<label class="control-label" for="title">Birthdate</label>
					<input type="text" name="birthdate" placeholder="Please select a birthdate" class="required" id="birthdate"/>
					<?php 
						$error_birthdate = form_error('birthdate');
						$label = (!empty($error_birthdate)) ? "<small class=\"error\">".$error_birthdate."</small>" : "" ;
						echo $label;
					?>
					
					
					<label class="control-label" for="image">Image</label>
					<input type="text" name="image" placeholder="Type the image's link here" class="required" id="image"/>
					<?php 
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