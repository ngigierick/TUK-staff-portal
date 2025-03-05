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
	$model->surname,
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List all') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create new') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update this') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete this') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage the') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . '  ' . GxHtml::encode($model->label()) . ' | ' . GxHtml::encode($model->surname); ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'striped condensed',
	'data' => $model,
	'attributes' => array(
'id',
array(
			'name' => 'title',
			'type' => 'raw',
			'value' => $model->title !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->title)), array('title/view', 'id' => GxActiveRecord::extractPkValue($model->title, true))) : null,
			),
'reg_number',
'id_number',
'surname',
'firstname',
'othername',
array(
			'name' => 'programme',
			'type' => 'raw',
			'value' => $model->programme !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->programme)), array('courseclass/view', 'id' => GxActiveRecord::extractPkValue($model->programme, true))) : null,
			),
array(
			'name' => 'academicyear',
			'type' => 'raw',
			'value' => $model->academicyear !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->academicyear)), array('academicyear/view', 'id' => GxActiveRecord::extractPkValue($model->academicyear, true))) : null,
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
array(
			'name' => 'disability',
			'type' => 'raw',
			'value' => $model->disability !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->disability)), array('answer/view', 'id' => GxActiveRecord::extractPkValue($model->disability, true))) : null,
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
	),
)); ?>

