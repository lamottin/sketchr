<div class="columns content-container">

		<div class="large-11 columns">
		 
		    <div class="row">
				<div class="large-12 columns">
					<h5>ADD SKETCH TYPE</h5>
				</div>
			</div>

			<div class="row">
				<form method="post" action="<?php echo base_url(); ?>sketchtype/add/">
					<div class="large-8 columns">
						<label>Title
							<input type="text" name="title" placeholder="Type the title here" required="required" />
						</label>
						<label>Start Date
							<input type="date" name="start_date" required="required" />
						</label>
						<label>Image
							<input type="text" name="image" placeholder="Type the image's link here" required="required" />
						</label>						
						<label>Synopsis
							<textarea name="synopsis" placeholder="Type the synopsis here" required="required"></textarea>
						</label>
						<label>Select Box
							<select name="category" required="required">		
								<?php foreach($categories as $category): ?>
								<option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>								
								<?php endforeach; ?>
							</select>
						</label>
						<select name="humorist" style="height: 100px;" multiple="multiple" required="required">
							<?php foreach($humorists as $humorist): ?>
							<option value="<?php echo $humorist->id; ?>"><?php echo $humorist->first_name." ".$humorist->last_name; ?></option>								
							<?php endforeach; ?>
						</select>
						<input type="submit" name="create" class="button" value="Create" /> 
					</div>
				</form>
			</div>
		</div>
	</div> 
</div>  