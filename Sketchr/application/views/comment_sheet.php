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
    foreach($comments as $comment):
		// Converting the time to a UNIX timestamp:
		$comment->post_date = strtotime($comment->post_date);
    ?>
	
	<div class="cmt-cnt">
        <img src="<?php echo $comment->avatar; ?>" />
        <div class="thecom">
            <h5><b><?php echo $comment->first_name  .' '.$comment->last_name; ?></b></h5>
			<span class="com-dt"><?php echo date('d-m-Y H:i',$comment->post_date);?></span>
            <br/>
            <p>
                <?php echo $comment->message; ?>
            </p>
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
           if(checklength){ $(".bt-add-com").css({opacity:1}); }
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
                alert('You need to write a comment!'); 
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
                            $('.new-com-bt').after('<div class="cmt-cnt"><img src="' + data.avatar +'" /><div class="thecom"><h5><b>'+data.firstname + ' ' + data.lastname + '</b></h5><span data-utime="1371248446" class="com-dt"> ' + data.post_date + '</span><br/><p>' + data.message + '</p></div></div>');  
                        });
                    }  
                });
            }
        });

    });
</script>