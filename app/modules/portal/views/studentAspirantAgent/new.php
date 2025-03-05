<style>
h4{
	color:red;
	font-size:20px;
}
</style>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'certificate-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

<h1><span class="icon-plus">&nbsp;</span>&nbsp;Make Corrections on Certificate</h1>
<hr />
<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 
?>
<fieldset>
<legend><h2 class="issue">Search for student ( you can use registration number,  mobile, ID number, names or class code )</h2></legend>
<div class="control-group ">

<?php
	//autocomplete
	$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'model'=>$model,
		'attribute'=>'reg_number',
		'id'=>'fullSearch',
		
		'source'=>$this->createUrl('//admission/student/fullSearch'),
		'options'=>array(
			'delay'=>300,
			'minLength'=>2,
			'showAnim'=>'fold',
			'select'=>"js:function(event, ui) {
				
				$('#fixed, #form').toggle();
				
				//search for certificate
				var id = ui.item.id;
				
				window.location.href = '?r=examinations/certificate/create&id='+id;
						
				
			}"
		),
		'htmlOptions'=>array(
			'size'=>'40',
			'class'=>'search-query span2',
			'placeholder'=>'Search for student by registration number, ID Number, Mobile No, names, or class code',
			
		),
		
	));
?>	
<?php echo $form->hiddenField($model, 'reg_number', array('maxlength' => 30,'id'=>'reg_number')); ?>	
</div>
</fieldset>

<div id="form" style="display:none"><br/>
	<fieldset>
		
		<div class="control-group ">
		
		<div id="load_form" class="certificate">
		<h3><div class="grid-view-loading progress-label"> &nbsp;</div>Retrieving the certificate...</h3>
		
		</div>	
		</div>	
	</fieldset>
</div>

<hr />
<br /><br/><br /><br/>
<?php $this->widget('bootstrap.widgets.TbButton', array(
	
	'type'=>'danger',
	'icon'=>'eye-close',
	'size'=>'large',
	'url'=>array('issue'),
	'label'=>'Cancel the Operation',
	'htmlOptions'=>array('id'=>'submitbut'),
)); ?>


<?php	
$this->endWidget();
?>

<hr />
<br /><br/>