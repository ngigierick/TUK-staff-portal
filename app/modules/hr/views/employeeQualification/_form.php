

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'employee-qualification-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.<br/>
		Please start with the lowest qualification attained.
	</p>
  <hr/>
	<?php echo $form->errorSummary($model); ?>

		
		<?php $model->pf_number = $staff->pf_number; echo $form->hiddenField($model, 'pf_number'); ?>
		
		<?php echo $form->dropDownListRow($model, 'level_id', GxHtml::listDataEx(EmployeeQualificationLevel::model()->findAll(array('order' => 'weight ASC')))); ?>
		
		
		<?php echo $form->textFieldRow($model, 'name', array('maxlength' => 200)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'institution', array('maxlength' => 200)); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'country_id', GxHtml::listDataEx(EmployeeCountry::model()->findAllAttributes(null, true)),array('prompt'=>'-Select one-')); ?>
		
		<div id="photo" style="display:none">
			<?php if(empty($model->year)) $model->year="On-going"; echo $form->textField($model, 'year'); ?>
		</div>
		
		<div id="date">
		<?php echo $form->textFieldRow($model, 'year', array('maxlength' => 10)); ?>
		</div>
		
		<div class="control-group ">
			<label></label>
			<div class="controls">
				<?php echo CHtml::checkBox('academic',false, array('class'=>'change')); ?>&nbsp;&nbsp;On-going
				</div>
			</div>
		
		<?php echo $form->textFieldRow($model, 'award', array('maxlength' => 200)); ?>
		
	
		
		<script>
			 $(".change").live("click", function(){
			 	
				$('#fixed, #date').toggle();
			});
		</script>
		
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		'size'=>'large',
		'icon'=>'ok',
		'label'=>$model->isNewRecord ? 'Add Academic Qualification' : 'Save Changes',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		
		'type'=>'warning',
		'size'=>'large',
		'icon'=>'remove',
		'url' => array('//portal/profile/view'),
		'label'=>'Cancel',
	)); ?>
	</div>
<?php	
$this->endWidget();
?>
<br/><br/><br/>