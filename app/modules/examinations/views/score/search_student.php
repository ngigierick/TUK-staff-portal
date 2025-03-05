
<h1>Transcript Generation</h1>
<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 

?>
<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'searchForm',
    'type'=>'horizontal',
    'htmlOptions'=>array(),
)); 




?>
<fieldset>
<legend>Generate Transcript for a Student</legend>
<div class="control-group">
<label class="control-label required">
Registration Number: 
</label>
<div class="controls">
<?php echo $form->textField($model,'student_reg'); ?>
</div>
</div>


<div class="control-group">
<label class="control-label required">
Year of Study:
</label>
<div class="controls">
<?php 
	$yr_study = array(0=>'Select one',1=>'First',2=>'Second',3=>'Third',4=>'Fourth',5=>'Fifth',6=>'Sixth');
	echo $form->dropDownList($model,'year_of_study',$yr_study); ?>
</div>
</div>
</fieldset>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'size'=>'large',
		'label'=>'Generate Transcript',
	)); ?>
</div>
<?php	
$this->endWidget();
?>



