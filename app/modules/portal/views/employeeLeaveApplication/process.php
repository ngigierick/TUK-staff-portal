<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=> 'horizontal',
     'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); 

?>
<h1>Process <?php echo $model->leave->name; ?> for <?php echo $model->staff; ?> </h1><hr />

	
<input type="hidden" name="pdf" value="1" />
<table class="account leave table table-condensed">
			<tr>
			<td class="bold right">STATUS:</td>
			<td class="right">
				<?php echo $model->status();?>
				<?php $h = ($model->staff->gender_id==1)?"his":"her";?>
			</td>
			</tr>
			<tr><td class="lbl right">HOD/REPORTING OFFICER:</td><td class="right" ><?php echo $model->hod->names();;?></td>
			<tr><td class="lbl right" style="width:300px;">TOTAL DAYS ELIGIBLE:</td><td class="right"><?php echo $model->total_days;?></td></tr>
			<tr><td class="lbl right">START DATE:</td><td class="right" ><?php echo EmployeeLeave::formatDate($model->start_date);?></td></tr>
			<tr><td class="lbl right">END DATE:</td><td class="right"><?php echo EmployeeLeave::formatDate($model->end_date);?></td></tr>
			<tr><td class="lbl right">DAYS APPLIED FOR:</td><td class="right"><?php echo $model->taken_days;?></td></tr>
			<tr><td class="lbl right">DAYS REMAINING:</td><td class="right" ><?php echo $model->rem_days;?></td></tr>
			<tr><td class="lbl right">EXPECTED REPORTING DATE: </td><td class="right" ><?php echo EmployeeLeave::formatDate($model->report_date);?></td></tr>
			<?php if ($model->status==0):?>
				<tr>
					<td class="lbl right">APPROVE:</td>
					<td>
					<input type="radio" class="radio" id="radio_1" name="EmployeeLeaveApplication[status]" value="2"/> <span class="read"> <i class="icon-thumbs-up"> </i> Recommended satisfactory arrangements can be made for performance of <?php echo $h;?> duties during <?php echo $h;?> absence.
					<div class="duties">
					Kindly indicate who will perform <?php echo $h;?> duties.</span>
					<?php $model->while_away_staff_id='';
					//autocomplete
					$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
						'model'=>$model,
						'attribute'=>'while_away_staff_id',
						'id'=>'fullSearch',
						'source'=>$this->createUrl('//hr/employee/fullSearch'),
						'options'=>array(
							'delay'=>300,
							'minLength'=>2,
							'showAnim'=>'fold',
							'select'=>"js:function(event, ui) {
								$('#away').val(ui.item.id);
								
							}"
						),
						'htmlOptions'=>array(
							'size'=>'40',
							'class'=>'search-query span2',
							'placeholder'=>'Search for staff by Payroll number, surname,middle name or first name',
							
						),
						
					));
				?>
				<?php echo $form->hiddenField($model, 'while_away_staff_id', array('id' => 'away')); ?>
				</div>
				</td>
				</tr>
				<tr>
				<td class="lbl right">REJECT:</td>
				<td><input type="radio" class="radio" id="radio_2" name="EmployeeLeaveApplication[status]" value="1"/> <span class="unread">
				<i class="icon-thumbs-down"> </i> I do NOT recommended the leave for the following reasons:</span>
				<div class="remarks" style="display:none">
					<?php echo $form->textArea($model, 'hod_approval_remarks', array('maxlength' => 300)); ?>
				</div>
				</td></tr>
			<?php endif;?>
			<tr><td colspan="2"></td></tr>
			<?php if ($model->status==0):?>
			<tr >
				<td></td>
				<td>
					<?php
					 $this->widget('bootstrap.widgets.TbAlert', array(
							'block'=>true, // display a larger alert block?
							'fade'=>true, // use transitions?
							'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
							'alerts'=>array( // configurations per alert type
								'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
								 'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
								 'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
								 'info'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
							),
						)
					); 
					?>
					<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'info',
					'size'=>'large',
					'icon'=>'ok',
					'label'=>'PROCESS',
					)); ?>					
				
				</td>
			</tr>	
		<?php endif;?>
		
	</table>
	
<?php $this->endWidget();?>

<script>
$(document).ready(function(){
	$(".btn").prop('disabled','disabled');
	$('.radio').click(function(){
      displayMessage();
   });
});

function displayMessage(){
	$(".btn").removeAttr('disabled');
	if ($("#radio_2").prop('checked')){
		$(".remarks").removeAttr("style");
		$(".duties").css("display", 'none');
		$(".btn").html('REJECT');
	}
	if ($("#radio_1").prop('checked')){
		$(".duties").removeAttr("style");
		$(".remarks").css("display", 'none');
		$(".btn").html('APPROVE');
	}
	
}
</script>

