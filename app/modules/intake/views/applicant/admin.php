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
	$.fn.yiiGridView.update('applicant-grid', {
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
    'label'=>'Enroll an  '.$model->label(),
    'type'=>'success', 
    'size'=>'medium', 
	'url'=>array('enroll'),
)); 
?>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn btn-info')).CHtml::link('Clear Search','#',array('class'=>'btn btn-warning clear-button')) ?></div>
<div class="search-form well-small" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'applicant-grid',
	'type'=>'striped bordered condensed',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		array(
				'name'=>'programme_id',
				'value'=>'GxHtml::valueEx($data->programme)',
				'filter'=>GxHtml::listDataEx(Programme::model()->findAllAttributes(null, true)),
			 ),
		array(
				'name'=>'title_id',
				'value'=>'GxHtml::valueEx($data->title)',
				'filter'=>GxHtml::listDataEx(Title::model()->findAllAttributes(null, true)),
				),
		'surname',
		'firstname',
		array(
				'name'=>'date_modified',
				//'value'=>'date("M j, Y g:i A", $data->date_modified)',
				'value'=>'date("d/m/Y g:i A", $data->date_modified)',
				//'filter'=>GxHtml::listDataEx(Courseclass::model()->findAllAttributes(null, true)),
				),
	
		/*
		array(
				'name'=>'academicyear_id',
				'value'=>'GxHtml::valueEx($data->academicyear)',
				'filter'=>GxHtml::listDataEx(Academicyear::model()->findAllAttributes(null, true)),
				),
		'dob',
		array(
				'name'=>'gender_id',
				'value'=>'GxHtml::valueEx($data->gender)',
				'filter'=>GxHtml::listDataEx(Gender::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'marital_status_id',
				'value'=>'GxHtml::valueEx($data->maritalStatus)',
				'filter'=>GxHtml::listDataEx(Maritalstatus::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'nationality_id',
				'value'=>'GxHtml::valueEx($data->nationality)',
				'filter'=>GxHtml::listDataEx(Nationality::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'county_id',
				'value'=>'GxHtml::valueEx($data->county)',
				'filter'=>GxHtml::listDataEx(County::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'ethnicity_id',
				'value'=>'GxHtml::valueEx($data->ethnicity)',
				'filter'=>GxHtml::listDataEx(Ethnicity::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'religion_id',
				'value'=>'GxHtml::valueEx($data->religion)',
				'filter'=>GxHtml::listDataEx(Religion::model()->findAllAttributes(null, true)),
				),
		'postal_address',
		'postcode',
		'town',
		'mobile',
		'email',
		array(
				'name'=>'disability_id',
				'value'=>'GxHtml::valueEx($data->disability)',
				'filter'=>GxHtml::listDataEx(Answer::model()->findAllAttributes(null, true)),
				),
		'occupation',
		'employer',
		'employer_address',
		'employer_telephone',
		'employer_otherinfo',
		'extra_info',
		'photo',
		'status',
		'date_modified',
		*/
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
			'buttons'=>array(
             
					'view' => array(
					'visible'=>'(Yii::app()->user->getState("role") === 3||Yii::app()->user->getState("role") === 1)',
					),
					'update' => array(
					'visible'=>'(Yii::app()->user->getState("role") === 3||Yii::app()->user->getState("role") === 1)',
					),
					'delete' => array(
					'visible'=>'(Yii::app()->user->getState("role") === 1)',
					),
					
				),
		),
	),
)); ?>