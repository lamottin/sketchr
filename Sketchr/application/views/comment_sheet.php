<div class="row">
	<div id="addCommentContainer">
	<h4 align="left">Ajouter un commentaire</h4>
	<form id="addCom" method="post" action="">
		<p>
			<label for="comment">Post</label>
			<textarea name="comment" id="comment" cols="35" rows="6"></textarea>
		</p>
		<input type="hidden" name="id_sketch" id="id_sketch" value="<?php echo $sketch->id ?>" />
		<input type="hidden" name="id_member" id="id_member" value="2" />
		
		<input type="submit" id="submit_com" class="button" value="Submit" />
	</form>
	</div>
</div>
<script type="text/javascript">
$j = jQuery.noConflict();

$j(function() {
	// Le code qui suit est exécuté une fois que le DOM est chargé
	
	// cette variable empêche les posts intempestifs 
	var working = false;

	// On récupère les événements du bouton submit
	$j("#addCom").submit(function(e) {
	
	e.preventDefault();
	if(working) return false;
	
	working = true;
	$j('#submit_com').val('Chargement en cours..');
	
		
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
         success: function(data){
                //alert(data);
				
				working = false;
				$j('#submit_com').val('Submit');
				$j('#comment').val('');
              }
	});
	return false;
});
});
</script>