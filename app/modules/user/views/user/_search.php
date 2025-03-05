
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
	'type'=>'horizontal',
)); ?>

	
	<?php echo $form->textField($model, 'id'); ?>

	
	<?php echo $form->dropDownList($model, 'role_id', GxHtml::listDataEx(Role::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>

	
	<?php echo $form->textField($model, 'email', array('maxlength' => 255)); ?>

	
	<?php echo $form->textField($model, 'pf_number', array('maxlength' => 255)); ?>

	
	<?php echo $form->textField($model, 'id_number', array('maxlength' => 255)); ?>

	
	<?php echo $form->textField($model, 'designation', array('maxlength' => 255)); ?>

	
	<?php echo $form->textField($model, 'photo', array('maxlength' => 255)); ?>

	
	<?php echo $form->textField($model, 'username', array('maxlength' => 20)); ?>

	
	<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>	</div>

<?php $this->endWidget(); ?>

