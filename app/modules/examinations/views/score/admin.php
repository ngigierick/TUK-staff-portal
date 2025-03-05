<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);
?>


<h1><?php echo Yii::t('app', 'Students Score List'); ?></h1>


<br/>

<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 
?>
	

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'score-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'type'=>'striped bordered condensed',
	'columns' => array(

		
		
		array(
				'name'=>'student_reg',
				'value'=>'GxHtml::valueEx($data->studentReg)',
				//'filter'=>GxHtml::listDataEx(Student::model()->findAllAttributes(null, true)),
				),
		'course_unit',
		array(
				'header'=>'Course Description',
				'name'=>'course_unit',
				'value'=>'GxHtml::valueEx($data->courseUnit)',
				'filter'=>'',
		),
		
		
		'year_of_study',
		'marks_obtained',
		//'hours',
		'grade',
		/*
		'semester_of_study',
		'marks_obtained',
		'marks_total',
		'grade',
		'status',
		'remarks',
		'date_modified',
		*/
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
		),
	),
)); ?>
