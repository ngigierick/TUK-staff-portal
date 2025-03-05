<h1>Death and Funeral Reports for Your Guardians</h1>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Report new Student Death',
    'type'=>'danger', 
    'size'=>'small', 
    'icon'=>'pencil',
	'url'=>array('report','st'=>1),
)); ?>
&nbsp;&nbsp;&nbsp;
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Report Guradian Death',
    'type'=>'warning', 
    'size'=>'small', 
    'icon'=>'pencil',
	'url'=>array('guardian'),
)); ?>

<hr/>

<table class="table table-bordered table-stripped table-condensed">
	
	<tr><td colspan="2">Diseased  Name</td><td>Relationship</td><td>Burial Date and Location</td><td colspan="2">Status</td></tr>
	<?php $c=0;for($i=0;$i<count($reports);$i++): $c++;?>
	<tr>
		<td><?php echo $c;?></td>
		<td><?php echo $reports[$i]->affected_name;?></td>
		<td><?php echo $reports[$i]->relation;?></td>
		<td><?php echo $reports[$i]->burial_date.', at '.$reports[$i]->burial_location;?></td>
		<td>
		<?php if( $reports[$i]->status==0) echo "<span class='unread'>Pending!</span>"; 
			else if ( $reports[$i]->status==1) echo "<span class='read'><span class='icon-ok'>&nbsp;</span>&nbsp;Processed!</span>"; 
		?>	
		</td>
		<td>
			<?php echo CHtml::link('<span  class="icon-print" >&nbsp;</span>&nbsp; View and print', array('//portal/studentDeath/guardianView','id'=>$reports[$i]->id))?>
		</td>
		
	</tr>	
	<?php endfor;?>
	
</table>
	
