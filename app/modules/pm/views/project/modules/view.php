<?php if (count($modules)>0):?>
<h1><?php echo  $header; ?></h1>
<hr />
<table class="items table table-striped table-bordered table-condensed track" style="width:900px">
<tr><td>SN</td><td>Module Name</td><td>Start Date</td><td>Expected Completion Date</td><td colspan="2">Progress Status</td></tr>
<?php for($i=0;$i<count($modules);$i++):?>
<tr>
	<td><?php echo $i+1;?></td>
	<td><?php echo $modules[$i]->name;?></td>
	<td><?php echo $modules[$i]->start_date;?></td>
	<td><?php echo $modules[$i]->end_date;?></td>
	<td><?php echo $status[$i];?></td>
	<td><?php echo GxHtml::link('View Module Tasks',array('//pm/projectModule/view', 'id' => $modules[$i]->id));?></td>
</tr>
<?php endfor;?>
</table>
<br /><br />
<?php else:?>
<h2>No records found.</h2>
<?php endif;?>