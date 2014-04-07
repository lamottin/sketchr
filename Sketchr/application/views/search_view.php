<div class="columns content-container">

	<div class="large-11 columns">
	 
	    <div class="row">
	    	<div class="medium-4 columns">
	    		<h5>Search result</h5>
	    	</div>
	    	<div class="medium-8 columns">
	    		<h5><?php echo count($io); ?> results</h5>
	    	</div>
		</div>

		<div class="row">
			<ul class="small-block-grid-1">

				<?php foreach ($io as $row) { ?>
					<li>
						<a href="<?php echo base_url().'watch/'.$row->id;?>">
							<div class="row">
								<div class="medium-2 columns ">
									<img class="th" src="<?php echo $row->image; ?>" />	
								</div>
							  	<div class="medium-10 columns ">
									<p><?php echo $row->title; ?></p>
									<p><?php echo $row->synopsis; ?></p>
								</div>
							</div>
						</a>
					</li>
				<?php } ?>

			</ul>
		</div>	
	</div>
</div>

