<h1>View Demise of Your <?php echo $model->relation. ' - '.$model->affected_name;?> </h1>
<hr />
<br/><br/>


</div>
<?php	$this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'striped condensed',
	'data' => $model,
	'attributes' => array(


'relation',
'affected_name',
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
		'url'=>array('guardianView','id'=>$model->id,'format'=>'pdf'),
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'success',
        'size'=>'large',
		'icon'=>'pencil',
        'label'=>'Edit Report',
		'url'=>array('updateGuardian','id'=>$model->id),
)); ?>
</div>

