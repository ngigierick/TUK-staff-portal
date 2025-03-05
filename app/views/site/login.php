<h2>Kindly Take Part in the<a href="https://forms.gle/ipX1esUihaKQMmWo9"> TU-K Staff Survey on ODeL e-READINESS</a></h2>
<h3>Enquiries on official staff email should be sent to: 
	<a href="mailto:ictsupport@tukenya.ac.ke">ictsupport@tukenya.ac.ke</a> quoting your payroll number
</h3>
<div class="well">
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'user-form',
	'type'=> 'horizontal',	
));
?>
<h1>Staff Sign In</h1>
<hr/>

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

<!-- Google Sign In-->
<div class="control-group hint">


</div>
<br/>
<?php echo $form->textFieldRow($model, 'username', array('prepend'=>'<i class="icon-user"></i>','maxlength' => 255,'value'=>'')); ?>
<div class="control-group hint">
<label class="control-label">
</label>

<i>HINT: Use your PF number as username</i>

</div>

<br/>
<br/>
<?php echo $form->passwordFieldRow($model, 'password', array('prepend'=>'<i class="icon-lock"></i>','maxlength' => 255,'value'=>'')); ?>


<div class="control-group hint">
<label class="control-label">
</label>

<i>HINT:Use your ID/Passport number as password if you had never logged in and changed password.</i>

</div>
<div class="control-group hint">
<label class="control-label">
</label>



</div>
<hr/>
<div class="control-group hint">
<label class="control-label">
</label>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		//'icon'=>'ok',
		'size'=>'large',
		'label'=>'Sign In',
	)); ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

<i>Unable to proceed?&nbsp;
<i class="icon-lock"> </i> <?php echo  CHtml::link(' Recover password.', array('//portal/profile/recoverPassword'));?> |
<i class="icon-flag"> </i> <?php echo  CHtml::link('Help', array('//portal/profile/help'));?>
</i>
| <i class="icon-home"> </i> <?php echo  CHtml::link('Home', array('//portal/profile/home'));?>
</div>
<hr/>
<?php $this->endWidget(); ?>
</div>
