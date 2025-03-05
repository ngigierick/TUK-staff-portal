<div class="transcript">
<h1><?php echo $university;?></h1>
<h1><?php echo $title;?></h1>
<table>
<tr>
<td><b>Faculty:</b> <?php echo $student->studentReg->programme->department->school->faculty;?></td>
<td><b>Programme:</b> <?php echo $student->studentReg->programme;?></td>
</tr>
<tr>
<td><b>Student Name:</b> <?php echo $student->studentReg->surname.' '.$student->studentReg->firstname.' '.$student->studentReg->othername;?></td>
<td><b>Reg. Number:</b><?php echo $student->studentReg;?></td>
</tr>
<tr>
<td><b>Year of Birth:</b><?php echo $student->studentReg;?></td>
<td><b>Year of Admission:</b><?php echo $student->studentReg;?></td>
</tr>
<tr>
<td><b>Academic Record for Year:</b> <?php echo $student->year_of_study;?></td>
<td><b>Date Processed:</b><?php echo $student->studentReg;?></td>
</tr>
</table>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'score-grid',
	'dataProvider' => $scores,
	//'filter' => $model,
	'type'=>'striped bordered condensed',
	'enableSorting' => false,
	'summaryText'=>'',
	'columns' => array(

		array(
				'name'=>'courseUnit',
				'header'=>'Course Code',
				'value'=>'$data->courseUnit->code',
				//'filter'=>GxHtml::listDataEx(CourseUnit::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'course_unit_id',
				'header'=>'Course Description',
				'value'=>'GxHtml::valueEx($data->courseUnit)',
				//'filter'=>GxHtml::listDataEx(CourseUnit::model()->findAllAttributes(null, true)),
			),
		'hours',
		'marks_obtained',
		//'marks_total',
		'grade',
		//'remarks',
		/*
		'semester_of_study',
		'marks_obtained',
		'marks_total',
		'grade',
		'status',
		'remarks',
		'date_modified',
		*/
		
	),
)); ?>

<hr/>

<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm',
		array(
		'action'=>Yii::app()->createUrl('//examinations/score/studentTranscript/format/pdf')
		)
	); 

?>

<?php $model->student_reg = $student->studentReg; echo $form->hiddenField($model, 'student_reg'); ?>
<?php $model->year_of_study = $student->year_of_study; echo $form->hiddenField($model, 'year_of_study'); ?>


<i> 
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Export to PDF & Print',
    'type'=>'danger', 
	'buttonType'=>'submit',
    'size'=>'small', 
	//'url'=>array('studentTranscript','format'=>'pdf'),
)); 
?>
<?php
$this->endWidget();
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm',
		array(
		'action'=>Yii::app()->createUrl('//examinations/score/studentTranscript/format/excel')
		)
	); 

?>

<?php $model->student_reg = $student->studentReg; echo $form->hiddenField($model, 'student_reg'); ?>
<?php $model->year_of_study = $student->year_of_study; echo $form->hiddenField($model, 'year_of_study'); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Export to Excel Sheet',
    'type'=>'success', 
	'buttonType'=>'submit',
    'size'=>'small', 

)); 
?>
</i>
<?php
$this->endWidget();
?>
<br/><br/>
</div>