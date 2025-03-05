
<h3>We respond to ICT Service requests within 8 working hours.</h3>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'ict-service-request-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

<br />
	<?php echo $form->errorSummary($model); ?>
	<div class="control-group ">
	<label class="control-label required" for="ExaminationPaper_exam_type_id">Office/Department: <span class="required">*</span></label>	
	
		<div class="controls">
		<?php
			//autocomplete
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				//'model'=>$model,
				'name'=>'dpt',
				'id'=>'fullSearch',
				
				'source'=>$this->createUrl('//portal/ictServiceRequest/searchOffice'),
				'options'=>array(
					'delay'=>300,
					'minLength'=>2,
					'showAnim'=>'fold',
					'select'=>"js:function(event, ui) {
						var id = ui.item.id;
						$('#department').val(id);
						
						
					}"
				),
				'htmlOptions'=>array(
					'size'=>'40',
					'class'=>'search-query span4',
					'placeholder'=>'Search for  department or office by name',
				),
			));
		?>
		</div>	
	</div>
	<?php echo $form->hiddenField($model, 'office_id', array('maxlength' => 30,'id'=>'department')); ?>
	<?php echo $form->dropDownListRow($model, 'type_id', GxHtml::listDataEx(IctEquipmentType::model()->findAllAttributes(null, true)),array('prompt'=>'Select category')); ?>
		
	<div class="control-group">
		<div class="control-label required">
		Description
		<span class="required">*</span>
		</div>
		<div class="controls">
		<?php echo $form->textArea($model,'description',array('rows'=>10, 'cols'=>1000)); ?>
		<span class="notes">Briefly describe your problem. </span> 
		</div>
	</div>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		'icon'=>'ok',
		'size'=>'large',
		'label'=>$model->isNewRecord ? 'Submit Ticket' : 'Update Ticket',
	)); ?>
	</div>
<?php	
$this->endWidget();
?>
