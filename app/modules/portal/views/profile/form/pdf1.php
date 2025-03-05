<style>
/* printing */
body{
	font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
	font-size:12px;
}
table.bordered{
	border-bottom:1px solid #666;
}
.home table td{
	font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
	font-size:12px;
	padding:2px 2px 2px 0px;

	
}
span.num{
	color:#888;
	font-style:italic;
	font-size:14px;
}
.wrapper{
	border:1px solid #666;
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
table td b{
	margin-right:20px;
}
td.email{
	text-transform:lowercase;
}
table.inner td{
	border-right:1px solid #666;
	
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
	border-bottom:2px solid;
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
	border-bottom:1px solid;

}
.wrapper1{
	height:1300px;
}

/* end print */
</style>


<div class="wrapper1">

<div class="wrapper">
	<center>
	<h1 class="title">
	<?php echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/receipt.png','Passport photo not yet submitted',array('height'=>100,'class'=>'passport')); ?>
	</h1>
	<h1 class="title" style="font-size:20px;color:#b0a242">THE TECHNICAL UNIVERSITY OF KENYA </h1>
	<p class="center">Haile Selassie Avenue, P.O. Box 52428, Nairobi, 00200, Tel +254(020) 343672, 2249974, 2251300, 341639</p>
	<p class="center">Fax 2219689, Email: vc@kenpoly.ac.ke, Website: www.tukenya.ac.ke</p>
	<h2>REGISTRATION FORM (<?php echo $c;?>)</h2>
	</center>
	
	<table class="table preview bordered" width="100%">
	<tr>
		<td><b>Course Name:</b> </td><td><?php echo $student->programme;?></td>
		<td ><b>Class Code:</b> </td><td><?php echo $student->class_code;?></td>
	</tr>
	<tr>
		<td ><b>Student Name: </b></td><td><?php echo $student->title;?> <?php echo $student->surname;?> <?php echo $student->firstname.' '.$student->othername;?></td>
		<td><b>Reg. Number:</b> </td><td><?php echo $student->reg_number;?></td>
	</tr>
	</table>
	<div class="home">
	
		<table class="table inner" width="100%" valign="top">
			<tr>
			<td>
			<fieldset><legend class="form">Section 1 - Personal Details</legend>
				<table class="table">
					<tr><td><b>Birth Date:</b> </td><td><?php echo $student->dob;?></td></tr>
					<tr><td><b>Gender:</b> </td><td><?php echo $student->gender;?></td></tr>
					<tr><td><b>ID Number:</b> </td><td><?php echo $student->id_number;?></td></tr>
					<tr><td><b>County:</b> </td><td><?php echo $student->county;?></td></tr>
					<tr><td><b>District:</b> </td><td><?php echo $student->district;?></td></tr>
				</table>
			</fieldset>
			
			<fieldset><legend class="form">Section 2 - Course Calendar</legend>
				<table class="table">
					<tr><td><b>Semester and Year of Admission:</b></tr>
					<tr><td><?php echo $student->semester;?></td></tr>
					<tr><td><b>Expected Completion Date:</b> </td></tr>
					<tr><td><?php echo $student->expected_completion_date;?></td></tr>
				</table>
			</fieldset>
			
			<fieldset><legend class="form">Section 3 - Employment/ Sponsor</legend>
				<table class="table">
					<tr><td><b>Employer Name:</b> </td></tr>
					<tr><td><?php echo $student->employer;?></td></tr>
					<tr><td><b>Position:</b> </td></tr>
					<tr><td><?php echo $student->occupation;?></td></tr>
					<tr><td><b>Employer Address:</b> </td></tr>
					<tr><td><?php echo $student->employer_address;?></td></tr>
					<tr><td><b>Employer Tel.:</b> </td></tr>
					<tr><td><?php echo $student->employer_telephone;?></td></tr>
					<tr><td><b>Employer Email:</b> </td></tr>
					<tr><td><?php echo $student->employer_email;?></td></tr>
					<tr><td><b>Sponsored by Employer?:</b> </td></tr>
					<tr><td><?php echo $student->is_employed;?></td></tr>
				</table>
			</fieldset>
			
			
			
			</td>
			
			
			<td>
				<fieldset><legend class="form">Section 4 - Home/ Permanent Address</legend>
					<table class="table">
						<tr><td colspan="2"><b>Personal Postal Address:</b> </td></tr>
						<tr><td colspan="2"><?php echo $student->postal_address.' '.$student->postcode.' '.$student->town;?></td></tr>
						<tr><td><b>Mobile:</b> </td><td><?php echo $student->mobile;?></td></tr>
						<tr><td><b>Email:</b> </td><td><?php echo $student->email;?></td></tr>
					</table>
				</fieldset>
				
				<fieldset><legend class="form">Section 5 - Current Address</legend>
				<p>Applies if different from Home Address</p>
					<table class="table">
						<tr><td colspan="2"><b>Personal Current Address:</b> </td></tr>
						<tr><td colspan="2"><?php echo $student->c_postal_address.' '.$student->c_postcode.' '.$student->c_town;?></td></tr>
						<tr><td><b>Current Mobile:</b> </td><td><?php echo $student->c_mobile;?></td></tr>
						<tr><td><b>Current Email:</b> </td><td><?php echo $student->c_email;?></td></tr>
					</table>
				</fieldset>
				
				
				<fieldset><legend class="form">Section 6 - Next of Kin</legend>
				
					<table class="table">
						<tr><td><b>Relationship:</b> </td><td><?php echo $student->nokRelation;?></td></tr>
						<tr><td colspan="2"><b>Full Names:</b> </td></tr>
						<tr><td  colspan="2"><?php echo $student->nokTitle;?> <?php echo $student->nok_surname;?> <?php echo $student->nok_firstname.' '.$student->nok_othername;?></td>
						<tr><td colspan="2"><b>Postal Address:</b> </td></tr>
						<tr><td colspan="2"><?php echo $student->nok_postal_address.' '.$student->nok_postcode.' '.$student->nok_town;?></td></tr>
						<tr><td><b>Mobile:</b> </td><td><?php echo $student->nok_mobile;?></td></tr>
						<tr><td><b>Email:</b> </td><td><?php echo $student->nok_email;?></td></tr>
					</table>
				</fieldset>
				
				
			</td>
			
			
			
			<td class="last">
				<fieldset><legend class="form">Section 7 - Passport Photo</legend>
					<br /><br />
					<div class="profile">
					<?php 
						
						//structure passport photo url
						if (empty($student->photo))
						$photo = str_replace("/", "-", $model->reg_number).'.JPG';
						else $photo = $student->photo;
						echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/passports/'.$photo,'Passport photo not yet submitted',array('height'=>100,'class'=>'passport')); 

					?>
					</div>
					<br />
				</fieldset>
				
				<fieldset><legend class="form">Section 8 - First Semester Fees</legend>
				
					<?php $total=0;?>
					<div id="fee-payable-grid">
					<table class="items table table-striped table-bordered table-condensed">
					<tr><th>Fee item</th><th class="amount">Amount</th></tr>
					<?php for($i=0;$i<count($feeitems);$i++): ?>
					<?php $total += $feeitems[$i]['amount'];?>
					<tr><td><?php echo $feeitems[$i]['name'];?></td><td class="amount"><?php echo Yii::app()->numberFormatter->formatCurrency($feeitems[$i]['amount'],"KES "); ?></td></tr>
					<?php endfor;?>
					<tr><td>Grand Total:</td><td class="amount"><?php echo Yii::app()->numberFormatter->formatCurrency($total,"KES "); ?></td></tr>
					</table>
					</div>
				
				</fieldset>
				
				
				

			</td>
			
			
			</tr>
			
			<tr>
				<td>
					<fieldset><legend class="form">Verification of Documents</legend>
						<table class="table">
							<tr><td><b>Documents checked by:</b> </td></tr>
							<tr><td><?php echo $user->name;?></td></tr>
							<tr><td><b>Sign:</b>.....................................................</td></tr>
							<tr><td><b>Date: </b> <?php echo $date;?></td></tr>
						</table>
					</fieldset>
				</td>
				
				<td>
					<fieldset><legend class="form">STUDENT'S VERIFICATION</legend>
						<h4>I AGREE TO ABIDE BY THE RULES AND REGULATIONS OF THE TECHNICAL UNIVERSITY OF KENYA</h4>
						<b>Student's Signature:</b>.....................................................
					</fieldset>
				</td>
				
				<td class="last">
					<fieldset><legend class="form">Admitting Officer</legend>
						<table class="table">
							<tr><td><b>Names:</b> </td></tr>
							<tr><td><?php echo $user->name;?></td></tr>
							<tr><td><b>Sign:</b>.....................................................</td></tr>
							<tr><td><b>Date: </b> <?php echo $date;?></td></tr>
						</table>
					</fieldset>
				</td>
			</tr>
			
			
		</table>

	</div>
</div>
</div>

