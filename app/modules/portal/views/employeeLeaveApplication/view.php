<?php $this->renderPartial("//site/common/notifications"); ?>

<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=> 'horizontal',
     'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); 

?>

<input type="hidden" name="pdf" value="1" />
<table class="table table-condensed table-stripped">
	<tr>
				
	<td valign="top">
	<h1><?php echo GxHtml::encode($model->label()) . ' | ' . $model->leave->name; ?></h1><hr />

	
	<table class="account leave table table-condensed">
			<tr>
			<td class="lbl right">STATUS:</td><td class="right">
				<?php echo $model->status();?>
				</td>
			</tr>
			<tr><td class="lbl right" style="width:300px;">TOTAL DAYS ELIGIBLE:</td><td class="right"><?php echo $model->total_days;?></td></tr>
			<tr><td class="lbl right">START DATE:</td><td class="right" ><?php echo EmployeeLeave::formatDate($model->start_date);?></td></tr>
			<tr><td class="lbl right">END DATE:</td><td class="right"><?php echo EmployeeLeave::formatDate($model->end_date);?></td></tr>
			<tr><td class="lbl right">DAYS APPLIED FOR:</td><td class="right"><?php echo $model->taken_days;?></td></tr>
			<tr><td class="lbl right">DAYS REMAINING:</td><td class="right" ><?php echo $model->rem_days;?></td></tr>
			<tr><td class="lbl right">EXPECTED REPORTING DATE: </td><td class="right" ><?php echo EmployeeLeave::formatDate($model->report_date);?></td></tr>
			<tr><td class="lbl right">HOD/REPORTING OFFICER:</td><td class="right" ><?php echo $model->hod->names();;?></td>
			<tr><td colspan="2"><hr /></td></tr>
			<?php if ($model->status==0):?>
			<tr >
				<th colspan="2">
					
					<?php $this->widget('bootstrap.widgets.TbButton', array(
					'type'=>'danger',
					'size'=>'small',
					'icon'=>'trash',
					'label'=>'Withraw Application',
					'url'=>array('withdraw','id'=>$model->id),
					'htmlOptions'=>array('confirm'=>'Are you sure you want to withdraw this application?'),
					)); ?>
					
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'success',
					'size'=>'medium',
					'icon'=>'download-alt',
					'label'=>'DOWNLOAD APPLICATION FORM FOR REFERENCE',
					)); ?>					
				
			<?php else:?>
			
					<?php $this->widget('bootstrap.widgets.TbButton', array(
					'type'=>'warning',
					'size'=>'small',
					'icon'=>'tasks',
					'label'=>'My Leave Applications',
					'url'=>array('apply'),
					
					)); ?>
					<hr />
				
				</th>
			</tr>	
		<?php endif;?>
		
	</table>

</td>
<br />
</tr>
</table>
<?php $this->endWidget();?>


