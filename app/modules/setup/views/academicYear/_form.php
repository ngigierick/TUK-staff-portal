<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'academic-year-form',
	'enableAjaxValidation' => true,
));
?>
<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'starting'); ?>
		<?php echo $form->textField($model, 'starting', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'starting'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ending'); ?>
		<?php echo $form->textField($model, 'ending', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'ending'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'date_modified'); ?>
		<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'date_modified'); ?>
		</div><!-- row -->

	

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->