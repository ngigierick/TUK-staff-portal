<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			 'danger'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			  'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 

?>

<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	$model->surname.' '.$model->firstname.' '.$model->othername,
);


?>

<h1><?php echo GxHtml::valueEx($model->title).' '.GxHtml::encode($model->surname.' '.$model->firstname.' '.$model->othername); ?></h1>

bbb
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'striped condensed bordered',
	'data' => $model,
	'attributes' => array(
'reg_number',
array(
			'name' => 'academicyear',
			'type' => 'raw',
			'value' => $model->academicyear !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->academicyear)), array('academicyear/view', 'id' => GxActiveRecord::extractPkValue($model->academicyear, true))) : null,
			),
array(
			'name' => 'semester',
			'type' => 'raw',
			'value' => $model->semester !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->semester)), array('semester/view', 'id' => GxActiveRecord::extractPkValue($model->semester, true))) : null,
			),
array(
			'name' => 'title',
			'type' => 'raw',
			'value' => $model->title !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->title)), array('title/view', 'id' => GxActiveRecord::extractPkValue($model->title, true))) : null,
			),
'id_number',
'surname',
'firstname',
'othername',
array(
			'name' => 'programme',
			'type' => 'raw',
			'value' => $model->programme !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->programme)), array('courseclass/view', 'id' => GxActiveRecord::extractPkValue($model->programme, true))) : null,
			),
'dob',
array(
			'name' => 'gender',
			'type' => 'raw',
			'value' => $model->gender !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->gender)), array('gender/view', 'id' => GxActiveRecord::extractPkValue($model->gender, true))) : null,
			),
array(
			'name' => 'maritalStatus',
			'type' => 'raw',
			'value' => $model->maritalStatus !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->maritalStatus)), array('maritalstatus/view', 'id' => GxActiveRecord::extractPkValue($model->maritalStatus, true))) : null,
			),
array(
			'name' => 'nationality',
			'type' => 'raw',
			'value' => $model->nationality !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->nationality)), array('nationality/view', 'id' => GxActiveRecord::extractPkValue($model->nationality, true))) : null,
			),
array(
			'name' => 'county',
			'type' => 'raw',
			'value' => $model->county !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->county)), array('county/view', 'id' => GxActiveRecord::extractPkValue($model->county, true))) : null,
			),
array(
			'name' => 'district',
			'type' => 'raw',
			'value' => $model->district !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->district)), array('district/view', 'id' => GxActiveRecord::extractPkValue($model->district, true))) : null,
			),
array(
			'name' => 'ethnicity',
			'type' => 'raw',
			'value' => $model->ethnicity !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->ethnicity)), array('ethnicity/view', 'id' => GxActiveRecord::extractPkValue($model->ethnicity, true))) : null,
			),
array(
			'name' => 'religion',
			'type' => 'raw',
			'value' => $model->religion !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->religion)), array('religion/view', 'id' => GxActiveRecord::extractPkValue($model->religion, true))) : null,
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
			'name' => 'nokTitle',
			'type' => 'raw',
			'value' => $model->nokTitle !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->nokTitle)), array('title/view', 'id' => GxActiveRecord::extractPkValue($model->nokTitle, true))) : null,
			),
array(
			'name' => 'nokRelation',
			'type' => 'raw',
			'value' => $model->nokRelation !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->nokRelation)), array('relationship/view', 'id' => GxActiveRecord::extractPkValue($model->nokRelation, true))) : null,
			),
'nok_postal_address',
'nok_postcode',
'nok_town',
'nok_mobile',
'nok_email',
array(
			'name' => 'disability',
			'type' => 'raw',
			'value' => $model->disability !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->disability)), array('answer/view', 'id' => GxActiveRecord::extractPkValue($model->disability, true))) : null,
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
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'list',
    'items'=>array(
		array('label'=>'APPLICATION NAVIGATION LINKS'),
		array('label'=>Yii::t('app', 'Enroll new') . ' ' . $model->label(), 
				'url'=>array('admit'),
				'icon'=>'pencil',						
				'visible'=>Yii::app()->user->checkAccess(3),
				),
		array('label'=>Yii::t('app', 'Update this ') . ' ' . $model->label(), 
				'url'=>array('update', 'id' => $model->id),
				'icon'=>'edit',						
				'visible'=>Yii::app()->user->checkAccess(3),
				),
		array('label'=>Yii::t('app', 'Delete this') . ' ' . $model->label(), 
				'url'=>'#', 
				'icon'=>'trash',
				'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?'),
				'visible'=>Yii::app()->user->checkAccess(1),
				),
		array('label'=>Yii::t('app', 'Manage the') . ' ' . $model->label(2), 
				'url'=>array('admin'),
				'icon'=>'th',						
				'visible'=>Yii::app()->user->checkAccess(3),
				),
	),

));?>