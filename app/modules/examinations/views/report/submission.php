<h1><?php echo Yii::t('app', 'Examination Results Submission'); ?></h1>



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
	
<h3>Report Submission Log</h3>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'score-grid',
	'dataProvider' => $submission,
	//'filter' => $model,
	'type'=>'striped bordered condensed',
	'columns' => array(
	'class_code',
	'year_of_study',
	'total',
	'author0',
	'date_modified:datetime',

		
	),
)); ?>
