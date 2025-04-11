<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogClassroom',
    'options'=>array(
        'title'=>'Manage Products',  // Adjusted the title to reflect the product management
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>800,  // Increased width for better display
        'height'=>600, // Kept the height the same
    ),
));?>
<div class="divForForm"><span><div class="grid-view-loading progress-label"> &nbsp;</div>Loading page...</span></div>
<?php $this->endWidget();?>
<br /><br />
<script type="text/javascript">
// here is the magic
function loadForm(link)
{
    // Making an AJAX request to the given URL
    $.ajax({
        type: 'POST',
        url: link,  // Link to the action that will load the product list
        success: function(data) {
            // On success, populate the dialog with the data returned
            $('#dialogClassroom div.divForForm').html(data);

            // Open the dialog
            $('#dialogClassroom').dialog('open');
        },
        error: function(xhr, status, error) {
            // If there's an error, show an alert
            alert('Error loading page: ' + error);
        }
    });
    return false; 
}
</script>
