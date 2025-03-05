<style>
/* printing */
body{
	font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
	font-size:12px;
}
table.bordered{

}
.home table td{
	font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
	font-size:12px;
	padding:2px 2px 2px 0px;

	
}
span.num{
	color:#555;
	font-style:italic;
	font-size:14px;
	
}
.wrapper{
	border:1px solid #fff;
}
.home{
	
	line-height:1.2;
	text-transform:uppercase;
	margin-bottom:0px;
	color:#444;

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
td.right{
	text-align:right;
	text-transform:uppercase;
}
td.upper{
	text-transform:uppercase;
}
table td b{
	margin-right:20px;
}
td.email{
	text-transform:lowercase;
}
table.inner td{
	
	
}
table.inner td td,table.inner td.last{
	border:0px solid #666;
}
span.notes
{
	font-size:11px;
	color:#888;
}
 h1.title{
	font-size:20px;
	text-align:center;
	margin-bottom:2px;
	
}
p.center{
	text-align:center;
	font-size:10px;
}

 h2{
	font-size:17px;
	text-align:center;
	margin-bottom:2px;
	
}
 h3{
	
}
 h4{
	font-size:15px;
	font-weight:bold;
}
legend.form{
	font-size:11px;
	padding-top:30px;
	font-weight:bold;
	text-transform:uppercase;
	

}
.wrapper1{
	height:1300px;
	border:1px solid #333;
	padding:0px 20px;
}
.profile{
	
	height:150px;
	border:1px solid #dedede;
}
h3.page{
	
	text-align:center;
	font-size:15px;
	color:#222;
	bottom:20px;
	position:absolute;
}

/* end print */
</style>

<?php $title = "<h1 style='text-align:center;font-size:28px;margin:5px 0;'>".$model->academicyear." SATUK GENERAL ELECTIONS</h1>";?>

<div class="wrapper1">

<div class="wrapper">
	<center>
	<h1 class="title">
	<?php echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/receipt.png','Passport photo not yet submitted',array('height'=>100,'class'=>'passport')); ?>
	</h1>
	<h1 class="title" style="font-size:20px;color:#111">THE TECHNICAL UNIVERSITY OF KENYA </h1>
	
	<p class="center"><span class="num">REF # <?php echo str_pad( $model->id, 10, "0", STR_PAD_LEFT );?></span></p>
	<p class="center"><?php echo $title;?></p>
	</center>
	<?php if($model->position_id==11):?>
	<h2>FORM 1A: TO BE COMPLETED BY ASPIRANT </h2>
	<?php else:?>
	<h2>FORM 1: TO BE COMPLETED BY ASPIRANT </h2>
	<?php endif;?>
	<b>This form should to be submitted to Director, Student Support Services by Friday 12th October, 2014 at 10am. The form will not be accepted after the deadline. 
		Make sure you have completely filled all 6 Forms and 7 forms if you are staying in the Hostel.</b>
	<table class="table preview bordered" width="100%">
	<tr>
		<td valign="top" align="right"><br/><br/>
		<b>The current passport photo MUST BE coloured.</b>
		</td>
		<td >
			<div class="profile">
			<?php 
				
				//structure passport photo url
				if (empty($model->photo))
				$photo = str_replace("/", "-", $model->reg_number).'.JPG';
				else $photo = $model->photo;
				echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/passports/'.$photo,'Passport photo not yet submitted',array('height'=>150,'class'=>'passport')); 

			?>
			</div>
		</td>
	</tr>
	<tr><td colspan="2"><br /></td></tr>
	<tr><td class="right">Surname/family name: </td><td class="upper"><?php echo $model->surname;?></td></tr>
	<tr><td class="right">Given Name/First name: </td><td class="upper"><?php echo $model->firstname;?></td></tr>		
	<tr><td class="right">Middle Name: </td><td class="upper"><?php echo $model->othername;?></td></tr>
	<tr><td  class="right">SCHOOL:  </td><td class="upper"><?php echo $model->school;?></td></tr>
	<tr><td class="right">Department:  </td><td  class="upper"><?php echo $model->department;?></td></tr>
	<tr><td  class="right">Enrolled Program: </td><td  class="upper"> <?php echo $model->programme;?> </td></tr>
	<tr><td class="right">Program year end : </td><td><?php echo $model->programme_end;?></td></tr>
	<tr><td class="right">Phone Number: </td><td class="upper"> <?php echo $model->mobile;?></td></tr>
	<tr><td class="right">E-mail Address: </td><td > <?php echo $model->email;?></td></tr>
	<tr><td class="right"><b>STUDENT REGISTRATION NUMBER: </b></td><td  class="upper"><b> <?php echo $model->reg_number;?></b></td></tr>
	<tr><td class="right"><b>SEEKING ELECTIVE POSITION AS: </b></td><td  class="upper"> <b><?php echo $model->position;?></b></td></tr>	
	<tr><td colspan="2"><hr /></td></tr>
	<tr>
		<td colspan="2">
			<b>By my signature below:</b><br/>
			<ul>
				<li>I have given my recent and true passport photo of myself.</li>
				<li> I have confirmed that I have at least two semesters left for study, with a minimum of 10 units completed two semesters, with a full load of academic study totaling to at least 12 units.</li>
				<li>I  have  passed examination in the December 2013 academic semester.</li>
			</ul>
		</td>
	</tr>
	<tr><td colspan="2"><hr /></td></tr>
	<tr><td colspan="2" >Signature: ______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date: ______________________________	</td></tr>		
	<tr><td colspan="2"><hr /><br/></td></tr>
	</table>

</div>
<h3 class="page">Page 1 of 12</h3>
</div>



<div class="wrapper1">

<div class="wrapper">
	<center>
	<h1 class="title">
	<?php echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/receipt.png','Passport photo not yet submitted',array('height'=>100,'class'=>'passport')); ?>
	</h1>
	<h1 class="title" style="font-size:20px;color:#111">THE TECHNICAL UNIVERSITY OF KENYA </h1>
	
	<p class="center"><span class="num">REF # <?php echo str_pad( $model->id, 10, "0", STR_PAD_LEFT );?></span></p>
	<p class="center"><?php echo $title;?></p>
	</center>
	<h2>FORM 111 </h2>
	<center>
	<h2>CERTIFICATE OF CLEARANCE BY DIRECTOR/ HEAD OF SCHOOL AND CHAIRMAN OF DEPARTMENT</h2>
	</center>
	<p><b>APPLICATION INSTRUCTION:</b> Before one is cleared to run for any elective student position, 
		the following University officers (see below) must complete this form and notify the Office of Director, 
		Student Support Services of any adverse information (if any) on their record. 
	</p>
	<b>Form A & B must be filled.</b>
	<h3><u>A: TO BE COMPLETED BY APPLICANT</u></h3>
	<table class="table preview bordered" width="100%">
	
	<tr><td colspan="2"><br /></td></tr>
	<tr><td class="right">Surname/family name: </td><td class="upper"><?php echo $model->surname;?></td></tr>
	<tr><td class="right">Given Name/First name: </td><td class="upper"><?php echo $model->firstname;?></td></tr>		
	<tr><td class="right">Middle Name: </td><td class="upper"><?php echo $model->othername;?></td></tr>
	<tr><td  class="right">SCHOOL:  </td><td class="upper"><?php echo $model->school;?></td></tr>
	<tr><td class="right">Department:  </td><td  class="upper"><?php echo $model->department;?></td></tr>
	<tr><td  class="right">Enrolled Program: </td><td  class="upper"> <?php echo $model->programme;?> </td></tr>
	<tr><td class="right">Program year end : </td><td><?php echo $model->programme_end;?></td></tr>
	<tr><td class="right">Phone Number: </td><td class="upper"> <?php echo $model->mobile;?></td></tr>
	<tr><td class="right">E-mail Address: </td><td > <?php echo $model->email;?></td></tr>
	<tr><td class="right"><b>STUDENT REGISTRATION NUMBER: </b></td><td  class="upper"><b> <?php echo $model->reg_number;?></b></td></tr>
	<tr><td class="right"><b>SEEKING ELECTIVE POSITION AS: </b></td><td  class="upper"> <b><?php echo $model->position;?></b></td></tr>	
	<tr><td colspan="2"><hr /></td></tr>
	<tr>
		<td colspan="2">
			<b>By my signature below, I authorize the offices indicated below to provide the information requested.</b><br/>
		</td>
	</tr>
	
	<tr>
		<td>
			
		</td>
		<td>
			
		</td>
	</tr>
	<tr><td colspan="2"><br /></td></tr>
	<tr><td colspan="2" >Signature: ______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date: ______________________________	</td></tr>		
	<tr><td colspan="2"><br/><b>NOTE: The information I have given above is true and I should be disqualified if it is not.</b><hr /><br/><br/><br/><br/><br/><br/></td></tr>
	</table>

</div>
<h3 class="page">Page 3 of 12</h3>
</div>

<div class="wrapper1">

<div class="wrapper">
	<center>
	<h1 class="title">
	<?php echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/receipt.png','Passport photo not yet submitted',array('height'=>100,'class'=>'passport')); ?>
	</h1>
	<h1 class="title" style="font-size:20px;color:#111">THE TECHNICAL UNIVERSITY OF KENYA </h1>
	
	<p class="center"><span class="num">REF # <?php echo str_pad( $model->id, 10, "0", STR_PAD_LEFT );?></span></p>
	<p class="center"><?php echo $title;?></p>
	</center>
	<h2>FORM 111 </h2>
	<center>
	<h2>CERTIFICATE OF CLEARANCE BY DIRECTOR/ HEAD OF SCHOOL AND CHAIRMAN OF DEPARTMENT</h2>
	</center>
	<p>
	<b>NOTE: </b>This form should be in duplicate, one for the applicant and signed by the officer indicated
		 and the other send directly to the Director, Student Support Services by the officer concern. 
		 The department should forward the second form to the office of the Director of Student Support Services. 
	<b>This form to be given to Director, Student Support Services by Friday 12th October, 2014 at 10am. The form will not be accepted after the deadline.</b>
	</p>
	<h3><u>B: TO BE COMPLETED BY THE HEAD OF SCHOOL AND CHAIRMAN OF THE DEPARMENT: </u></h3>
	<table class="table preview bordered" width="100%">
	<tr><td colspan="2"><br /></td></tr>
	<tr><td colspan="2"><b>Tick where necessary</b></td></tr>
		
	<tr>
		<td colspan="2">
		<ul>
			<li>
				<input type="checkbox"/>  I have confirmed that the students has at least two semesters left for study,
				 with a minimum of 10 units; has at least completed two semesters, 
				 with a full load of academic study totaling to at least 12 units.
			</li>
			<li>
				<input type="checkbox"/> The student has no above credentials. 
			</li>
			<li>
				<input type="checkbox"/> The student has has successfully passed his/her examinations in the December 2013 academic semester.
			</li>
			<li>
				<input type="checkbox"/> The student has has not passed examination in the December 2013 academic semester.
			</li>
		</ul>
		</td>
	</tr>
	
	<tr><td colspan="2"><b>HEAD OF SCHOOL OF <?php echo strtoupper($model->school);?></b></td></tr>
	<tr><td colspan="2">Name ____________________________________________________________</td></tr>
	<tr><td colspan="2">Title ____________________________________________________________</td></tr>
	<tr><td colspan="2">Date Signed ____________________________________________________________</td></tr>
	<tr><td colspan="2">Official Stamp ____________________________________________________________</td></tr>
	<tr><td colspan="2">Student Registration Number: <?php echo $model->reg_number;?></td></td></tr>
	<tr><td colspan="2"><br /></td></tr>
	<tr><td colspan="2"></td><b>ADDITIONAL COMMENTS</b></td></tr>
	<tr><td colspan="2"><b>CHAIRMAN/ CHAIRPERSON DEPARTMENT OF <?php echo strtoupper($model->department);?></b></td></tr>
	<tr><td colspan="2">Name ____________________________________________________________</td></tr>
	<tr><td colspan="2">Title ____________________________________________________________</td></tr>
	<tr><td colspan="2">Date Signed ____________________________________________________________</td></tr>
	<tr><td colspan="2">Official Stamp ____________________________________________________________</td></tr>
	<tr><td colspan="2">Additional Comments ____________________________________________________________</td></tr>
	<tr><td colspan="2">Signature ____________________________________________________________</td></tr>
	
</table>
</div>
<h3 class="page">Page 4 of 12</h3>
</div>


<div class="wrapper1">

<div class="wrapper">
	<center>
	<h1 class="title">
	<?php echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/receipt.png','Passport photo not yet submitted',array('height'=>100,'class'=>'passport')); ?>
	</h1>
	<h1 class="title" style="font-size:20px;color:#111">THE TECHNICAL UNIVERSITY OF KENYA </h1>
	
	<p class="center"><span class="num">REF # <?php echo str_pad( $model->id, 10, "0", STR_PAD_LEFT );?></span></p>
	<p class="center"><?php echo $title;?></p>
	</center>
	<h2>FORM IV </h2>
	<center>
	<h2>CERTIFICATE OF CLEARANCE BY THE UNIVERSITY LIBRARIAN</h2>
	</center>
	<p>
	<b>APPLICATION INSTRUCTION: </b>Before one is cleared to run for any elective student position, 
	the following University officers (see below) must complete this form and notify the Office of the Director, 
	Student Support Services  of any adverse information (if any) on their record. 
	</p>
	<b>Form A & B must be filled.</b>
	<h3><u>A: TO BE COMPLETED BY APPLICANT:</u></h3>
	<table class="table preview bordered" width="100%">
	
	<tr><td colspan="2"><br /></td></tr>
	<tr><td class="right">Surname/family name: </td><td class="upper"><?php echo $model->surname;?></td></tr>
	<tr><td class="right">Given Name/First name: </td><td class="upper"><?php echo $model->firstname;?></td></tr>		
	<tr><td class="right">Middle Name: </td><td class="upper"><?php echo $model->othername;?></td></tr>
	<tr><td  class="right">SCHOOL:  </td><td class="upper"><?php echo $model->school;?></td></tr>
	<tr><td class="right">Department:  </td><td  class="upper"><?php echo $model->department;?></td></tr>
	<tr><td  class="right">Enrolled Program: </td><td  class="upper"> <?php echo $model->programme;?> </td></tr>
	<tr><td class="right">Program year end : </td><td><?php echo $model->programme_end;?></td></tr>
	<tr><td class="right">Phone Number: </td><td class="upper"> <?php echo $model->mobile;?></td></tr>
	<tr><td class="right">E-mail Address: </td><td > <?php echo $model->email;?></td></tr>
	<tr><td class="right"><b>STUDENT REGISTRATION NUMBER: </b></td><td  class="upper"><b> <?php echo $model->reg_number;?></b></td></tr>
	<tr><td class="right"><b>SEEKING ELECTIVE POSITION AS: </b></td><td  class="upper"> <b><?php echo $model->position;?></b></td></tr>	
	<tr><td colspan="2"><hr /></td></tr>
	<tr>
		<td colspan="2">
			<b>By my signature below, I authorize the offices indicated below to provide the information requested.</b><br/>
		</td>
	</tr>
	
	<tr>
		<td>
			
		</td>
		<td>
			
		</td>
	</tr>
	<tr><td colspan="2"><br /></td></tr>
	<tr><td colspan="2" >Signature: ______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date: ______________________________	</td></tr>		
	<tr><td colspan="2"><br/><b>NOTE: The information I have given above is true and I should be disqualified if it is not.</b><hr /><br/><br/><br/><br/><br/><br/></td></tr>
</table>
</div>
<h3 class="page">Page 5 of 12</h3>
</div>

<div class="wrapper1">

<div class="wrapper">
	<center>
	<h1 class="title">
	<?php echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/receipt.png','Passport photo not yet submitted',array('height'=>100,'class'=>'passport')); ?>
	</h1>
	<h1 class="title" style="font-size:20px;color:#111">THE TECHNICAL UNIVERSITY OF KENYA </h1>
	
	<p class="center"><span class="num">REF # <?php echo str_pad( $model->id, 10, "0", STR_PAD_LEFT );?></span></p>
	<p class="center"><?php echo $title;?></p>
	</center>
	<h2>FORM IV </h2>
	<center>
	<h2>CERTIFICATE OF CLEARANCE BY THE UNIVERSITY LIBRARIAN</h2>
	</center>
	<p>
	<b>NOTE: </b>This form should be in duplicate, one for the applicant and signed by the officer indicated
		 and the other send directly to the Director, Student Support Services by the officer concern. 
		 The department should forward the second form to the office of the Director of Student Support Services. 
	<b>This form to be given to Director, Student Support Services by Friday 12th October, 2014 at 10am. The form will not be accepted after the deadline.</b>
	</p>
	<h3><u>B:TO BE COMPLETED BY THE UNIVERSITY LIBRARIAN:</u></h3>
	<table class="table preview bordered" width="100%">
	<tr><td colspan="2"><br /></td></tr>
	<tr><td colspan="2"><b>Tick where necessary</b></td></tr>
		
	<tr>
		<td colspan="2">
		<ul>
			<li>
				<input type="checkbox"/>  I have confirmed that the students has at least two semesters left for study,
				 with a minimum of 10 units; has at least completed two semesters, 
				 with a full load of academic study totaling to at least 12 units.
			</li>
			<li>
				<input type="checkbox"/> The student has overdue books and/or outstanding book loan fines).
			</li>
			<li>
				<input type="checkbox"/> This student has in his/her custody overdue books and/or outstanding book loan fines (Please see below).
			</li><br/><br/><br/><br/><br/>
			<p><b>Additional comments:</b>_________________________________________________________________________________
				___________________________________________________________________________________________________________
				___________________________________________________________________________________________________________
				___________________________________________________________________________________________________________
				___________________________________________________________________________________________________________
			
			</p>
			
		</ul><br/><br/><br/>
		</td>
	</tr>
	<tr><td colspan="2">Name ____________________________________________________________</td></tr>
	<tr><td colspan="2">Title ____________________________________________________________</td></tr>
	<tr><td colspan="2">Date Signed _______________________________________________________</td></tr>
	<tr><td colspan="2">Official Stamp ____________________________________________________</td></tr>
	<tr><td colspan="2">Student Registration Number: <?php echo $model->reg_number;?></td></td></tr>
	<tr><td colspan="2"><br /></td></tr>
	
	</table>

