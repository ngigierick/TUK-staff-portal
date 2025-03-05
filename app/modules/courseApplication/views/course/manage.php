<h1>APPLICATION FOR 2014 SEPTEMBER INTAKE </h1>
<br />
<h3>Manage the Course(s) You Have Applied for</h3>
<hr />
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Add Another Course',
    'type'=>'info', 
    'size'=>'mini', 
	'icon'=>'plus',
	'url'=>array('add'),
)); ?>
&nbsp;&nbsp;&nbsp;
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Close',
    'type'=>'warning', 
    'size'=>'mini', 
	'icon'=>'eye-close',
	'url'=>array('//courseApplication/default/profile'),
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'applicant-grid',
	'type'=>'striped bordered condensed',
	'dataProvider' => $courses,
	//'filter' => '',
	'columns' => array(
		'programme',
		array(
				'name'=>'date_modified',
				'header'=>'Date of application',
				//'value'=>'date("M j, Y g:i A", $data->date_modified)',
				'value'=>'date("d/m/Y g:i A", $data->date_modified)',
				//'filter'=>GxHtml::listDataEx(Courseclass::model()->findAllAttributes(null, true)),
				),
	
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
			'template'=>'{delete}',
			'buttons'=>array(
          
					'delete' => array(
					'visible'=>'($data->status ==0)&&(Yii::app()->user->getState("role") === 999)',
					),
					
				),
		),
	),
)); ?>