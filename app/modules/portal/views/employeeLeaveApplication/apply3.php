<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=> 'horizontal',
     'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); 

?>
<h1>Apply for Leave</h1>
<table class="table table-condensed table-stripped">
	<tr>
		
	<td valign="top">
	
	<?php if (!empty($error)  ):?>
	<?php $this->renderPartial("//site/common/notifications"); ?>
	<?php else:?>
	<h3>STEP 3 : Confirm Details for your <?php echo $summary['leave'];?></h3>
	<?php if (!empty($error2)  ):?>
	<?php $this->renderPartial("//site/common/notifications"); ?>
	<?php endif;?>
	
	<?php 
	
		$model->start_date=$summary['s']; 	echo $form->hiddenField($model, 'start_date');
		$model->end_date=$summary['e']; 	echo $form->hiddenField($model, 'end_date');
		$model->date_modified=time();		echo $form->hiddenField($model, 'date_modified');
		$model->hod_id=$summary['hod_id'];  echo $form->hiddenField($model, 'hod_id');
	?>
	
	<table class="account leave table table-condensed">
			<tr><td class="lbl right">SUPERVISOR:</td><td class="right" ><?php echo $summary['hod'];?></td>
			<tr><td class="lbl right" style="width:300px;">TOTAL ELIGIBLE DAYS:</td><td class="right"><?php echo $summary['total'].$days;?></td>
			<tr><td class="lbl right">DAYS UTILIZED:</td><td class="right"><?php echo $summary['used'].$days;?></td>	
			<tr><td class="lbl right">DAYS REMAINING BEFORE REQUEST:</td><td class="right"><?php echo $summary['rem'].$days;?></td>
			<tr><td class="lbl right">EXPECTED START DATE:</td><td class="right" ><?php echo $summary['expected_start'];?></td>
			<tr><td class="lbl right">EXPECTED END DATE:</td><td class="right"><?php echo $summary['expected_end'];?></td>
			<tr><td class="lbl right">DAYS APPLIED FOR:</td><td class="right"><?php echo $summary['requested'].$days;?></td>
			<tr><td class="lbl right">DAYS REMAINING AFTER REQUEST:</td><td class="right" ><?php echo ( $summary['rem'] - $summary['requested'] ).$days;?></td>
			<tr><td class="lbl right">EXPECTED REPORTING DATE:</td><td class="right" ><?php echo $summary['expected_reporting'];?></td>
			<tr >
			<th></th>
				<th align="center">
					<?php $this->widget('bootstrap.widgets.TbButton', array(
					'type'=>'danger',
					'size'=>'small',
					'icon'=>'backward',
					'label'=>'BACK',
					'url'=>array('apply','id'=>$summary['id']),
					)); ?>
					
					&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
					<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'success',
					'size'=>'medium',
					'icon'=>'ok',
					'label'=>'SUBMIT APPLICATION',
					)); ?>
				
				</th>
			</tr>	
	</table>
<?php endif;?>
</td>
<br />
</tr>
</table>
<?php $this->endWidget();?>
