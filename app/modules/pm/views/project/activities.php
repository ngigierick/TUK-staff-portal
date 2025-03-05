<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);
?>


<h1><?php echo Yii::t('app', 'Latest ') . ' ' . GxHtml::encode($model->label(2)); ?></h1>



<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'project-activity-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'type'=>'striped bordered condensed',
	'columns' => array(
		array(
				'name'=>'date_added',
				
				'filter'=>'',
				),
		'content:html',
		array(
				'name'=>'phase_id',
				'value'=>'GxHtml::valueEx($data->phase)',
				'filter'=>'',
				),
		array(
				'name'=>'author_id',
				'value'=>'GxHtml::valueEx($data->author)',
				'filter'=>'',
				),
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
			'template'=>'{view}',
			'buttons'=>array(
				'view' => array(
					'label'=>'View Project Phase for this Activity',
					'url' => 'Yii::app()->createUrl("//pm/project/view", array("id"=>$data->phase->id))',
					'icon'=>'arrow-up',
					
				),
			)
			
			
		),

	),
)); ?>


<br /><br />