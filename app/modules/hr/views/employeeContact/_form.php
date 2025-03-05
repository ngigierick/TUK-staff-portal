

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'employee-contact-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		
		<?php $model->pf_number = $staff->pf_number; echo $form->hiddenField($model, 'pf_number'); ?>
		
		
		
		<div class="control-group">
			<label></label>
			<div class="controls">
				<?php echo CHtml::checkBox('academic',false, array('class'=>'change'));?>&nbsp;&nbsp;[  TICK <span class="icon-ok"> </span> IF IN THE ACADEMIC DIVISION ]
			</div>
		</div>
		<script>
			 $(".change").live("click", function(){
			 	
				$('#fixed, #photo').toggle();
			});
		</script>
		
	
		
		<div id="photo" style="border:1px solid #dedede;padding:10px; display:none">
			
			<div class="control-group">
				<label></label>
				<div class="controls">
					 <span class="icon-flag"> </span> FOR ACADEMIC STAFF ONLY!
				</div>
			</div>
			
			<?php echo $form->dropDownListRow($model, 'faculty_id', GxHtml::listDataEx(Faculty::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
				
			<?php echo $form->dropDownListRow($model, 'school_id', GxHtml::listDataEx(School::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
		
			<?php echo $form->dropDownListRow($model, 'department_id', GxHtml::listDataEx(Department::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
			
			<?php echo $form->dropDownListRow($model, 'title_id', GxHtml::listDataEx(EmployeeAcademicTitle::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
				
			
			
		</div>
		<div class="row" id="fixed">
		
		</div>
		
		<?php echo $form->textFieldRow($model, 'designation', array('maxlength' => 200)); ?>
		
		<?php echo $form->dropDownListRow($model, 'nationality_id', GxHtml::listDataEx(Nationality::model()->findAllAttributes(null, true))); ?>
		
		<?php echo $form->dropDownListRow($model, 'county_id', GxHtml::listDataEx(County::model()->findAllAttributes(null, true))); ?>
		
		<?php echo $form->textFieldRow($model, 'office_telephone', array('maxlength' => 100)); ?>
		
		<?php echo $form->textFieldRow($model, 'office_email', array('maxlength' => 100)); ?>
		
		<?php echo $form->textFieldRow($model, 'email', array('maxlength' => 100)); ?>
		
		<?php echo $form->textFieldRow($model, 'consultation_hours', array('maxlength' => 100)); ?>
		
		<?php echo $form->textFieldRow($model, 'mobile', array('maxlength' => 300)); ?>
		
	
		

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		'size'=>'small',
		'icon'=>'ok',
		'label'=>$model->isNewRecord ? 'Add Contact Details' : 'Save Changes',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		
		'type'=>'warning',
		'size'=>'small',
		'icon'=>'remove',
		'url' => array('//portal/profile/view'),
		'label'=>'Cancel',
	)); ?>
	</div>
<?php	
$this->endWidget();
?>
<br/><br/><br/>