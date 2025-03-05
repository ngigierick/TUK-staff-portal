
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
	'type'=>'horizontal',
)); ?>

	
	<?php echo $form->textField($model, 'id'); ?>

	
	<?php echo $form->textField($model, 'name', array('maxlength' => 50)); ?>

	
	<?php echo $form->textArea($model, 'content'); ?>

	
	<?php echo $form->dropDownList($model, 'author_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'start_date', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'end_date', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'completion_stage'); ?>

	
	<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>

	
	<?php echo $form->dropDownList($model, 'status_id', GxHtml::listDataEx(Status::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>	</div>

<?php $this->endWidget(); ?>

