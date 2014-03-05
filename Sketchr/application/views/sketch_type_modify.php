<div class="columns content-container">

		<div class="large-11 columns">
		 
		    <div class="row">
				<div class="large-12 columns">
					<h5>ADD HUMORIST IN THE SKETCH TYPE</h5>
				</div>
			</div>

			<div class="row">
				<form method="post" action="<?php echo base_url(); ?>sketchtype/modify/">
					<div class="large-8 columns">
						<label>Id
							<input type="text" name="title" value="<?php echo $posted->id; ?>" readonly="readonly" />
						</label>
						<label>Title
							<input type="text" name="title" value="<?php echo $posted->title; ?>" placeholder="Type the title here" required="required" />
						</label>
						<label>Start Date
							<input type="date" name="start_date" value="<?php echo $posted->start_date; ?>" required="required" />
						</label>
						<label>Image
							<input type="text" name="image" value="<?php echo $posted->image; ?>" placeholder="Type the image's link here" required="required" />
						</label>						
						<label>Synopsis
							<textarea name="synopsis" placeholder="Type the synopsis here" required="required"> <?php echo $posted->synopsis; ?></textarea>
						</label>
						<label>Select Box
							<select name="category" required="required" value="<?php echo $sketch_type_category; ?>">		
								<?php foreach($categories as $category): ?>
								<option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>								
								<?php endforeach; ?>
							</select>
						</label>
						<input type="submit" class="button" value="Update" /> 
					</div>
				</form>
			</div>
		</div>
	</div> 
</div>  
