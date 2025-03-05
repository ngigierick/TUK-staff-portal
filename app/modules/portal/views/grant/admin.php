<h1>RESEARCH GRANTS</h1>
<?php $this->renderPartial("//site/common/notifications"); ?>
<p>Have you lately received any Research Grants?</p>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Add Research Grant',
    'type'=>'success', 
    'icon'=>'plus',
    'size'=>'small', 
	'url'=>array('submit'),
)); ?>
<br/><br/>
<?php if (count($applications)>0):?>

		<table class="table table-condensed table-bordered">
				<tr><th>Grant Title</th><th>Date Awarded</th><th>Running From</th><th>Up To</th><th class="right">Grant Amount (KES)</th></tr>
			<?php for($i=0; $i<count($applications); $i++): $model= $applications[$i];?>
			<tr>
				<td><?php echo $model->title;?></td>
				<td><?php echo $model->date_awarded;?></td>
				<td><?php echo $model->starting;?></td>
				<td><?php echo $model->ending;?></td>
				<td class="right"><?php echo User::money($model->grant_amount);?></td>
				<td><span class="icon-eye-open"> </span> &nbsp;&nbsp;<?php echo GxHtml::link('View more', array('//portal/grant/view', 'token'=>md5($model->staff_id),'mdfgdWERT123456TY122' => $model->id));?></td>
			</tr>
			<?php endfor;?>
		</table>
		
<?php endif;?>	

