<?php
$this->breadcrumbs=array(
	'Audit Trails'=>array('/auditTrail'),
	'Manage',
);
/*
$this->menu=array(
	array('label'=>'List AuditTrail', 'url'=>array('index')),
	array('label'=>'Create AuditTrail', 'url'=>array('create')),
);
*/
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('audit-trail-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php $this->widget('bootstrap.widgets.TbLabel', array(
    'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>'The System Audit Trail',
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'user-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'type'=>'striped bordered condensed',
	'columns' => array(
		'id',
		array(
		'name'=>'user_id',
		'value'=>'$data->user->name',
		'filter'=>GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),
		),
		'old_value',
		'new_value',
		'action',
		'model',
		'field',
		'stamp',
	
		
	),
)); ?>
