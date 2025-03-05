<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'bank-account-form',
	'enableAjaxValidation' => true,
));
?>
<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'accountnumber'); ?>
		<?php echo $form->textField($model, 'accountnumber', array('maxlength' => 40)); ?>
		<?php echo $form->error($model,'accountnumber'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'branch'); ?>
		<?php echo $form->textField($model, 'branch', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'branch'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'postaladdress'); ?>
		<?php echo $form->textField($model, 'postaladdress', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'postaladdress'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'telephone'); ?>
		<?php echo $form->textField($model, 'telephone', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'telephone'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fax'); ?>
		<?php echo $form->textField($model, 'fax', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'fax'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('applicationfees')); ?></label>
		<?php echo $form->checkBoxList($model, 'applicationfees', GxHtml::encodeEx(GxHtml::listDataEx(Applicationfees::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->