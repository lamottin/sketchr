<div class="columns content-container">

	<div class="large-11 columns">
	 
	    <div class="row">
			<div class="large-12 columns">
				<pre>
					<?php print_r($popular); ?>
				</pre>
			</div>
		</div>

		<div class="row">
			<div class="large-12 columns">
				<h5>Popular on Sketchr</h5>
			</div>
		</div>

		<div class="row">

			<ul class="small-block-grid-6">

				<?php for ($i=0; $i < 12; $i++) { ?>
					
					<li>
						<a class="th" href="../img/demos/demo2.png">
							<img src="http://img.youtube.com/vi/aiBt44rrslw/hqdefault.jpg">
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
</div>