<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);
?>


<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>



<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Register a Student for Course',
    'type'=>'info', 
    'size'=>'mini', 
	'url'=>array('create'),
)); ?>
	

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'course-registration-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'type'=>'striped bordered condensed',
	'columns' => array(
		//'id',
		array(
				'name'=>'semester_id',
				'value'=>'GxHtml::valueEx($data->semester)',
				'filter'=>GxHtml::listDataEx(Semester::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'student_reg',
				'header'=>'Reg. No',
				'value'=>'GxHtml::valueEx($data->studentReg)',
				//'filter'=>GxHtml::listDataEx(Student::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'student_reg',
				'header'=>'Student Name',
				'value'=>'$data->studentReg->firstname." ".$data->studentReg->surname." ".$data->studentReg->othername',
				//'filter'=>GxHtml::listDataEx(Student::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'course_unit_id',
				'header'=>'Course Code',
				'value'=>'$data->courseUnit->code',
				//'filter'=>GxHtml::listDataEx(CourseUnit::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'course_unit_id',
				'header'=>'Course Description',
				'value'=>'$data->courseUnit->name',
				//'filter'=>GxHtml::listDataEx(CourseUnit::model()->findAllAttributes(null, true)),
				),
		//'status',
		//'date_modified',
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
		),
	),
)); ?>
