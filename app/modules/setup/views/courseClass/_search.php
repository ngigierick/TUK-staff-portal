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
		<?php echo $form->label($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'code'); ?>
		<?php echo $form->textField($model, 'code', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'module_id'); ?>
		<?php echo $form->dropDownList($model, 'module_id', GxHtml::listDataEx(Module::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'department_id'); ?>
		<?php echo $form->dropDownList($model, 'department_id', GxHtml::listDataEx(Department::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'start_year'); ?>
		<?php echo $form->textField($model, 'start_year', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'start_term'); ?>
		<?php echo $form->textField($model, 'start_term', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'duration'); ?>
		<?php echo $form->textField($model, 'duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'no_of_terms'); ?>
		<?php echo $form->textField($model, 'no_of_terms'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'pattern'); ?>
		<?php echo $form->textField($model, 'pattern', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'date_modified'); ?>
		<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'status_id'); ?>
		<?php echo $form->textField($model, 'status_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
