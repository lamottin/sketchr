<div class="columns content-container">

	<div class="large-11 columns">

		<div class="large-8 columns">	
			<div class="row">
				<div class="flex-video">
					<iframe src="//www.youtube.com/embed/SFQGcZRfTfA" seamless webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				</div>
				<!-- should load $sketch->video_link...-->
				<h5><?php echo $sketch->title; ?></h5>
			</div>
			<div class="row">
				<h5><?php echo $sketch_type->title; ?></h5>
				<p><?php echo $sketch_type->start_date; ?></p>
				<p><?php echo $sketch_type->image; ?></p>
			</div>
			
		<!--Inclure la page des commentaires -->
			<?php $this->load->view('comment_sheet'); ?>
		</div>

		<div class="large-4 columns">
			liste de videos ;;;
		</div>	

	</div>
</div> 
