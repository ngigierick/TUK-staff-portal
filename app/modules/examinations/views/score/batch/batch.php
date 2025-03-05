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

<h1>Upload Marks from School</h1>

<fieldset>
<legend>CHECK LIST: Kindly ensure the following are done before you upload!</legend>
<div class="notes">
<ul>
<li>The <b>Mark Sheet SHOULD BE in the format that the Examination Office </b>had set for receiving marks from the schools</li>
<li>The Mark Sheet should be saved in CSV format, that is, use 'Save As' option to save the mark sheet as <b>Comma Separated Values (CSV) file</b></li>
<li>The CSV file should be saved with the Class Code and Year, eg, <b>Et306111_1</b></li>
<li><b>If the Mark Sheet is for the final year, then save the CSV file with the Class Code, Year and the capital letter F, eg, Et306111_4_F</b></li>
</ul>
<h3>NB: For classes with "/" character in the name, replace with "." character for example <b>ABCD/2013P_1</b> save as <b>ABCD.2013P_1</b></h3>
</div>
</fieldset>

<fieldset>
<legend>Locate the CSV Mark Sheet</legend>
<div class="control-group">
<div class="control-label">
Choose CSV File:
</div>
<div class="controls">
<?php echo $form->fileField($model, 'marks_total'); ?>
</div>
</div>
</fieldset>


<br/><br/><br/>
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'buttonType'=>'submit',
	'type'=>'success',
	'size'=>'large',
	'label'=>'UPLOAD MARKS',
)); ?>
	
		


<?php
$this->endWidget();
?>
