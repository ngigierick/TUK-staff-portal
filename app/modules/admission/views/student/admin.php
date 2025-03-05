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
	$.fn.yiiGridView.update('student-grid', {
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
	'id' => 'student-grid',
	'type'=>'striped bordered condensed',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		array(
				'header'=>'Full student name',
				'type'=>'raw',
				'value'=>'$data->title." ".$data->surname." ".$data->firstname." ".$data->othername',
			),
		'reg_number',
		array(
				'name'=>'semester_id',
				'value'=>'GxHtml::valueEx($data->semester)',
				'filter'=>GxHtml::listDataEx(Semester::model()->findAllAttributes(null, true)),
				),
		'programme_id',
		array(
				'name'=>'programme',
				'header'=>'Programme Name',
				'value'=>'GxHtml::valueEx($data->programme)',
				
			),
	
		
		/*'id_number',
		'surname',
		'firstname',
		'othername',
		array(
				'name'=>'programme_id',
				'value'=>'GxHtml::valueEx($data->programme)',
				'filter'=>GxHtml::listDataEx(Courseclass::model()->findAllAttributes(null, true)),
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
				'name'=>'district_id',
				'value'=>'GxHtml::valueEx($data->district)',
				'filter'=>GxHtml::listDataEx(District::model()->findAllAttributes(null, true)),
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
		'c_postal_address',
		'c_postcode',
		'c_town',
		'c_mobile',
		'c_email',
		'nok_surname',
		'nok_firstname',
		'nok_othername',
		array(
				'name'=>'nok_title_id',
				'value'=>'GxHtml::valueEx($data->nokTitle)',
				'filter'=>GxHtml::listDataEx(Title::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'nok_relation_id',
				'value'=>'GxHtml::valueEx($data->nokRelation)',
				'filter'=>GxHtml::listDataEx(Relationship::model()->findAllAttributes(null, true)),
				),
		'nok_postal_address',
		'nok_postcode',
		'nok_town',
		'nok_mobile',
		'nok_email',
		array(
				'name'=>'disability_id',
				'value'=>'GxHtml::valueEx($data->disability)',
				'filter'=>GxHtml::listDataEx(Answer::model()->findAllAttributes(null, true)),
				),
		'occupation',
		'employer',
		'employer_address',
		'employer_telephone',
		'employer_email',
		'employer_otherinfo',
		'extra_info',
		'status',
		'date_modified',
		'expected_completion_date',
		'photo',
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