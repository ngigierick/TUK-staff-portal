<style>
/* printing */
body{
	font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
	font-size:13px;
}
table.bordered{

}
.upper{
	text-transform:uppercase;
	color:#555;
}
.home table td{
	font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
	font-size:13px;
	padding:2px 2px 2px 0px;

	
}
p{
	font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
	font-size:13px;
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
.center{
	text-align:center;
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
	border:0px solid #dedede;
	text-align:center;
}
h3.page{
	
	text-align:center;
	font-size:15px;
	color:#222;
	bottom:20px;
	position:absolute;
}
.underline{
	
	border-bottom:1px solid #333;
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
	
	<p class="center"><span class="num">REF # <?php echo str_pad( $model->id, 10, "0", STR_PAD_LEFT );?></span></p>
	<h2 class="upper center underline">Student Death and Funeral Annoucement</h2>
	<br /><br />
	<div class="profile center">
			<?php 
				
				//structure passport photo url
				if (empty($model->photo))
				$photo = str_replace("/", "-", $model->reg_number).'.JPG';
				else $photo = $model->photo;
				echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/passports/'.$photo,'Passport photo not yet submitted',array('height'=>150,'class'=>'passport')); 

			?>
			</div>
	</center>
	
	<p>It is with great sorrow that we announce the passing of <b><?php echo $model->regNumber->surname.' '.$model->regNumber->firstname.' '.$model->regNumber->othername;?></b> a student at the school of <b><?php echo $model->regNumber->programme->department->school;?></b> in the department of <b><?php echo $model->regNumber->programme->department;?> </b>with the Registration Number <b><?php echo $model->reg_number;?></b>.</p>
	<p><?php echo ($model->regNumber->gender_id==1)?'He was the son of ':'She was the daughter of ';?> Mr <?php echo $model->father_name;?> and Mrs <?php echo $model->mother_name;?>. The burial will be held on <?php echo date('l, jS of F Y', strtotime($model->burial_date));?>at <?php echo $model->burial_location;?>.</p>
	
	
	
	<p>The following students will accompany <?php echo ($model->regNumber->gender_id==1)?'him ':'her ';?>for the burial:</p>
	<table border="1">
		<tr>
			<th>Student Name</th>
			<th>Reg. No</th>
			<th>Department</th>
		</tr>
		<tr>
			<td>1- <?php echo $model->regNumber1->surname.' '.$model->regNumber1->firstname.' '.$model->regNumber1->othername;?></td>
			<td><?php echo $model->regNumber1->reg_number;?></td>
			<td><?php echo $model->regNumber1->programme->department;?></td>
		</tr>
		<tr>
			<td>2- <?php echo $model->regNumber2->surname.' '.$model->regNumber2->firstname.' '.$model->regNumber2->othername;?></td>
			<td><?php echo $model->regNumber2->reg_number;?></td>
			<td><?php echo $model->regNumber2->programme->department;?></td>
		</tr>
	</table>
	
	<p> We wish to send heartfelt condolences to the bereaved family, relatives and friends.</p>
	
	
	<p><br/></p><p><br/></p>
	
	<p>Chairman of Department: ______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date: ______________________________</p>
	<p>Class Tutor: ______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date: _________________________________________</p>
	<p>Official Stamp: _______________________________________________________________________________________________</p>
</div>

</div>


