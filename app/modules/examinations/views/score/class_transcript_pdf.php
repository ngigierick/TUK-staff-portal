<?php
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("Pragma: public");
header("Content-type:application/pdf");
header("Content-Disposition:attachment;filename=file.pdf");
?>

<style>
/* printing */
body{
	background-color:#efefef;
	font:78.25%/1.231  'lucida grande',tahoma,verdana,arial,sans-serif;
	font-size:13px;
	color:#333;
	line-height:2;
	margin: 0 auto;	
	/*background-image: url("../images/tuk.png");
	background-repeat: repeat-x;
	background-position: center center;
	background-attachment:fixed;*/
}
td.transcript-header{
	height:125px;
	padding:0px 2px !important;
	
}
table.labels{
	margin-left:15px;
	
}
.transcript h1, .transcript h2{
	text-align:center;
	
}

table.transcript,table.transcript-end{
	margin:0 0 0px 0;
	width:100%;
}
table.t-header{
	margin:0px 0 35px 0;
}
div.s-marks{
	height:555px;
	margin-top:45px;
	margin-left:20px;
}
table.transcript-end td{
	padding:0;
	margin:0;
}
table.transcript  td{
	font-size:11px;
	text-transform:uppercase;
	padding:2px 0px;
}
.no-print{
	
	color:#111;
}
td.code{
	width:100px;
	padding-left:10px;
}
td.code-name{
	width:400px;
	text-align:left;
	padding-left:0px;
}
td.hours{
	width:95px;
	text-align:left;
}
td.marks{
	text-align:left;
}
td.grade{
	text-align:left;
}
table.remarks td.proceed{
padding-left:130px;
padding-bottom:45px;
}
table.remarks td.date{
 font:78.25%/1.231  'Times New Roman',tahoma,verdana,arial,sans-serif !important;
 font-weight:bold;
 padding-left:45px;
 padding-bottom:100px;
 border:0px solid;
}
/* end print */
</style>

<?php for ($i=0;$i<count($students);$i++):?> 
	<table class="transcript t-header" id="page<?php echo $i;?>" >
	<tr><td class="transcript-header"></td></tr>
	</table>
	<table class="transcript labels">
	<tr>
	<td colspan="2"><b class="no-print">Faculty: </b> <?php echo $students[$i]->programme->department->school->faculty;?></td>
	</tr>
	<tr>
	<td colspan="2"><b class="no-print">Programme: </b> <?php echo $students[$i]->programme;?></td>
	</tr>
	<tr>
	<td><b class="no-print">Student Name: </b> <?php echo $students[$i]->surname.' '.$students[$i]->firstname.' '.$students[$i]->othername;?></td>
	<td><b class="no-print">Reg. Number: </b><?php echo $students[$i]->reg_number;?></td>
	</tr>
	<tr>
	<td><b class="no-print">Year of Birth: </b><?php $dob=explode('/',$students[$i]->dob); echo $dob[2];?></td>
	<td><b class="no-print">Year of Admission: </b><?php echo $students[$i]->semester;?></td>
	</tr>
	<tr>
	<?php
	
		//CONVERT INTEGERS TO WORDS
		switch($year_of_study)
		{
			case 1:$year='ONE'.$final;break;
			case 2:$year='TWO'.$final;break;
			case 3:$year='THREE'.$final;break;
			case 4:$year='FOUR'.$final;break;
			case 5:$year='FIVE'.$final;break;
			case 6:$year='SIX'.$final;break;
		}
		
		//CHECK WHETHER FINAL
	?>
	<td><b class="no-print">Academic Record for Year: </b> <?php echo $year;?></td>
	<td><b class="no-print">Date Processed: </b><?php echo date('d/m/Y');?></td>
	</tr>
	</table>
	<div class="s-marks">
	<?php foreach ($scores->getData() as $data => $singleRecord):?>
	
		<?php if($students[$i]['reg_number'] == $singleRecord->student_reg):?>
		<table class="transcript s-marks" >
		<tr>
			<td class="code"><?php echo $singleRecord->course_unit;?></td>
			<td class="code-name"><?php echo $singleRecord->courseUnit->name;?></td>
			<td class="hours"><?php echo $singleRecord->hours;?></td>
			<td class="marks"><?php echo $singleRecord->marks_obtained;?></td>
			<td class="grade"><?php echo $singleRecord->grade;?></td>
			<?php $processed = Score::model()->findByPk($singleRecord->id); $processed->status = 2; $processed->save();?>
		</tr>
		</table>
		<?php $remarks = $singleRecord->remarks;?>
		<?php endif;?>
		
	<?php endforeach;?>
	<table class="transcript-end"><tr><td><br/><?php for ($d=0;$d<117;$d++) echo '*';?></td><tr></table>
	</div>
	<table class="transcript remarks">
	<tr><td class="proceed"><?php echo $remarks;?></td></tr>
	<tr><td class="date"><?php echo date('F j, Y');?></td></tr>
	</table>
	
<?php endfor;?>

