<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . '  ' . GxHtml::encode($model->label()) . ' | ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php	$this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'striped condensed',
	'data' => $model,
	'attributes' => array(
'id',
array(
			'name' => 'title',
			'type' => 'raw',
			'value' => $model->title !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->title)), array('title/view', 'id' => GxActiveRecord::extractPkValue($model->title, true))) : null,
			),
'surname',
'firstname',
'othername',
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
'id_number',
'pin_number',
'designation',
'dob',
'pf_number',
array(
			'name' => 'empTerms',
			'type' => 'raw',
			'value' => $model->empTerms !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->empTerms)), array('empTerms/view', 'id' => GxActiveRecord::extractPkValue($model->empTerms, true))) : null,
			),
array(
			'name' => 'grade',
			'type' => 'raw',
			'value' => $model->grade !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->grade)), array('grade/view', 'id' => GxActiveRecord::extractPkValue($model->grade, true))) : null,
			),
'doe',
'dot',
array(
			'name' => 'office',
			'type' => 'raw',
			'value' => $model->office !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->office)), array('office/view', 'id' => GxActiveRecord::extractPkValue($model->office, true))) : null,
			),
'category_id',
'postal_address',
'postcode',
'town',
'mobile',
'email',
'status',
'date_modified',
'photo',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('claims')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->claims as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('//medical/claim/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2><?php echo GxHtml::encode($model->getRelationLabel('dependants')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->dependants as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('//hr/dependant/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>