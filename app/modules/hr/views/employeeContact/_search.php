
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
	'type'=>'horizontal',
)); ?>

	
	<?php echo $form->textField($model, 'id'); ?>

	
	<?php echo $form->dropDownList($model, 'pf_number', GxHtml::listDataEx(Employee::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'home', array('maxlength' => 150)); ?>

	
	<?php echo $form->dropDownList($model, 'nationality_id', GxHtml::listDataEx(Nationality::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->dropDownList($model, 'county_id', GxHtml::listDataEx(County::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'postal_address', array('maxlength' => 100)); ?>

	
	<?php echo $form->textField($model, 'postal_code', array('maxlength' => 10)); ?>

	
	<?php echo $form->textField($model, 'town', array('maxlength' => 100)); ?>

	
	<?php echo $form->textField($model, 'office_telephone', array('maxlength' => 100)); ?>

	
	<?php echo $form->textField($model, 'mobile', array('maxlength' => 300)); ?>

	
	<?php echo $form->textField($model, 'email', array('maxlength' => 300)); ?>

	
	<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>	</div>

<?php $this->endWidget(); ?>

