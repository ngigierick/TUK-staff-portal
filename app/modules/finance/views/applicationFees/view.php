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
	$model->surname.' '.$model->firstname.' '.$model->othername,
);
?>

<h1><?php echo Yii::t('app', 'View') . '  ' . GxHtml::encode($model->label()) . ' | ' .GxHtml::valueEx($model->salutation).' '.GxHtml::encode($model->surname.' '.$model->firstname.' '.$model->othername); ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'striped condensed bordered',
	'data' => $model,
	'attributes' => array(
'id',
array(
			'name' => 'academicyear',
			'type' => 'raw',
			'value' => $model->academicyear !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->academicyear)), array('academicyear/view', 'id' => GxActiveRecord::extractPkValue($model->academicyear, true))) : null,
			),
array(
			'name' => 'programmeCode',
			'type' => 'raw',
			'value' => $model->programmeCode !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->programmeCode)), array('courseclass/view', 'id' => GxActiveRecord::extractPkValue($model->programmeCode, true))) : null,
			),
'surname',
'firstname',
'othername',
array(
			'name' => 'bankAccount',
			'type' => 'raw',
			'value' => $model->bankAccount !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->bankAccount)), array('bankaccount/view', 'id' => GxActiveRecord::extractPkValue($model->bankAccount, true))) : null,
			),
'bankslip',
'amount',
'date_modified:datetime',
'status',
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'list',
    'items'=>array(
		array('label'=>'APPLICATION NAVIGATION LINKS'),
		array('label'=>Yii::t('app', 'Enter new') . ' ' . $model->label(), 
				'url'=>array('create'),
				'icon'=>'pencil',						
				'visible'=>Yii::app()->user->checkAccess(3),
				),
		array('label'=>Yii::t('app', 'Update this ') . ' ' . $model->label(), 
				'url'=>array('update', 'id' => $model->id),
				'icon'=>'edit',						
				'visible'=>Yii::app()->user->checkAccess(3),
				),
		array('label'=>Yii::t('app', 'Delete this') . ' ' . $model->label(), 
				'url'=>'#', 
				'icon'=>'trash',
				'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?'),
				'visible'=>Yii::app()->user->checkAccess(1),
				),
		array('label'=>Yii::t('app', 'Manage the') . ' ' . $model->label(2), 
				'url'=>array('admin'),
				'icon'=>'th',						
				'visible'=>Yii::app()->user->checkAccess(3),
				),
	),

));?>

