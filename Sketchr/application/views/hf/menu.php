<!-- SIDE MENU --> 
<div class="columns sidemenu">
	<ul class="side-nav">
		<li class="title">CATEGORIES</li>
		<?php foreach($categories as $category): ?>
			<li>
				<a href="<?php echo base_url()."category/".$category->id; ?>">
					<?php echo $category->title; ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>