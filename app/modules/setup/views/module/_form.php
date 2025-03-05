<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'module-form',
	'enableAjaxValidation' => true,
));
?>
<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('programmeclasses')); ?></label>
		<?php echo $form->checkBoxList($model, 'programmeclasses', GxHtml::encodeEx(GxHtml::listDataEx(Programmeclass::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->