<style>
/* printing */
table td{
	 font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
	font-size:13px;
	padding:5px 2px;
}
span.num{
	color:#777;
	font-style:italic;
}
body{
 font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
 font-size:13px;
 line-height:1.2;

}
.notes
{
	font-size: 12px;
    text-align: start;
	color: #777;
	font-style:italic;
	padding:20px 5px;
	text-align: left;
	letter-spacing:1px;
}
span.notes
{
	font-size:11px;
	color:#888;
}
h1{
	font-size:25px;
	text-align:center;
	margin-bottom:2px;
}
p.center{
	text-align:center;
	font-size:10px;
}
h2{
	font-size:14px;
	text-align:center;
	margin-bottom:1px;
}
h3.header1{
	font-size:13px !important;
	margin-bottom:2px;
	text-align:center;
}
h3.header2{
	font-size:12px;
	margin-bottom:2px;
	text-align:center;
	border-bottom:2px solid #444;
}
h4{
	font-size:15px;
	font-weight:bold;
}
legend{
	font-size:18px;
	margin-bottom:10px;
	text-transform:uppercase;
}
.home{
	height:730px;
	margin-bottom:10px;
	color:#333;
	text-transform:uppercase;
}
/* end print */
</style>

<center>
<h1 class="title"><?php echo '<img src="http://portal.tukenya.ac.ke/images/receipt.png" style="align:center" height="100" >';?></h1>
<h1 class="title" style="font-size:20px;color:#666">THE TECHNICAL UNIVERSITY OF KENYA </h1>
<p class="center">Haile Selassie Avenue, P.O. Box 52428, Nairobi, 00200, Tel +254(020) 343672, 2249974, 2251300, 341639</p>
<p class="center">Fax 2219689, Email: vc@kenpoly.ac.ke, Website: www.tukenya.ac.ke</p>
<h2>STUDENT ASSOCIATION OF THE TECHNICAL UNIVERSITY OF KENYA (SATUK)</h2>
<h3 class="header1">OFFICE OF THE ACADEMIC SECRETARY</h2>
<h3 class="header2" style="margin-bottom:3px">BURSARY APPLICATION FORM <span class="num">REF # <?php echo str_pad( $model->number, 10, "0", STR_PAD_LEFT );?></span></h3>
</center>
<div class="home">
<fieldset>
<legend>Part I - Personal Details</legend>
<table class="table">
<tr><td><b>Full Name: </b><?php echo $model->full_name;?> </td></tr>
<tr><td><b>Registration Number:</b> <?php echo $model->reg_number;?><span class="notes">(attach copy of student ID)</span></td></tr>
<tr><td><b>National ID Number:</b> <?php echo $model->id_number;?><span class="notes">(attach copy of National ID)</span></td></tr>
<tr><td><b>Course: </b><?php echo $model->programme;?></td></tr>
<tr><td><b>Department:</b> <?php echo $model->department;?>&nbsp;&nbsp;&nbsp;<tr><td><b>School: </b><?php echo $model->school;?></td></tr></td></tr>
<tr><td><b>Phone Number: </b><?php echo $model->mobile;?></td></tr>
<tr><td><b>Fee balance as at 5th May 2014</b> ------------------------------------------------------------</td></tr>
</table>
</fieldset>		
	
<br/>		
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
else if ($model->guardian_status == 3)
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
<b>Name: </b> <?php echo $model->f_name; ?>	<br/>	
<b>National ID: </b> <?php  echo $model->f_id; ?><span class="notes">(attach copy of Father National ID)</span><br/>	
<b>Occupation: </b> <?php  echo $model->f_occupation; ?>
<?php endif;?>
</td>
</tr>



<tr>
<td>
<?php if(isset($model->m_name)):?>
<h4>Mother Details</h4>
<b>Name:</b> <?php  echo $model->m_name; ?>	<br/>		
<b>National ID:</b> <?php  echo $model->m_id; ?><span class="notes">(attach copy of Father National ID)</span><br/>	
<b>Occupation:</b> <?php  echo $model->m_occupation; ?>
<?php endif;?>
</td>
</tr>

<tr>
<td>
<?php if(isset($model->g_name)):?>
<h4>Sponsor Details</b></h4>
<b>Name: </b><?php  echo $model->g_name; ?>	<br/>		
<b>National ID:</b> <?php  echo $model->g_id; ?><span class="notes">(attach copy of Sponsor National ID)</span><br/>	
<b>Occupation:</b> <?php  echo $model->g_occupation; ?>
<?php endif;?>
</td>
</tr>

</table>
</fieldset>
	
<br/>	
<fieldset>
<legend>Part III - Previous Fees Payment Plans</legend>
<table class="table condensed">
<tr>
<td>		
<p>When you were admitted how did you plan to pay your school fees? </p>		
<u><?php echo $model->fee_payment_plan;?></u>
</td>
</tr>

<tr>
<td>		
<p>How have you been paying your fees since you were admitted?  </p>		
<u><?php echo $model->fee_payment;?></u>
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

</div>

<fieldset>
<legend>Part IV - Declaration</legend>
<table class="table condensed">
<tr>
<td>
<h4>Applicant:</h4>
I declare that the information provided above is true to the best of my knowledge.<br/>
Name: ------------------------------------------------------------ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Signature ------------------------------------------------------------ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br/>
<br/>
<h4>Priest/ kadhi(provide official stamp)</h4>
I wish to confirm that the applicant appeared before me and 
I interviewed him/ her and hereby state that the applicant is very needy/ needy/ not needy.</br/>
Name: ------------------------------------------------------------ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Signature ------------------------------------------------------------ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br/>
<br/>
<h4>Chief(provide official stamp)</h4>
I wish to confirm that the applicant appeared before me and 
I interviewed him/ her and hereby state that the applicant is very needy/ needy/ not needy.<br/>
Name: ------------------------------------------------------------ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Signature ------------------------------------------------------------ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br/>
<br/>
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

<br/>
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
<div style="text-transform:uppercase">
<fieldset>
<legend>N/B:</legend>
Attach a letter from your area chief and priest/kadhi in support of your need.<br/>
This form should be returned by 5th September 2014 to the head of department with all required documents attached, failure of which it will not be accepted.
</fieldset>
</div>
</td>
</tr>
</table>
</fieldset>		
				

