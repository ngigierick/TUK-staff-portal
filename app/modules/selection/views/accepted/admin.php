
<script>
$(document).ready(function(){
    $.ajax({
        type: 'POST',
        data: {},
        url: '<?php echo CController::createUrl('accepted/listing'); ?>',
		beforeSend:function(){
                $('.content').prepend("<h1>Fetching the list... This may take some time, please be patient.</h1>");
				
                },
        complete: function(){
                    $('.content').append("<h1>Complete.</h1><br/>")
                },
		success: function(data){
                    $('.content').html(data)
                }
    })
});
</script>

<div class="content">
<div id="progressbar"><div class="grid-view-loading progress-label"> &nbsp;</div></div>
</div>