<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'info'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
	   ),
	)
); 

?>

<?php	$this->renderPartial('employee/header', array('model'=>$model));?>

<h1>PROFILE VIEWS REPORT</h1>
<table class="items table table-striped table-bordered table-condensed">
<tr><th>S/N</th><th>Date</th><th>Time</th><th>Who Viewed?</th></tr>
<?php for($i=0;$i<count($views);$i++):?>
<tr>
	<td><?php echo $i+1;?>)</td>
	<td><?php echo date("D, d M y",$views[$i]->date_viewed);?></td>
	<td><?php echo date("g:i A",$views[$i]->date_viewed);?></td>
	<td>
		<?php 
		$more ='';
		if ($views[$i]->category==1) echo "Somebody from the public viewed your profile after search.";
		else if (($views[$i]->category==2)||($views[$i]->category==3)){
			$more = '';
			$staff = Employee::model()->findByPk($views[$i]->user_id);
			if (isset($staff->id)){
				$more .= StaffHelper::employment($staff);
			}
			if (!empty($more))
			echo "Staff member from the university (".$more.") viewed your profile.";
			else echo "Staff member from the university viewed your profile.";
			
		} 
		else if ($views[$i]->category==4) echo "You viewed your own public profile.";
		else echo "Somebody from the public viewed your profile after search.";
		?>
	</td>
</tr>	
	
	
<?php endfor;?>
	
</table>