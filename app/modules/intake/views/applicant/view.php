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
	$model->surname.' '.$model->firstname.' '.$model->othername,
);

?>

<h1><?php echo Yii::t('app', 'View') . '  ' . GxHtml::encode($model->label()) . ' | ' .GxHtml::valueEx($model->title).' '.GxHtml::encode($model->surname.' '.$model->firstname.' '.$model->othername); ?></h1>
<div class="profile">
<?php if(!empty($model->photo)):?>
<?php echo CHtml::image(Yii::app()->baseUrl.'/images/passports/'.$model->photo,'Passport photo',array('height'=>100)); ?>
<?php elseif ($model->gender_id===1):?>
<?php echo CHtml::image(Yii::app()->baseUrl.'/images/passports/male.jpg','Passport photo',array('height'=>100)); ?>
<?php else:?>
<?php echo CHtml::image(Yii::app()->baseUrl.'/images/passports/female.jpg','Passport photo',array('height'=>100)); ?>
<?php endif;?>
</div>
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
'date_modified:datetime',
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'list',
    'items'=>array(
		array('label'=>'APPLICATION NAVIGATION LINKS'),
		array('label'=>Yii::t('app', 'Enroll new') . ' ' . $model->label(), 
				'url'=>array('enroll'),
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

