

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'employee-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
		<br/><br/><br/>
	</p>

	
	<?php echo $form->errorSummary($model); ?>

		
		<?php echo $form->textFieldRow($model, 'pf_number', array('maxlength' => 20)); ?>
	
		
		<?php echo $form->dropDownListRow($model, 'emp_terms_id', GxHtml::listDataEx(EmploymentTerms::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
		
		<div class="control-group">
		
		<label class="control-label">
		<?php echo $form->label($model,'doe'); ?>
		</label>
		
		<div class="controls">
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'name'=>'Employee[doe]',
		'value'=>$model->doe,
		'options'=>array(
			'showAnim'=>'fold',
			'changeMonth'=>true,
			'changeYear'=>true,
			'yearRange'=>'1970:2014',
			'dateFormat'=>'dd/mm/yy',
		),
		'htmlOptions'=>array(
			'style'=>'height:20px;'
			),
		));?>
		</div>
		
		</div>
		
		
		<?php echo $form->textFieldRow($model, 'id_number', array('maxlength' => 20)); ?>
		
		<?php echo $form->textFieldRow($model, 'surname', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'firstname', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'othername', array('maxlength' => 30)); ?>
		
		<div class="control-group">
		
		<label class="control-label">
		<?php echo $form->label($model,'dob'); ?>
		</label>
		
		<div class="controls">
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'name'=>'Employee[dob]',
		'value'=>$model->dob,
		'options'=>array(
			'showAnim'=>'fold',
			'changeMonth'=>true,
			'changeYear'=>true,
			'yearRange'=>'1930:2000',
			'dateFormat'=>'dd/mm/yy',
		),
		'htmlOptions'=>array(
			'style'=>'height:20px;'
			),
		));?>
		</div>
		
		</div>
		
			
		<?php echo $form->dropDownListRow($model, 'title_id', GxHtml::listDataEx(Title::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'gender_id', GxHtml::listDataEx(Gender::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
		
		
		
		<?php echo $form->textFieldRow($model, 'pin_number', array('maxlength' => 20)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'nssf_number', array('maxlength' => 20)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'nhif_number', array('maxlength' => 20)); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'ethnicity_id', GxHtml::listDataEx(Ethnicity::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'religion_id', GxHtml::listDataEx(Religion::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
		
		
			
		<?php echo $form->dropDownListRow($model, 'status', GxHtml::listDataEx(Status::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
		
		
		
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'size'=>'large',
		'label'=>$model->isNewRecord ? 'Add Staff Member' : 'Save Changes for Staff Member',
	)); ?>
	</div>
<?php	
$this->endWidget();
?>
<br/><br/><br/>