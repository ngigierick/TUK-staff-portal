<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);
?><?php

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
	$.fn.yiiGridView.update('programme-grid', {
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
    'label'=>'Create  '.$model->label(),
    'type'=>'success', 
    'size'=>'medium', 
	'url'=>array('create'),
)); 
?>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn btn-info')).CHtml::link('Clear Search','#',array('class'=>'btn btn-warning clear-button')) ?></div>
<div class="search-form well-small" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'programme-grid',
	'type'=>'striped bordered condensed',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'name',
		'department_id',
		array(
				'name'=>'department_id',
				'value'=>'GxHtml::valueEx($data->department)',
				'filter'=>GxHtml::listDataEx(Department::model()->findAllAttributes(null, true)),
				),
		'code',
		array(
				'name'=>'type_id',
				'value'=>'GxHtml::valueEx($data->type)',
				'filter'=>GxHtml::listDataEx(ProgrammeType::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'duration_id',
				'value'=>'GxHtml::valueEx($data->duration)',
				'filter'=>GxHtml::listDataEx(ProgrammeDuration::model()->findAllAttributes(null, true)),
				),
		/*
		'notes',
		'requirements',
		'date_modified',
		'status_id',
		*/
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
			'buttons'=>array(
             
					'view' => array(
					'visible'=>'(Yii::app()->user->getState("role") === 1)',
					),
					'update' => array(
					'visible'=>'(Yii::app()->user->getState("role") === 1)',
					),
					'delete' => array(
					'visible'=>'(Yii::app()->user->getState("role") === 1)',
					),
					
				),
		),
	),
)); ?>