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
					<?php echo "<input type=\"text\" name=\"URL\" placeholder=\"Type the URL here\" value=\""; echo set_value('URL') ."\" class=\"required\" id=\"URL\"/>";
					
						$error_URL = form_error('URL');
						$label = (!empty($error_URL)) ? "<small class=\"error\">".$error_URL."</small>" : "" ;
						echo $label;
					?>
					
					
					<label class="control-label" for="title">Title</label>
					<?php echo "<input type=\"text\" name=\"title\" placeholder=\"Type the title here\" value=\""; echo set_value('title') ."\" class=\"required\" id=\"title\"/>";
					
						$error_title = form_error('title');
						$label = (!empty($error_title)) ? "<small class=\"error\">".$error_title."</small>" : "" ;
						echo $label;
					?>
					
					
					<label class="control-label" for="type">Type</label>
					<?php echo "<input type=\"text\" name=\"type\" placeholder=\"Please select a type\" value=\""; echo set_value('type') ."\" class=\"required\" id=\"type\"/>";
					
						$error_type = form_error('type');
						$label = (!empty($error_type)) ? "<small class=\"error\">".$error_type."</small>" : "" ;
						echo $label;
					?>
					
					
					<label class="control-label" for="release">Release</label>
					<?php echo "<input type=\"text\" name=\"release\" placeholder=\"Type the release date here\" value=\""; echo set_value('release') ."\" class=\"datepicker\" id=\"release\"/>";
					
						$error_release = form_error('release');
						$label = (!empty($error_release)) ? "<small class=\"error\">".$error_release."</small>" : "" ;
						echo $label;
					?>


					<label class="control-label" for="synopsis">Synopsis</label>
					<?php echo "<textarea rows=\"50\" name=\"synopsis\" class=\"required\" id=\"synopsis\">"; $value = set_value('synopsis'); $value = (!empty($value)) ? $value : "Type the synopsis here"; $value .= "</textarea>";
					echo $value;
					
						$error_synopsis = form_error('synopsis');
						$label = (!empty($error_synopsis)) ? "<small class=\"error\">".$error_synopsis."</small>" : "" ;
						echo $label;
					?>


					<label class="control-label" for="URLimage">URL Image</label>
					<?php echo "<input type=\"text\" name=\"URLimage\" placeholder=\"Type URL of image here\" value=\""; echo set_value('URLimage') ."\" class=\"required\" id=\"URLimage\"/>";
					
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