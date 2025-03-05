<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 

?>
<h1>Successful Applicants</h1>

<h2>Total number of applicants: <?php echo $dataProvider->getItemCount();?></h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'applicant-grid',
	//'type'=>'striped bordered condensed',
	'dataProvider' => $dataProvider,
	//'filter' => $model,
	'columns' => array(

		array(
				'name'=>'name',
				'header'=>'Full name',
				'value'=>'GxHtml::valueEx($data->title)." ".$data->surname." ".$data->firstname." ".$data->othername',
				'filter'=>GxHtml::listDataEx(Title::model()->findAllAttributes(null, true)),
				),
		'reg_number',
		'gender',
		'county',
		'id_number',
		'date_modified:datetime',
		array(
            'name'=>'status',
            'header'=>'APPLICANT STATUS',
            'filter'=>array('1'=>'Reported','0'=>'Waiting'),
            'value'=>'($data->status=="1")?("Reported"):("Waiting")'
			),
		
		/*
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
		'photo',
		'status',
		'date_modified',
		*/
	
	),
)); ?>
