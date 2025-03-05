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
	$model->studentReg->title.' '.$model->studentReg->surname.' '.$model->studentReg->firstname.' '.$model->studentReg->othername,
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List all') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create new') . ' ' . $model->label(), 'url'=>array('pay')),
	///array('label'=>Yii::t('app', 'Update this') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	//array('label'=>Yii::t('app', 'Delete this') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage the') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<?php $title = 'Payment from '.$model->studentReg->title.' '.$model->studentReg->surname.' '.$model->studentReg->firstname.' '.$model->studentReg->othername; ?>
<h1><?php echo Yii::t('app', 'View') . '  ' . GxHtml::encode($model->label()) . ' | ' .$model->studentReg->title.' '.$model->studentReg->surname.' '.$model->studentReg->firstname.' '.$model->studentReg->othername; ?></h1>

<div class="receipt">
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'striped condensed bordered',
	'data' => $model,
	'attributes' => array(
array(
			'name' => 'studentReg',
			'type' => 'raw',
			'value' => $model->studentReg !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->studentReg)), array('/admission/student/view', 'id' => GxActiveRecord::extractPkValue($model->studentReg, true))) : null,
			),
'receiptnumber',
array(
			'name' => 'bankAccount',
			'type' => 'raw',
			'value' => $model->bankAccount !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->bankAccount)), array('/setup/bankaccount/view', 'id' => GxActiveRecord::extractPkValue($model->bankAccount, true))) : null,
			),
'bankslip',
'amount',
'amount_in_words',
'date_modified:datetime',
'status',
'cashier',
	),
)); ?>
</div>
<div class="form-actions">
 <?php $this->widget('application.extensions.print.printWidget', array(
                   'title'=>$title,
				   'cssFile' => 'print.css',
                   'printedElement'=>'.receipt',
				   ));
  ?>
  Print Receipt
</div>