</div>
<h3 class="page">Page 6 of 12</h3>
</div>


<?php if($model->position_id==12):?>
<div class="wrapper1">

<div class="wrapper">
	<center>
	<h1 class="title">
	<?php echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/receipt.png','Passport photo not yet submitted',array('height'=>100,'class'=>'passport')); ?>
	</h1>
	<h1 class="title" style="font-size:20px;color:#111">THE TECHNICAL UNIVERSITY OF KENYA </h1>
	
	<p class="center"><span class="num">REF # <?php echo str_pad( $model->id, 10, "0", STR_PAD_LEFT );?></span></p>
	<p class="center"><?php echo $title;?></p>
	</center>
	<h2>FORM V </h2>
	<center>
	<h2>CERTIFICATE OF CLEARANCE BY THE CATERESS/ HOUSEKEEPER</h2>
	</center>
	<p>
	<b>APPLICATION INSTRUCTION: </b>Before one is cleared to run for any elective student position, 
	the following University officers (see below) must complete this form and notify the Office of the Director, 
	Student Support Services  of any adverse information (if any) on their record. 
	<b>NOTE:</b> Only those who are residing in the hostels and vying as Hostel/ Hall Representatives.
	<b>NOTE AGAIN: This form to be given to Director, Student Support Services by Friday 12th October, 2014 at 10am. The form will not be accepted after the deadline</b>
	</p>
	<b>Form A & B must be filled.</b>
	<h3><u>A: TO BE COMPLETED BY APPLICANT:</u></h3>
	<table class="table preview bordered" width="100%">
	
	<tr><td colspan="2"><br /></td></tr>
	<tr><td class="right">Surname/family name: </td><td class="upper"><?php echo $model->surname;?></td></tr>
	<tr><td class="right">Given Name/First name: </td><td class="upper"><?php echo $model->firstname;?></td></tr>		
	<tr><td class="right">Middle Name: </td><td class="upper"><?php echo $model->othername;?></td></tr>
	<tr><td  class="right">SCHOOL:  </td><td class="upper"><?php echo $model->school;?></td></tr>
	<tr><td class="right">Department:  </td><td  class="upper"><?php echo $model->department;?></td></tr>
	<tr><td  class="right">Enrolled Program: </td><td  class="upper"> <?php echo $model->programme;?> </td></tr>
	<tr><td class="right">Program year end : </td><td><?php echo $model->programme_end;?></td></tr>
	<tr><td class="right">Phone Number: </td><td class="upper"> <?php echo $model->mobile;?></td></tr>
	<tr><td class="right">E-mail Address: </td><td > <?php echo $model->email;?></td></tr>
	<tr><td class="right"><b>STUDENT REGISTRATION NUMBER: </b></td><td  class="upper"><b> <?php echo $model->reg_number;?></b></td></tr>
	<tr><td class="right"><b>SEEKING ELECTIVE POSITION AS: </b></td><td  class="upper"> <b><?php echo $model->position;?></b></td></tr>	
	<tr><td colspan="2"><hr /></td></tr>
	<tr>
		<td colspan="2">
			<b>By my signature below, I authorize the offices indicated below to provide the information requested.</b><br/>
		</td>
	</tr>
	
	<tr>
		<td>
			
		</td>
		<td>
			
		</td>
	</tr>
	<tr><td colspan="2"><br /></td></tr>
	<tr><td colspan="2" >Signature: ______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date: ______________________________	</td></tr>		
	<tr><td colspan="2"><br/><b>NOTE: The information I have given above is true and I should be disqualified if it is not.</b><hr /><br/><br/><br/><br/><br/><br/></td></tr>
