
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
	'type'=>'horizontal',
)); ?>

	
	<?php echo $form->textField($model, 'id'); ?>

	
	<?php echo $form->textField($model, 'reg_number', array('maxlength' => 30)); ?>

	
	<?php echo $form->dropDownList($model, 'academicyear_id', GxHtml::listDataEx(Academicyear::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'id_number', array('maxlength' => 20)); ?>

	
	<?php echo $form->dropDownList($model, 'gender_id', GxHtml::listDataEx(Gender::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'surname', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'firstname', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'othername', array('maxlength' => 30)); ?>

	
	<?php echo $form->dropDownList($model, 'school_id', GxHtml::listDataEx(School::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->dropDownList($model, 'department_id', GxHtml::listDataEx(Department::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->dropDownList($model, 'programme_id', GxHtml::listDataEx(Programme::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'programme_end', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'mobile', array('maxlength' => 40)); ?>

	
	<?php echo $form->textField($model, 'email', array('maxlength' => 50)); ?>

	
	<?php echo $form->textField($model, 'photo', array('maxlength' => 300)); ?>

	
	<?php echo $form->textField($model, 'ag_id_number', array('maxlength' => 20)); ?>

	
	<?php echo $form->textField($model, 'ag_gender_id'); ?>

	
	<?php echo $form->textField($model, 'ag_surname', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'ag_firstname', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'ag_othername', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'ag_school_id'); ?>

	
	<?php echo $form->textField($model, 'ag_department_id'); ?>

	
	<?php echo $form->textField($model, 'ag_programme_id', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'ag_programme_end', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'ag_mobile', array('maxlength' => 40)); ?>

	
	<?php echo $form->textField($model, 'ag_email', array('maxlength' => 50)); ?>

	
	<?php echo $form->textField($model, 'ag_photo', array('maxlength' => 300)); ?>

	
	<?php echo $form->textField($model, 'status'); ?>

	
	<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>	</div>

<?php $this->endWidget(); ?>

