<?php if (count($applications)>0):?>
	<table class="table table-condensed table-bordered">
	<tr><th>Disbursement #</th><th class="right">Date Requested</th><th class="right">Amount Requested(KES)</th><th class="right">Amount Approved(KES)</th><th>Status</th></tr>
		<?php for($i=0; $i<count($applications); $i++): $model= $applications[$i];?>
			<tr>
			<td><?php echo $model->type();?></td>
			<td><?php echo $model->date_requested;?></td>
			<td class="right"><?php echo User::money($model->amount_requested);?></td>
			<td class="right"><?php echo User::money($model->amount_approved);?></td>
			<td><?php echo $model->status();?></td>
			</tr>
			<tr>
			<td colspan="5">
			<h4>APPROVAL TRAIL</h4>
			<?php echo $model->approvalTrail();?>
			</td>
			</tr>
			<tr>
			<td colspan="5">
			<h4>SURRENDER DOCUMENTS</h4>
			<?php echo $model->accountability();?>
			</td>
			</tr>
		<?php endfor;?>
	</table>
<?php endif;?>