</table>
</div>
<h3 class="page">Page 7 of 12</h3>
</div>



<div class="wrapper1">

<div class="wrapper">
	<center>
	<h1 class="title">
	<?php echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/receipt.png','Passport photo not yet submitted',array('height'=>100,'class'=>'passport')); ?>
	</h1>
	<h1 class="title" style="font-size:20px;color:#111">THE TECHNICAL UNIVERSITY OF KENYA </h1>
	
	<p class="center"><span class="num">REF # <?php echo str_pad( $model->id, 10, "0", STR_PAD_LEFT );?></span></p>
	<p class="center"><?php echo $title;?></p>
	</center>
	<h2>FORM V </h2>
	<center>
	<h2>CERTIFICATE OF CLEARANCE BY THE CATERESS/ HOUSEKEEPER</h2>
	</center>
	<p>
	<b>NOTE: </b>This form should be in duplicate, one for the applicant and signed by the officer indicated
		 and the other send directly to the Director, Student Support Services by the officer concern. 
		 The department should forward the second form to the office of the Director of Student Support Services. 
	<b>This form to be given to Director, Student Support Services by Friday 12th October, 2014 at 10am. The form will not be accepted after the deadline.</b>
	</p>
	<h3><u>B: TO BE COMPLETED BY CATERESS/HOUSEKEEPER [ONLY INTENDED FOR APPLICANTS SEEKING ELECTIVE POSITION AS HOSTEL REPRESENTATIVES AND MUST BE A RESIDENT]</u></h3>
	<table class="table preview bordered" width="100%">
	<tr><td colspan="2"><br /></td></tr>
	<tr><td colspan="2"><b>Tick where necessary</b></td></tr>
		
	<tr>
		<td colspan="2">
		<ul>
			<li>
				<input type="checkbox"/>  I have confirmed that the students has at least two semesters left for study,
				 with a minimum of 10 units; has at least completed two semesters, 
				 with a full load of academic study totaling to at least 12 units.
			</li>
			<li>
				<input type="checkbox"/> This student’s conduct as a boarder is beyond reproach.
			</li>
			<li>
				<input type="checkbox"/>   This student’s conduct as a boarder is in question, is suspect (Please see below).
			</li><br/><br/><br/>
			<p><b>Additional comments:</b>_________________________________________________________________________________
				___________________________________________________________________________________________________________
				___________________________________________________________________________________________________________
				
				
			</p>
			
		</ul>
		</td>
	</tr>
	<tr><td colspan="2"><b>Cateress</b></td></tr>
	<tr><td colspan="2">Name ____________________________________________________________</td></tr>
	<tr><td colspan="2">Title ____________________________________________________________</td></tr>
	<tr><td colspan="2">Date Signed ____________________________________________________________</td></tr>
	<tr><td colspan="2">Official Stamp ____________________________________________________________</td></tr>
	<tr>
	<td colspan="2"><b>Additional comments:</b>________________________________________________________________________
			___________________________________________________________________________________________________________
				
	</td></td></tr>
	<tr><td colspan="2"><b>Housekeeper</b></td></tr>
	<tr><td colspan="2">Name ____________________________________________________________</td></tr>
	<tr><td colspan="2">Title ____________________________________________________________</td></tr>
	<tr><td colspan="2">Date Signed ____________________________________________________________</td></tr>
	<tr><td colspan="2">Official Stamp ____________________________________________________________</td></tr>
	<tr>
	<td colspan="2"><b>Additional comments:</b>________________________________________________________________________
			___________________________________________________________________________________________________________
			
	</td></td></tr>
	<tr><td colspan="2"><b>
		NOTE:  This form should be signed by the officer indicated and department to forward the 
		form to the office of the Director of Student Support Services by 12 September 2014.
		</b><br /></td></tr>
	
	</table>

