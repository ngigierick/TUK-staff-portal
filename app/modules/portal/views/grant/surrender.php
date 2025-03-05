<?php $this->renderPartial("//site/common/notifications"); ?>
<h1>SUBMIT SURRENDER DOCUMENTS FOR FUNDS DISBURSEMENT</h1>
<table class="table-condensed table-bordered">
<tr>
<th>Status:</th>
<td colspan="3"><?php echo $model->status();?></td>
</tr>
<tr>
<th>Name of Staff:</th>
<td colspan="3"><?php echo $model->staff->fullName();?></td>
</tr>
<tr>
<th>School:</th>
<td colspan="3"><?php echo $model->school;?></td>
</tr>
<tr>
<th>Faculty:</th>
<td colspan="3"><?php echo $model->faculty;?></td>
</tr>
<tr>
<th>Grand Title</th>
<td colspan="3"><?php echo $model->grant->title;?></td>
</tr>
<tr>
<th>Date Requested:</th>
<td colspan="3"><?php echo $model->date_requested;?></td>
</tr>
<tr>
<th>Amount Requested:</th>
<td colspan="3"><?php echo User::money($model->amount_requested);?></td>
</tr>
<tr>
<th>Amount Approved:</th>
<td colspan="3"><?php echo User::money($model->amount_approved);?></td>
</tr>
<tr>
<th>Date Approved:</th>
<td colspan="3"><?php echo $model->finance_approval_date;?></td>
</tr>
<tr>
<th colspan="4" class="center">Surrender Documents:</th>
</tr>
<tr>
<th></th>
<td colspan="3">
	<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', 
	array('id' => 'claim-form',	
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'type'=> 'horizontal',	'enableAjaxValidation' => false,));
	?>
	<?php echo $form->fileFieldRow($model, 'aie', array('maxlength' => 200)); ?>
	<?php echo $form->fileFieldRow($model, 'imprest_warrant', array('maxlength' => 200)); ?>
	<?php echo $form->fileFieldRow($model, 'imprest_surrender', array('maxlength' => 200)); ?>
	<?php echo $form->fileFieldRow($model, 'report', array('maxlength' => 200)); ?>
	<?php $model->surrender_date=date('d/m/Y'); echo $form->hiddenField($model, 'surrender_date');?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'size'=>'large',
			'label'=>'Submit Surrender Documents',
		)); ?>
		</div>
	<?php $this->endWidget(); ?>
</td>
</table>
	

