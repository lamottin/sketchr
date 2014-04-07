<div class="columns content-container">

	<div class="large-11 columns">

		<div class="large-7 columns">	
			<div class="row">

				<div class="flex-video">
					<iframe src="<?php echo $sketch_embedded_link; ?>" seamless webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				</div>
			
				<div>
					<h4><?php echo $sketch->title; ?></h4>	
					<h5>by <a href="<?php echo base_url().'serie/'.$sketch_type->id; ?>"><?php echo $sketch_type->title; ?></a></h5>
					<p><?php echo $sketch_type->synopsis; ?></p>
				</div>
				
			</div>

			
			
			<?php 
				if(!empty($user_session["id"])) {
				
					echo '<div id="modal_deadlink" class="reveal-modal" data-reveal>
					<h2>Confirmation</h2>
					<p class="lead">Vous &ecirc;tes sur le point de signaler un lien mort.</p>
					<p>Souhaitez-vous confirmer ?</p>
					<input type="hidden" name="id_sketch_hidden" id="id_sketch_hidden" value="'.$sketch->id.'" />
					<input type="hidden" name="id_member_hidden" id="id_member_hidden" value="'.$user_session["id"].'" />	
					<a href="#" id="confirm_deadlink" class="button">Confirmer</a>
					<a href="#" id="cancel_deadlink" class="button secondary">Annuler</a>
					<a class="close-reveal-modal">&#215;</a> 
					</div>';
				}
			?>

			<div class="row">

				<div class="tab-tr" id="t1">
				
					<?php 
						//Before
						// <div id="btn_like_sketch" class="like-btn <?php if($like_count == 1){ echo 'like-h';}?">Like</div>
						// <div id="btn_dislike_sketch" class="dislike-btn <?php if($dislike_count == 1){ echo 'dislike-h';}?"></div>

						if(!empty($user_session["id"])) {
							echo '<div id="btn_like_sketch" class="like-btn ';
								if($like_count == 1){ echo "like-h";}
							echo '">Like</div>';
							echo '<div id="btn_dislike_sketch" class="dislike-btn ';
								if($dislike_count == 1){ echo "dislike-h";}
							echo '"></div>';
							
							if($already_reported==false || $already_reported->processed==1)
								echo '<div class="deadlink" data-reveal-id="modal_deadlink" data-reveal></div>';
						}
					?>
					<div class="stat-cnt">
						<div class="rate-count"><?php echo $rate_all_count;?></div>
						<div class="stat-bar">
							<div class="bg-green" style="width:<?php echo $rate_like_percent;?>%;"></div>
							<div class="bg-red" style="width:<?php echo $rate_dislike_percent;?>%"></div>
						</div>
						<div class="dislike-count"><?php echo $rate_dislike_count;?></div>
						<div class="like-count"><?php echo $rate_like_count;?></div>
					</div>
				</div>
				<br/><br/>

				<div>
					<p class="comments">All comments</p>	
				</div>
			
			<!--Inclure la page des commentaires -->
				<?php $this->load->view('comment_sheet'); ?>
			</div>

		</div>
		<div class="large-5 columns">
			<div>
				<p class="related-videos">Related Videos</p>	
			</div>
			<ul class="small-block-grid-1">
				<?php foreach ($related_sketchs as $related_sketch) { ?>
					<li>
						<a href="<?php echo base_url().'watch/'.$related_sketch->id;?>">
							<div class="large-5 columns">
								<img src="<?php echo $related_sketch->image;?>">
							</div>
							<div class="large-7 columns">
								<span><?php echo $related_sketch->title ?></span>
							</div>
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>

</div>
<script>
    $(function(){ 
        var sketchID = <?php echo $sketch->id;  ?>; 

		//When we click on the like button
        $('#btn_like_sketch').click(function(){
            $('#btn_dislike_sketch').removeClass('dislike-h');
            $(this).addClass('like-h');
            $.ajax({
                type:"POST",
                url:"<?php echo site_url('like_dislike');?>",
                data:'act=like&sketchID='+sketchID,
                success: function(data){
					
					//We parse the data send by PHP (sketch/like_dislike)
					var datas = jQuery.parseJSON(data);
					
					//We update all the values
					$(".dislike-count").val('').text(datas.rate_dislike_count);
					$(".like-count").val('').text(datas.rate_like_count);
					$(".rate-count").val('').text(datas.rate_all_count);
					
					//Modify css property about width
					$(".bg-green").css({width:datas.rate_like_percent+'%'});
					$(".bg-red").css({width:datas.rate_dislike_percent+'%'});
                }
            });
        });
		
		//When we click on the dislike button
        $('#btn_dislike_sketch').click(function(){
            $('#btn_like_sketch').removeClass('like-h');
            $(this).addClass('dislike-h');
            $.ajax({
                type:"POST",
                url:"<?php echo site_url('like_dislike');?>",
                data:'act=dislike&sketchID='+sketchID,
                success: function(data){
					
					//We parse the data send by PHP (sketch/like_dislike)
					var datas = jQuery.parseJSON(data);
					
					//We update all the values
					$(".dislike-count").val('').text(datas.rate_dislike_count);
					$(".like-count").val('').text(datas.rate_like_count);
					$(".rate-count").val('').text(datas.rate_all_count);
					
					//Modify css property about width
					$(".bg-green").css({width:datas.rate_like_percent+'%'});
					$(".bg-red").css({width:datas.rate_dislike_percent+'%'});
                }
            });
        });
		$("#cancel_deadlink").click(function() {
			$('#modal_deadlink').foundation('reveal', 'close');
		});
		$("#modal_deadlink").click(function() {
			var id_member = $("#id_member_hidden").val();
			var id_sketch = $("#id_sketch_hidden").val();
			$('#modal_deadlink').foundation('reveal', 'close');
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('report_deadlink');?>",
				data: "id_member="+id_member+"&id_sketch="+id_sketch,
				success: function(data){
						
					//We parse the data send by PHP (comment/report_abus)
					var datas = jQuery.parseJSON(data);
				}
			});
		});
		
		//Button share
        $('.share-btn').click(function(){
            $('.share-cnt').toggle();
        });
    });
</script>