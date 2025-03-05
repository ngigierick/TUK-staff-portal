<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'accepted-form',
	'type'=> 'horizontal',
	//'enableAjaxValidation' => true,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
?>
<?php echo $form->errorSummary($model); ?>

		
		<?php echo $form->dropDownListRow($model, 'title_id', GxHtml::listDataEx(Title::model()->findAllAttributes(null, true))); ?>
	
		<?php echo $form->textFieldRow($model, 'reg_number', array('maxlength' => 30)); ?>

		<?php echo $form->textFieldRow($model, 'id_number', array('maxlength' => 20)); ?>

		<?php echo $form->textFieldRow($model, 'surname', array('maxlength' => 30)); ?>
	
		<?php echo $form->textFieldRow($model, 'firstname', array('maxlength' => 30)); ?>
	
		<?php echo $form->textFieldRow($model, 'othername', array('maxlength' => 30)); ?>

		<?php 
		 $models = Programme::model()->findAll(array('order' => 'id'));
		 $prog = CHtml::listData($models, 'code', 'name'); 
		
		echo CHtml::dropDownList(
				'programme_id', 
				$model->programme_id, 
				$prog, 
				array(
				'empty' => '(Select course)',
				)
		);
		?>

		<?php echo $form->dropDownListRow($model, 'academicyear_id', GxHtml::listDataEx(Academicyear::model()->findAllAttributes(null, true))); ?>

		<?php echo $form->textFieldRow($model, 'dob', array('maxlength' => 30)); ?>

		<?php echo $form->dropDownListRow($model, 'gender_id', GxHtml::listDataEx(Gender::model()->findAllAttributes(null, true))); ?>

		<?php echo $form->dropDownListRow($model, 'marital_status_id', GxHtml::listDataEx(Maritalstatus::model()->findAllAttributes(null, true))); ?>
	
		<?php echo $form->dropDownListRow($model, 'nationality_id', GxHtml::listDataEx(Nationality::model()->findAllAttributes(null, true))); ?>
	
		<?php echo $form->dropDownListRow($model, 'county_id', GxHtml::listDataEx(County::model()->findAllAttributes(null, true))); ?>

		<?php echo $form->dropDownListRow($model, 'ethnicity_id', GxHtml::listDataEx(Ethnicity::model()->findAllAttributes(null, true))); ?>

		<?php echo $form->dropDownListRow($model, 'religion_id', GxHtml::listDataEx(Religion::model()->findAllAttributes(null, true))); ?>
	
		<?php echo $form->textFieldRow($model, 'postal_address', array('maxlength' => 200)); ?>

		<?php echo $form->textFieldRow($model, 'postcode', array('maxlength' => 10)); ?>

		<?php echo $form->textFieldRow($model, 'town', array('maxlength' => 20)); ?>

		<?php echo $form->textFieldRow($model, 'mobile', array('maxlength' => 20)); ?>

		<?php echo $form->textFieldRow($model, 'email', array('maxlength' => 30)); ?>

		<?php echo $form->dropDownListRow($model, 'disability_id', GxHtml::listDataEx(Answer::model()->findAllAttributes(null, true))); ?>

		<?php echo $form->textFieldRow($model, 'occupation', array('maxlength' => 30)); ?>
		
		<?php echo $form->textFieldRow($model, 'employer', array('maxlength' => 100)); ?>
	
		<?php echo $form->textFieldRow($model, 'employer_address', array('maxlength' => 200)); ?>

		<?php echo $form->textFieldRow($model, 'employer_telephone', array('maxlength' => 30)); ?>
	
		<?php echo $form->textFieldRow($model, 'employer_otherinfo', array('maxlength' => 200)); ?>
	
		<?php echo $form->textFieldRow($model, 'extra_info', array('maxlength' => 200)); ?>
	
		<?php echo $form->textFieldRow($model, 'status'); ?>

		<?php echo $form->textFieldRow($model, 'photo', array('maxlength' => 100)); ?>


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