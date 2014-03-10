<div class="columns content-container">

	<div class="large-11 columns">
	 
	    <div class="row">
			<div class="large-12 columns">
				<h5><?php echo $sketch_type->title; ?></h5>
			</div>
		</div>

		<div class="row">
			<div class="large-12 columns">

				<dl class="sub-nav" data-tab>
					<dd class="active"><a href="#panel2-1">Videos</a></dd>
					<dd><a href="#panel2-2">Forums</a></dd>
				</dl>

				<div class="tabs-content">

					<div class="content active" id="panel2-1">
						
						<div class="row">
							<ul class="small-block-grid-6">
								<?php foreach ($sketchs as $sketch) { ?>	
									<li>
										<a class="th" href="<?php echo base_url()."watch/".$sketch->id ?>">
											<img src="<?php echo 'http://img.youtube.com/vi/aiBt44rrslw/hqdefault.jpg';?>">
										</a>
										<a href="<?php echo base_url()."watch/".$sketch->id ?>">
											<?php echo $sketch->title ?>
										</a>
									</li>										
								<?php } ?>
							</ul>

							<div class="pull right">
								<a href="#">
									See more...
								</a>
							</div>
						</div>	

					</div>

					<div class="content" id="panel2-2">
						<p>Second panel content goes here...</p>
					</div>

				</div>

			</div>
		</div>

	</div>
</div> 
