<table class="table table-condensed table-stripped">
	<tr>
	
	<td valign="top">
	<?php if (!empty($applications)):?>
	<table class="table table-condensed table-bordered table-stripped">
			<tr><th>Staff</th><th>Category</th><th>Days Taken</th><th>From</th><th>To</th><th colspan="2">Status</th></tr>
		<?php for($i=0; $i<count($applications); $i++): $model= $applications[$i];?>
		<tr>
			<td><?php echo $model->staff;?></td>
			<td><?php echo $model->leave;?></td>
			<td><?php echo $model->taken_days;?></td>
			<td><?php echo EmployeeLeave::formatDate($model->start_date);?></td>
			<td><?php echo EmployeeLeave::formatDate($model->report_date);?></td>
			<td>
				<?php echo $model->status();?>
			</td>
			<td><?php echo GxHtml::link('process', array('//portal/employeeLeaveApplication/process', 'id' => $model->id));?></td>
		</tr>
		<?php endfor;?>
	</table>
	<?php endif;?>
</td>
</tr>
</table>