</div>
<h3 class="page">Page 8 of 12</h3>
</div>

<?php endif;?>

<div class="wrapper1">

<div class="wrapper">
	<center>
	<h1 class="title">
	<?php echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/receipt.png','Passport photo not yet submitted',array('height'=>100,'class'=>'passport')); ?>
	</h1>
	<h1 class="title" style="font-size:20px;color:#111">THE TECHNICAL UNIVERSITY OF KENYA </h1>
	
	<p class="center"><span class="num">REF # <?php echo str_pad( $model->id, 10, "0", STR_PAD_LEFT );?></span></p>
	<p class="center"><?php echo $title;?></p>
	</center>
	<h2>FORM VI </h2>
	<center>
	<h2>CERTIFICATE OF CLEARANCE BY THE UNIVERSITY FACULTY ACCOUNTANT </h2>
	</center>
	<p>
	<b>APPLICATION INSTRUCTION: </b>Before one is cleared to run for any elective student position, 
	the following University officers (see below) must complete this form and notify the Office of the Director, 
	Student Support Services  of any adverse information (if any) on their record. 
	</p>
	<b>Form A & B must be filled.</b>
	<h3><u>A: TO BE COMPLETED BY APPLICANT:</u></h3>
	<table class="table preview bordered" width="100%">
	
	<tr><td colspan="2"><br /></td></tr>
	<tr><td class="right">Surname/family name: </td><td class="upper"><?php echo $model->surname;?></td></tr>
	<tr><td class="right">Given Name/First name: </td><td class="upper"><?php echo $model->firstname;?></td></tr>		
	<tr><td class="right">Middle Name: </td><td class="upper"><?php echo $model->othername;?></td></tr>
	<tr><td  class="right">SCHOOL:  </td><td class="upper"><?php echo $model->school;?></td></tr>
	<tr><td class="right">Department:  </td><td  class="upper"><?php echo $model->department;?></td></tr>
	<tr><td  class="right">Enrolled Program: </td><td  class="upper"> <?php echo $model->programme;?> </td></tr>
	<tr><td class="right">Program year end : </td><td><?php echo $model->programme_end;?></td></tr>
	<tr><td class="right">Phone Number: </td><td class="upper"> <?php echo $model->mobile;?></td></tr>
	<tr><td class="right">E-mail Address: </td><td > <?php echo $model->email;?></td></tr>
	<tr><td class="right"><b>STUDENT REGISTRATION NUMBER: </b></td><td  class="upper"><b> <?php echo $model->reg_number;?></b></td></tr>
	<tr><td class="right"><b>SEEKING ELECTIVE POSITION AS: </b></td><td  class="upper"> <b><?php echo $model->position;?></b></td></tr>	
	<tr><td colspan="2"><hr /></td></tr>
	<tr>
		<td colspan="2">
			<b>By my signature below, I authorize the offices indicated below to provide the information requested.</b><br/>
		</td>
	</tr>
	
	<tr>
		<td>
			
		</td>
		<td>
			
		</td>
	</tr>
	<tr><td colspan="2"><br /></td></tr>
	<tr><td colspan="2" >Signature: ______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date: ______________________________	</td></tr>		
	<tr><td colspan="2"><br/><b>NOTE: The information I have given above is true and I should be disqualified if it is not.</b><hr /><br/><br/><br/><br/><br/><br/></td></tr>
