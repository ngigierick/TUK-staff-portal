<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'school-form',
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
		<?php echo $form->textField($model, 'code', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'code'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'faculty_id'); ?>
		<?php echo $form->dropDownList($model, 'faculty_id', GxHtml::listDataEx(Faculty::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'faculty_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textField($model, 'notes', array('maxlength' => 500)); ?>
		<?php echo $form->error($model,'notes'); ?>
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

		<label><?php echo GxHtml::encode($model->getRelationLabel('departments')); ?></label>
		<?php echo $form->checkBoxList($model, 'departments', GxHtml::encodeEx(GxHtml::listDataEx(Department::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->