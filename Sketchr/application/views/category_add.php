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
					<input type="text" name="title" placeholder="Type the title here" class="required" id="title"/>
					<?php 
						$error_title = form_error('title');
						$label = (!empty($error_title)) ? "<small class=\"error\">".$error_title."</small>" : "" ;
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