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


<h1>Admission Panel for Continuing Students</h1>

<fieldset>
<legend>Admit Continuing Students</legend>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'admission-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>
<div class="control-group">
<div class="control-label">
Programme/ Course
</div>
<div class="controls">
<?php
					//autocomplete
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'model'=>$model,
			'attribute'=>'reg_number',
			'id'=>'prog_code',
			'source'=>$this->createUrl('/finance/applicationFees/autocomplete'),
			'options'=>array(
				'delay'=>300,
				'minLength'=>2,
				'showAnim'=>'fold',
				'select'=>"js:function(event, ui) {
					$('#programmecode').val(ui.item.id);
					//$('#code').val(ui.item.code);
				}"
			),
			'htmlOptions'=>array(
				'size'=>'40'
			),
		));
?>
<?php echo $form->hiddenField($model, 'reg_number', array('maxlength' => 30,'id'=>'programmecode')); ?>
</div>
</div>

<div class="control-group">
<div class="control-label">
Academic Year
</div>
<div class="controls">
<?php
			$models = AcademicYear::model()->findAll(array('order' => 'id DESC'));
	?>
<?php echo CHtml::dropDownList('academicyear_id','', GxHtml::listDataEx($models)); ?>
</div>
</div>

<?php echo $form->dropDownListRow($model, 'semester_id', GxHtml::listDataEx(Semester::model()->findAllAttributes(null, true))); ?>

<?php 
$yr_study = array(0=>'Select one',1=>'First',2=>'Second',3=>'Third',4=>'Fourth',5=>'Fifth',6=>'Sixth');

echo $form->dropDownListRow($model, 'year_of_study', $yr_study); ?>

<?php 
$sem_study = array(0=>'Select one',1=>'First',2=>'Second');

echo $form->dropDownListRow($model, 'semester_of_study', $sem_study); ?>



<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'PROCEED',
	)); ?>
	</div>
<?php	
$this->endWidget();
?>
</fieldset>
