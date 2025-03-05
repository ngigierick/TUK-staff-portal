<fieldset>
<legend><h1>Assign Agents to Polling Stations</h1></legend>
<h2><span class="icon-flag">&nbsp;</span>&nbsp;Kindly refer to the MAP to translate to the Physical Locations</h2>

<table class="track table">
	<tr>
		<td><h2>SN</h2></td>
		<td><h2>Agent Reg. Number</h2></td>
		<td><h2>Agent Full Name</h2></td>
		<td><h2>Polling Station</h2></td>
		<td><h2>Mobile</h2></td>
	</tr>
	<?php $c=1;for($i=0;$i<count($agents);$i++):?>
		<tr>
			<td>
			<?php echo $c; $c++;?>
		</td>
		<td>
			<?php echo $agents[$i]->reg_number;?>
		</td>
		<td>
			<?php echo $agents[$i]->surname.' '.$agents[$i]->firstname.' '.$agents[$i]->othername;?>
		</td>
		<td>
			<?php echo $agents[$i]->pollingStation;?>
		</td>
		<td>
			<?php echo $agents[$i]->mobile;?>
		</td>
	</tr>
	<?php endfor;?>
</table>
<hr /><br />



<?php $this->widget('bootstrap.widgets.TbButton', array(
			        'type'=>'danger',
			        'size'=>'small',
					'icon'=>'print',
			        'label'=>'DOWNLOAD AND PRINT POLLING STATION - AGENT ASSIGNMENT',
					'url'=>array('//portal/studentAspirantAgent/print','pdf'=>1),
)); ?>
&nbsp;&nbsp;
<?php $this->widget('bootstrap.widgets.TbButton', array(
		'type'=>'primary',
		'icon'=>'pencil',
		'size'=>'small',
		'url'=>array('//portal/studentAspirantAgent/assign'),
		'label'=>'Edit Polling Station Assignment',
	)); ?>
</fieldset>	
<br /><br />