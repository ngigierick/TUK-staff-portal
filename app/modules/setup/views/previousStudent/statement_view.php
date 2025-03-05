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
	$model->surname.' '.$model->name1.' '.$model->name2,
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List all') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create new') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update this') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete this') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage the') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Financial Statement') . ' | ' . GxHtml::encode($model->surname.' '.$model->name1.' '.$model->name2); ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'striped condensed bordered',
	'data' => $model,
	'attributes' => array(
		'reg_number',
		'course_code',
		'course_year',
		array(
			'name' => 'Full name',
			'type' => 'raw',
			'value' => $model->surname." ".$model->name1." ".$model->name2,
		),
	'study_year',
	'study_term',

	array(
				'name' => 'module',
				'type' => 'raw',
				'value' => $model->module !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->module)), array('module/view', 'id' => GxActiveRecord::extractPkValue($model->module, true))) : null,
				),
	),
)); ?>

<table cellpadding="3" class="statement" border="1">
<tr class="header"><td>Transaction Ref</td><td>Date</td><td>Description</td><td align="right">Debit DR</td><td align="right">Credit CR</td><td align="right">Balance</td></tr>
<?php $this->widget('zii.widgets.CListView', array(
	'id' => 'previous-student-debit-grid',
	'dataProvider' => $credit,
	'itemView'=>'_credit',
)); ?>
<?php $this->widget('zii.widgets.CListView', array(
	'id' => 'previous-student-debit-grid',
	'dataProvider' => $debit,
	'itemView'=>'_debit',
)); ?>
<tr class="header"><td>Closing Balance</td><td></td><td></td><td></td><td></td><td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($this->total,"KES "); ?></td></tr>
</table>