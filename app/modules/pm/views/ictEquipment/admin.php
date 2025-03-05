<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);
?>


<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>



<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Add New '.$model->label(),
    'type'=>'info', 
    'icon'=>'plus',
    'size'=>'mini', 
	'url'=>array('create'),
)); ?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Manage Equipment Categories',
    'type'=>'success', 
    'icon'=>'list',
    'size'=>'mini', 
	'url'=>array('//pm/ictEquipmentType/admin'),
)); ?>
	

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'ict-equipment-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'type'=>'striped bordered condensed',
	'columns' => array(
		//'id',
		array(
				'name'=>'type_id',
				'value'=>'GxHtml::valueEx($data->type)',
				'filter'=>GxHtml::listDataEx(IctEquipmentType::model()->findAllAttributes(null, true)),
				),
		'common_name',
		'description',
		'mac_address',
		//'date_modified',
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
		),
	),
)); ?>
