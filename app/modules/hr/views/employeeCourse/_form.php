

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'employee-course-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<?php $model->pf_number = $staff->pf_number; echo $form->hiddenField($model, 'pf_number'); ?>
		
		
		<?php echo $form->textFieldRow($model, 'course_name', array('maxlength' => 300)); ?>
		
		
		<?php echo $form->textAreaRow($model, 'brief_description', array('maxlength' => 500)); ?>
		
		
		<?php echo $form->textAreaRow($model, 'elearning_link', array('maxlength' => 300)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'institution', array('maxlength' => 200)); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'country_id', GxHtml::listDataEx(Country::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->textFieldRow($model, 'starting_date', array('maxlength' => 100)); ?>
		
		<script>
			 $(".change").live("click", function(){
			 	
				$('#fixed, #new').toggle();
				$('#val').val();
			});
		</script>
		
		
		
		<div class="control-group">
			<div class="control-label">
				
			</div>
			<div class="controls">
			<?php echo $form->checkBox($model, 'currently_on',array('class'=>'change')); ?> Currently teaching the course
			</div>
		
		</div>
		
		<span id="new" style="display:none">
		</span>
		
		<div  id="fixed">
		<?php echo $form->textFieldRow($model, 'ending_date', array('maxlength' => 100)); ?>
		</div>
		
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
