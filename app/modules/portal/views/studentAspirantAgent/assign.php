
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'role-form',
	'type'=> 'horizontal',
	//'enableAjaxValidation' => true,
));
?>

<fieldset>
<legend><h1>Assign Agents to Polling Stations</h1></legend>
<h2><span class="icon-flag">&nbsp;</span>&nbsp;Kindly refer to the MAP to translate to the Physical Locations</h2>
<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'danger'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 

?>
<table class="track table">
	<tr>
		<td><h2>SN</h2></td>
		<td><h2>Agent Reg. Number</h2></td>
		<td><h2>Agent Full Name</h2></td>
		<td><h2>Polling Station</h2></td>
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
			<?php 
	
			echo CHtml::dropDownList('polling_station['.$agents[$i]->id.']',$agents[$i]->polling_station_id,GxHtml::listDataEx(StudentPollingStation::model()->findAllAttributes(null, true))); ?>
			<br />
		</td>
	</tr>
	<?php endfor;?>
</table>
<hr /><br />
</fieldset>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		'icon'=>'ok',
		'size'=>'small',
		'label'=>'Assign Polling Stations',
	)); ?>
	
<?php $this->widget('bootstrap.widgets.TbButton', array(
			        'type'=>'danger',
			        'size'=>'small',
					'icon'=>'list',
			        'label'=>'VIEW POLLING STATION - AGENT ASSIGNMENT',
					'url'=>array('//portal/studentAspirantAgent/print'),
)); ?>
<?php	
$this->endWidget();
?>