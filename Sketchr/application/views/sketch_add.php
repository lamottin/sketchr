<div class="columns content-container">

	<div class="large-11 columns">
	 
	    <div class="row">
			<div class="large-12 columns">
				<h5>ADD SKETCH</h5>
			</div>
		</div>

		<div class="row">
			<form method="post" action="<?php echo base_url(); ?>sketch/add" name="video" id="video">
				<div class="small-8 columns">
					
					
					<label class="control-label" for="URL">URL</label>
					<input type="text" name="URL" placeholder="Type the URL here" class="required" id="URL"/>
					<?php 
						$error_URL = form_error('URL');
						$label = (!empty($error_URL)) ? "<small class=\"error\">".$error_URL."</small>" : "" ;
						echo $label;
					?>
					
					
					<label class="control-label" for="title">Title</label>
					<input type="text" name="title" placeholder="Type the title here" class="required" id="title"/>
					<?php 
						$error_title = form_error('title');
						$label = (!empty($error_title)) ? "<small class=\"error\">".$error_title."</small>" : "" ;
						echo $label;
					?>
					
					
					<label class="control-label" for="type">Type</label>
					<input type="text" name="type" placeholder="Please select a type" class="required" id="type"/>
					<?php 
						$error_type = form_error('type');
						$label = (!empty($error_type)) ? "<small class=\"error\">".$error_type."</small>" : "" ;
						echo $label;
					?>
					
					
					<label class="control-label" for="release">Release</label>
					<input type="text" name="release" placeholder="Type the release" class="required" id="release"/>
					<?php 
						$error_release = form_error('release');
						$label = (!empty($error_release)) ? "<small class=\"error\">".$error_release."</small>" : "" ;
						echo $label;
					?>


					<label class="control-label" for="synopsis">Synopsis</label>
					<textarea  rows="3" name="synopsis"  class="required" id="synopsis">Type the synopsis here </textarea>
					<?php 
						$error_synopsis = form_error('synopsis');
						$label = (!empty($error_synopsis)) ? "<small class=\"error\">".$error_synopsis."</small>" : "" ;
						echo $label;
					?>


					<label class="control-label" for="URLimage">URL Image</label>
					<input type="text" name="URLimage" placeholder="Type URL of image here" class="required" id="URLimage"/>
					<?php 
						$error_URLimage = form_error('URLimage');
						$label = (!empty($error_URLimage)) ? "<small class=\"error\">".$error_URLimage."</small>" : "" ;
						echo $label;
					?>
					
					
					<input type="submit" name="submit" id="submit" class="button" value="Submit" />
				</div>
			</form>
		</div>
	</div>
</div> 