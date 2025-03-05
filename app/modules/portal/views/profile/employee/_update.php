
<link rel="stylesheet" type="text/css" href="/staff/css/main.css" />
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'employee-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.<br/>
		Enter your official names and the other biodata shown.
		
	</p>

	
	<?php echo $form->errorSummary($model); ?>
	
		
		
		<?php echo $form->dropDownListRow($model, 'title_id', GxHtml::listDataEx(Title::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
		
		
		<?php echo $form->textFieldRow($model, 'surname', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'firstname', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'othername', array('maxlength' => 30)); ?>
				
		
		<?php echo $form->dropDownListRow($model, 'gender_id', GxHtml::listDataEx(Gender::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
		
		
		
		
		
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		'size'=>'small',
		'icon'=>'ok',
		'label'=>$model->isNewRecord ? 'Add Staff Member' : 'Save Changes',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		
		'type'=>'warning',
		'size'=>'small',
		'icon'=>'remove',
		'url' => array('//portal/profile/view'),
		'label'=>'Cancel',
	));?>
	</div>
<?php	
$this->endWidget();
?>
<br/><br/><br/>