<?php	$this->renderPartial('../profile/employee/header', array('model'=>$staff));?>
<h1><span class='icon-book'>&nbsp;</span> My Service Request Tickets</span></h1>

<hr />
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'New Request Ticket',
    'type'=>'success', 
    'icon'=>'ok',
    'size'=>'large', 
	'url'=>array('submit'),
)); ?>
	

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'ict-service-request-grid',
	'dataProvider' => $model->search(),
	'filter' => null,
	'type'=>'striped bordered condensed',
	'columns' => array(

		array(
				'name'=>'type_id',
				'value'=>'GxHtml::valueEx($data->type)',
				'filter'=>GxHtml::listDataEx(IctEquipmentType::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'office_id',
				'value'=>'GxHtml::valueEx($data->office)',
				'filter'=>GxHtml::listDataEx(Office::model()->findAllAttributes(null, true)),
				),
		'statustxt:html',
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
			'template'=>'{view}{edit}{comment}',
			'buttons'=>array(
             
					'view' => array(
						'label'=>'View',
			
					),
					'edit' => array(
						'label'=>'Edit',
						'icon'=>'edit',
						'url' => 'Yii::app()->createUrl("//portal/ictServiceRequest/update", array("id"=>$data->id))',
						'visible'=>'($data->status<3)?true:false',
					),
					'comment' => array(
						'label'=>'Comment',
						'url' => 'Yii::app()->createUrl("//portal/ictServiceRequest/comment", array("id"=>$data->id))',
						'deleteConfirmation'=>'Are you sure you are satisfied and want to close this service request ticket ?',
						'icon'=>'envelope',
						
					
					),
					
					
				)
		)
	),
)); ?>
