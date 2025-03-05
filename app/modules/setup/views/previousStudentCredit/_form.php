<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'previous-student-credit-form',
	'enableAjaxValidation' => true,
));
?>
<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'app_number'); ?>
		<?php echo $form->textField($model, 'app_number', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'app_number'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'trans_no'); ?>
		<?php echo $form->textField($model, 'trans_no', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'trans_no'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'type_'); ?>
		<?php echo $form->textField($model, 'type_', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'type_'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'course_yr'); ?>
		<?php echo $form->textField($model, 'course_yr', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'course_yr'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'reg_fee'); ?>
		<?php echo $form->textField($model, 'reg_fee', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'reg_fee'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'caution'); ?>
		<?php echo $form->textField($model, 'caution', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'caution'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'union_'); ?>
		<?php echo $form->textField($model, 'union_', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'union_'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'sports'); ?>
		<?php echo $form->textField($model, 'sports', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'sports'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'maint'); ?>
		<?php echo $form->textField($model, 'maint', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'maint'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'medical'); ?>
		<?php echo $form->textField($model, 'medical', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'medical'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'tuition'); ?>
		<?php echo $form->textField($model, 'tuition', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'tuition'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'misc'); ?>
		<?php echo $form->textField($model, 'misc', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'misc'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cse_tot'); ?>
		<?php echo $form->textField($model, 'cse_tot', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'cse_tot'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'exam'); ?>
		<?php echo $form->textField($model, 'exam', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'exam'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'hostel'); ?>
		<?php echo $form->textField($model, 'hostel', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'hostel'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model, 'total', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'total'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'xref'); ?>
		<?php echo $form->textField($model, 'xref', array('maxlength' => 15)); ?>
		<?php echo $form->error($model,'xref'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'descript'); ?>
		<?php echo $form->textField($model, 'descript', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'descript'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'val'); ?>
		<?php echo $form->textField($model, 'val', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'val'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'date_'); ?>
		<?php echo $form->textField($model, 'date_', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'date_'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'luser'); ?>
		<?php echo $form->textField($model, 'luser', array('maxlength' => 15)); ?>
		<?php echo $form->error($model,'luser'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->