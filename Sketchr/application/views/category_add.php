<?php include ('hf/header.php'); ?>

<div class="row full-width">

	<div class="columns sidemenu">
		<ul class="side-nav">
			<li class="title">CATEGORIES</li>
			
				<?php foreach($categories as $category): ?>
					<li>
						<a href="<?php echo $category->id; ?>">
							<?php echo $category->title; ?>
						</a>
					</li>
				<?php endforeach; ?>

			<li class="divider"></li>
			<li class="title">FORUMS</li>
			<li><a href="#">Categories</a></li>
			<li><a href="#">Link 2</a></li>
			<li><a href="#">Link 3</a></li>
		</ul>

	</div>

	<div class="columns content-container">

		<div class="large-11 columns">
		 
		    <div class="row">
				<div class="large-12 columns">
					<h5>ADD CATEGORY</h5>
				</div>
			</div>

			<div class="row">
				<form method="post" action="<?php echo base_url(); ?>category/addCategory">
					<div class="large-8 columns">
						<label>Title
							<input type="text" name="title" placeholder="Type the title here" required="required" />
						</label>
						<label>Image
							<input type="text" name="image" placeholder="Type the image's link here" required="required" />
						</label>						
						<input type="submit" class="button" value="Finish" /> 
					</div>
				</form>
			</div>
		</div>
	</div> 
</div>  
    
<?php include ('hf/footer.php'); ?>