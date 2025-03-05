<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'searchForm',
    'type'=>'horizontal',
     'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); 

?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>
	<h4 class="warning">
		Please contact the Admissions Office in case the details shown are conflicting.
	</h4>

	<?php echo $form->errorSummary($model); ?>
	
	
		<!-- hidden data that shouldn't change -->
		
		<?php echo $form->hiddenField($model,'reg_number'); ?>
		<?php echo $form->hiddenField($model,'id_number'); ?>
		<?php echo $form->hiddenField($model,'academicyear_id'); ?>
		<?php echo $form->hiddenField($model,'position_id'); ?>
		<?php echo $form->hiddenField($model,'programme_id'); ?>
		<?php echo $form->hiddenField($model,'gender_id'); ?>
		<?php echo $form->hiddenField($model,'surname'); ?>
		<?php echo $form->hiddenField($model,'firstname'); ?>
		<?php echo $form->hiddenField($model,'othername'); ?>
		<?php echo $form->hiddenField($model,'status'); ?>
		
		
		<!-- courses -->
		<?php
		$programmes =  Programme::model()->findAll();
		$prog = CHtml::listData($programmes, 'code', 'name');
		?>
		
		
		
		<fieldset>
		<legend>PART I - ELECTION DETAILS - SATUK <?php echo $model->academicyear;?></legend>
	
		<?php echo $form->dropDownListRow($model, 'position_id', GxHtml::listDataEx(StudentPosition::model()->findAllAttributes(null, true)),array('disabled'=>'disabled','prompt'=>'Select one')); ?>
		
		<?php echo $form->dropDownListRow($model, 'academicyear_id', GxHtml::listDataEx(AcademicYear::model()->findAllAttributes(null, true)),array('disabled'=>'disabled')); ?>
		</fieldset>

		
		<fieldset>
		<legend>PART II - ASPIRANT DETAILS -<?php echo $model->surname.' '.$model->firstname.' '.$model->othername;?> </legend>
			
	
		<?php echo $form->textFieldRow($model, 'reg_number', array('maxlength' => 30,'disabled'=>'disabled')); ?>
			
		<?php echo $form->textFieldRow($model, 'id_number', array('maxlength' => 20,'disabled'=>'disabled')); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'gender_id', GxHtml::listDataEx(Gender::model()->findAllAttributes(null, true)),array('disabled'=>'disabled')); ?>
		
		
		<?php echo $form->textFieldRow($model, 'surname', array('maxlength' => 30,'disabled'=>'disabled')); ?>
		
		
		<?php echo $form->textFieldRow($model, 'firstname', array('maxlength' => 30,'disabled'=>'disabled')); ?>
		
		
		<?php echo $form->textFieldRow($model, 'othername', array('maxlength' => 30,'disabled'=>'disabled')); ?>
		
		<?php echo $form->dropDownListRow($model, 'school_id', GxHtml::listDataEx(School::model()->findAllAttributes(null, true)),array('prompt'=>'Select one','style'=>'width:400px')); ?>
		
		<?php echo $form->dropDownListRow($model, 'department_id', GxHtml::listDataEx(Department::model()->findAllAttributes(null, true)),array('prompt'=>'Select one','style'=>'width:400px')); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'programme_id', $prog,array('style'=>'width:400px')); ?>
		
		
		
		<?php echo $form->datePickerRow($model, 'programme_end', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'mobile', array('maxlength' => 40)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'email', array('maxlength' => 50)); ?>
		
	
		<h4 class="warning">Scan and upload your own COLOURED passport size photo(Should not exceed 200px by 200px) </h4>
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
		
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'size'=>'large',
		'label'=>'Submit Changes',
	)); ?>
	</div>
<?php	
$this->endWidget();
?>
