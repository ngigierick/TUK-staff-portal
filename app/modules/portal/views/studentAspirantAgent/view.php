<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	//array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	//array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	//array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'bursary-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>
<div class="profile">
		<?php 
			
			//structure passport photo url
			if (empty($model->photo)){
				
				$photo = str_replace("/", "-", $model->reg_number).'.JPG';
				$photo = 'http://192.168.100.50/images/student/'.$photo;
			}	
			else{
				
				 $photo = $model->photo;
				 $photo = Yii::app()->getBaseUrl(true).'/images/passports/'.$photo;
			}
				
			echo CHtml::image($photo,'Passport photo not yet submitted',array('height'=>150,'class'=>'passport')); 
		
?>
</div>
<input type='hidden' name='pdf' value='1'/>	


<?php	$this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'striped condensed',
	'data' => $model,
	'attributes' => array(
'aspirant',
'reg_number',
'id_number',
array(
			'name' => 'gender',
			'type' => 'raw',
			'value' => $model->gender !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->gender)), array('gender/view', 'id' => GxActiveRecord::extractPkValue($model->gender, true))) : null,
			),
'surname',
'firstname',
'othername',
array(
			'name' => 'school',
			'type' => 'raw',
			'value' => $model->school !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->school)), array('school/view', 'id' => GxActiveRecord::extractPkValue($model->school, true))) : null,
			),
array(
			'name' => 'department',
			'type' => 'raw',
			'value' => $model->department !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->department)), array('department/view', 'id' => GxActiveRecord::extractPkValue($model->department, true))) : null,
			),
array(
			'name' => 'programme',
			'type' => 'raw',
			'value' => $model->programme !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->programme)), array('programme/view', 'id' => GxActiveRecord::extractPkValue($model->programme, true))) : null,
			),
'programme_end',
'mobile',
'email',

	),
)); ?>

<br /><br />
			
			<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'danger',
					'size'=>'small',
					'icon'=>'print',
					'label'=>'Export to PDF and Form',
				)); ?>
			<?php	
			$this->endWidget();
			?>