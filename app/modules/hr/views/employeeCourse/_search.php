
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
	'type'=>'horizontal',
)); ?>

	
	<?php echo $form->textField($model, 'id'); ?>

	
	<?php echo $form->dropDownList($model, 'pf_number', GxHtml::listDataEx(Employee::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'course_name', array('maxlength' => 300)); ?>

	
	<?php echo $form->textField($model, 'brief_description', array('maxlength' => 500)); ?>

	
	<?php echo $form->textField($model, 'elearning_link', array('maxlength' => 300)); ?>

	
	<?php echo $form->textField($model, 'institution', array('maxlength' => 200)); ?>

	
	<?php echo $form->dropDownList($model, 'country_id', GxHtml::listDataEx(Country::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'starting_date', array('maxlength' => 100)); ?>

	
	<?php echo $form->textField($model, 'ending_date', array('maxlength' => 100)); ?>

	
	<?php echo $form->dropDownList($model, 'currently_on', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>	</div>

<?php $this->endWidget(); ?>

