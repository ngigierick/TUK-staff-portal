

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'employee-employment-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<?php $model->pf_number = $staff->pf_number; echo $form->hiddenField($model, 'pf_number'); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'position_id', GxHtml::listDataEx(Position::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'grade_id', GxHtml::listDataEx(Grade::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'category_id', GxHtml::listDataEx(EmployeeCategory::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'salary_scale_id', GxHtml::listDataEx(SalaryScale::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
		
		<div class="control-group">
		
		<label class="control-label">
		<?php echo $form->label($model,'d_start'); ?>
		</label>
		
		<div class="controls">
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'name'=>'EmployeeEmployment[d_start]',
		'value'=>$model->d_start,
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
		
		
		<?php $category = array(0=>'Select one',1=>'January',2=>'July'); ?>
		
		<?php echo $form->dropDownListRow($model, 'increment_date',$category); ?>
		
		
		

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
