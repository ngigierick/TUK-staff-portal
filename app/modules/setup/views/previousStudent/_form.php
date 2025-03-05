<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'previous-student-form',
	'enableAjaxValidation' => true,
));
?>
<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'reg_number'); ?>
		<?php echo $form->textField($model, 'reg_number', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'reg_number'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'course_code'); ?>
		<?php echo $form->textField($model, 'course_code', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'course_code'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'course_year'); ?>
		<?php echo $form->textField($model, 'course_year', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'course_year'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'study_year'); ?>
		<?php echo $form->textField($model, 'study_year', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'study_year'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'study_term'); ?>
		<?php echo $form->textField($model, 'study_term', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'study_term'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'class'); ?>
		<?php echo $form->textField($model, 'class', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'class'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model, 'status', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'status'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'surname'); ?>
		<?php echo $form->textField($model, 'surname', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'surname'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'name1'); ?>
		<?php echo $form->textField($model, 'name1', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'name1'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'name2'); ?>
		<?php echo $form->textField($model, 'name2', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'name2'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model, 'title', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'title'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->textField($model, 'sex', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'sex'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'dob'); ?>
		<?php echo $form->textField($model, 'dob', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'dob'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'address1'); ?>
		<?php echo $form->textField($model, 'address1', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'address1'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'address2'); ?>
		<?php echo $form->textField($model, 'address2', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'address2'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'box'); ?>
		<?php echo $form->textField($model, 'box', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'box'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'town'); ?>
		<?php echo $form->textField($model, 'town', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'town'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model, 'phone', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'phone'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'extension'); ?>
		<?php echo $form->textField($model, 'extension', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'extension'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'district'); ?>
		<?php echo $form->textField($model, 'district', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'district'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_number'); ?>
		<?php echo $form->textField($model, 'id_number', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'id_number'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'kencit'); ?>
		<?php echo $form->textField($model, 'kencit', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'kencit'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fee_payer'); ?>
		<?php echo $form->textField($model, 'fee_payer', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'fee_payer'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'employed'); ?>
		<?php echo $form->textField($model, 'employed', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'employed'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'employer'); ?>
		<?php echo $form->textField($model, 'employer', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'employer'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'employment_department'); ?>
		<?php echo $form->textField($model, 'employment_department', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'employment_department'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'employer_box'); ?>
		<?php echo $form->textField($model, 'employer_box', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'employer_box'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'employer_town'); ?>
		<?php echo $form->textField($model, 'employer_town', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'employer_town'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'employer_phone'); ?>
		<?php echo $form->textField($model, 'employer_phone', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'employer_phone'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model, 'location', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'location'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'sub_location'); ?>
		<?php echo $form->textField($model, 'sub_location', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'sub_location'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'tlc'); ?>
		<?php echo $form->textField($model, 'tlc', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'tlc'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'pat_date'); ?>
		<?php echo $form->textField($model, 'pat_date', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'pat_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'pat'); ?>
		<?php echo $form->textField($model, 'pat', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'pat'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fee_date'); ?>
		<?php echo $form->textField($model, 'fee_date', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'fee_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'term_address'); ?>
		<?php echo $form->textField($model, 'term_address', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'term_address'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'term_box'); ?>
		<?php echo $form->textField($model, 'term_box', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'term_box'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'term_town'); ?>
		<?php echo $form->textField($model, 'term_town', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'term_town'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'nok_name'); ?>
		<?php echo $form->textField($model, 'nok_name', array('maxlength' => 40)); ?>
		<?php echo $form->error($model,'nok_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'nok_box'); ?>
		<?php echo $form->textField($model, 'nok_box', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'nok_box'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'nok_town'); ?>
		<?php echo $form->textField($model, 'nok_town', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'nok_town'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'nok_phone'); ?>
		<?php echo $form->textField($model, 'nok_phone', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'nok_phone'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fee_arrears'); ?>
		<?php echo $form->textField($model, 'fee_arrears', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'fee_arrears'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'eoy_res'); ?>
		<?php echo $form->textField($model, 'eoy_res', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'eoy_res'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'xr'); ?>
		<?php echo $form->textField($model, 'xr', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'xr'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'xrsig'); ?>
		<?php echo $form->textField($model, 'xrsig', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'xrsig'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cc'); ?>
		<?php echo $form->textField($model, 'cc', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'cc'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ccsig'); ?>
		<?php echo $form->textField($model, 'ccsig', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'ccsig'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'lc'); ?>
		<?php echo $form->textField($model, 'lc', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'lc'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'lcsig'); ?>
		<?php echo $form->textField($model, 'lcsig', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'lcsig'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'prn'); ?>
		<?php echo $form->textField($model, 'prn', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'prn'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'registered'); ?>
		<?php echo $form->textField($model, 'registered', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'registered'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cref'); ?>
		<?php echo $form->textField($model, 'cref', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'cref'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'theid'); ?>
		<?php echo $form->textField($model, 'theid', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'theid'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'abal'); ?>
		<?php echo $form->textField($model, 'abal', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'abal'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'rs'); ?>
		<?php echo $form->textField($model, 'rs', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'rs'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'sponsor_no'); ?>
		<?php echo $form->textField($model, 'sponsor_no', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'sponsor_no'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'old_number'); ?>
		<?php echo $form->textField($model, 'old_number', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'old_number'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model, 'username', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'username'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model, 'date', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'scat'); ?>
		<?php echo $form->textField($model, 'scat', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'scat'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'statsig'); ?>
		<?php echo $form->textField($model, 'statsig', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'statsig'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'statdata'); ?>
		<?php echo $form->textField($model, 'statdata', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'statdata'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'libreg'); ?>
		<?php echo $form->textField($model, 'libreg', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'libreg'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'lregcomm'); ?>
		<?php echo $form->textField($model, 'lregcomm', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'lregcomm'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'lreguser'); ?>
		<?php echo $form->textField($model, 'lreguser', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'lreguser'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'lregdate'); ?>
		<?php echo $form->textField($model, 'lregdate', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'lregdate'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'lib_arrears'); ?>
		<?php echo $form->textField($model, 'lib_arrears', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'lib_arrears'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'libmess1'); ?>
		<?php echo $form->textField($model, 'libmess1', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'libmess1'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'override'); ?>
		<?php echo $form->textField($model, 'override', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'override'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'hostel'); ?>
		<?php echo $form->textField($model, 'hostel', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'hostel'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'host_term'); ?>
		<?php echo $form->textField($model, 'host_term', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'host_term'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'h_fee_date'); ?>
		<?php echo $form->textField($model, 'h_fee_date', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'h_fee_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'hostarrear'); ?>
		<?php echo $form->textField($model, 'hostarrear', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'hostarrear'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'prov'); ?>
		<?php echo $form->textField($model, 'prov', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'prov'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'dist'); ?>
		<?php echo $form->textField($model, 'dist', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'dist'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'hos_arrear'); ?>
		<?php echo $form->textField($model, 'hos_arrear', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'hos_arrear'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'lreg'); ?>
		<?php echo $form->textField($model, 'lreg', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'lreg'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'lof'); ?>
		<?php echo $form->textField($model, 'lof', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'lof'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'lcnumber'); ?>
		<?php echo $form->textField($model, 'lcnumber', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'lcnumber'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'module_id'); ?>
		<?php echo $form->dropDownList($model, 'module_id', GxHtml::listDataEx(Module::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'module_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'date_modified'); ?>
		<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'date_modified'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->