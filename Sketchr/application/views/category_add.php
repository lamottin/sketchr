<div class="columns content-container">

	<div class="large-11 columns">
	 
	    <div class="row">
			<div class="large-12 columns">
				<h5>ADD CATEGORY</h5>
			</div>
		</div>

		<div class="row">
			<form method="post" action="<?php echo base_url(); ?>category/add" name="category" id="category">
				<div class="small-8 columns">
					<label class="control-label" for="title">Title</label>
					<?php echo "<input type=\"text\" name=\"title\" placeholder=\"Type the title here\" value=\""; echo set_value('title') ."\" class=\"required\" id=\"title\"/>";
					 
						$error_title = form_error('title');
						$label = (!empty($error_title)) ? "<small class=\"error\">".$error_title."</small>" : "" ;
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