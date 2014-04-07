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
		<li class="divider"></li>
		<li class="title">OPERATIONS</li>
		<li><a href="<?php echo base_url().'category/add' ?>">New category</a></li>
		<li><a href="<?php echo base_url().'humorist/add' ?>">New humorist</a></li>
		<li><a href="<?php echo base_url().'sketchtype/add' ?>">New serie</a></li>		
		<li><a href="<?php echo base_url().'sketch/add' ?>">New sketch</a></li>
	</ul>
</div>