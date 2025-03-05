<?php $this->renderPartial("//site/common/notifications"); ?>
<h1>SUBMIT REQUEST FOR DISBURSEMENT OF RESEARCH FUNDS</h1>
<h1><?php echo $model->grant->title;?></h1>
<table class="table table-condensed table-bordered">
<tr><th>Date Awarded</th><th>Running From</th><th>Up To</th><th class="right">Grant Amount (KES)</th></tr>
<tr>
<td><?php echo $model->grant->date_awarded;?></td>
<td><?php echo $model->grant->starting;?></td>
<td><?php echo $model->grant->ending;?></td>
<td class="right"><?php echo User::money($model->grant->grant_amount);?></td>
</tr>
<tr><td>School</td><td colspan="3"><?php echo $model->grant->school;?></td></tr>
<tr><td>Faculty</td><td colspan="3"><?php echo $model->grant->faculty;?></td></tr>
<tr>
<td colspan="4">
<h4>DOCUMENT UPLOADS</h4>
<?php echo $model->grant->attachments();?>
</td>
</tr>
</table>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', 
	array('id' => 'claim-form',	
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'type'=> 'horizontal',	'enableAjaxValidation' => false,));
?>

<?php $model->staff_id=Yii::app()->user->id; echo $form->hiddenField($model, 'staff_id');?>
<?php $model->school_id=$model->grant->school_id; echo $form->hiddenField($model, 'school_id');?>
<?php $model->faculty_id=$model->grant->faculty_id; echo $form->hiddenField($model, 'faculty_id');?>
<?php $model->date_requested=date('d/m/Y'); echo $form->hiddenField($model, 'date_requested');?>
<?php $model->amount_approved=0; echo $form->hiddenField($model, 'amount_approved');?>
<?php $model->school_approval_user=0; echo $form->hiddenField($model, 'school_approval_user');?>
<?php $model->school_approval_status=0; echo $form->hiddenField($model, 'school_approval_status');?>
<?php $model->faculty_approval_user=0; echo $form->hiddenField($model, 'faculty_approval_user');?>
<?php $model->faculty_approval_status=0; echo $form->hiddenField($model, 'faculty_approval_status');?>
<?php $model->research_approval_user=0; echo $form->hiddenField($model, 'research_approval_user');?>
<?php $model->research_approval_status=0; echo $form->hiddenField($model, 'research_approval_status');?>
<?php $model->vc_approval_user=0; echo $form->hiddenField($model, 'vc_approval_user');?>
<?php $model->vc_approval_status=0; echo $form->hiddenField($model, 'vc_approval_status');?>
<?php $model->finance_approval_user=0; echo $form->hiddenField($model, 'finance_approval_user');?>
<?php $model->finance_approval_status=0; echo $form->hiddenField($model, 'finance_approval_status');?>
<?php echo $form->textFieldRow($model, 'amount_requested', array('maxlength' => 100,'append'=>'just the figures without commas or currency')); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		'size'=>'large',
		'label'=>$model->isNewRecord ? 'Submit Request' : 'Save Changes',
	)); ?>
	</div>
<?php $this->endWidget(); ?>
	

