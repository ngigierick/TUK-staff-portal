<style>
/* printing */
body{
	font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
	font-size:12px;
}
.home table td{
	font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
	font-size:12px;
	padding:3px 2px;
	text-transform:uppercase;
	
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
	background: url("http:www.tukenya.ac.ke/sites/all/themes/tuk/images/css-images/faded-bg.jpg") no-repeat fixed center center #FFFFFF;
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

/* end print */
</style>

<?php for($i=0;$i<count($courses);$i++):?>

<?php //generate barcode 
//Widht of the barcode image. 
$width  = 284;  
//Height of the barcode image.
$height = 184;
//Quality of the barcode image. Only for JPEG.
$quality = 100;
//1 if text should appear below the barcode. Otherwise 0.
$text =1;
// Location of barcode image storage.
$location = Yii::getPathOfAlias("webroot").'/bc';
 
//Yii::import("application.extensions.barcode.*");                      

?>


<center>
<h1 class="title"><?php echo '<img src="http://portal.tukenya.ac.ke/images/receipt.png" style="align:center" height="100" >';?></h1>
<h1 class="title" style="font-size:20px;color:#666">THE TECHNICAL UNIVERSITY OF KENYA </h1>
<p class="center">Haile Selassie Avenue, P.O. Box 52428, Nairobi, 00200, Tel +254(020) 343672, 2249974, 2251300, 341639</p>
<p class="center">Fax 2219689, Email: vc@kenpoly.ac.ke, Website: www.tukenya.ac.ke</p>
<h2>APPLICATION FORM FOR 2014 SEPTEMBER INTAKE </h2>
<h2><?php $ref = $courses[$i]->app_ref; //barcode::Barcode39($ref, $width , $height , $quality, $text, $location);?><span class="num">APPLICANT REF #: <?php  echo $ref?></span></h2>
</center>

<div class="home">
<fieldset><legend>Personal Details</legend>
<hr />
<table class="table preview" width="100%">
<tr><td align="right" width="200"><b>Applicant Full Names: </b></td><td><?php echo $details->title;?> <?php echo $details->surname;?> <?php echo $details->firstname.' '.$details->othername;?></td></tr>
<tr><td align="right"><b>Course Applied for:</b> </td><td><?php echo $courses[$i]->programme;?></td></tr>
<tr><td align="right"><b>Course Code:</b> </td><td><?php echo $courses[$i]->programme_id;?></td></tr>
<tr><td align="right"><b>Module:</b> </td><td><?php echo $details->module;?></td></tr>
<tr><td align="right"><b>Birth Date:</b> </td><td><?php echo $details->dob;?></td></tr>
<tr><td align="right"><b>ID Number:</b> </td><td><?php echo $details->id_number;?></td></tr>
<tr><td align="right"><b>County:</b> </td><td><?php echo $details->county;?></td></tr>
</table>
</fieldset>

<fieldset><legend>Academic Qualifications</legend>
<hr />
<table class="table preview" width="100%">
<?php for($s=0;$s<count($academicQual);$s++):?>
	<?php if (!empty($academicQual[$s]->school)):?>
	<tr>
	<td align="right" width="200"><b><?php echo $academicQual[$s]->name;?>:</b></td>
	<td>
	<?php echo $academicQual[$s]->year;?>,
	<?php echo $academicQual[$s]->school;?>,
	<?php echo $academicQual[$s]->grade;?>,
	</td>
	</tr>
	<?php endif;?>
<?php endfor;?>
</table>
</fieldset>


<fieldset><legend>Contact Details</legend>
<hr />
<table class="table preview" width="100%">
<tr><td align="right" width="200"><b>Postal Address: </b></td><td> P.O. Box <?php echo $details->postal_address;?> <?php echo $details->postcode;?> <?php echo $details->town;?> </td></tr>
<tr><td align="right"><b>Mobile:</b></td><td> <?php echo $details->mobile;?></td></tr>
<tr><td align="right"><b>Email:</b></td><td class="email" style="text-transform:lowercase"> <?php echo $details->email;?></td></tr>
</table>
</fieldset>

<fieldset><legend>Applicant's Declaration</legend>
<hr />
<table class="table preview" width="100%">
<tr><td colspan="2">I hereby declare that the above information is complete and accurate to the best of my knowledge.<br /><br />
Sign:...................................................... Date:.....................................................
 </td>
 </tr>
</table>
</fieldset>
<br />
<fieldset><legend>For Official Use Only</legend>
<hr />
<table class="table preview" width="100%">
<tr><td ><?php echo CHtml::checkBox('Qualified');?>&nbsp;&nbsp;&nbsp;Qualified</td><td><?php echo CHtml::checkBox('Not Qualified');?>&nbsp;&nbsp;&nbsp;Not Qualified</td></tr>
</table>
</fieldset>
<br />
<fieldset><legend>IMPORTANT INSTRUCTIONS:</legend>
<hr />
<ul>
<li>First, sign the declaration part. Pay application fee KES 2, 000 at either Equity Bank or Co-operative Bank quoting <b><?php echo $ref;?></b> as Bank Reference.<b> No application will be considered without the Application REF # quoted on the Bank Slip.</b></li>
<li>Attach copies of your National ID/ Passport, Certificates, and relevant testimonials.</li>
<li>For all communications with the University, always quote the Ref # <b><?php echo $ref;?></b>. Remember to login to the portal to check for your application status.</li>
</ul>
</fieldset>

</div>
</div>
<?php endfor;?>

