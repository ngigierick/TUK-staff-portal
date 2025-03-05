
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
	'type'=>'horizontal',
)); ?>

	
	<?php echo $form->textField($model, 'id'); ?>

	
	<?php echo $form->textField($model, 'name', array('maxlength' => 50)); ?>

	
	<?php echo $form->textField($model, 'code', array('maxlength' => 20)); ?>

	
	<?php echo $form->textField($model, 'description', array('maxlength' => 100)); ?>

	
	<?php echo $form->textField($model, 'department_id'); ?>

	
	<?php echo $form->textField($model, 'status'); ?>

	
	<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>	</div>

<?php $this->endWidget(); ?>

