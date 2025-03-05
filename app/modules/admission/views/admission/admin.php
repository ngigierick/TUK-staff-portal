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
	$.fn.yiiGridView.update('admission-grid', {
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
    'label'=>'Admit Student',
    'type'=>'success', 
    'size'=>'medium', 
	'url'=>array('admit'),
)); 
?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Verify Admission Requirements',
    'type'=>'danger', 
    'size'=>'medium', 
	'url'=>array('verify'),
)); 
?>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn btn-info')).CHtml::link('Clear Search','#',array('class'=>'btn btn-warning clear-button')) ?></div>
<div class="search-form well-small" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
	

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'admission-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'type'=>'striped bordered condensed bordered',
	'columns' => array(
		array(
				'name'=>'id',
				'value'=>'$data->id',
				'header'=>'#',
				),
		array(
				'name'=>'semester_id',
				'value'=>'GxHtml::valueEx($data->semester)',
				'filter'=>GxHtml::listDataEx(Semester::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'reg_number',
				'value'=>'GxHtml::valueEx($data->regNumber)',
				),
		array(
				'header'=>'Course',
				'value'=>'GxHtml::valueEx($data->regNumber->programme)',
				),
		'year_of_study',
		'semester_of_study',
		'date_modified:datetime',
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
		),
	),
)); ?>