</table>
</div>
<h3 class="page">Page 9 of 12</h3>
</div>

<div class="wrapper1">

<div class="wrapper">
	<center>
	<h1 class="title">
	<?php echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/receipt.png','Passport photo not yet submitted',array('height'=>100,'class'=>'passport')); ?>
	</h1>
	<h1 class="title" style="font-size:20px;color:#111">THE TECHNICAL UNIVERSITY OF KENYA </h1>
	
	<p class="center"><span class="num">REF # <?php echo str_pad( $model->id, 10, "0", STR_PAD_LEFT );?></span></p>
	<p class="center"><?php echo $title;?></p>
	</center>
	<h2>FORM VI </h2>
	<center>
	<h2>CERTIFICATE OF CLEARANCE BY THE UNIVERSITY FACULTY ACCOUNTANT </h2>
	</center>
	<p>
	<b>NOTE: </b>This form should be in duplicate, one for the applicant and signed by the officer indicated
		 and the other send directly to the Director, Student Support Services by the officer concern. 
		 The department should forward the second form to the office of the Director of Student Support Services. 
	<b>This form to be given to Director, Student Support Services by Friday 12th October, 2014 at 10am. The form will not be accepted after the deadline.</b>
	</p>
	<h3><u>B:TO BE COMPLETED BY THE THE UNIVERSITY FACULTY ACCOUNTANT:</u></h3>
	<table class="table preview bordered" width="100%">
	<tr><td colspan="2"><br /></td></tr>
	<tr><td colspan="2"><b>Tick where necessary</b></td></tr>
		
	<tr>
		<td colspan="2">
		<ul>
			<li>
				<input type="checkbox"/>  This student has fully paid up his/her school fees to date.
			</li>
			<li>
				<input type="checkbox"/>  This student is delinquent, has an outstanding fees balance (Please see below).
				 Outstanding fees balance Kshs____________________________________________________
			</li><br/><br/><br/>
			
			<p><b>Additional comments:</b>_________________________________________________________________________________
				___________________________________________________________________________________________________________
				___________________________________________________________________________________________________________
				
			</p>
			
		</ul><br/><br/>
		</td>
	</tr>
	<tr><td colspan="2">Name ____________________________________________________________</td></tr>
	<tr><td colspan="2">Title ____________________________________________________________</td></tr>
	<tr><td colspan="2">Date Signed ____________________________________________________________</td></tr>
	<tr><td colspan="2">Official Stamp ____________________________________________________________</td></tr>
	<tr><td colspan="2">Student Registration Number: <?php echo $model->reg_number;?></td></td></tr>
	<tr><td colspan="2"><br /></td></tr>
	
	</table>

