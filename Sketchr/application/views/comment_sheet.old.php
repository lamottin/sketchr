<div class="row">
	<div id="addCommentContainer">
	<h4 align="left">Ajouter un commentaire</h4>
	<form id="addCom" method="post" action="">
		<p>
			<label for="comment">Post</label>
			<textarea name="comment" id="comment" cols="35" rows="6"></textarea>
		</p>
		<input type="hidden" name="id_sketch" id="id_sketch" value="<?php echo $sketch->id ?>" />
		<input type="hidden" name="id_member" id="id_member" value="1" />
		
		<input type="submit" id="submit_com" class="button" value="Submit" />
	</form>
	</div>
	<div id="loader" style="display:none;"><img src="<?php echo base_url('/assets/loader.gif');?>" alt="loader" title="Loading..."></div>
	<div id="block_comment"></div>
	<?php 
	
		foreach($comments as $comment):
		
				// Converting the time to a UNIX timestamp:
				$data->post_date = strtotime($comment->post_date);
				
				echo '<div class="comment" >
						<div class="avatar">
						'.$comment->avatar .'	<img src="'.base_url('/assets/logo/logo.ico').'" />
						</div>
						<div class="name">'.$comment->first_name .' '.$comment->last_name.' a &eacutecrit :</div>
						<div class="date" title="Added at '.date('d M Y',$comment->post_date).'">le '.date('d M Y',$comment->post_date).'</div>
						<p>'.$comment->message.'</p>
						
						
						
						
						</div>
				';
		endforeach;
	?>
	</div>
</div>
<script type="text/javascript">

//$j = jQuery.noConflict();

$(function() {
	// Le code qui suit est exécuté une fois que le DOM est chargé
	
	// cette variable empêche les posts intempestifs 
	var working = false;

	// On récupère les événements du bouton submit
	$("#addCom").submit(function(e) {
	$("#loader").show();
	//e.preventDefault();
	if(working) return false;
	
	working = true;
	$('#submit_com').val('Chargement en cours...');
	
		
	var form_data = {
		id_sketch: $('#id_sketch').val(),
		id_member: $('#id_member').val(),
		comment: $('#comment').val()		
	};
	
    $.ajax({
	
        type: "POST",
        url: "<?php echo site_url('comment/add'); ?>", 
        data: form_data,
        dataType: "text",  
        cache:false,
		error : function(xhr, textStatus, errorThrown){
		
			//$('#addCommentContainer').prepend('<div data-alert data-options="animation_speed:3; animation:\'fadeOut\';" class="alert-box info radius">'textStatus + errorThrown +'<a href="#" class="close">&times;</a></div>');
		},
        
		success: function(data){
				//alert(data);
                working = false;
				$('#submit_com').val('Submit');
				$('#comment').val('');
				$('#block_comment').hide().append(data).slideDown();
				//$('#addCommentContainer').fadeOut();
				$("#loader").hide();
				//$('#addCommentContainer').prepend('<div data-alert data-options="animation_speed:500, animation:\'fadeOut\';" class="alert-box success radius">This is a success alert with a radius.<a href="#" class="close">&times;</a></div>');
              }
	});
	return false;
});
});
</script>