<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'bursary-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php 
	if (isset($student->id)){
		$model->full_name = $student->surname.' '.$student->firstname.' '.$student->othername;
		$model->id_number = $student->id_number;
		$model->reg_number = $student->reg_number;
	
	}
	
	
	?>

		<fieldset>
		<legend>Part I - Personal Details</legend>
		
		<?php echo $form->textFieldRow($model, 'full_name',array('maxlength' => 100) ); ?>
		
		
		<?php echo $form->textFieldRow($model, 'reg_number', array('maxlength' => 100,'append'=>'<span class="notes">(attach copy of student ID)</span>')); ?>
		
		
		<?php echo $form->textFieldRow($model, 'id_number', array('maxlength' => 30,'append'=>'<span class="notes">(attach copy of National ID)</span>')); ?>
		
		<div class="control-group">
		<label class="control-label">
		Programme/ Course:
		</label>
		<div class="controls">
			<?php
						//autocomplete
				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'model'=>$model,
					'attribute'=>'programme_id',
					'id'=>'prog_code',
					'source'=>$this->createUrl('//portal/bursary/autocomplete'),
					'options'=>array(
						'delay'=>300,
						'minLength'=>2,
						'showAnim'=>'fold',
						'select'=>"js:function(event, ui) {
							$('#programmecode').val(ui.item.id);
							
						}"
					),
					'htmlOptions'=>array(
						'size'=>'40'
					),
				));
			?>
			</div>
		</div>
		
		<?php echo $form->hiddenField($model, 'programme_id', array('maxlength' => 30,'id'=>'programmecode')); ?>

		
		
		<?php echo $form->dropDownListRow($model, 'department_id', GxHtml::listDataEx(Department::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'school_id', GxHtml::listDataEx(School::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->textFieldRow($model, 'mobile', array('maxlength' => 30)); ?>
		
		
		<fieldset>
		<legend>Part II - Parent/ Guardian/ Sponsor Details</legend>
		<table class="table stripped condensed">
		<tr>
		<td>
		<?php echo CHtml::radioButton('guardian_status',false);?> Both Parents alive &nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo CHtml::radioButton('guardian_status',false);?> One Parents alive &nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo CHtml::radioButton('guardian_status',false);?> Both Parents diseased &nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo CHtml::radioButton('guardian_status',false);?> Single Parent &nbsp;&nbsp;&nbsp;&nbsp;
		<span class="notes">(if parent(s) deceased provide death certificate or burial permit)</span>
		</td>
		</tr>
		<tr>
		<td>
		<h3>Father Details</h3>
		<?php echo $form->textFieldRow($model, 'f_name', array('maxlength' => 100)); ?>		
		<?php echo $form->textFieldRow($model, 'f_id', array('maxlength' => 30)); ?>
		<?php echo $form->textFieldRow($model, 'f_occupation', array('maxlength' => 100)); ?>
		</td>
		</tr>
			<tr>
		<td>
		<h3>Mother Details</h3>
		<?php echo $form->textFieldRow($model, 'm_name', array('maxlength' => 100)); ?>		
		<?php echo $form->textFieldRow($model, 'm_id', array('maxlength' => 30)); ?>
		<?php echo $form->textFieldRow($model, 'm_occupation', array('maxlength' => 100)); ?>
		</td>
		</tr>
			<tr>
		<td>
		<h3>Sponsor Details</h3>
		<?php echo $form->textFieldRow($model, 'g_name', array('maxlength' => 100)); ?>		
		<?php echo $form->textFieldRow($model, 'g_id', array('maxlength' => 30)); ?>
		<?php echo $form->textFieldRow($model, 'g_occupation', array('maxlength' => 100)); ?>
		</td>
		</tr>
		</table>
		</fieldset>
		
		<fieldset>
		<legend>Part III - Previous Fees Payment Plans</legend>
		<table class="table stripped condensed">
		<tr>
		<td>		
		<p>When you were admitted how did you plan to pay your school fees? </p>		
		
		<?php
		$this->widget('application.extensions.cleditor.ECLEditor', array(
        'model'=>$model,
        'attribute'=>'fee_payment_plan', //Model attribute name. Nome do atributo do modelo.
        'options'=>array(
            'width'=>600,
            'height'=>150,
            'useCSS'=>true,
        ),
        'value'=>$model->fee_payment_plan, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
		));
		?>
		</td>
		</tr>
		<tr>
		<td>		
		<p>How have you been paying your fees since you were admitted?  </p>		
		
		<?php
		$this->widget('application.extensions.cleditor.ECLEditor', array(
        'model'=>$model,
        'attribute'=>'fee_payment', //Model attribute name. Nome do atributo do modelo.
        'options'=>array(
            'width'=>600,
            'height'=>150,
            'useCSS'=>true,
        ),
        'value'=>$model->fee_payment, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
		));
		?>
		
		</td>
		</tr>
		<tr>
		<td>		
		<p>  Have you been awarded bursary from the students union before? </p>	
		<?php echo CHtml::checkBox('bursary_beneficiary',false, array('class'=>'change'));?> Yes
			
		<div id="photo" style="display:none">
		Enter bursary amount you received: <?php echo $form->textField($model, 'beneficiary_amount', array('maxlength' => 30)); ?>
		</div>
		<?php
			Yii::app()->clientScript->registerScript('show', "
				$('.change').click(function(){
					$('#fixed, #photo').toggle();
			});
			");
		?>
		</td>
		</tr>
		</table>
		</fieldset>
		
				
		

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		'size'=>'large',
		'icon'=>'ok',
		'label'=>$model->isNewRecord ? 'Submit Application' : 'Submit Changes',
	)); ?>
	</div>
<?php	
$this->endWidget();
?>

