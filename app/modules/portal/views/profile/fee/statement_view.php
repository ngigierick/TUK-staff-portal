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
<h1><?php echo Yii::t('app', 'Financial Statement') . ' | ' .$model->title.' '. GxHtml::encode($model->surname.' '.$model->firstname.' '.$model->othername); ?></h1>

<table  class="statement">
<tr>
<td>
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'striped condensed bordered',
	'data' => $model,
	'attributes' => array(
		array(
			'name' => 'Full name',
			'type' => 'raw',
			'value' => $model->surname.' '.$model->firstname.' '.$model->othername,
		),
		'reg_number',
		'programme',
		'module'
	
))); ?>
<table    class="statement">
<tr class="header"><td>Transaction Ref</td><td>Date</td><td style="width:150px">Description</td><td align="right" style="width:140px">Debit DR</td><td align="right" style="width:140px">Credit CR</td><td align="right" style="width:140px">Balance</td></tr>
<?php $this->widget('zii.widgets.CListView', array(
	'id' => 'student-credit-grid',
	'dataProvider' => $credit,
	'itemView'=>'fee/_credit',
)); ?>
<?php $this->widget('zii.widgets.CListView', array(
	'id' => 'student-debit-grid',
	'dataProvider' => $debit,
	'itemView'=>'fee/_debit',
)); ?>
<tr class="header"><td colspan="6" align="center">Closing Balance:<b> <?php echo Yii::app()->numberFormatter->formatCurrency($this->total,"KES "); ?></b></td></tr>
</table>
</td>
</tr>
</table>
