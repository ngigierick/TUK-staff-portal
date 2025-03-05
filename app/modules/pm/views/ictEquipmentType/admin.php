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
    'label'=>'Manage ICT Equipment',
    'type'=>'success', 
    'icon'=>'list',
    'size'=>'mini', 
	'url'=>array('//pm/ictEquipment/admin'),
)); ?>	

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'ict-equipment-type-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'type'=>'striped bordered condensed',
	'columns' => array(
		//'id',
		'name',
		'date_modified:datetime',
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
		),
	),
)); ?>
