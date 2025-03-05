<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 

?>

<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	$model->name,
);
?>

<h1><?php echo Yii::t('app', 'View') . '  ' . GxHtml::encode($model->label()) . ' | ' . GxHtml::encode($model->name); ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'striped condensed',
	'data' => $model,
	'attributes' => array(
'id',
'name',
'notes',
array(
			'name' => 'pa',
			'type' => 'raw',
			'value' => $model->pa !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->pa)), array('feecategory/view', 'id' => GxActiveRecord::extractPkValue($model->pa, true))) : null,
			),
	),
)); ?>

