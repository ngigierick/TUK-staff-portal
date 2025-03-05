
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'role-form',
	'type'=> 'horizontal',
	//'enableAjaxValidation' => true,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
?>
	<!-- capture application fee id -->
	<?php if (isset($applicant)):?>
	<?php echo CHtml::hiddenField('fees_id',$applicant->id); ?>
	<?php endif;?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model, 'academicyear_id'); ?>
	<?php echo $form->hiddenField($model, 'programme_id'); ?>

    <fieldset><legend>Applicant Biodata</legend>
		
	<?php echo $form->dropDownListRow($model, 'module_id', GxHtml::listDataEx(Module::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
	
	<?php echo $form->dropDownListRow($model, 'gender_id', GxHtml::listDataEx(Gender::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
	
	<?php echo $form->dropDownListRow($model, 'title_id', GxHtml::listDataEx(Title::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
	
	<?php echo $form->textFieldRow($model, 'surname'); ?>
	
	<?php echo $form->textFieldRow($model, 'firstname'); ?>

	<?php echo $form->textFieldRow($model, 'othername'); ?>
		
	<div class="control-group">
	<div class="control-label">
	Date of birth
	</div>
	<div class="controls">
		<?php
	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'name'=>'Applicant[dob]',
	'value'=>$model->dob,
	'options'=>array(
		'showAnim'=>'fold',
		'changeMonth'=>true,
		'changeYear'=>true,
		'yearRange'=>'1930:2012',
		'dateFormat'=>'dd/mm/yy',
	),
	'htmlOptions'=>array(
		'style'=>'height:20px;'
		),
	));?>
	</div>
	</div>
	
	<?php echo $form->textFieldRow($model, 'id_number', array('maxlength' => 20)); ?>

	<?php echo $form->dropDownListRow($model, 'marital_status_id', GxHtml::listDataEx(MaritalStatus::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
	
	</fieldset>
	
	<fieldset><legend>Applicant Location and Contact Details</legend>
		
		<?php echo $form->dropDownListRow($model, 'nationality_id', GxHtml::listDataEx(Nationality::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
		
		<?php echo $form->dropDownListRow($model, 'county_id', GxHtml::listDataEx(County::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
		
		<?php echo $form->dropDownListRow($model, 'ethnicity_id', GxHtml::listDataEx(Ethnicity::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
		
		<?php echo $form->dropDownListRow($model, 'religion_id', GxHtml::listDataEx(Religion::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
		
		<?php echo $form->textFieldRow($model, 'postal_address', array('maxlength' => 200)); ?>
		
		<?php echo $form->textFieldRow($model, 'postcode', array('maxlength' => 10)); ?>
		
		<?php echo $form->textFieldRow($model, 'town', array('maxlength' => 20)); ?>
		
		<?php echo $form->textFieldRow($model, 'mobile', array('maxlength' => 20)); ?>
		
		<?php echo $form->textFieldRow($model, 'email', array('maxlength' => 30)); ?>
	
	</fieldset>
	
	<fieldset><legend>Applicant Other Details</legend>
	
		<?php echo $form->dropDownListRow($model, 'disability_id', GxHtml::listDataEx(Answer::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
		
		<?php echo $form->textFieldRow($model, 'occupation', array('maxlength' => 30)); ?>
		
		<?php echo $form->textFieldRow($model, 'employer', array('maxlength' => 100)); ?>
		
		<?php echo $form->textAreaRow($model, 'employer_address', array('maxlength' => 200)); ?>
		
		<?php echo $form->textFieldRow($model, 'employer_telephone', array('maxlength' => 30)); ?>
		
		<?php echo $form->textAreaRow($model, 'employer_otherinfo', array('maxlength' => 200)); ?>
		
		<?php echo $form->textAreaRow($model, 'extra_info', array('maxlength' => 200)); ?>
		
		<div class="control-group">
		<div class="control-label">
		<?php echo $form->labelEx($model,'photo'); ?>
		</div>
		<div class="controls">
		<?php if(($model->isNewRecord) || (empty($model->photo))):?>
		
		<?php echo $form->fileField($model, 'photo', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'photo'); ?>
		
		<?php else:?>
		<div class="row" id="fixed">
		<?php echo CHtml::image(Yii::app()->baseUrl.'/images/passports/'.$model->photo,"image",array("width"=>200)); ?>  
		<?php echo CHtml::hiddenField('photo',$model->photo); ?>
		</div>
		<?php echo CHtml::checkBox('covered',false, array('class'=>'change'));?> <?php echo $form->labelEx($model,'changephoto');?>
		<div class="row">
		<div id="photo" style="display:none">
		<?php echo $form->labelEx($model,'changephotolabel');?>
		<?php echo $form->fileField($model, 'photo', array('maxlength' => 30)); ?>
		</div>
		<?php
			Yii::app()->clientScript->registerScript('show', "
				$('.change').click(function(){
					$('#fixed, #photo').toggle();
			});
			");
		?>
		<?php endif;?>
		</div>
		</div>
<?php if(!$model->isNewRecord):?>
<?php echo $form->dropDownListRow($model, 'status', GxHtml::listDataEx(Status::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
<?php endif;?>	
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>
<?php	
$this->endWidget();
?>