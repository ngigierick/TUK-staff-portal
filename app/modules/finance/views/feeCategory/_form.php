<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'fee-category-form',
	'enableAjaxValidation' => true,
));
?>
<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('feepayables')); ?></label>
		<?php echo $form->checkBoxList($model, 'feepayables', GxHtml::encodeEx(GxHtml::listDataEx(Feepayable::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->