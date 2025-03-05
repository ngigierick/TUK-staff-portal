<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);
?>


<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<h2>Searching for a staff member made easier!</h2>
	
<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'info'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
	   ),
	)
); 

?>

<?php
	//autocomplete
	$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'model'=>$model,
		'attribute'=>'pf_number',
		'id'=>'fullSearch',
		
		'source'=>$this->createUrl('//hr/employee/fullSearch'),
		'options'=>array(
			'delay'=>300,
			'minLength'=>2,
			'showAnim'=>'fold',
			'select'=>"js:function(event, ui) {
				id = ui.item.id;
				window.location.href = '?r=hr/employee/view/id/'+id;
				
			}"
		),
		'htmlOptions'=>array(
			'size'=>'40',
			'class'=>'search-query span2',
			'placeholder'=>'Search for staff by rPF number, names, or ID number',
			
		),
		
	));
?>
<hr/>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'staff-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'type'=>'striped bordered condensed',
	'columns' => array(
		'pf_number',
		'surname',
		'firstname',
		'othername',
				
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
			'template'=>'{view}',
			'buttons'=>array(
             
					'view' => array(
					'label'=>'View',
					),
					'update' => array(
					'label'=>'Update',
					'visible'=>'(Yii::app()->user->role===19)?true:false',
					),
					'delete' => array(
					'label'=>'Delete',
					'visible'=>'(Yii::app()->user->role===199)?true:false',
					),
			)
		),
	),
)); ?>

