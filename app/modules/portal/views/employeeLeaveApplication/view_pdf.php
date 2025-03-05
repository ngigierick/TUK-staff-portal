<style>
/* printing */
body{
	font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
	font-size:12px;

}

 td{
	
	padding: 7px 0px;
	border:0px solid #dedede;
	
}

th{
	text-align:left;
	font-size:16px;
	text-transform:uppercase;
	color:#666;
}
div.stamp{
	

	font-size:30px;
	padding:20px;

}
td.stamp1{
	
	width:50%;
	margin-right:10px;
}
.bordered-bottom{
	border-bottom:1px solid #444;
}
.bordered{
	
	border:1px solid #444;
}
td.email{
	text-transform:lowercase !important;
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
.center{
	text-align:center;
	font-size:10px;
}

 h2{
	font-size:17px;
	text-align:center;
	margin-bottom:2px;
	
}
span.num{
	color:#555;
	font-style:italic;
	font-size:10px;
	letter-spacing: 5px;
	
}
 h3{
	font-weight:normal;
	
}
 legend{
	font-size:17px;
	text-decoration: underline;
	text-align:left;
}
.passport1{
	
	border:1px solid #dedede;
}
.underline{
	
	text-decoration: underline;

}
.padd{
	
	padding:10px;
}
.home{
	
	border:0px solid #444;
}
/* end print */
</style>
<center>
<p class="center">	<?php echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/receipt.png','no photo',array('height'=>100,'class'=>'passport')); ?></p>
<h1 class="title" style="font-size:20px;color:#b0a242">THE TECHNICAL UNIVERSITY OF KENYA </h1>
<h3 class="center underline"> TUK/HRM/REG/LF/001</h3>
<h3 class="center underline">APPLICATION FOR <?php echo strtoupper($model->leave);?></h3>
<p class="center"><span class="num">REF #: <?php echo str_pad( $model->id, 10, "0", STR_PAD_LEFT );?></span></p>
<h3 class="center"> STATUS: <?php echo $model->status();?></h3>
</center>
<p>To be completed in Triplicate and submitted to the <b>Human Resource Services - Registry</b> through the Head of Department at least <b><?php echo $model->leave->notice_days;?> days </b> before commencement of leave.</p>


<div class="home">
	<table class="staff_div profile">
		<tr><th class="bordered-bottom" >PART I - (To be comleted by the applicant) </th></tr>
		<tr><td>Name: <?php echo strtoupper(GxHtml::valueEx($model->staff->title).' '.GxHtml::encode($model->staff->firstname.' '.$model->staff->othername.' '.$model->staff->surname)); ?></td></tr>
		<tr><td>Payroll Number: <?php echo strtoupper($model->staff->pf_number); ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Department: <?php echo strtoupper($model->staff->employment->office->name); ?></td></tr>
		<tr><td>I wish to apply for  <b><?php echo $model->taken_days;?></b> <?php echo ($model->taken_days>1)?"days":"day";?> leave starting from <b><?php echo EmployeeLeave::formatDate($model->start_date);?></b> to <b><?php echo EmployeeLeave::formatDate($model->end_date);?></b>.</td></tr>
		
			<?php 
			$address ='....................................................................';
			$mobile ='....................................................................';
			$address = $model->staff->postal_address();
			$mobile = $model->staff->mobile();
			?>
			
			
		<tr><td>My Leave Postal Address will be: <?php echo $address;?></td></tr>
		<tr><td>Telephone: <?php echo $mobile;?></td></tr>
		<tr><td>Applicant's Signature.......................................................................... Date: <?php echo date('d/m/Y',$model->date_modified);?> </td></tr>
		<tr><td><br /><br /> </td></tr>
		<tr><th class="bordered-bottom" >PART II - (To be comleted by the Head of Department)</th></tr>
		<tr><td>Recommended satisfactory arrangements can be made for performance of <?php echo ($model->staff->gender_id==1)?"his":"her";?> duties during <?php echo ($model->staff->gender_id==1)?"his":"her";?> absence not recommemded for the following reasons
		
			......................................................................................................................................................................................................................................................
			<br />	<br />
			</td>
		</tr>
		<tr>
			<td>
				<?php echo ($model->staff->gender_id==1)?"His":"Her";?> duties will be performed by:
				
				<table  style="width:100%;">
					<tr>
						<td class="stamp1"> 
							<div class="stamp">
								Official stamp <br /><br /><br />
							</div>
							HOD/Reporting Officer <?php echo $model->hod->fullName();?>
						</td>
						<td></td>
						<td>Name:..........................................<br /><br />
							
							Designation:............................<br /><br />
							Payroll Number:................................<br /><br />
							Date: _____/_____/_____________<br /><br />
							Signature.........................................................
						</td>
					</tr>
				</table>
				
			</td>
		</tr>
		<tr><td><br /><br /> </td></tr>
		<tr><th class="bordered-bottom" >FOR OFFICIAL USE ONLY</th></tr>
		<tr>
			<td>
				<table class="table preview bordered bordered padd" width="100%"> 
					
					<tr><td>
						Total leave due in the current year <b><?php echo date('Y');?> is <?php echo $model->total_days;?></b> <?php echo ($model->total_days>1)?"days":"day";?> less 
						<b><?php echo $model->taken_days;?></b> <?php echo ($model->taken_days>1)?"days":"day";?> applied for commencing on <?php echo EmployeeLeave::formatDate($model->start_date);?> to resume duty on <?php echo EmployeeLeave::formatDate($model->report_date);?>.
					Balance to be utilized before the end of the current year <b><?php echo date('Y');?></b> is <b><?php echo $model->rem_days;?></b> <?php echo ($model->rem_days>1)?"days":"day";?>.</td></tr>
					<tr><td class="underline"> Application for leave is in order</td></tr>
					<tr><td>Signature.........................................................Date: _____/_____/_____________</td></tr>
					<tr><td>Application for leave is approved/not approved______________________________________</td></tr>
					<tr><td>Signature.........................................................Date: _____/_____/_____________</td></tr>
					<tr><td class="center"><u>FOR VICE-CHANCELLOR</u></td></tr>
				</table>
			</td>
		</tr>
	</table>
</div>



