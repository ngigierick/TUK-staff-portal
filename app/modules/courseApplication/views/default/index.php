
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

<h1>APPLICATION FOR 2014 SEPTEMBER INTAKE </h1>
<hr/>
<h2>STEPS FOR SUCCESSFUL APPLICATION PROCEDURE:</h2>
<ol>
<li>Create Account with Us</li>
<li>Enter Personal Details</li>
<li>Choose your Course(s)</li>
<li>Download and Print Application Form</li>
<li>Pay Application Fees KES 2, 000 using Application Number as Bank Reference Number</li>
<li>Submit you Application Form together with the Bank Slip and Copies of your Certificates and Testimonials</li>
</ol>
<h2 class="unread">KINDLY NOTE THAT NO APPLICATION SHALL BE CONSIDERED WITHOUT OUR APPLICATION REFERENCE NUMBER</h2>


<fieldset>
<legend>Step 1: Create account with Us!</legend>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'email',array('maxlength' => 100) ); ?>
<?php echo $form->textFieldRow($model, 'mobile',array('maxlength' => 100) ); ?>
<?php echo $form->passwordFieldRow($model, 'passowrd',array('maxlength' => 100) ); ?>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		'size'=>'large',
		'icon'=>'ok',
		'label'=>'Create Account',
	)); ?>
	&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;
<b>Already having Account?&nbsp;&nbsp;
<a href="index.php?r=courseApplication/default/login">Sign In</a>
</b>
</div>
</fieldset>

<br />
<br />

<?php	
$this->endWidget();
?>