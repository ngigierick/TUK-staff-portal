<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	
     'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); 

?>

<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 

?>


<h1>Upload Batch from Bank</h1>

<fieldset>
<legend>The Bank where the Batch is from</legend>
<div class="control-group">
<div class="control-label">
Select Bank:
</div>

</div>
</fieldset>
<br/><br/>
<fieldset>
<legend>Batch File - CSV Type</legend>
<div class="notes">
KINDLY NOTE: The CSV File must have data in the format:<br/>
<table>
<tr>
<td>Date Posted</td>
<td>Particulars</td>
<td>Transaction Reference</td>
<td>Amount</td>
<td>Running Balance</td>
</tr>
</table>
</div>

<div class="control-group">
<div class="control-label">
Choose CSV File:
</div>
<div class="controls">
<?php echo $form->fileField($model, 'email'); ?>
</div>
</div>
</fieldset>


<br/><br/><br/>
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'buttonType'=>'submit',
	'type'=>'success',
	'size'=>'large',
	'label'=>'PROCESS BATCH',
)); ?>
	
		


<?php
$this->endWidget();
?>
