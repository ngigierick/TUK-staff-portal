<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);
?>

<h1>Successful Applicants</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'accepted-grid',
	'type'=>'striped bordered condensed',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'reg_number',
		array(
				//'name'=>'name',
				'header'=>'Full name',
				'value'=>'GxHtml::valueEx($data->title)." ".$data->surname." ".$data->firstname." ".$data->othername',
				//'filter'=>GxHtml::listDataEx(Title::model()->findAllAttributes(null, true)),
		),
		'postal_address',
		'postcode',
		'town',
		'mobile',
		/*array(
				//'name'=>'name',
				'header'=>'Postal Address',
				'value'=>'$data->postal_address." ".$data->postcode." ".$data->town',
				//'filter'=>GxHtml::listDataEx(Title::model()->findAllAttributes(null, true)),
		),
		'mobile',*/
		'programme',
			/*
		'othername',
		array(
				'name'=>'programme_id',
				'value'=>'GxHtml::valueEx($data->programme)',
				'filter'=>GxHtml::listDataEx(Courseclass::model()->findAllAttributes(null, true)),
				),
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
		'status',
		'date_modified',
		'photo',
		*/
		
		
	),
)); ?>