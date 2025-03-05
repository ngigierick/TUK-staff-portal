<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'bursary-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

<center>
<?php echo CHtml::image(Yii::app()->baseUrl.'/images/receipt.png','',array('height'=>100)); ?>
<h2>THE TECHNICAL UNIVERSITY OF KENYA</h2>
<h2>STUDENT ASSOCIATION OF TECHNICAL UNIVERSITY OF KENYA</h2>
<h2>(SATUK)</h2>
<h2>OFFICE OF THE ACADEMIC SECRETARY</h2>
<h2>BURSARY APPLICATION FORM <span class="num">REF # <?php echo str_pad( $model->number, 10, "0", STR_PAD_LEFT );?></span></h2>

</center>

<fieldset>
<legend>Part I - Personal Details</legend>
<table class="table">
<tr><td>Full Name: <?php echo $model->full_name;?> <span class="notes">(attach copy of student ID)</span></td></tr>
<tr><td>Registration Number: <?php echo $model->reg_number;?></td></tr>
<tr><td>National ID Number: <?php echo $model->id_number;?></td></tr>
<tr><td>Course: <?php echo $model->programme;?></td></tr>
<tr><td>Department: <?php echo $model->department;?>&nbsp;&nbsp;&nbsp;<tr><td>School: <?php echo $model->school;?></td></tr></td></tr>
<tr><td>Phone Number: <?php echo $model->mobile;?></td></tr>
<tr><td>Fee balance as at 5th May 2014 ------------------------------------------------------------</td></tr>
</table>
</fieldset>		
	
		
<fieldset>
<legend>Part II - Parent/ Guardian/ Sponsor Details</legend>
<table class="table">
<tr>
<td>
<?php

if($model->guardian_status == 1)
$status = 'Both parents alive';
else if ($model->guardian_status == 2)
$status = 'One parent alive';
else if ($model->guardian_status == 2)
$status = 'Both parents diseased';
else 
$status = 'Single parent';

?>
Parent status: <?php echo $status;?>
<span class="notes">(if parent(s) deceased provide death certificate or burial permit)</span>
</td>
</tr>

<tr>
<td>
<span class="notes">(FILL ONLY WHERE APPLICABLE TO YOU)</span>
<?php if(isset($model->f_name)):?>
<h4>Father Details</h4>
Name: <?php echo $model->f_name; ?>	<br/>	
National ID: <?php echo $model->f_id; ?><span class="notes">(attach copy of Father National ID)</span><br/>	
Occupation: <?php echo $model->f_occupation; ?>
<?php endif;?>
</td>
</tr>



<tr>
<td>
<?php if(isset($model->m_name)):?>
<h4>Mother Details</h4>
Name: <?php echo $model->m_name; ?>	<br/>		
National ID: <?php echo $model->m_id; ?><span class="notes">(attach copy of Father National ID)</span><br/>	
Occupation: <?php echo $model->m_occupation; ?>
<?php endif;?>
</td>
</tr>

<tr>
<td>
<?php if(isset($model->g_name)):?>
<h4>Sponsor Details</h4>
Name: <?php echo $model->g_name; ?>	<br/>		
National ID: <?php echo $model->g_id; ?><span class="notes">(attach copy of Father National ID)</span><br/>	
Occupation: <?php echo $model->g_occupation; ?>
<?php endif;?>
</td>
</tr>

</table>
</fieldset>
		
<fieldset>
<legend>Part III - Previous Fees Payment Plans</legend>
<table class="table condensed">
<tr>
<td>		
<p>When you were admitted how did you plan to pay your school fees? </p>		
<?php echo $model->fee_payment_plan;?>
</td>
</tr>

<tr>
<td>		
<p>How have you been paying your fees since you were admitted?  </p>		
<?php echo $model->fee_payment;?>
</td>
</tr>
<tr>
<td>		
<p> Have you been awarded bursary from the students union before? </p>	
<?php if ($model->bursary_beneficiary == 2):?>
YES.<br/>
Bursary amount received: <?php echo $model->beneficiary_amount;?><br/>
<?php else:?>
NO.
<?php endif;?>
</td>
</tr>
</table>
</fieldset>

<fieldset>
<legend>Part IV - Declaration</legend>
<table class="table condensed">
<tr>
<td>
<h4>Applicant:</h4>
I declare that the information provided above is true to the best of my knowledge.<br/>
Name: ------------------------------------------------------------ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Signature ------------------------------------------------------------ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br/>
<h4>Priest/ kadhi(provide official stamp)</h4>
I wish to confirm that the applicant appeared before me and 
I interviewed him/ her and hereby state that the applicant is very needy/ needy/ not needy.</br/>
Name: ------------------------------------------------------------ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Signature ------------------------------------------------------------ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br/>
<h4>Chief(provide official stamp)</h4>
I wish to confirm that the applicant appeared before me and 
I interviewed him/ her and hereby state that the applicant is very needy/ needy/ not needy.<br/>
Name: ------------------------------------------------------------ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Signature ------------------------------------------------------------ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br/>
<h4>Chairperson of the department (provide official stamp)</h4>
I wish to confirm that the applicant appeared before me and 
I interviewed him/ her and hereby state that the applicant is very needy/ needy/ not needy.<br/>
Name: ------------------------------------------------------------ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Signature ------------------------------------------------------------ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br/>
<br/>
</td>
</tr>
</table>
</fieldset>


<fieldset>
<legend>Part V - For Official Use Only</legend>
<table class="table condensed">
<tr>
<td>
The student named above has/ has not been awarded bursary. 
An amount of ksh------------------------------------------------------------ has been awarded to the student 
to cover for his/ her school fees for the period------------------------------------------------------------ <br/>

<table>
<tr>
<td>Chairman of the committee </td>
<td>date</td>
<td>signature</td>
</tr>
<tr>
<td>------------------------------------------------------------ </td>
<td>------------------------------------------------------------ </td>
<td>------------------------------------------------------------ </td>
</tr>
<tr>
<td>Member  of the committee </td>
<td>date</td>
<td>signature</td>
</tr>
<tr>
<td>------------------------------------------------------------ </td>
<td>------------------------------------------------------------ </td>
<td>------------------------------------------------------------ </td>
</tr>
</table>

N/B<br/>
Attach a letter from your area chief and priest/kadhi in support of your need.<br/>
This form should be returned by  5th September 2014 to the head of department with all required documents attached, failure of which it will not be accepted.
</td>
</tr>
</table>
</fieldset>		
				
<input type='hidden' name='pdf' value='1'/>		

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'danger',
		'size'=>'large',
		'icon'=>'print',
		'label'=>'Export to PDF and Print',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'success',
        'size'=>'large',
		'icon'=>'pencil',
        'label'=>'Edit Application',
		'url'=>array('update','id'=>$model->id),
)); ?>
</div>
<?php	
$this->endWidget();
?>



