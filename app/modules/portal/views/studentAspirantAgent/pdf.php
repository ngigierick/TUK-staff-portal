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

<?php $title = "<h1 style='text-align:center;font-size:28px;margin:5px 0;'>".$aspirant->academicyear." SATUK GENERAL ELECTIONS</h1>";?>


<div class="wrapper1">

<div class="wrapper">
	<center>
	<h1 class="title">
	<?php echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/receipt.png','Passport photo not yet submitted',array('height'=>100,'class'=>'passport')); ?>
	</h1>
	<h1 class="title" style="font-size:20px;color:#111">THE TECHNICAL UNIVERSITY OF KENYA </h1>
	
	<p class="center"><span class="num">REF # <?php echo str_pad( $aspirant->id, 10, "0", STR_PAD_LEFT );?></span></p>
	<p class="center"><?php echo $title;?></p>
	</center>
	<h2>FORM 11: TO BE COMPLETED BY AGENT </h2>
	<table class="table preview bordered" width="100%">
	<tr>
		<td valign="top" colspan="2">
			<br/><br/>
			<center>
			I AM AN AGENT FOR <b><?php echo ($aspirant->gender_id==1)?' MR ':' MISS '; echo strtoupper($aspirant->surname.' '.$aspirant->firstname.' '.$aspirant->othername);?></b> 
				SEEKING A POSITION OF <b><?php echo strtoupper($aspirant->position);?>.</b> 
			<?php echo ($aspirant->gender_id==1)?' HIS ':' HER '; ?>STUDENT REGISTRATION NUMBER IS <b><?php echo $aspirant->reg_number;?></b>, 
			SCHOOL OF <b> <?php echo strtoupper($aspirant->school);?></b></center><br />
		</td>
	</tr>
	<tr><td colspan="2"><br /><br/>
	<center><b><i>NOTE THAT ONLY ONE AGENT IS REQUIRED PER POLLING STATION</i></b></center><br/>
	</td>
	</tr>
	
	<tr><td colspan="2">
	<br/>
	</td>
	</tr>
	<tr><td class="right">Surname/family name: </td><td class="upper"><?php echo $agent->surname;?></td></tr>
	<tr><td class="right">Given Name/First name: </td><td class="upper"><?php echo $agent->firstname;?></td></tr>		
	<tr><td class="right">Middle Name: </td><td class="upper"><?php echo $agent->othername;?></td></tr>
	<tr><td  class="right">SCHOOL:  </td><td class="upper"><?php echo $agent->school;?></td></tr>
	<tr><td class="right">Department:  </td><td  class="upper"><?php echo $agent->department;?></td></tr>
	<tr><td  class="right">Enrolled Program: </td><td  class="upper"> <?php echo $agent->programme;?> </td></tr>
	<tr><td class="right">Program year end : </td><td><?php echo $agent->programme_end;?></td></tr>
	<tr><td class="right">Phone Number: </td><td class="upper"> <?php echo $agent->mobile;?></td></tr>
	<tr><td class="right">E-mail Address: </td><td > <?php echo $agent->email;?></td></tr>
	<tr><td class="right"><b>MY STUDENT REGISTRATION NUMBER: </b></td><td  class="upper"><b> <?php echo $agent->reg_number;?></b>
	</td></tr>	
	<tr><td colspan="2"><br/><br/><br/><br/><hr /></td></tr>
	<tr>
		<td colspan="2">
			<b>By my signature below, the information I have given above is true and I should be disqualified if it is not.</b>
		</td>
	</tr>
	
	<tr><td colspan="2"><br /><br/><br/><br/></td></tr>
	<tr><td colspan="2" >Signature: ______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date: ______________________________	</td></tr>		
	<tr><td colspan="2"><hr /><br/><br/><br/><br/><br/><br/></td></tr>
	</table>

</div>
<h3 class="page">Page 2 of 12</h3>
</div>






