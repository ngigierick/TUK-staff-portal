<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl('//portal/profile/update'),
    'id'=>'searchForm',
    'type'=>'search',
     'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); 

?>
<h4 class="warning">REMEMBER: YOU ARE ALLOWED TO UPDATE YOUR DETAILS ONLY ONCE!<br/>
	KINDLY CHECK FOR EVERY DETAIL.
	
	</h4>

<!-- Capture form session data -->
<?php echo CHtml::hiddenField('reg_number_bk',$model->reg_number); ?>
<?php echo CHtml::hiddenField('academic_year_bk',$model->academicyear_id); ?>

<!-- hidden data that shouldn't change -->
<?php echo $form->hiddenField($model,'reg_number'); ?>
<?php echo $form->hiddenField($model,'academicyear_id'); ?>
<?php echo $form->hiddenField($model,'programme_id'); ?>
<?php echo $form->hiddenField($model,'title_id'); ?>
<?php echo $form->hiddenField($model,'surname'); ?>
<?php echo $form->hiddenField($model,'firstname'); ?>
<?php echo $form->hiddenField($model,'othername'); ?>
<?php echo $form->hiddenField($model,'dob'); ?>
<?php echo $form->hiddenField($model,'id_number'); ?>
<?php
	$date = date('Y');
	$duration = $model->programme->duration;
	$date = $date +  substr($duration, 0, 1);
	$model->expected_completion_date = $date;
?>
<?php echo $form->hiddenField($model,'expected_completion_date'); ?>

