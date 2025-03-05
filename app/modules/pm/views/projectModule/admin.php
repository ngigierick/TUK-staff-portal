<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);
?>


<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>



<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Create a '.$model->label(),
    'type'=>'info', 
    'size'=>'mini', 
	'url'=>array('create'),
)); ?>
	

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'project-module-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'type'=>'striped bordered condensed',
	'columns' => array(
		'name',
		'start_date',
		'end_date',
		'completion_stage',
	
			array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
			'template'=>'{view}{update}{createactivity}{delete}',
			'buttons'=>array(
             
					'view' => array(
					'label'=>'View',
			
					),
					'update' => array(
					'label'=>'Update',
					'visible'=>'(Yii::app()->user->role===1)?true:false',
					),
					
					'createactivity' => array(
					'label'=>'Add Task',
					'url' => 'Yii::app()->createUrl("//pm/projectModuleTask/create", array("id"=>$data->id))',
					'icon'=>'plus',
					'visible'=>'(Yii::app()->user->role===1)?true:false',
					
					),
					
					'delete' => array(
					'label'=>'Delete',
					'visible'=>'(Yii::app()->user->role===1)?true:false',
					),
				)
		),
	),
)); ?>
