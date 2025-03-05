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
		$model->full_name 		= strtoupper($student->surname.' '.$student->firstname.' '.$student->othername);
		$model->id_number 		= $student->id_number;
		$model->reg_number 		= $student->reg_number;
		$model->mobile 			= $student->mobile;
		$model->programme_id 	= $student->programme_id;
		$model->beneficiary_amount = isset($bursaryAw->amount)?$bursaryAw->amount:0;
	
	}
	
	
	?>

		<fieldset>
		<legend>Part I - Personal Details</legend>
		<span class="notes" style="text-transform:uppercase" >Kindly note that all incorrect personal details should be corrected at the Admissions office.</span>
		<hr/>
		<div class="control-group">
		<label class="control-label">
		Full Name:
		</label>
		<div class="controls">
		<?php echo $model->full_name;?>
		</div>
		</div>
		<div class="control-group">
		<label class="control-label">
		Registration Number:
		</label>
		<div class="controls">
		<?php echo $model->reg_number;?>
		</div>
		</div>
		<?php echo $form->textFieldRow($model, 'id_number', array('maxlength' => 30,'append'=>'<span class="notes">(attach copy of National ID)</span>')); ?>
		
		<div class="control-group">
		<label class="control-label">
		Programme/ Course:
		</label>
		<div class="controls">
		<?php echo $student->programme;?>
		</div>
		</div>
		<?php echo $form->hiddenField($model, 'full_name'); ?>
		<?php echo $form->hiddenField($model, 'reg_number'); ?>
	
		<?php echo $form->hiddenField($model, 'programme_id'); ?>
		
		<?php echo $form->dropDownListRow($model, 'department_id', GxHtml::listDataEx(Department::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'school_id', GxHtml::listDataEx(School::model()->findAllAttributes(null, true))); ?>
		
		<?php echo $form->textFieldRow($model, 'mobile', array('maxlength' => 30)); ?>
		
		
		
		<fieldset>
		<legend>Part II - Parent/ Guardian/ Sponsor Details</legend>
		<table class="table stripped condensed">
		<tr>
		<td>
		<?php
		//in the view
		echo $form->radioButtonListRow($model,'guardian_status',
		array(1=>'Both Parents alive',2=>'One Parent alive',3=>'Both Parents diseased',4=>'Single parent'),array('separator'=>''));
		?>
		<span class="notes">(if parent(s) deceased provide death certificate or burial permit)</span>
		</td>
		</tr>
		<tr>
		<td>
		<span class="notes">(FILL ONLY WHERE APPLICABLE TO YOU)</span>
		<h3>Father Details</h3>
		<?php echo $form->textFieldRow($model, 'f_name', array('maxlength' => 100)); ?>		
		<?php echo $form->textFieldRow($model, 'f_id', array('maxlength' => 30,'append'=>'<span class="notes">(attach copy of Father National ID)</span>')); ?>
		<?php echo $form->textFieldRow($model, 'f_occupation', array('maxlength' => 100)); ?>
		</td>
		</tr>
			<tr>
		<td>
		<h3>Mother Details</h3>
		<?php echo $form->textFieldRow($model, 'm_name', array('maxlength' => 100)); ?>		
		<?php echo $form->textFieldRow($model, 'm_id', array('maxlength' => 30,'append'=>'<span class="notes">(attach copy of Mother National ID)</span>')); ?>
		<?php echo $form->textFieldRow($model, 'm_occupation', array('maxlength' => 100)); ?>
		</td>
		</tr>
			<tr>
		<td>
		<h3>Sponsor Details</h3>
		<?php echo $form->textFieldRow($model, 'g_name', array('maxlength' => 100)); ?>		
		<?php echo $form->textFieldRow($model, 'g_id', array('maxlength' => 30,'append'=>'<span class="notes">(attach copy of Sponsor National ID)</span>')); ?>
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
		<?php if (isset($bursaryAw->amount)):?>
		<tr>
		<td>		
		<p>  Have you been awarded bursary from the students union before? </p>	
		<?php 
			$model->bursary_beneficiary = 2; 
			$model->beneficiary_amount = $bursaryAw->amount;
			echo $form->hiddenField($model, 'bursary_beneficiary'); 
			echo $form->hiddenField($model, 'beneficiary_amount'); 
		?>
		
		<p>You were awarded KES <?php echo number_format($bursaryAw->amount);?> in the last bursary disbursement.</p>
		
		
		</td>
		</tr>
		<?php else:?>
		<tr>
		<td>		
		<p>  Have you been awarded bursary from the students union before? </p>	
		<span class="notes">(tick Yes ONLY if you had received any bursary before, otherwise just leave blank)</span>
		<br/>
		
		<?php echo $form->hiddenField($model, 'programme_id'); ?>
		<?php echo CHtml::checkBox('bursary_beneficiary',false, array('class'=>'change'));?> Yes
			
		<div id="photo" style="display:none">
		Enter bursary amount you received (KES): <?php echo $form->textField($model, 'beneficiary_amount', array('maxlength' => 30)); ?>
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
		<?php endif;?>
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

