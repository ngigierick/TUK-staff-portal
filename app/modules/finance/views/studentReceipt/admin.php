<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<?php
Yii::app()->clientScript->registerScript('search', "

jQuery.fn.clear = function()
{
    var form = $(this);

    form.find('input:text, input:password, input:file, textarea').val('');
    form.find('select option:selected').removeAttr('selected');
    form.find('input:checkbox, input:radio').removeAttr('checked');

    return this;
};

$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});

$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('student-invoice-grid', {
		data: $(this).serialize()
	});
	return false;
});

$('.clear-button').on('click',function(){
	$('.search-form,.filters').clear();
});
");

?>



<div class='btn-group'>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Receipt a Student',
    'type'=>'success', 
    'size'=>'medium', 
	'url'=>array('pay'),
)); 
?>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn btn-info')).CHtml::link('Clear Search','#',array('class'=>'btn btn-warning clear-button')) ?></div>
<div class="search-form well-small" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'student-receipt-grid',
	'type'=>'striped bordered condensed bordered',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		array(
				'name'=>'student_reg',
				'value'=>'GxHtml::valueEx($data->studentReg)',
				'filter'=>GxHtml::listDataEx(Student::model()->findAllAttributes(null, true)),
				),
		'receiptnumber',
		array(
				'name'=>'bank_account_id',
				'value'=>'GxHtml::valueEx($data->bankAccount)',
				'filter'=>GxHtml::listDataEx(BankAccount::model()->findAllAttributes(null, true)),
				),
		'bankslip',
		'amount',
		/*
		'date_modified',
		'status',
		*/
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
			'buttons'=>array(
             
					'view' => array(
					'visible'=>'(Yii::app()->user->getState("role") === 2||Yii::app()->user->getState("role") === 1)',
					),
					'update' => array(
					'visible'=>'(Yii::app()->user->getState("role") === 2||Yii::app()->user->getState("role") === 1)',
					),
					'delete' => array(
					'visible'=>'(Yii::app()->user->getState("role") === 1)',
					),
					
				),
		),
	),
)); ?>