</div>
<h3 class="page">Page 10 of 12</h3>
</div>



<div class="wrapper1">

<div class="wrapper">
	<center>
	<h1 class="title">
	<?php echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/receipt.png','Passport photo not yet submitted',array('height'=>100,'class'=>'passport')); ?>
	</h1>
	<h1 class="title" style="font-size:20px;color:#111">THE TECHNICAL UNIVERSITY OF KENYA </h1>
	
	<p class="center"><span class="num">REF # <?php echo str_pad( $model->id, 10, "0", STR_PAD_LEFT );?></span></p>
	<p class="center"><?php echo $title;?></p>
	</center>
	<h2>FORM VII </h2>
	<center>
	<h2>CERTIFICATE OF CLEARANCE BY THE UNIVERSITY SECURITY OFFICER </h2>
	</center>
	<p>
	<b>APPLICATION INSTRUCTION: </b>Before one is cleared to run for any elective student position, 
	the following University officers (see below) must complete this form and notify the Office of the Director, 
	Student Support Services  of any adverse information (if any) on their record. 
	</p>
	<b>Form A & B must be filled.</b>
	<h3><u>A: TO BE COMPLETED BY APPLICANT:</u></h3>
	<table class="table preview bordered" width="100%">
	
	<tr><td colspan="2"><br /></td></tr>
	<tr><td class="right">Surname/family name: </td><td class="upper"><?php echo $model->surname;?></td></tr>
	<tr><td class="right">Given Name/First name: </td><td class="upper"><?php echo $model->firstname;?></td></tr>		
	<tr><td class="right">Middle Name: </td><td class="upper"><?php echo $model->othername;?></td></tr>
	<tr><td  class="right">SCHOOL:  </td><td class="upper"><?php echo $model->school;?></td></tr>
	<tr><td class="right">Department:  </td><td  class="upper"><?php echo $model->department;?></td></tr>
	<tr><td  class="right">Enrolled Program: </td><td  class="upper"> <?php echo $model->programme;?> </td></tr>
	<tr><td class="right">Program year end : </td><td><?php echo $model->programme_end;?></td></tr>
	<tr><td class="right">Phone Number: </td><td class="upper"> <?php echo $model->mobile;?></td></tr>
	<tr><td class="right">E-mail Address: </td><td > <?php echo $model->email;?></td></tr>
	<tr><td class="right"><b>STUDENT REGISTRATION NUMBER: </b></td><td  class="upper"><b> <?php echo $model->reg_number;?></b></td></tr>
	<tr><td class="right"><b>SEEKING ELECTIVE POSITION AS: </b></td><td  class="upper"> <b><?php echo $model->position;?></b></td></tr>	
	<tr><td colspan="2"><hr /></td></tr>
	<tr>
		<td colspan="2">
			<b>By my signature below, I authorize the offices indicated below to provide the information requested.</b><br/>
		</td>
	</tr>
	
	<tr>
		<td>
			
		</td>
		<td>
			
		</td>
	</tr>
	<tr><td colspan="2"><br /></td></tr>
	<tr><td colspan="2" >Signature: ______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date: ______________________________	</td></tr>		
	<tr><td colspan="2"><br/><b>NOTE: The information I have given above is true and I should be disqualified if it is not.</b><hr /><br/><br/><br/><br/><br/><br/></td></tr>
