<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'student-grid-1',
	'type'=>'striped bordered condensed',
	'dataProvider' => $inbox,
	//'filter' => $inbox,
	'columns' => array(
		'subject',
		array(
				'name'=>'staff',
				'header'=>'Sent By',
				'value'=>'$data->sender',
				'type'=>'raw',
				),
		array(
				'name'=>'status',
				'value'=>'$data->status()',
				'type'=>'raw',
				),
		'date_modified:datetime',
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
			'template'=>'{view}',
		),
	),
)); ?>
<hr /><br /><br />