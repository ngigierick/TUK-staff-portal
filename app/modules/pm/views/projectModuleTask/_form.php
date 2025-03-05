

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'project-module-task-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>
	
	<fieldset>
	<legend>Project Module Task </legend>
	
	
	<h3> A Project Module Task is a small activity aimed at achieving the objective of completing <?php echo $module->name;?> Module</h3>


	<hr/>
	<?php echo $form->errorSummary($model); ?>

		
		<?php echo $form->textFieldRow($model, 'name', array('maxlength' => 50)); ?>
		
		
		<div class="control-group">
		<div class="control-label required">
		Description:
		</div>
		<div class="controls">
		<?php 
		
		$this->widget('application.extensions.cleditor.ECLEditor', array(
        'model'=>$model,
        'attribute'=>'content', //Model attribute name. Nome do atributo do modelo.
        'options'=>array(
            'width'=>600,
            'height'=>250,
            'useCSS'=>true,
        ),
        'value'=>$model->content, //If you want pass a value for the widget. I think you will. Se voc� precisar passar um valor para o gadget. Eu acho ir�.
		));
		?>
		</div>
		</div>	
		
	
		
		<?php echo $form->dropDownListRow($model, 'assigned_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->datePickerRow($model, 'start_date', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->datePickerRow($model, 'end_date', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'completion_stage'); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'status_id', GxHtml::listDataEx(Status::model()->findAllAttributes(null, true))); ?>
		

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
