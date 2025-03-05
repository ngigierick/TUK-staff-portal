<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=> 'horizontal',
     'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); 

?>
<h1>Approve Leave</h1><hr />
<h2>Part I - Application Details:</h2>
<?php echo $mail->body;?>

<h2>Part II - HOD/Reporting Officer:</h2>
<p><?php $sal=($app->staff->gender_id==1)?'his':'her';?>
Recommended satisfactory arrangements can be made for performance of <?php echo $sal;?> duties during <?php echo $sal;?> absence.
</p>
<p>
<?php echo $sal;?> Duties will be performed by:
<?php
		//autocomplete
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			//'model'=>$model,
			'name'=>'submit_staff',
			'id'=>'fullSearch',
			
			'source'=>$this->createUrl('//hr/employee/fullSearch'),
			'options'=>array(
				'delay'=>300,
				'minLength'=>2,
				'showAnim'=>'fold',
				'select'=>"js:function(event, ui) {
					var id = ui.item.id;
					$('#incharge').val(id);
				}"
			),
			'htmlOptions'=>array(
				'size'=>'40',
				'class'=>'search-query span2',
				'placeholder'=>'Search for staff by PF number,or unique names',
				
			),
		));
	?>
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
<br />
</p>
<input type="hidden" name="incharge" id="incharge" />
<hr />
<?php $this->widget('bootstrap.widgets.TbButton', array(
		'label'=>'Approve and Forward to HR',
		'type'=>'success', 
		'buttonType'=>'submit',
		'size'=>'small', 
		'icon'=>'ok', 
)); 
?>

<?php $this->endWidget();?>
