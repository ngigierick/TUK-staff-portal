
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
	'type'=>'horizontal',
)); ?>

	
	<?php echo $form->textField($model, 'id'); ?>

	
	<?php echo $form->dropDownList($model, 'title_id', GxHtml::listDataEx(Title::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'surname', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'firstname', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'othername', array('maxlength' => 30)); ?>

	
	<?php echo $form->dropDownList($model, 'gender_id', GxHtml::listDataEx(Gender::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'id_number', array('maxlength' => 20)); ?>

	
	<?php echo $form->textField($model, 'pin_number', array('maxlength' => 20)); ?>

	
	<?php echo $form->textField($model, 'nssf_number', array('maxlength' => 20)); ?>

	
	<?php echo $form->textField($model, 'nhif_number', array('maxlength' => 20)); ?>

	
	<?php echo $form->textField($model, 'dob', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'pf_number', array('maxlength' => 20)); ?>

	
	<?php echo $form->dropDownList($model, 'emp_terms_id', GxHtml::listDataEx(EmpTerms::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'doe', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'dot', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'status'); ?>

	
	<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>	</div>

<?php $this->endWidget(); ?>

