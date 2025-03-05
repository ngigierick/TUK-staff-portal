<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'danger'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			
        ),
	)
); 

?>

<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	$model->regNumber->title." ".$model->regNumber->surname." ".$model->regNumber->firstname." ".$model->regNumber->othername,
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List all') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create new') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update this') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete this') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage the') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . '  ' . GxHtml::encode($model->label()) . ' for '.$model->semester;?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'striped condensed',
	'data' => $model,
	'attributes' => array(
	array(
				'name'=>'Student name',
				'value'=> $model->regNumber->title." ".$model->regNumber->surname." ".$model->regNumber->firstname." ".$model->regNumber->othername,
	),
	array(
				'name'=>'Registration Number',
				'value'=> $model->regNumber->reg_number,
		),
	array(
			'name' => 'semester',
			'type' => 'raw',
			'value' => $model->semester !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->semester)), array('semester/view', 'id' => GxActiveRecord::extractPkValue($model->semester, true))) : null,
			),
	'date_modified:datetime',
	),
)); 
$this->renderPartial('_feeitems_view', array('feeitems'=>$feeitems));
?>


