<style>
/* printing */
body{
	font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
	font-size:13px;
}
table.staff_div{
	width:100%;
	margin-bottom: 10px;
}
table.staff_div tr td, .span{
	border:1px solid #dedede;
}
 table td, .span{
	font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
	font-size:12px;
	padding:5px 2px;
	border:1px solid #dedede;
	
}
.span{
	float:left;
}
table.staff_div td.picture{
	border:1px solid #777;
	z-index:100;
	
}

table th{
	text-align:left;
	text-transform:uppercase;
	color:#333;
	padding:7px 2px;
}
td.header, div.header{
	
	font-weight:bold;
	text-transform:uppercase;
	color:#efefef;
	background:#777;
	
}
div.header{
	width:100%;
}
span.num{
	color:#888;
	font-style:italic;
	font-size:14px;
}
.home{
	
	line-height:1.2;
	text-transform:uppercase;
	margin-bottom:10px;
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
.home legend{
	font-size:17px;

}
.passport1{
	
	border:1px solid #dedede;
}


/* end print */
</style>
<?php if (empty($st)):?>
	<center>
	<p class="center">	<?php echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/receipt.png','no photo',array('height'=>100,'class'=>'passport')); ?></p>
	<h1 class="title" style="font-size:20px;color:#b0a242">THE TECHNICAL UNIVERSITY OF KENYA </h1>
	<p class="center">Haile Selassie Avenue, P.O. Box 52428, Nairobi, 00200, Tel +254(020) 343672, 2249974, 2251300, 341639</p>
	<p class="center">Fax 2219689, Email: vc@tukenya.ac.ke, Website: www.tukenya.ac.ke</p>
	</center>
<?php endif;?>