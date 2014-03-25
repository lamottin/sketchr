<div class="columns content-container">

	<div class="large-11 columns">
	 
	    <div class="row">
	    	<h5>Search result</h5>
			<div class="large-1 columns"> <br>
			
				
			</div>
		</div>

		<div class="row">

			<ul class="small-block-grid-6">


				<?php


					foreach ($io as $row) 
					{
				?>

						<li>
							
								
							<div class="row">
								  	<div class="medium-9 columns ">
										<?php 	echo "<a class='th' href=''>". $row->title."</a>"; 	?>
									</div>
							</div>
							<div class="row">
								  	<div class="medium-9 columns ">
										<?php  	echo "<img src='". $row->image."'></a>";	?>	
									</div>
							</div>
						</li>
				<?php 	} 	?>
					
				
		
			</ul>


			<div class="pull right"><br>
				<a href="#">
					See more...
				</a>
			</div>

		</div>	

	</div>
</div>

