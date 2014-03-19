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
	<div id="resultatAjax"></div>
	<?php 
	
		foreach($datas as $data):
		
				// Converting the time to a UNIX timestamp:
				$data->post_date = strtotime($data->post_date);
				
				echo '<div class="comment">
						<div class="avatar">
						'.$data->avatar .'	<img src="'.base_url('/assets/logo/logo.ico').'" />
						</div>
						<div class="name">'.$data->first_name .' '.$data->last_name.' a &eacutecrit :</div>
						<div class="date" title="Added at '.date('d M Y',$data->post_date).'">le '.date('d M Y',$data->post_date).'</div>
						<p>'.$data->message.'</p>
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
	e.preventDefault();
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
				$('#resultatAjax').hide().append(data).slideDown();
				$('#addCommentContainer').fadeOut();
				$("#loader").hide();
				//$('#addCommentContainer').prepend('<div data-alert data-options="animation_speed:3, animation:\'fadeOut\';" class="alert-box success radius">This is a success alert with a radius.<a href="#" class="close">&times;</a></div>');
              }
	});
	return false;
});
});

</script>
<style type="text/css">
 .comment,
 #addCommentContainer{
 background:#f7f7f7;
 background:-moz-linear-gradient(90deg, #ccc, #fff); /* Firefox */
 background:-webkit-gradient(linear, left top, left bottom, from(#fff), to(#ccc)); /* Webkit */
 border:1px solid #aaa;
 border-radius:10px;
 -moz-border-radius:10px;
 -webkit-border-radius:10px;
 -moz-box-shadow:0 0 15px #aaa;
 -webkit-box-shadow:0 0 15px #aaa;
 box-shadow:0 0 15px #aaa;
 margin:20px auto;
 padding:20px;
 width:510px;
 }

 .comment .avatar{
 height:50px;
 width:50px;
 background:url('<?php echo base_url('/assets/logo/logo.ico');?>) no-repeat #fcfcfc;
 -moz-box-shadow:1px 1px 0 #c2c2c2;
 -webkit-box-shadow:1px 1px 0 #c2c2c2;
 box-shadow:1px 1px 0 #c2c2c2;
 float:left;
 margin-right: 20px;
 }

 .comment .avatar img{
 display:block;
 }

 .comment .name{
 padding-bottom:10px;
 font-size:14px;
 color:#0459b7;
 font-weight: bold;
 }

 .comment .date{
 font-size:10px;
 padding: 20px 10px 0 10px;
 color:#666;
 float: right;
 }

 .comment p,
 #addCommentContainer p{
 line-height:1.5;
 overflow-x:hidden;
 }

 fieldset,img{ border:0;}

 html {
 overflow:-moz-scrollbars-vertical;
 }

 

 #comDiplayBox{
 background:#f7f7f7;
 background:-moz-linear-gradient(90deg, #ccc, #fff); /* Firefox */
 background:-webkit-gradient(linear, left top, left bottom, from(#fff), to(#ccc)); /* Webkit */
 border:1px solid #aaa;
 -moz-border-radius:10px;
 -webkit-border-radius:10px;
 border-radius:10px;
 -moz-box-shadow:0 0 15px #aaa;
 -webkit-box-shadow:0 0 15px #aaa;
 box-shadow:0 0 15px #aaa;
 margin:20px auto 0;
 padding:20px;
 width:510px;
 height: auto;
 }

 form p{
 margin-bottom:20px;
 }

 form p:last-child{ /* Sélecteur avancé pour sélectionner le dernier paragraphe du formulaire */
 margin-bottom:0;
 }

 textarea
 {
 background: rgba(255, 255, 255, 0.9);
 background:-moz-linear-gradient(90deg, #fff, #eee); /* Firefox */
 background:-webkit-gradient(linear, left top, left bottom, from(#eee), to(#fff), color-stop(0.2, #fff)); /* Webkit */
 border:1px solid #aaa;
 border-radius:3px;
 -moz-border-radius:3px;
 -webkit-border-radius:3px;
 -moz-box-shadow:0 0 3px #aaa;
 -webkit-box-shadow:0 0 3px #aaa;
 box-shadow:0 0 3px #aaa;
 padding:5px;
 }

 textarea:focus,
 {
 border-color:#093c75;
 box-shadow:0 0 3px #0459b7;
 -moz-box-shadow:0 0 3px #0459b7;
 -webkit-box-shadow:0 0 3px #0459b7;
 outline:none; /* Pour enlever le contour jaune lorsque l'on sélectionne un input dans Chrome */
 }

 input[type=submit],
 a.submit{
 background:#ddd;
 background:-moz-linear-gradient(90deg, #0459b7, #08adff); /* Firefox */
 background:-webkit-gradient(linear, left top, left bottom, from(#08adff), to(#0459b7)); /* Webkit */
 border:1px solid #093c75;
 border-radius:3px;
 -moz-border-radius:3px;
 -webkit-border-radius:3px;
 box-shadow:0 1px 0 #fff;
 -moz-box-shadow:0 1px 0 #fff;
 -webkit-box-shadow:0 1px 0 #fff;
 color:#fff;
 cursor:pointer;
 font-weight:bold;
 margin-left:225px;
 padding:5px 10px;
 text-decoration:none;
 text-shadow:0 1px 1px #333;
 text-transform:uppercase;
 }

 input[type=submit]:hover,
 a.submit:hover{
 background:#eee;
 background:-moz-linear-gradient(90deg, #067cd3, #0bcdff);
 background:-webkit-gradient(linear, left top, left bottom, from(#0bcdff), to(#067cd3));
 border-color:#093c75;
 text-decoration:none;
 }

 input[type=submit]:active,
 input[type=submit]:focus,
 a.submit:active,
 a.submit:focus{
 background:#ccc;
 background:-moz-linear-gradient(90deg, #0bcdff, #067cd3);
 background:-webkit-gradient(linear, left top, left bottom, from(#067cd3), to(#0bcdff));
 border-color:#093c75;
 outline:none;
 }
</style>