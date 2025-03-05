

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'staff-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<fieldset>
		<legend>Staff Personal Information</legend>
		<?php echo $form->dropDownListRow($model, 'title_id', GxHtml::listDataEx(Title::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->textFieldRow($model, 'surname', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'firstname', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'othername', array('maxlength' => 30)); ?>
		
			
		
		<?php echo $form->datePickerRow($model, 'dob', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'gender_id', GxHtml::listDataEx(Gender::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'marital_status_id', GxHtml::listDataEx(MaritalStatus::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'nationality_id', GxHtml::listDataEx(Nationality::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'county_id', GxHtml::listDataEx(County::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->textFieldRow($model, 'id_number', array('maxlength' => 20)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'pin_number', array('maxlength' => 20)); ?>
		
		</legend>
		
		<fieldset>
		<legend>Staff Employment Information</legend>
		
		<?php echo $form->textFieldRow($model, 'designation', array('maxlength' => 30)); ?>
			
		<?php echo $form->textFieldRow($model, 'pf_number', array('maxlength' => 20)); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'emp_terms_id', GxHtml::listDataEx(EmploymentTerms::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'grade_id', GxHtml::listDataEx(Grade::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->datePickerRow($model, 'doe', array('maxlength' => 30)); ?>
		
				
		<?php echo $form->dropDownListRow($model, 'office_id', GxHtml::listDataEx(Office::model()->findAllAttributes(null, true))); ?>
		
		<?php $category = array(0=>'Select one',1=>'Academic',2=>'Administration'); ?>
		
		<?php echo $form->dropDownListRow($model, 'category_id',$category); ?>
		
		
		</fieldset>
		
		
		<fieldset>
		<legend>Staff Contact Information</legend>
		
		
		<?php echo $form->textFieldRow($model, 'postal_address', array('maxlength' => 200)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'postcode', array('maxlength' => 100)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'town', array('maxlength' => 20)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'mobile', array('maxlength' => 60)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'email', array('maxlength' => 30)); ?>
		
	
		<?php //echo $form->textField($model, 'photo', array('maxlength' => 100)); ?>
		
    </fieldset>
		
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>
	</div>
<?php	
$this->endWidget();
?>
