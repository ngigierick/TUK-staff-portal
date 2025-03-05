<h1><?php echo $model->title;?></h1>
<?php $this->renderPartial("//site/common/notifications"); ?>
<table class="table table-condensed table-bordered">
<tr><th>Date Awarded</th><th>Running From</th><th>Up To</th><th class="right">Grant Amount (KES)</th></tr>
<tr>
<td><?php echo $model->date_awarded;?></td>
<td><?php echo $model->starting;?></td>
<td><?php echo $model->ending;?></td>
<td class="right"><?php echo User::money($model->grant_amount);?></td>
</tr>
<tr><td>School</td><td colspan="3"><?php echo $model->school;?></td></tr>
<tr><td>Faculty</td><td colspan="3"><?php echo $model->faculty;?></td></tr>
<tr>
<td colspan="4">
<h4>DOCUMENT UPLOADS</h4>
<?php echo $model->attachments();?>
</td>
</tr>
<tr>
<td colspan="4">
<h4>FUNDS DISBURSEMENTS</h4>
<br/><br/>
<?php $this->renderPartial("disbursements",array('applications'=>$model->disbursements())); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Request for Disbursement of Funds',
    'type'=>'primary', 
    'icon'=>'pencil',
    'size'=>'small', 
	'url'=>array('disbursement','token'=>md5($model->staff_id),'mdfgdWERT123456TY122' => $model->id),
)); ?>
</td>
</tr>
</table>
