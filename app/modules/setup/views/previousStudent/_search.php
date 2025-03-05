<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'reg_number'); ?>
		<?php echo $form->textField($model, 'reg_number', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'course_code'); ?>
		<?php echo $form->textField($model, 'course_code', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'course_year'); ?>
		<?php echo $form->textField($model, 'course_year', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'study_year'); ?>
		<?php echo $form->textField($model, 'study_year', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'study_term'); ?>
		<?php echo $form->textField($model, 'study_term', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'class'); ?>
		<?php echo $form->textField($model, 'class', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'status'); ?>
		<?php echo $form->textField($model, 'status', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'surname'); ?>
		<?php echo $form->textField($model, 'surname', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'name1'); ?>
		<?php echo $form->textField($model, 'name1', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'name2'); ?>
		<?php echo $form->textField($model, 'name2', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title'); ?>
		<?php echo $form->textField($model, 'title', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'sex'); ?>
		<?php echo $form->textField($model, 'sex', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'dob'); ?>
		<?php echo $form->textField($model, 'dob', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'address1'); ?>
		<?php echo $form->textField($model, 'address1', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'address2'); ?>
		<?php echo $form->textField($model, 'address2', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'box'); ?>
		<?php echo $form->textField($model, 'box', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'town'); ?>
		<?php echo $form->textField($model, 'town', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'phone'); ?>
		<?php echo $form->textField($model, 'phone', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'extension'); ?>
		<?php echo $form->textField($model, 'extension', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'district'); ?>
		<?php echo $form->textField($model, 'district', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_number'); ?>
		<?php echo $form->textField($model, 'id_number', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'kencit'); ?>
		<?php echo $form->textField($model, 'kencit', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fee_payer'); ?>
		<?php echo $form->textField($model, 'fee_payer', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'employed'); ?>
		<?php echo $form->textField($model, 'employed', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'employer'); ?>
		<?php echo $form->textField($model, 'employer', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'employment_department'); ?>
		<?php echo $form->textField($model, 'employment_department', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'employer_box'); ?>
		<?php echo $form->textField($model, 'employer_box', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'employer_town'); ?>
		<?php echo $form->textField($model, 'employer_town', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'employer_phone'); ?>
		<?php echo $form->textField($model, 'employer_phone', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'location'); ?>
		<?php echo $form->textField($model, 'location', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'sub_location'); ?>
		<?php echo $form->textField($model, 'sub_location', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tlc'); ?>
		<?php echo $form->textField($model, 'tlc', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'pat_date'); ?>
		<?php echo $form->textField($model, 'pat_date', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'pat'); ?>
		<?php echo $form->textField($model, 'pat', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fee_date'); ?>
		<?php echo $form->textField($model, 'fee_date', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'term_address'); ?>
		<?php echo $form->textField($model, 'term_address', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'term_box'); ?>
		<?php echo $form->textField($model, 'term_box', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'term_town'); ?>
		<?php echo $form->textField($model, 'term_town', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'nok_name'); ?>
		<?php echo $form->textField($model, 'nok_name', array('maxlength' => 40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'nok_box'); ?>
		<?php echo $form->textField($model, 'nok_box', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'nok_town'); ?>
		<?php echo $form->textField($model, 'nok_town', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'nok_phone'); ?>
		<?php echo $form->textField($model, 'nok_phone', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fee_arrears'); ?>
		<?php echo $form->textField($model, 'fee_arrears', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'eoy_res'); ?>
		<?php echo $form->textField($model, 'eoy_res', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'xr'); ?>
		<?php echo $form->textField($model, 'xr', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'xrsig'); ?>
		<?php echo $form->textField($model, 'xrsig', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cc'); ?>
		<?php echo $form->textField($model, 'cc', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ccsig'); ?>
		<?php echo $form->textField($model, 'ccsig', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'lc'); ?>
		<?php echo $form->textField($model, 'lc', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'lcsig'); ?>
		<?php echo $form->textField($model, 'lcsig', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'prn'); ?>
		<?php echo $form->textField($model, 'prn', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'registered'); ?>
		<?php echo $form->textField($model, 'registered', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cref'); ?>
		<?php echo $form->textField($model, 'cref', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'theid'); ?>
		<?php echo $form->textField($model, 'theid', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'abal'); ?>
		<?php echo $form->textField($model, 'abal', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'rs'); ?>
		<?php echo $form->textField($model, 'rs', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'sponsor_no'); ?>
		<?php echo $form->textField($model, 'sponsor_no', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'old_number'); ?>
		<?php echo $form->textField($model, 'old_number', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'username'); ?>
		<?php echo $form->textField($model, 'username', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'date'); ?>
		<?php echo $form->textField($model, 'date', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'scat'); ?>
		<?php echo $form->textField($model, 'scat', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'statsig'); ?>
		<?php echo $form->textField($model, 'statsig', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'statdata'); ?>
		<?php echo $form->textField($model, 'statdata', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'libreg'); ?>
		<?php echo $form->textField($model, 'libreg', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'lregcomm'); ?>
		<?php echo $form->textField($model, 'lregcomm', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'lreguser'); ?>
		<?php echo $form->textField($model, 'lreguser', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'lregdate'); ?>
		<?php echo $form->textField($model, 'lregdate', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'lib_arrears'); ?>
		<?php echo $form->textField($model, 'lib_arrears', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'libmess1'); ?>
		<?php echo $form->textField($model, 'libmess1', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'override'); ?>
		<?php echo $form->textField($model, 'override', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'hostel'); ?>
		<?php echo $form->textField($model, 'hostel', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'host_term'); ?>
		<?php echo $form->textField($model, 'host_term', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'h_fee_date'); ?>
		<?php echo $form->textField($model, 'h_fee_date', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'hostarrear'); ?>
		<?php echo $form->textField($model, 'hostarrear', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'prov'); ?>
		<?php echo $form->textField($model, 'prov', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'dist'); ?>
		<?php echo $form->textField($model, 'dist', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'hos_arrear'); ?>
		<?php echo $form->textField($model, 'hos_arrear', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'lreg'); ?>
		<?php echo $form->textField($model, 'lreg', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'lof'); ?>
		<?php echo $form->textField($model, 'lof', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'lcnumber'); ?>
		<?php echo $form->textField($model, 'lcnumber', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'module_id'); ?>
		<?php echo $form->dropDownList($model, 'module_id', GxHtml::listDataEx(Module::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'date_modified'); ?>
		<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
