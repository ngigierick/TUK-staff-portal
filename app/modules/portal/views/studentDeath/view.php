<h1><?php echo Yii::t('app', 'View') . '  ' . GxHtml::encode($model->label()) . ' | ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>
<hr />
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

?><br/><br/>


</div>
<?php	$this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'striped condensed',
	'data' => $model,
	'attributes' => array(

'burial_date',
'burial_location',
'father_name',
'mother_name',
array(
			'name' => 'regNumber1',
			'type' => 'raw',
			'value' => $model->regNumber1->reg_number.' | '.$model->regNumber1->surname.' '.$model->regNumber1->firstname.' '.$model->regNumber1->othername, 
			),
array(
			'name' => 'regNumber2',
			'type' => 'raw',
			'value' => $model->regNumber2->reg_number.' | '.$model->regNumber2->surname.' '.$model->regNumber2->firstname.' '.$model->regNumber2->othername, 
			),

'burial_date',
'burial_location',
'budget',

),

)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'type'=>'danger',
		'size'=>'large',
		'icon'=>'print',
		'label'=>'Export to PDF and Print Form',
		'url'=>array('view','id'=>$model->id,'format'=>'pdf'),
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'success',
        'size'=>'large',
		'icon'=>'pencil',
        'label'=>'Edit Report',
		'url'=>array('update','id'=>$model->id),
)); ?>
</div>