<?php echo $form->errorSummary($model); ?>
	<fieldset>
	<legend>Academic Details</legend>
	<table>
	<tr>
	<td>
	Academic Year:
	</td>
	<td>
	<?php echo $form->textFieldRow($model, 'academicyear', array('style'=>'width:250px','disabled'=>'disabled')); ?>
	</td>
	</tr>
	<tr>
	<td>
	Programme/ Course:
	</td>
	<td>
	<?php echo $form->textFieldRow($model, 'programme', array('style'=>'width:550px','disabled'=>'disabled')); ?>
	</td>
	</tr>
	<tr>
	<td>
	Course Duration:
	</td>
	<td>
	<?php echo CHtml::textField('dur', $model->programme->duration,array('disabled'=>'disabled','style'=>'width:200px'));?>
	</td>
	</tr>
	<tr>
	<td>
	Registration Number:
	</td>
	<td>
	<?php echo $form->textFieldRow($model, 'reg_number', array('class'=>'input-medium','disabled'=>'disabled')); ?>
	</td>
	</tr>
		<tr>
	<td>
	Expected Completion Date:
	</td>
	<td>
	<?php
	$date = date('Y');
	$duration = $model->programme->duration;
	$date = $date +  substr($duration, 0, 1);
	?>
	<?php echo $form->textFieldRow($model, 'expected_completion_date'); ?>
	</td>
	</tr>
	</table>
	</fieldset>
	
	<fieldset>
	<legend>Personal Details</legend>
	<table>
	<tr>
	<td>
	Full name:
	</td>
	<td>
	<?php echo CHtml::textField('reg', $model->title.' '.$model->surname.' '.$model->firstname.' '.$model->othername,array('disabled'=>'disabled','style'=>'width:400px'));?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'dob'); ?>
	</td>
	<td>
	<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'name'=>'Student[dob]',
		'value'=>$model->dob,
		'options'=>array(
			'showAnim'=>'fold',
			'changeMonth'=>true,
			'changeYear'=>true,
			'yearRange'=>'1950:2012',
			'dateFormat'=>'dd/mm/yy',
		),
		'htmlOptions'=>array(
			'style'=>'height:20px;'
			),
		));?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'id_number'); ?>
	</td>
	<td>
	<?php echo $form->textFieldRow($model, 'id_number'); ?>
	</td>
	</tr>
	<tr>
	<td>
	Nationality:
	</td>
	<td>
	<?php echo $form->dropDownList($model, 'nationality_id', GxHtml::listDataEx(Nationality::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
	</td>
	</tr>

	<tr>
	<td>
	<?php echo $form->labelEx($model,'marital_status_id'); ?>
	</td>
	<td>
	<?php echo $form->dropDownList($model, 'marital_status_id', GxHtml::listDataEx(MaritalStatus::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
	</td>
	</tr>
		<tr>
	<td>
	<?php echo $form->labelEx($model,'county_id'); ?>
	</td>
	<td>
	<?php echo $form->dropDownList($model, 'county_id', GxHtml::listDataEx(County::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'district_id'); ?>
	</td>
	<td>
	<?php echo $form->dropDownList($model, 'district_id', GxHtml::listDataEx(District::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php //echo $form->labelEx($model,'ethnicity_id'); ?>
	</td>
	<td>
	<?php //echo $form->dropDownList($model, 'ethnicity_id', GxHtml::listDataEx(Ethnicity::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'religion_id'); ?>
	</td>
	<td>
	<?php echo $form->dropDownList($model, 'religion_id', GxHtml::listDataEx(Religion::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'extra_info'); ?>
	</td>
	<td>
		<?php echo $form->textAreaRow($model, 'extra_info', array('class'=>'input-medium')); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'disability_id'); ?>
	</td>
	<td>
	<?php echo $form->dropDownList($model, 'disability_id', GxHtml::listDataEx(Answer::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
	</td>
	</tr>
	</table>
	</fieldset>
	
	<fieldset>
	<legend>Student's Primary Contact Details</legend>
	<table>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'postal_address'); ?>
	</td>
	<td>
	<?php echo $form->textArea($model, 'postal_address', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'postcode'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'postcode', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'town'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'town', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'email'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'email', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'mobile'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'mobile', array('maxlength' => 200)); ?>
	</td>
	</tr>
	</table>
	</fieldset>
	
	<fieldset>
	<legend>Student's Current Contact Details <i>[leave blank if same as primary contact details] </i></legend>
	<table>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'c_postal_address'); ?>
	</td>
	<td>
	<?php echo $form->textArea($model, 'c_postal_address', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'c_postcode'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'c_postcode', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'c_town'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'c_town', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'c_email'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'c_email', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'c_mobile'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'c_mobile', array('maxlength' => 200)); ?>
	</td>
	</tr>
	</table>
	</fieldset>
	
	<fieldset>
	<legend>Student's Next of Kin Details </legend>
	<h4 class="warning">VERY IMPORTANT AND REQUIRED: FILL IN ACCURATE DETAILS ABOUT YOUR NEXT OF KIN</h4>
	<table>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'nok_relation_id'); ?>
	</td>
	<td>
	<?php echo $form->dropDownList($model, 'nok_relation_id', GxHtml::listDataEx(Relationship::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'nok_title_id'); ?>
	</td>
	<td>
	<?php echo $form->dropDownList($model, 'nok_title_id', GxHtml::listDataEx(Title::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'nok_surname'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'nok_surname', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'nok_firstanme'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'nok_firstname', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'nok_othername'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'nok_othername', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'nok_postal_address'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'nok_postal_address', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'nok_postcode'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'nok_postcode', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'nok_town'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'nok_town', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'nok_mobile'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'nok_mobile', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'nok_email'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'nok_email', array('maxlength' => 200)); ?>
	</td>
	</tr>
	</table>
	</fieldset>
	
	<fieldset>
	<legend>Employment Information (Applies to Employed Students ONLY)</legend>
	<table>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'occupation'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'occupation', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'employer'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'employer', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'employer_address'); ?>
	</td>
	<td>
	<?php echo $form->textArea($model, 'employer_address', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'employer_telephone'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'employer_telephone', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'employer_email'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'employer_email', array('maxlength' => 200)); ?>
	</td>
	</tr>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'employer_otherinfo'); ?>
	</td>
	<td>
	<?php echo $form->textField($model, 'employer_otherinfo', array('maxlength' => 200)); ?>
	</td>
	</tr>
	</table>
	</fieldset>
	
	<fieldset>
	<legend>Passport photo</legend>
	<h4 class="warning">Scan and upload passport your photo(Should not exceed 200px by 200px) </h4>
	<h4 class="warning">Passport photo should be on a WHITE BACKGROUND </h4>
	<h4 class="warning">Save as .JPG</h4>
	<table>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'photo'); ?>
	</td>
	<td>
	<?php if(($model->isNewRecord) || (empty($model->photo))):?>
		<div class="row">
		<?php echo $form->fileField($model, 'photo', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'photo'); ?>
		</div><!-- row -->
		<?php else:?>
		<div class="row" id="fixed">
		<?php echo CHtml::image(Yii::app()->baseUrl.'/images/passports/'.$model->photo,"image",array("width"=>200)); ?>  
		<?php echo CHtml::hiddenField('photo',$model->photo); ?>
		</div>
		<?php echo CHtml::checkBox('covered',false, array('class'=>'change'));?> <?php echo $form->labelEx($model,'changephoto');?>
		<div class="row">
		<div id="photo" style="display:none">
		New passport photo 
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
		<div class="row">
		<?php echo $form->hiddenField($model, 'status'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->hiddenField($model, 'date_modified', array('maxlength' => 30)); ?>
		</div><!-- row -->
	</td>
	</tr>
	</table>
	</fieldset>

		
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		'size'=>'large',
		'label'=>'Submit Profile Changes',
	)); ?>
	</div>
		

<?php
$this->endWidget();
?>
