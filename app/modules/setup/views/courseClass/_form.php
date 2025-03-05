<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'course-class-form',
	'enableAjaxValidation' => true,
));
?>
<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model, 'code', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'code'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'module_id'); ?>
		<?php echo $form->dropDownList($model, 'module_id', GxHtml::listDataEx(Module::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'module_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'department_id'); ?>
		<?php echo $form->dropDownList($model, 'department_id', GxHtml::listDataEx(Department::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'department_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'start_year'); ?>
		<?php echo $form->textField($model, 'start_year', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'start_year'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'start_term'); ?>
		<?php echo $form->textField($model, 'start_term', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'start_term'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'duration'); ?>
		<?php echo $form->textField($model, 'duration'); ?>
		<?php echo $form->error($model,'duration'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'no_of_terms'); ?>
		<?php echo $form->textField($model, 'no_of_terms'); ?>
		<?php echo $form->error($model,'no_of_terms'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'pattern'); ?>
		<?php echo $form->textField($model, 'pattern', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'pattern'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'date_modified'); ?>
		<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'date_modified'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'status_id'); ?>
		<?php echo $form->textField($model, 'status_id'); ?>
		<?php echo $form->error($model,'status_id'); ?>
		</div><!-- row -->

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
		<?php echo $form->error($model,'id'); ?>
		</div><!-- row -->
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->