<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 

?>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'student-invoice-form',
	'enableAjaxValidation' => true,
));
?>
<?php echo $form->errorSummary($model); ?>

<table>
<tr>
	<td>
	<?php echo $form->labelEx($model,'semester_id'); ?>
	</td>
	<td>
	<?php echo $form->dropDownList($model, 'semester_id', GxHtml::listDataEx(Semester::model()->findAllAttributes(null, true)),array('empty' => 'Select academic year|semester')); ?>
	<?php echo $form->error($model,'semester_id'); ?>
	</td>
</tr>

<tr>
	<td>
	<?php echo $form->labelEx($model,'module_id'); ?>
	</td>
	<td>
	<?php echo CHtml::dropDownList('module_id','', GxHtml::listDataEx(Module::model()->findAllAttributes(null, true)),array('empty' => 'select module type')); ?>
	</td>
</tr>

<tr>
	<td>
	<?php echo $form->labelEx($model,'programme'); ?>
	</td>
	<td>
	<?php
					//autocomplete
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'model'=>$model,
			'attribute'=>'invoice_array',
			'id'=>'prog_code',
			'source'=>$this->createUrl('/finance/applicationFees/autocomplete'),
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
				'size'=>'40'
			),
		));
?>
<?php echo CHtml::hiddenField('programme_code','', array('maxlength' => 30,'id'=>'programmecode')); ?>
	</td>
</tr>

</table>
	

<?php $this->renderPartial('_feeitems', array('model'=>$feeitems));?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>
<?php $this->endWidget(); ?>