<div class="columns content-container">

	<div class="large-11 columns">

		<div class="large-7 columns">	
			<div class="row">

				<div class="flex-video">
					<iframe src="//www.youtube.com/embed/SFQGcZRfTfA" seamless webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				</div>
				<!-- should load $sketch->video_link...-->
			
				<div>
					<h4><?php echo $sketch->title; ?></h4>	
					<h5><?php echo $sketch_type->title; ?></h5>
				</div>
				
			</div>

			<div id="modal_deadlink" class="reveal-modal" data-reveal>
				<h2>Confirmation</h2>
				<p class="lead">Vous &ecirc;tes sur le point de signaler un lien mort.</p>
				<p>Souhaitez-vous confirmer ?</p>
				<input type="hidden" name="id_sketch_hidden" id="id_sketch_hidden" value="<?php echo $sketch->id ?>" />
				<input type="hidden" name="id_member_hidden" id="id_member_hidden" value="1" />	
				<a href="#" id="confirm_deadlink" class="button">Confirmer</a>
				<a href="#" id="cancel_deadlink" class="button secondary">Annuler</a>
				<a class="close-reveal-modal">&#215;</a> 
			</div>

			<div class="row">
	
				<div class="tab-tr" id="t1">
					
					<div id="btn_like_sketch" class="like-btn <?php if($like_count == 1){ echo 'like-h';}?>">Like</div>
					<div id="btn_dislike_sketch" class="dislike-btn <?php if($dislike_count == 1){ echo 'dislike-h';}?>"></div>
					<?php
						if($already_reported != null && ($already_reported==false || $already_reported->processed==1))
							echo '<div class="deadlink" data-reveal-id="modal_deadlink" data-reveal></div>';
					?>
					<!-- <div class="share-btn">Share</div> -->

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
				<!-- <div class="share-cnt">

					AddThis Button BEGIN 
					<div class="addthis_toolbox addthis_default_style ">
					<a class="addthis_button_linkedin_counter"></a>
					<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
					<a class="addthis_button_tweet"></a>
					<a class="addthis_button_google_plusone" g:plusone:size="medium"></a> 
					<a class="addthis_button_pinterest_pinit"></a>
					<a class="addthis_counter addthis_pill_style"></a>
					</div>
					<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5174d2b853d85895"></script>
					

				</div> /share-cnt -->
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
				<?php foreach ($related_sketchs as $sketch) { ?>
					<li>
						<a href="<?php echo base_url();?>watch/12">
							<div class="large-5 columns">
								<img src="<?php echo $sketch->image;?>">
							</div>
							<div class="large-7 columns">
								<span><?php echo $sketch->title ?></span>
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