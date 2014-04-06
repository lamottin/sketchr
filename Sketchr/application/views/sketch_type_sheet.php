<div class="columns content-container">

	<div class="large-11 columns">
	 
	    <div class="row">
			<div class="large-12 columns">
				<h5><?php echo $sketch_type->title; ?></h5>
			</div>
		</div>

		<div class="row">
			<div class="large-12 columns">

				<div class="row">
					<ul class="small-block-grid-6">
						<?php foreach ($sketchs as $sketch) { ?>	
							<li>
								<a class="th" href="<?php echo base_url()."watch/".$sketch->id ?>">
									<img src="<?php echo $sketch->image;?>">
								</a>
								<a href="<?php echo base_url()."watch/".$sketch->id ?>">
									<?php echo $sketch->title ?>
								</a>
							</li>										
						<?php } ?>
					</ul>
				</div>	

			</div>
		</div>

	</div>
</div> 
