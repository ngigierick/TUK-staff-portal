<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('reg_number')); ?>:
	<?php echo GxHtml::encode($data->reg_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('course_code')); ?>:
	<?php echo GxHtml::encode($data->course_code); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('course_year')); ?>:
	<?php echo GxHtml::encode($data->course_year); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('study_year')); ?>:
	<?php echo GxHtml::encode($data->study_year); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('study_term')); ?>:
	<?php echo GxHtml::encode($data->study_term); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('class')); ?>:
	<?php echo GxHtml::encode($data->class); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('surname')); ?>:
	<?php echo GxHtml::encode($data->surname); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('name1')); ?>:
	<?php echo GxHtml::encode($data->name1); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('name2')); ?>:
	<?php echo GxHtml::encode($data->name2); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('title')); ?>:
	<?php echo GxHtml::encode($data->title); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('sex')); ?>:
	<?php echo GxHtml::encode($data->sex); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('dob')); ?>:
	<?php echo GxHtml::encode($data->dob); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('address1')); ?>:
	<?php echo GxHtml::encode($data->address1); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('address2')); ?>:
	<?php echo GxHtml::encode($data->address2); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('box')); ?>:
	<?php echo GxHtml::encode($data->box); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('town')); ?>:
	<?php echo GxHtml::encode($data->town); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('phone')); ?>:
	<?php echo GxHtml::encode($data->phone); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('extension')); ?>:
	<?php echo GxHtml::encode($data->extension); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('district')); ?>:
	<?php echo GxHtml::encode($data->district); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_number')); ?>:
	<?php echo GxHtml::encode($data->id_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('kencit')); ?>:
	<?php echo GxHtml::encode($data->kencit); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fee_payer')); ?>:
	<?php echo GxHtml::encode($data->fee_payer); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('employed')); ?>:
	<?php echo GxHtml::encode($data->employed); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('employer')); ?>:
	<?php echo GxHtml::encode($data->employer); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('employment_department')); ?>:
	<?php echo GxHtml::encode($data->employment_department); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('employer_box')); ?>:
	<?php echo GxHtml::encode($data->employer_box); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('employer_town')); ?>:
	<?php echo GxHtml::encode($data->employer_town); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('employer_phone')); ?>:
	<?php echo GxHtml::encode($data->employer_phone); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('location')); ?>:
	<?php echo GxHtml::encode($data->location); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('sub_location')); ?>:
	<?php echo GxHtml::encode($data->sub_location); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tlc')); ?>:
	<?php echo GxHtml::encode($data->tlc); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pat_date')); ?>:
	<?php echo GxHtml::encode($data->pat_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pat')); ?>:
	<?php echo GxHtml::encode($data->pat); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fee_date')); ?>:
	<?php echo GxHtml::encode($data->fee_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('term_address')); ?>:
	<?php echo GxHtml::encode($data->term_address); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('term_box')); ?>:
	<?php echo GxHtml::encode($data->term_box); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('term_town')); ?>:
	<?php echo GxHtml::encode($data->term_town); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nok_name')); ?>:
	<?php echo GxHtml::encode($data->nok_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nok_box')); ?>:
	<?php echo GxHtml::encode($data->nok_box); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nok_town')); ?>:
	<?php echo GxHtml::encode($data->nok_town); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nok_phone')); ?>:
	<?php echo GxHtml::encode($data->nok_phone); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fee_arrears')); ?>:
	<?php echo GxHtml::encode($data->fee_arrears); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('eoy_res')); ?>:
	<?php echo GxHtml::encode($data->eoy_res); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('xr')); ?>:
	<?php echo GxHtml::encode($data->xr); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('xrsig')); ?>:
	<?php echo GxHtml::encode($data->xrsig); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cc')); ?>:
	<?php echo GxHtml::encode($data->cc); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ccsig')); ?>:
	<?php echo GxHtml::encode($data->ccsig); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('lc')); ?>:
	<?php echo GxHtml::encode($data->lc); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('lcsig')); ?>:
	<?php echo GxHtml::encode($data->lcsig); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('prn')); ?>:
	<?php echo GxHtml::encode($data->prn); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('registered')); ?>:
	<?php echo GxHtml::encode($data->registered); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cref')); ?>:
	<?php echo GxHtml::encode($data->cref); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('theid')); ?>:
	<?php echo GxHtml::encode($data->theid); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('abal')); ?>:
	<?php echo GxHtml::encode($data->abal); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('rs')); ?>:
	<?php echo GxHtml::encode($data->rs); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('sponsor_no')); ?>:
	<?php echo GxHtml::encode($data->sponsor_no); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('old_number')); ?>:
	<?php echo GxHtml::encode($data->old_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('username')); ?>:
	<?php echo GxHtml::encode($data->username); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date')); ?>:
	<?php echo GxHtml::encode($data->date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('scat')); ?>:
	<?php echo GxHtml::encode($data->scat); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('statsig')); ?>:
	<?php echo GxHtml::encode($data->statsig); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('statdata')); ?>:
	<?php echo GxHtml::encode($data->statdata); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('libreg')); ?>:
	<?php echo GxHtml::encode($data->libreg); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('lregcomm')); ?>:
	<?php echo GxHtml::encode($data->lregcomm); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('lreguser')); ?>:
	<?php echo GxHtml::encode($data->lreguser); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('lregdate')); ?>:
	<?php echo GxHtml::encode($data->lregdate); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('lib_arrears')); ?>:
	<?php echo GxHtml::encode($data->lib_arrears); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('libmess1')); ?>:
	<?php echo GxHtml::encode($data->libmess1); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('override')); ?>:
	<?php echo GxHtml::encode($data->override); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('hostel')); ?>:
	<?php echo GxHtml::encode($data->hostel); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('host_term')); ?>:
	<?php echo GxHtml::encode($data->host_term); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('h_fee_date')); ?>:
	<?php echo GxHtml::encode($data->h_fee_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('hostarrear')); ?>:
	<?php echo GxHtml::encode($data->hostarrear); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('prov')); ?>:
	<?php echo GxHtml::encode($data->prov); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('dist')); ?>:
	<?php echo GxHtml::encode($data->dist); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('hos_arrear')); ?>:
	<?php echo GxHtml::encode($data->hos_arrear); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('lreg')); ?>:
	<?php echo GxHtml::encode($data->lreg); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('lof')); ?>:
	<?php echo GxHtml::encode($data->lof); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('lcnumber')); ?>:
	<?php echo GxHtml::encode($data->lcnumber); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('module_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->module)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />
	*/ ?>

</div>