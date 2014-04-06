<div class="columns content-container">

	<div class="large-11 columns">
	 
	    <div class="row">
			<div class="large-12 columns">
				<h5><?php echo $category->title; ?></h5>
			</div>
		</div>

		<div class="row">
			<div class="large-12 columns">

				<div class="row">
					<ul class="small-block-grid-6">
						<?php foreach ($sketch_types as $sketch_type) { ?>	
							<li>
								<a class="th" href="<?php echo base_url()."serie/".$sketch_type->id ?>">
									<img src="<?php echo 'http://img.youtube.com/vi/aiBt44rrslw/hqdefault.jpg';?>">
								</a>
								<a href="<?php echo base_url()."serie/".$sketch_type->id ?>">
									<?php echo $sketch_type->title ?>
								</a>
							</li>										
						<?php } ?>
					</ul>
				</div>	

			</div>
		</div>

	</div>
</div> 
