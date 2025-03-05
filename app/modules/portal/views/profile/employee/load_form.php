<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogClassroom',
    'options'=>array(
        'title'=>'Staff Record Form',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>600,
    ),
));?>
<div class="divForForm"><span><div class="grid-view-loading progress-label"> &nbsp;</div>Loading page...</span></div>
<?php $this->endWidget();?>
<br /><br />
<script type="text/javascript">
// here is the magic
function loadForm(link)
{
	            
	$.ajax({
			  type: 'POST',
			  data: $(this).serialize(),
			  url: link,
			})
			  .done(function( data, msg ){
			  
			  	$('#dialogClassroom div.divForForm').html('');
				var obj = $.parseJSON(data);
				 if (obj.status == 'failure')
	        	{
	           
			    	$('#dialogClassroom div.divForForm').html(obj.div);
	             	// Here is the trick: on submit-> once again this function!
	           		//$('#dialogClassroom div.divForForm form').submit(loadForm);
	       		 }
	        	else
	        	{
	            	$('#dialogClassroom div.divForForm').html(obj.div);
	            
	            	setTimeout($('#dialogClassroom').dialog('close') ,3000);
	        	}
				
			
	});
    return false; 
 
}
 
</script>
