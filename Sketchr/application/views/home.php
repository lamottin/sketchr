<div class="columns content-container">

	<div class="large-11 columns">

		<div class="row">
			<div class="large-12 columns">
				<h5>Popular on Sketchr</h5>
			</div>
		</div>

		<div class="row">

			<ul class="small-block-grid-6">

				<?php foreach ($popular as $sketch) { ?>
					<li>
						<a class="th" href="<?php echo base_url().'watch/'.$sketch->id; ?>">
							<img src="<?php echo $sketch->image; ?>">
						</a>
						<a href="<?php echo base_url()."watch/".$sketch->id ?>">
							<p style="font-size : 14px; margin-top : 4px;"><?php echo $sketch->title ?></p>
						</a>
					</li>
				<?php } ?>

			</ul>

		</div>

	</div>
</div>