

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'employee-course-taught-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
$models = Semester::model()->findAll(array('order' => 'weight DESC'));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<?php $model->pf_number = $staff->pf_number; echo $form->hiddenField($model, 'pf_number'); ?>
				
		<?php echo $form->dropDownListRow($model, 'semester_id', GxHtml::listDataEx($models),array('prompt'=>'Select one')); ?>
		<div class="control-group">
		<div class="control-label">
		Course Unit<span class="required">*</span>:
		</div>
		<div class="controls">
		<?php
					//autocomplete
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'model'=>$model,
				'attribute'=>'course_code',
				'id'=>'prog_code',
				'source'=>$this->createUrl('//portal/profile/course'),
				'options'=>array(
					'delay'=>300,
					
					'minLength'=>2,
					'showAnim'=>'fold',
					'select'=>"js:function(event, ui) {
						$('#programmecode').val(ui.item.id);
						//$('#code').val(ui.item.code);
					}"
				),
				'htmlOptions'=>array(
					
					'append'=>'Type course name or code',
				),
			));
		?>
		<?php echo $form->hiddenField($model, 'course_code', array('maxlength' => 30,'id'=>'programmecode')); ?>
		</div>
		</div>
		<div class="control-group">
		<div class="control-label required">
		Course Unit Description:
		</div>
		<div class="controls">
		<?php 
		
		$this->widget('application.extensions.cleditor.ECLEditor', array(
        'model'=>$model,
        'attribute'=>'description', //Model attribute name. Nome do atributo do modelo.
        'options'=>array(
            'width'=>250,
            'height'=>300,
            'useCSS'=>true,
        ),
        'value'=>$model->description, //If you want pass a value for the widget. I think you will. Se voc� precisar passar um valor para o gadget. Eu acho ir�.
		));
		?>
		</div>
		</div>
		
		
		<?php //echo $form->textFieldRow($model, 'period', array('maxlength' => 30)); ?>
		
		
		

		
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