</table>
</div>
<h3 class="page">Page 11 of 12</h3>
</div>

<div class="wrapper1">

<div class="wrapper">
	<center>
	<h1 class="title">
	<?php echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/receipt.png','Passport photo not yet submitted',array('height'=>100,'class'=>'passport')); ?>
	</h1>
	<h1 class="title" style="font-size:20px;color:#111">THE TECHNICAL UNIVERSITY OF KENYA </h1>
	
	<p class="center"><span class="num">REF # <?php echo str_pad( $model->id, 10, "0", STR_PAD_LEFT );?></span></p>
	<p class="center"><?php echo $title;?></p>
	</center>
	<h2>FORM VII </h2>
	<center>
	<h2>CERTIFICATE OF CLEARANCE BY THE UNIVERSITY SECURITY OFFICER </h2>
	</center>
	<p>
	<b>NOTE: </b>This form should be in duplicate, one for the applicant and signed by the officer indicated
		 and the other send directly to the Director, Student Support Services by the officer concern. 
		 The department should forward the second form to the office of the Director of Student Support Services. 
	<b>This form to be given to Director, Student Support Services by Friday 12th October, 2014 at 10am. The form will not be accepted after the deadline.</b>
	</p>
	<h3><u>B:TO BE COMPLETED BY THE UNIVERSITY SECURITY OFFICER: </u></h3>
	<b>NOTE: This form should be taken to Mr Owino's Office located at Block D next to Assistant Dean of Students.</b>
	<table class="table preview bordered" width="100%">
	<tr><td colspan="2"><br /></td></tr>
	<tr><td colspan="2"><b>Tick where necessary</b></td></tr>
		
	<tr>
		<td colspan="2">
		<ul>
			<li>
				<input type="checkbox"/>  This student is not a convict and has received no university judicial sanctions.
			</li>
			<li>
				<input type="checkbox"/>  This student is not currently under judicial sanctions, but has been sanctioned previously but cleared (please see details below)
			</li>
			<li>
				<input type="checkbox"/>  This student is currently under active judicial sanctions (please see details below).
			</li>
			
			<li>1st incident offence(s)_________________________________________________________________________________________</li>
				
		    <li>2nd incident offence(s)__________________________________________________________________________________________</li>
					
			<li>Sanctions Imposed________________________________________________________________________________________________</li>
			
			
		</ul>
		</td>
	</tr>
	<tr><td colspan="2"><b>1. SECURITY OFFICER  </b></td></tr>
	<tr><td colspan="2">Name _____________________________________________________________________</td></tr>
	<tr><td colspan="2">Title ____________________________________________________________________</td></tr>
	<tr><td colspan="2">Date Signed ______________________________________________________________</td></tr>
	<tr><td colspan="2">Official Stamp ___________________________________________________________</td></tr>
	<tr><td colspan="2">Additional Comments_______________________________________________________</td></tr>
	<tr><td colspan="2"><b>2. SECURITY OFFICER  </b></td></tr>
	<tr><td colspan="2">Name _____________________________________________________________________</td></tr>
	<tr><td colspan="2">Title ____________________________________________________________________</td></tr>
	<tr><td colspan="2">Date Signed ______________________________________________________________</td></tr>
	<tr><td colspan="2">Official Stamp ___________________________________________________________</td></tr>
	<tr><td colspan="2">Additional Comments_______________________________________________________</td></tr>
	<tr><td colspan="2"><br /></td></tr>
	
	</table>

</div>
<h3 class="page">Page 12 of 12</h3>
</div>


