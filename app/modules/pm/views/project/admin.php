<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);
?>


<h1><?php echo  GxHtml::encode($model->label(2)); ?></h1>
<hr />

	

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'project-phase-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'type'=>'striped bordered condensed',
	'columns' => array(
		'name',
		'date_added:datetime',
		'date_modified:datetime',
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
			'template'=>'{view}',
			
		),
	),
)); ?>
