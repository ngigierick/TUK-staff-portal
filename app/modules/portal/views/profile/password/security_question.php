<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=> 'horizontal',
	//'enableAjaxValidation' => true,
));
?>
<fieldset>
<legend>Set Security Question for Password Recovery</legend>
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
<div class="notes">
To avoid being stranded in case you forgot your password, kindly set your security question and answer below:
</div>



<?php echo $form->dropDownListRow($model, 'security_question_id', GxHtml::listDataEx(UserQuestion::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>

<div class="control-group">
<div class="control-label">
Answer:
</div>
<div class="controls">
<?php echo CHtml::passwordField('new','', array('prepend'=>'<i class="icon-lock"></i>','maxlength' => 255,'value'=>'','autocomplete'=>"off")); ?>
</div>
</div>




<div class="control-group">
<div class="control-label">
Verify Answer:
</div>
<div class="controls">
<?php echo CHtml::passwordField('confirm','', array('prepend'=>'<i class="icon-lock"></i>','maxlength' => 255,'value'=>'','autocomplete'=>"off")); ?>
</div>
</div>
</fieldset>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'danger',
		'icon'=>'ok',
		'label'=>'Submit Details',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset Form')); ?>
</div>
<?php	
$this->endWidget();
?>

