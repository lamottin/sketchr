<div class="row">
<div class="cmt-container">
	<div class="new-com-bt">
        <span>Write a comment ...</span>
    </div>
	<form id="addCom" method="post" action="<?php echo site_url('comment/add'); ?>">
    <div class="new-com-cnt">
        <textarea name="comment" id="comment" class="the-new-com"></textarea>
		<input type="hidden" name="id_sketch" id="id_sketch" value="<?php echo $sketch->id ?>" />
		<input type="hidden" name="id_member" id="id_member" value="1" />
		
        <div class="bt-add-com">Post comment</div>
        <div class="bt-cancel-com">Cancel</div>
    </div></form>
    <div class="clear"></div>
	
	<div id="loader" style="display:none;"><img src="<?php echo base_url('/assets/loader.gif');?>" alt="loader" title="Loading..."></div>
    <?php 
    foreach($comments as $value):
				
		// Converting the time to a UNIX timestamp:
		$value["comments"]->post_date = strtotime($value["comments"]->post_date);
    ?>
	<div class="horizontal_dotted_line"></div>
	<div class="cmt-cnt">
        <img src="<?php echo $value["comments"]->avatar; ?>" />
        <div class="thecom">
            <h5><b><?php echo $value["comments"]->first_name  .' '.$value["comments"]->last_name; ?></b></h5>
			<input type="hidden" id="id_post<?php echo $value["comments"]->id;?>" value="<?php echo $value["comments"]->id;?>"/>
			<span class="com-dt"><?php echo date('d-m-Y H:i',$value["comments"]->post_date);?></span>
            <br/>
            <p>
                <?php echo $value["comments"]->message;?>
            </p>
			<div class="cmt_dis_like">
				<div id="dislike_comment<?php echo $value["comments"]->id;?>" class="dislike-count-comment <?php if($value["already_disliked"]){ echo 'dislike-h2';}?>"><?php echo $value["dislikes"];?></div>
				<div id="like_comment<?php echo $value["comments"]->id;?>" class="like-count-comment <?php if($value["already_liked"]){ echo 'like-h2';}?>"><?php echo $value["likes"];?></div>
			</div>
        </div>
    </div><!-- end "cmt-cnt" -->
    <?php endforeach; ?>
</div><!-- end of comments container "cmt-container" -->
</div>

<script type="text/javascript">
   $(function(){ 
        //alert(event.timeStamp);
        $('.new-com-bt').click(function(event){    
            $(this).hide();
            $('.new-com-cnt').show();
            $('#comment').focus();
        });

        /* when start writing the comment activate the "add" button */
        $('.the-new-com').bind('input propertychange', function() {
           $(".bt-add-com").css({opacity:0.6});
           var checklength = $(this).val().length;
           if(checklength>4){ $(".bt-add-com").css({opacity:1}); }
        });

        /* on clic  on the cancel button */
        $('.bt-cancel-com').click(function(){
            $('.the-new-com').val('');
            $('.new-com-cnt').fadeOut('fast', function(){
                $('.new-com-bt').fadeIn('fast');
            });
        });

        // on post comment click 
        $('.bt-add-com').click(function(){
            var theCom = $('.the-new-com');
            
            if( !theCom.val()){ 
                alert('You need to write a comment !'); 
            }else{ 
                $.ajax({
                    type: $("#addCom").attr('method'),
                    url: $("#addCom").attr('action'),
                    data: $("#addCom").serialize(),
                    success: function(datas){
						var data = jQuery.parseJSON(datas);
						$('.the-new-com').val('');
                        $('.new-com-cnt').hide('fast', function(){
                            $('.new-com-bt').show('fast');
                            $('.new-com-bt').after('<div class="cmt-cnt"><img src="' + data.avatar +'" /><div class="thecom"><h5><b>'+data.firstname + ' ' + data.lastname + '</b></h5><input type="hidden" id="id_post'+data.id+'" value="'+data.id+'"/><span class="com-dt"> ' + data.post_date + '</span><br/><p>' + data.message + '</p><div class="cmt_dis_like"><div id="dislike_comment'+data.id+'" class="dislike-count-comment">0</div><div id="like_comment'+data.id+'" class="like-count-comment">0</div></div></div></div>');  
                        });
                    }  
                });
            }
        });
			
		//When we click on the like button
        $('.like-count-comment').click(function(){
			
			//Retrieve the id where we clicked on the like. We get for example post_id17
			var id_post = $(this).parent().parent().children("input").attr('id');
			
			//Substring "post_id" from "post_id17" so we get only the id
			id_post = id_post.substr(7, id_post.length);
		
			//Add some style when we click
			$('#dislike_comment'+id_post).removeClass('dislike-h2');
            $('#like_comment'+id_post).addClass('like-h2');
			
            //alert(id_post);
			$.ajax({
                type:"POST",
                url:"<?php echo site_url('like_dislike_comment');?>",
                data:'act=like&commentID='+id_post,
                success: function(data){
				
					//We parse the data send by PHP (sketch/like_dislike)
					var datas = jQuery.parseJSON(data);
					
					//We update all the values
					$("#dislike_comment"+id_post).val('').text(datas.rate_dislike_count_comment);
					$("#like_comment"+id_post).val('').text(datas.rate_like_count_comment);

                }
            });
        });
		
		//When we click on the dislike button
        $('.dislike-count-comment').click(function(){
			
			//Retrieve the id where we clicked on the like/dislike. We get for example post_id17
			var id_post = $(this).parent().parent().children("input").attr('id');
			
			//Substring "post_id" from "post_id17" so we get only the id
			id_post = id_post.substr(7, id_post.length);
			
			//Add some style when we click
           	$('#like_comment'+id_post).removeClass('like-h2');
            $('#dislike_comment'+id_post).addClass('dislike-h2');
			
			//alert(id_post);
			$.ajax({
                type:"POST",
                url:"<?php echo site_url('like_dislike_comment');?>",
                data:'act=dislike&commentID='+id_post,
                success: function(data){
					
					//We parse the data send by PHP (sketch/like_dislike)
					var datas = jQuery.parseJSON(data);
					
					//We update all the values
					$("#dislike_comment"+id_post).val('').text(datas.rate_dislike_count_comment);
					$("#like_comment"+id_post).val('').text(datas.rate_like_count_comment);
                }
            });
        });

    });
</script>