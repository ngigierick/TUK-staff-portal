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
	'id' => 'staff-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'type'=>'striped bordered condensed',
	'columns' => array(
		
		'surname',
		'firstname',
		'othername',
		'pf_number',		
		array(
				'name'=>'grade',
				'value'=>'GxHtml::valueEx($data->grade)',
				'filter'=>GxHtml::listDataEx(Grade::model()->findAllAttributes(null, true)),
		),
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
			'template'=>'{view}{update}{delete}',
			'buttons'=>array(
             
					'view' => array(
					'label'=>'View',
					),
					'update' => array(
					'label'=>'Update',
					'visible'=>'(Yii::app()->user->role===19)?true:false',
					),
					'delete' => array(
					'label'=>'Delete',
					'visible'=>'(Yii::app()->user->role===199)?true:false',
					),
			)
		),
	),
)); ?>
