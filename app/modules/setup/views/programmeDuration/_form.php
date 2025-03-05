<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'programme-duration-form',
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
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textField($model, 'notes', array('maxlength' => 200)); ?>
		<?php echo $form->error($model,'notes'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('programmes')); ?></label>
		<?php echo $form->checkBoxList($model, 'programmes', GxHtml::encodeEx(GxHtml::listDataEx(Programme::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->