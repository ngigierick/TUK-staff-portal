
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


<h1>Successful Invoice Generation</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'student-invoice-grid',
	'type'=>'striped bordered condensed',
	'dataProvider' => $dataProvider,
	'columns' => array(
		array(
				'header'=>'Full student name',
				'type'=>'raw',
				'value'=>'$data->title." ".$data->surname." ".$data->firstname." ".$data->othername',
				),
		array(
				'name'=>'programme_id',
				'value'=>'GxHtml::valueEx($data->programme)',
				),
		'date_modified:datetime',
		
	),
)); ?>