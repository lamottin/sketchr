<div class="columns content-container">

	<div class="large-11 columns">

		<div class="large-8 columns">	
			<div class="row">
				<div class="flex-video">
					<iframe src="//www.youtube.com/embed/SFQGcZRfTfA" seamless webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				</div>
				<!-- should load $sketch->video_link...-->
				<h5><?php echo $sketch->title; ?></h5>
			</div>
			<div class="row">
				        
						<?php echo '
						<div class="tab-tr" id="t1">
						<div class="like-btn '; if($like_count == 1){ echo 'like-h';} echo '">Like</div>
						<div class="dislike-btn '; if($dislike_count == 1){ echo 'dislike-h';} echo '"></div>

								<!-- <div class="share-btn">Share</div> -->

								<div class="stat-cnt">
									<div class="rate-count">'. $rate_all_count. '</div>
									<div class="stat-bar">
										<div class="bg-green" style="width:'.$rate_like_percent.'%;"></div>
										<div class="bg-red" style="width:'. $rate_dislike_percent.'%"></div>
									</div><!-- stat-bar -->
									<div class="dislike-count">'. $rate_dislike_count.'</div>
									<div class="like-count">'. $rate_like_count.'</div>
								</div><!-- /stat-cnt -->
							</div><!-- /tab-tr -->
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

						'; ?>
			
			<div class="row">
				<h5><?php echo $sketch_type->title; ?></h5>
				<p><?php echo $sketch_type->start_date; ?></p>
				<p><?php echo $sketch_type->image; ?></p>
			</div>
			
		<!--Inclure la page des commentaires -->
			<?php $this->load->view('comment_sheet'); ?>
		</div>

		<div class="large-4 columns">
			liste de videos ;;;
		</div>	

	</div>
</div> 
<script>
    $(function(){ 
        var sketchID = <?php echo $sketch->id;  ?>; 

        $('.like-btn').click(function(){
            $('.dislike-btn').removeClass('dislike-h');    
            $(this).addClass('like-h');
            $.ajax({
                type:"POST",
                url:"<?php echo site_url('sketch/like_dislike');?>",
                data:'act=like&sketchID='+sketchID,
                success: function(data){
					//alert(data);
                }
            });
        });
        $('.dislike-btn').click(function(){
            $('.like-btn').removeClass('like-h');
            $(this).addClass('dislike-h');
            $.ajax({
                type:"POST",
                url:"<?php echo site_url('sketch/like_dislike');?>",
                data:'act=dislike&sketchID='+sketchID,
                success: function(data){
					//alert(data);
                }
            });
        });
        $('.share-btn').click(function(){
            $('.share-cnt').toggle();
        });
    });
</script>