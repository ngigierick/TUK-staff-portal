<h1>Apply for Leave</h1>
<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=> 'horizontal',
     'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); 
?>
<table class="table table-condensed table-stripped">
	<tr>	
	<td valign="top">
	<?php if (!empty($error)  ):?>
	<?php $this->renderPartial("//site/common/notifications"); ?>
	<hr />
	<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'warning',
	'size'=>'small',
	'icon'=>'backward',
	'label'=>'BACK',
	'url'=>array('apply'),
	)); ?>

	<?php else:?>
	<h3>STEP 2 : Select Days for your <?php echo $summary['leave'];?></h3>
	<?php if (!empty($error2)  ):?>
	<?php $this->renderPartial("//site/common/notifications"); ?>
	<?php endif;?>
	<table class="account table  table-condensed">
		<tr><td class="lbl">SUPERVISOR:</td>
			<td>
				<?php $office_id = StaffHelper::managerOffice(Yii::app()->user->name,1); ?>
				<?php $officers = StaffHelper::getHoDs($office_id);?>
				<?php for ($i=0;$i<count($officers);$i++):?>
					<b><input type="radio" name="EmployeeLeaveApplication[hod_id]" value="<?php echo $officers[$i]->pfNumber->id;?>"> <?php echo $officers[$i]->pfNumber->names();?>, <?php echo $officers[$i]->position;?> </b><br>
				<?php endfor;?>
				<span class="unread">Kindly contact Human Resource Office if your Supervisor is NOT listed.</span><br/>
				<span class="unread">You are encouraged to take all your annual leave days.</span>
				<br/>
			</td>
		</tr>
		<tr><td class="lbl" style="width:300px;">TOTAL DAYS:</td><td class="right" ><?php echo $summary['total'].$days;?></td></tr>
		<tr><td class="lbl">DAYS UTILIZED:</td><td class="right" ><?php echo $summary['used'].$days;?></td></tr>
		<tr><td class="lbl">DAYS REMAINING:</td><td class="right" ><?php echo $summary['rem'].$days;?></td></tr>
			<tr>
				<td class="lbl">	
				STARTING FROM:
				</td>
				<td>
				
					<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'name'=>'EmployeeLeaveApplication[start_date]',
					'options'=>array(
						'showAnim'=>'fold',
						//'minDate' => $summary['min_date'],
						//'changeMonth'=>true,
						//'changeYear'=>true,
						//'yearRange'=>'1930:2012',
						'dateFormat'=>'dd/mm/yy',
					),
					'htmlOptions'=>array(
						'style'=>'height:20px;'
						),
					));?>
				</td>
			</tr>
			<tr>
				<td class="lbl">	
				ENDING ON:  
				</td>
				<td>
					<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'name'=>'EmployeeLeaveApplication[end_date]',
					'options'=>array(
						'showAnim'=>'fold',
						//'minDate' => $summary['min_date'],
						//'changeMonth'=>true,
						//'changeYear'=>true,
						//'yearRange'=>'1930:2012',
						'dateFormat'=>'dd/mm/yy',
					),
					'htmlOptions'=>array(
						'style'=>'height:20px;'
						),
					));?>
				</td>
			</tr>
			
			
			<tr >
				<th ></th>
				<th>
					<?php $this->widget('bootstrap.widgets.TbButton', array(
					'type'=>'danger',
					'size'=>'small',
					'icon'=>'backward',
					'label'=>'BACK',
					'url'=>array('apply'),
					)); ?>
					&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
					<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'success',
					'size'=>'medium',
					'icon'=>'forward',
					'label'=>'PROCEED',
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
