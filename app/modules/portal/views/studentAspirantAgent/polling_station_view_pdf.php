<style>
/* printing */
body{
	font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
	font-size:12px;
}
table.bordered{

}
table td{
	font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
	font-size:11px;
	padding:2px 2px;
	text-transform:uppercase;
	border:1px solid #dedede;
	
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
	<h2><center><?php echo strtoupper($aspirant->surname.' '.$aspirant->firstname.' '.$aspirant->othername);?> | SEEKING A POSITION OF <b><?php echo strtoupper($aspirant->position);?></center></h2>
			
	<h2>SUMMARY LIST OF AGENT PER POLLING STATION </h2>
	<table class="table preview bordered" width="100%">
	<tr>
		<td>SN</td>
		<td>Agent Reg. Number</td>
		<td>Agent Full Name</td>
		<td>Polling Station</td>
		<td>Mobile</td>
	</tr>
	<?php $c=1;for($i=0;$i<count($agents);$i++):?>
		<tr>
			<td>
			<?php echo $c; $c++;?>
		</td>
		<td>
			<?php echo $agents[$i]->reg_number;?>
		</td>
		<td>
			<?php echo $agents[$i]->surname.' '.$agents[$i]->firstname.' '.$agents[$i]->othername;?>
		</td>
		<td>
			<?php echo $agents[$i]->pollingStation;?>
		</td>
		<td>
			<?php echo $agents[$i]->mobile;?>
		</td>
	</tr>
	<?php endfor;?>
</table>
</div>
</div>






