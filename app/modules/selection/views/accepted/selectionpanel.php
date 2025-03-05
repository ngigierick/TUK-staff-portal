<h1><?php echo $title;?></h1>
<h2>Total number of applicants: <?php echo $dataProvider->getItemCount();?></h2>
<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'searchForm',
    'type'=>'search',
    'htmlOptions'=>array('class'=>'well'),
)); 
?>
<?php echo $form->errorSummary($model); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'applicant-grid',
	//'type'=>'striped bordered condensed',
	'dataProvider' => $dataProvider,
	//'filter' => $model,
	'columns' => array(
		
		array(
            'header'=>'Approve',
			'id'=>'id',
			'name'=>'id',
            'class'=>'CCheckBoxColumn',
            'selectableRows' => '100',   
        ),
		array(
				'name'=>'name',
				'header'=>'Full name',
				'value'=>'GxHtml::valueEx($data->title)." ".$data->surname." ".$data->firstname." ".$data->othername',
				'filter'=>GxHtml::listDataEx(Title::model()->findAllAttributes(null, true)),
				),
		'gender',
		'programme',
		'disability',
		'id_number',
		'date_modified:datetime',
		array(
            'name'=>'status',
            'header'=>'APPLICATION STATUS',
            'filter'=>array('1'=>'Processed','0'=>'Pending'),
            'value'=>'($data->status=="1")?("Processed"):("Pending")'
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
<?php echo GxHtml::submitButton(Yii::t('app', 'Approve selected applicants'));?>
<?php $this->endWidget(); ?>

<?php $this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'list',
    'items'=>array(
		array('label'=>'APPLICATION NAVIGATION LINKS'),
		array('label'=>Yii::t('app', 'Mass selection Panel'), 
				'url'=>array('allapplicants'),
				'icon'=>'pencil',						
				'visible'=>Yii::app()->user->checkAccess(3),
				),
		array('label'=>Yii::t('app', 'Manage the Successful Applicants'), 
				'url'=>array('admin'),
				'icon'=>'th',						
				'visible'=>Yii::app()->user->checkAccess(3),
				),
		array('label'=>Yii::t('app', 'Successful Applicants with Contacts'), 
				'url'=>array('list'),
				'icon'=>'th',						
				'visible'=>Yii::app()->user->checkAccess(3),
				),
	),

));?>