<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'app_number'); ?>
		<?php echo $form->textField($model, 'app_number', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'trans_no'); ?>
		<?php echo $form->textField($model, 'trans_no', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'type_'); ?>
		<?php echo $form->textField($model, 'type_', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'course_yr'); ?>
		<?php echo $form->textField($model, 'course_yr', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'reg_fee'); ?>
		<?php echo $form->textField($model, 'reg_fee', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'caution'); ?>
		<?php echo $form->textField($model, 'caution', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'union_'); ?>
		<?php echo $form->textField($model, 'union_', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'sports'); ?>
		<?php echo $form->textField($model, 'sports', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'maint'); ?>
		<?php echo $form->textField($model, 'maint', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'medical'); ?>
		<?php echo $form->textField($model, 'medical', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tuition'); ?>
		<?php echo $form->textField($model, 'tuition', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'misc'); ?>
		<?php echo $form->textField($model, 'misc', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cse_tot'); ?>
		<?php echo $form->textField($model, 'cse_tot', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'exam'); ?>
		<?php echo $form->textField($model, 'exam', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'hostel'); ?>
		<?php echo $form->textField($model, 'hostel', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'total'); ?>
		<?php echo $form->textField($model, 'total', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'xref'); ?>
		<?php echo $form->textField($model, 'xref', array('maxlength' => 15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'descript'); ?>
		<?php echo $form->textField($model, 'descript', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'val'); ?>
		<?php echo $form->textField($model, 'val', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'date_'); ?>
		<?php echo $form->textField($model, 'date_', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'luser'); ?>
		<?php echo $form->textField($model, 'luser', array('maxlength' => 15)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
