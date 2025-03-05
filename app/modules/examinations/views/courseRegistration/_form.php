<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'course-registration-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

<?php echo $form->errorSummary($model); ?>
	
		
		
<div class="control-group required">
<label class="control-label required">
Academic Calendar: 
</label>
<div class="controls">
<?php 

$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			//'model'=>$model,
			//'attribute'=>'semester_id',
			'name'=>'sem',
			'source'=>$this->createUrl('//finance/applicationFees/academicSemester'),
			'options'=>array(
				'delay'=>200,
				'minLength'=>2,
				'showAnim'=>'fold',
				'select'=>"js:function(event, ui) {
					$('#semester_id').val(ui.item.id);
					//$('#code').val(ui.item.code);
				}"
				
			),
			'htmlOptions'=>array(
				'size'=>'40'
			),
		));

 ?>
 <?php echo $form->hiddenField($model, 'semester_id', array('maxlength' => 10,'id'=>'semester_id')); ?>
 <span class="notes">
just start by typing the academic year and semester eg 2013/2014 | SEM1
</span>
</div>
</div>
		
<div class="control-group">
<label class="control-label required">
Registration Number: 
</label>
<div class="controls">
<?php

//autocomplete
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			
			'name'=>'reg',
			'source'=>$this->createUrl('//admission/student/showStudent'),
			'options'=>array(
				'delay'=>300,
				'minLength'=>2,
				'showAnim'=>'fold',
				'select'=>"js:function(event, ui) {
					$('#student_reg').val(ui.item.value);
		
				}"
			),
			'htmlOptions'=>array(
				'size'=>'40'
			),
		));
?>
 <?php echo $form->hiddenField($model, 'student_reg', array('maxlength' => 10,'id'=>'student_reg')); ?>
 <span class="notes">
just start by typing the student registration number
</span>
</div>
</div>


<div class="control-group">
<div class="control-label">
Course Unit: 

</div>
<div class="controls">
<?php
					//autocomplete
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	
	'name'=>'course',
	'source'=>$this->createUrl('//examinations/courseUnit/searchByCode'),
	'options'=>array(
		'delay'=>300,
		'minLength'=>2,
		'showAnim'=>'fold',
		'select'=>"js:function(event, ui) {
			$('#course_unit_id').val(ui.item.id);
			
			
		}"
	),
	'htmlOptions'=>array(
		'size'=>'40'
	),
));
?>

 <?php echo $form->hiddenField($model, 'course_unit_id', array('maxlength' => 10,'id'=>'course_unit_id')); ?>
<span class="notes">
this is an autocomplete field, just start by typing the course code
</span>
</div>

</div>
		

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Register Student' : 'Save Changes',
	)); ?>
	</div>
<?php	
$this->endWidget();
?>
