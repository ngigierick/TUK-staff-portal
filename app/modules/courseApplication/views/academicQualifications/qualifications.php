<h1>Academic Qualifications </h1>
<hr/>
<br/>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'role-form',
	'type'=> 'horizontal',
	//'enableAjaxValidation' => true,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
?>
	

	<?php echo $form->errorSummary($model); ?>

	<?php echo CHTml::hiddenField('submit_academic_qualifications',1);?>
	
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
 <fieldset><h3 class="qualifications">O Level - Kenya Certificate of Secondary Education(KCSE)</h3>


	<table style="cell-padding:5px;" class="table condensed stripped bordered">
	<tr>
	<td>Name of School</td>
	<td><?php echo CHTml::textField('kcse_school',isset($data['kcse_school'])?$data['kcse_school']:'')?></td>
	<td>Year</td>
	<td><?php echo CHTml::textField('kcse_year',isset($data['kcse_year'])?$data['kcse_year']:'')?></td>
	<td>Mean-Grade</td>
	<td><?php echo CHTml::textField('kcse_mean_grade',isset($data['kcse_mean_grade'])?$data['kcse_mean_grade']:'')?></td>
	</tr>
	<tr>
	<td colspan="2" style="text-align:right">
	<h3>SUBJECT</h3>
	</td>
	<td colspan="2">
	<h3>GRADE </h3><span class="notes">enter grade as A,A-,B+,B,B-,C+,...</span>
	</td>

	</tr>
	
	<?php for($s=0;$s<count($kcse_subjects);$s++):?>
	<td colspan="2" style="text-align:right">
	<?php echo $kcse_subjects[$s]->name;?>
	</td>
	<td colspan="2"><?php echo CHTml::textField($kcse_subjects[$s]->code,isset($data[$kcse_subjects[$s]->code])?$data[$kcse_subjects[$s]->code]:'')?></td>
	<td>
	</td>
	</tr>
	<?php endfor;?>
	</table>
</fieldset>

 <fieldset><h3 class="qualifications">O Level - KCSE Equivalent( This applies to those who did not sit for KCSE)</h3>

	<table class="table condensed">
	<tr>
	<td>Examination Body</td>
	<td><?php echo CHTml::textField('olevel_name',isset($data['olevel_name'])?$data['olevel_name']:'')?></td>
	<td colspan="4"><span class="notes">For example GCSE,</span></td>
	
	</tr>
	<tr>
	<td>Name of Institution</td>
	<td><?php echo CHTml::textField('olevel_school',isset($data['olevel_school'])?$data['olevel_school']:'')?></td>
	<td>Year</td>
	<td><?php echo CHTml::textField('olevel_year',isset($data['olevel_year'])?$data['olevel_year']:'')?></td>
	<td>Award</td>
	<td><?php echo CHTml::textField('olevel_award',isset($data['olevel_award'])?$data['olevel_award']:'')?></td>
	</tr>
	</table>
</fieldset>
	
 <fieldset><h3 class="qualifications">Certificate Qualification</h3>

	<table class="table condensed">
	<tr>
	<td>Name of Institution</td>
	<td><?php echo CHTml::textField('cert_school',isset($data['cert_school'])?$data['cert_school']:'')?></td>
	<td>Year</td>
	<td><?php echo CHTml::textField('cert_year',isset($data['cert_year'])?$data['cert_year']:'')?></td>
	<td>Award</td>
	<td><?php echo CHTml::textField('cert_award',isset($data['cert_award'])?$data['cert_award']:'')?></td>
	</tr>
	</table>
</fieldset>
 <fieldset><h3 class="qualifications">Diploma Qualification</h3>

	<table class="table condensed">
	<tr>
	<td>Examination Body</td>
	<td colspan="4"><?php echo CHTml::radioButton('dip_name',($data['dip_name'] ==1)?1:'',array('value'=>1))?> KNEC
	&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo CHTml::radioButton('dip_name',($data['dip_name'] ==1)?'':1,array('value'=>2))?> Internal Exam</td>
	<td colspan="2"></td>
	</tr>
	<tr>
	<td>Name of Institution</td>
	<td><?php echo CHTml::textField('dip_school',isset($data['dip_school'])?$data['dip_school']:'')?></td>
	<td>Year</td>
	<td><?php echo CHTml::textField('dip_year',isset($data['dip_year'])?$data['dip_year']:'')?></td>
	<td>Award</td>
	<td><?php echo CHTml::textField('dip_award',isset($data['dip_award'])?$data['dip_award']:'')?></td>
	</tr>
	</table>
</fieldset>
 <fieldset><h3 class="qualifications">Higher Diploma Qualification</h3>
 
	<table class="table condensed">
	<tr>
	<td>Examination Body</td>
	<td colspan="4"><?php echo CHTml::radioButton('h_dip_name',($data['h_dip_name'] ==1)?1:'',array('value'=>1))?> KNEC
	&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo CHTml::radioButton('h_dip_name',($data['h_dip_name'] ==1)?'':1,array('value'=>2))?> Internal Exam</td>
	<td colspan="2"></td>
	</tr>
	<tr>
	<td>Name of Institution</td>
	<td><?php echo CHTml::textField('h_dip_school',isset($data['h_dip_school'])?$data['h_dip_school']:'')?></td>
	<td>Year</td>
	<td><?php echo CHTml::textField('h_dip_year',isset($data['h_dip_year'])?$data['h_dip_year']:'')?></td>
	<td>Award</td>
	<td><?php echo CHTml::textField('h_dip_award',isset($data['h_dip_award'])?$data['h_dip_award']:'')?></td>
	</tr>
	</table>
</fieldset>
 <fieldset><h3 class="qualifications">Degree Qualification</h3>

	<table class="table condensed">
	<tr>
	<td>Name of Institution</td>
	<td><?php echo CHTml::textField('deg_school',isset($data['deg_school'])?$data['deg_school']:'')?></td>
	<td>Year</td>
	<td><?php echo CHTml::textField('deg_year',isset($data['deg_year'])?$data['deg_year']:'')?></td>
	<td>Award</td>
	<td><?php echo CHTml::textField('deg_award',isset($data['deg_award'])?$data['deg_award']:'')?></td>
	</tr>
	</table>
</fieldset>
 <!-- fieldset><h3 class="qualifications">Attachment for Certificates and Testimonials (Optional)</h3>
 <div class="notes">Kindly scan your documents(certificates, ID Card/Passport, other relevant testimonials) save as one PDF file and attach here</div>
 <?php //echo $form->fileField($model, 'photo', array('maxlength' => 30)); ?>
 <br />
</fieldset -->
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		'size'=>'large',
		'icon'=>'ok',
		'label'=>$model->isNewRecord ? 'Submit Academic Qualifications' : 'Save Academic Qualifications',
	)); ?>
	&nbsp;&nbsp;&nbsp;
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'size'=>'large','label'=>'Reset Details')); ?>
</div>

<?php	
$this->endWidget();
?>