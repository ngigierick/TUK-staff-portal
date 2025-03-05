<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />

<div class="transcript">
<br/><br/><br/><br/><br/><br/>

<table>
<tr>
<td><b class="no-print">Faculty:</b> <?php echo $student->studentReg->programme->department->school->faculty;?></td>
<td><b class="no-print">Programme:</b> <?php echo $student->studentReg->programme;?></td>
</tr>
<tr>
<td><b class="no-print">Student Name:</b> <?php echo $student->studentReg->surname.' '.$student->studentReg->firstname.' '.$student->studentReg->othername;?></td>
<td><b class="no-print">Reg. Number:</b><?php echo $student->studentReg;?></td>
</tr>
<tr>
<td><b class="no-print">Year of Birth:</b><?php echo $student->studentReg;?></td>
<td><b class="no-print">Year of Admission:</b><?php echo $student->studentReg;?></td>
</tr>
<tr>
<td><b class="no-print">Academic Record for Year:</b> <?php echo $student->year_of_study;?></td>
<td><b class="no-print">Date Processed:</b><?php echo $student->studentReg;?></td>
</tr>
</table>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'score-grid',
	'dataProvider' => $scores,
	'enableSorting' => false,
	'type'=>'striped bordered condensed',
	'summaryText'=>'',
	'columns' => array(

		array(
				'name'=>'courseUnit',
				'header'=>'',
				'value'=>'$data->courseUnit->code',
				//'filter'=>GxHtml::listDataEx(CourseUnit::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'course_unit_id',
				'header'=>'',
				'value'=>'GxHtml::valueEx($data->courseUnit)',
				//'filter'=>GxHtml::listDataEx(CourseUnit::model()->findAllAttributes(null, true)),
			),
		array(
				'name'=>'hours',
				'header'=>'',
				'value'=>'$data->hours',
				//'filter'=>GxHtml::listDataEx(CourseUnit::model()->findAllAttributes(null, true)),
			),
		array(
				'name'=>'marks_obtained',
				'header'=>'',
				'value'=>'$data->marks_obtained',
				//'filter'=>GxHtml::listDataEx(CourseUnit::model()->findAllAttributes(null, true)),
			),
		array(
				'name'=>'grade',
				'header'=>'',
				'value'=>'$data->grade',
				//'filter'=>GxHtml::listDataEx(CourseUnit::model()->findAllAttributes(null, true)),
			),
		
	),
)); ?>

<i><?php //echo $generator;?></i>
<br/><br/>
</div>