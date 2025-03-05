<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'fee-payable-grid',
	'type'=>'bordered condensed',
	'dataProvider' => $model,
	'summaryText'=>'',
	//'filter' => $model,
	'columns' => array(
		'name',
		//'notes',
		/*array(
				'name'=>'paid',
				'value'=>'GxHtml::valueEx($data->pa)',
				//'filter'=>GxHtml::listDataEx(Feecategory::model()->findAllAttributes(null, true)),
		),*/
		array(
            'header'=>'Amount (Kshs)',
			'type'=>'raw',
			'value'=>'CHtml::textField("amount[$data->id]",0)',
        ),
		
	),
)); ?>