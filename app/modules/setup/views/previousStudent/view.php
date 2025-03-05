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
	$model->surname.' '.$model->name1.' '.$model->name2,
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List all') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create new') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update this') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete this') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage the') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . '  ' . GxHtml::encode($model->label()) . ' | ' . GxHtml::encode($model->surname.' '.$model->name1.' '.$model->name2); ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'striped condensed',
	'data' => $model,
	'attributes' => array(
'id',
'reg_number',
'course_code',
'course_year',
'study_year',
'study_term',
'class',
'status',
'surname',
'name1',
'name2',
'title',
'sex',
'dob',
'address1',
'address2',
'box',
'town',
'phone',
'extension',
'district',
'id_number',
'kencit',
'fee_payer',
'employed',
'employer',
'employment_department',
'employer_box',
'employer_town',
'employer_phone',
'location',
'sub_location',
'tlc',
'pat_date',
'pat',
'fee_date',
'term_address',
'term_box',
'term_town',
'nok_name',
'nok_box',
'nok_town',
'nok_phone',
'fee_arrears',
'eoy_res',
'xr',
'xrsig',
'cc',
'ccsig',
'lc',
'lcsig',
'prn',
'registered',
'cref',
'theid',
'abal',
'rs',
'sponsor_no',
'old_number',
'username',
'date',
'scat',
'statsig',
'statdata',
'libreg',
'lregcomm',
'lreguser',
'lregdate',
'lib_arrears',
'libmess1',
'override',
'hostel',
'host_term',
'h_fee_date',
'hostarrear',
'prov',
'dist',
'hos_arrear',
'lreg',
'lof',
'lcnumber',
array(
			'name' => 'module',
			'type' => 'raw',
			'value' => $model->module !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->module)), array('module/view', 'id' => GxActiveRecord::extractPkValue($model->module, true))) : null,
			),
'date_modified',
	),
)); ?>

