<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);
/*
$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);*/
?>

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
<br />
<div class="staff-profile">
<?php 
	//structure passport photo url
	$photo = str_replace("/", "-", $model->pf_number).'.JPG';
	echo CHtml::image(Yii::app()->baseUrl.'/images/staff/'.$photo,'Passport photo not yet submitted',array('height'=>150,'class'=>'passport')); 

?>
</div><br /><br /><br />
<h1><?php echo GxHtml::valueEx($model->title).' '.GxHtml::encode($model->surname.' '.$model->firstname.' '.$model->othername.' ('.$model->pf_number.')'); ?></h1>
<br />

<table class="staff_div">
<tr>
<td>

<?php

		//employment
		$emp = GxHtml::openTag('table');
		$emp .= '<tr>
				<th>Designation</th>
				<th>Period</th>
				<th>Office</th>
				<th>Grade</th>
				<th>Basic Salary</th>
				<th colspan="2">House Allowance</th>
				';
		$emp .= '<tr>
				<th colspan="9"><hr /></th>
				';
		$now=time();//capture current time		
		foreach($model->employeeEmployments as $relatedModel) {
			$emp .= GxHtml::openTag('tr');
			$emp .= '<td>'.$relatedModel->position.'</td>';
			if(empty($relatedModel->d_end)){
				$end = 'Now';
			}
			else $end = $relatedModel->d_end;
			$emp .= '<td>'.$relatedModel->d_start.' - '.$end.'</td>';
			$emp .= '<td>'.$relatedModel->position->office.'</td>';
			$emp .= '<td>'.$relatedModel->grade.'</td>';
			$emp .= '<td>'.$relatedModel->salaryScale->basic_salary.'</td>';
			$emp .= '<td>'.$relatedModel->salaryScale->house_allowance.'</td>';
			$emp .= '<td>'.GxHtml::link("View", array('employeeEmployment/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$emp .= '<td>'.GxHtml::link("Update", array('employeeEmployment/update', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$emp .= GxHtml::closeTag('tr');
		}
	
		$emp .=
			"<tr><td colspan='10'><hr />".
			CHtml::link('<span id="add_new_item" class="icon-plus" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Add employment details ', array('//hr/employeeEmployment/create','id'=>$model->id))
			."</td></tr>";
			
		$emp .= GxHtml::closeTag('table');
		
		//bank 
		$bk = GxHtml::openTag('table');
		$bk .= '<tr>
				<th>Bank</th>
				<th>Account Number</th>
				<th>Branch</th>
				<th colspan="2">Active</th>
				';
		$bk .= '<tr>
				<th colspan="9"><hr /></th>
				';
				
		foreach($model->employeeBanks as $relatedModel) {
			$bk .= GxHtml::openTag('tr');
			$bk .= '<td>'.$relatedModel->bank.'</td>';
			$bk .= '<td>'.$relatedModel->account_number.'</td>';
			$bk .= '<td>'.$relatedModel->branch.'</td>';
			$bk .= '<td colspan="3">'.(($relatedModel->status==1)?'Yes':'No').'</td>';
			
			$bk .= '<td>'.GxHtml::link("View", array('employeeBank/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$bk .= '<td>'.GxHtml::link("Update", array('employeeBank/update', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$bk .= GxHtml::closeTag('tr');
		}
	
		$bk .=
			"<tr><td colspan='9'><hr />".
			CHtml::link('<span id="add_new_item" class="icon-plus" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Add bank details ', array('//hr/employeeBank/create','id'=>$model->id))
			."</td></tr>";
			
		$bk .= GxHtml::closeTag('table');
		
		
		//qualifications
		$ql = GxHtml::openTag('table');
		$ql .= '<tr>
				<th>Level</th>
				<th>Qualification Name</th>
				<th>Institution</th>
				<th>Year</th>
				<th colspan="2">Award</th>
				';
		$ql .= '<tr>
				<th colspan="9"><hr /></th>
				';
				
		foreach($model->employeeQualifications as $relatedModel) {
			$ql .= GxHtml::openTag('tr');
			$ql .= '<td>'.$relatedModel->level.'</td>';
			$ql .= '<td>'.$relatedModel->name.'</td>';
			$ql .= '<td>'.$relatedModel->institution.'</td>';
			$ql .= '<td>'.$relatedModel->year.'</td>';
			$ql .= '<td>'.$relatedModel->award.'</td>';
			$ql .= '<td>'.GxHtml::link("View", array('employeeQualification/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$ql .= '<td>'.GxHtml::link("Update", array('employeeQualification/update', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$ql .= GxHtml::closeTag('tr');
		}
	
		$ql .=
			"<tr><td colspan='9'><hr />".
			CHtml::link('<span id="add_new_item" class="icon-plus" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Add qualifications details ', array('//hr/employeeQualification/create','id'=>$model->id))
			."</td></tr>";
			
		$ql .= GxHtml::closeTag('table');
		
		//dependant
		$dp = GxHtml::openTag('table');
		$dp .= '<tr>
				<th>Relationship</th>
				<th>Dependant Names</th>
				<th colspan="2">Gender</th>
				';
		$dp .= '<tr>
				<th colspan="9"><hr /></th>
				';
				
		foreach($model->employeeDependants as $relatedModel) {
			$dp .= GxHtml::openTag('tr');
			$dp .= '<td>'.$relatedModel->relationship.'</td>';
			$name = $relatedModel->surname.' '.$relatedModel->firstname.' '.$relatedModel->othername;
			$dp .= '<td>'.$name.'</td>';
			$dp .= '<td>'.$relatedModel->gender.'</td>';
			$dp .= '<td>'.GxHtml::link("View", array('employeeDependant/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$dp .= '<td>'.GxHtml::link("Update", array('employeeDependant/update', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$dp .= GxHtml::closeTag('tr');
		}
	
		$dp .=
			"<tr><td colspan='9'><hr />".
			CHtml::link('<span id="add_new_item" class="icon-plus" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Add dependant ', array('//hr/employeeDependant/create','id'=>$model->id))
			."</td></tr>";
			
		$dp .= GxHtml::closeTag('table');
		
		//next of kin
		$nk = GxHtml::openTag('table');
		$nk .= '<tr>
				<th>Relationship</th>
				<th>Next of Kin Names</th>
				<th>Level</th>
				<th colspan="2">Active</th>
				';
		$nk .= '<tr>
				<th colspan="9"><hr /></th>
				';
				
		foreach($model->employeeNextOfKin as $relatedModel) {
			$nk .= GxHtml::openTag('tr');
			$nk .= '<td>'.$relatedModel->relationship.'</td>';
			$name = $relatedModel->surname.' '.$relatedModel->firstname.' '.$relatedModel->othername;
			$nk .= '<td>'.$name.'</td>';
			$nk .= '<td>'.$relatedModel->level.'</td>';
			$nk .= '<td colspan="3">'.(($relatedModel->status==1)?'Yes':'No').'</td>';
			$nk .= '<td>'.GxHtml::link("View", array('employeeNok/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$nk .= '<td>'.GxHtml::link("Update", array('employeeNok/update', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$nk .= GxHtml::closeTag('tr');
		}
	
		$nk .=
			"<tr><td colspan='9'><hr />".
			CHtml::link('<span id="add_new_item" class="icon-plus" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Add next of kin ', array('//hr/employeeNok/create','id'=>$model->id))
			."</td></tr>";
			
		$nk .= GxHtml::closeTag('table');
		
		
		//contact
		$ct = GxHtml::openTag('table');
		$ct .= '<tr>
				<th>Nationality</th>
				<th>County</th>
				<th>Postal address</th>
				<th>Email address</th>
				<th colspan="2">Mobile phone</th>

				';
		$ct .= '<tr>
				<th colspan="9"><hr /></th>
				';
		foreach($model->employeeContacts as $relatedModel) {
			$ct .= GxHtml::openTag('tr');
			$ct .= '<td>'.$relatedModel->nationality.'</td>';
			$ct .= '<td>'.$relatedModel->county.'</td>';
			$postaladdress = $relatedModel->postal_address.' '.$relatedModel->postal_code.' '.$relatedModel->town;
			$ct .= '<td>'.$postaladdress.'</td>';
			$ct .= '<td>'.$relatedModel->email.'</td>';
			$ct .= '<td>'.$relatedModel->mobile.'</td>';
			$ct .= '<td>'.GxHtml::link("View", array('employeeContact/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$ct .= '<td>'.GxHtml::link("Update", array('employeeContact/update', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$ct .= GxHtml::closeTag('tr');
		}
	
		$ct .=
			"<tr><td colspan='9'><hr />".
			CHtml::link('<span id="add_new_item" class="icon-plus" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Add contact ', array('//hr/employeeContact/create','id'=>$model->id))
			."</td></tr>";
			
		$ct .= GxHtml::closeTag('table');
		
		
		//disability
		$ds = GxHtml::openTag('table');
		$ds .= '<tr>
				<th>Disability description</th>
				<th colspan="2"></th>

				';
		$ds .= '<tr>
				<th colspan="9"><hr /></th>
				';
		foreach($model->employeeDisability as $relatedModel) {
			$ds .= GxHtml::openTag('tr');
			$ds .= '<td>'.$relatedModel->description.'</td>';
			$ds .= '<td>'.GxHtml::link("View", array('employeeDisability/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$ds .= '<td>'.GxHtml::link("Update", array('employeeDisability/update', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$ds .= GxHtml::closeTag('tr');
		}
	
		$ds .=
			"<tr><td colspan='6'><hr />".
			CHtml::link('<span id="add_new_item" class="icon-plus" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Add disabilty information ', array('//hr/employeeDisability/create','id'=>$model->id))
			."</td></tr>";
			
		$ds .= GxHtml::closeTag('table');
		
		//uploads
		$fl = GxHtml::openTag('table');
		$fl .= '<tr>
				<th>Document category</th>
				<th>Description/ name</th>
				<th colspan="2"></th>

				';
		$fl .= '<tr>
				<th colspan="9"><hr /></th>
				';
		foreach($model->employeeDocs as $relatedModel) {
			$fl .= GxHtml::openTag('tr');
			$fl .= '<td>'.$relatedModel->category.'</td>';
			$fl .= '<td>'.$relatedModel->file_name.'</td>';
			$fl .= '<td>'.GxHtml::link("View", array('employeeDoc/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$fl .= '<td>'.GxHtml::link("Update", array('employeeDoc/update', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$fl .= GxHtml::closeTag('tr');
		}
	
		$fl .=
			"<tr><td colspan='9'><hr/>".
			CHtml::link('<span id="add_new_item" class="icon-upload" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Upload Document ', array('//hr/employeeDoc/create','id'=>$model->id))
			."</td></tr>";
			
		$fl .= GxHtml::closeTag('table');
		
		
?>

<?php $this->widget('bootstrap.widgets.TbTabs', array(
    'type'=>'tabs',
    'placement'=>'left', // 'above', 'right', 'below' or 'left'
    'tabs'=>array(
	
		array(
		'label'=>'Biodata', 
		'content'=>
			"<table class='account'>
			
			<tr>
			<td>
			<table class='account'>
			<tr><td class='lbl1'>Salutation:</td><td>".$model->title."</td></tr>
			<tr><td class='lbl1'>Surname:</td><td>".$model->surname."</td></tr>
			<tr><td class='lbl1'>First Name:</td><td>".$model->firstname."</td></tr>
			<tr><td class='lbl1'>Other Names:</td><td>".$model->othername."</td></tr>
			<tr><td class='lbl1'>Gender:</td><td>".$model->gender."</td></tr>
			<tr><td class='lbl1'>Ethnicity:</td><td>".$model->ethnicity."</td></tr>
			<tr><td class='lbl1'>Religion:</td><td>".$model->religion."</td></tr>
			</table>
			</td>
			<td>
			<table class='account'>
			<tr><td class='lbl1'>Date of Birth:</td><td>".$model->dob."</td></tr>
			<tr><td class='lbl1'>Terms of employment:</td><td>".$model->empTerms."</td></tr>
			<tr><td class='lbl1'>PF Number:</td><td>".$model->pf_number."</td></tr>
			<tr><td class='lbl1'>ID Number:</td><td>".$model->id_number."</td></tr>
			<tr><td class='lbl1'>NSSF Number:</td><td>".$model->nssf_number."</td></tr>
			<tr><td class='lbl1'>NHIF Number:</td><td>".$model->nhif_number."</td></tr>
			<tr><td class='lbl1'>PIN:</td><td>".$model->pin_number."</td></tr>
			</table>
			</td>
			</tr>
			
			<tr>
			<td colspan='2'><hr />".
			CHtml::link('<span id="add_new_item" class="icon-pencil" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Edit Biodata', array('//hr/employee/update','id'=>$model->id))
			."
			<td> </td>
			</tr>
			</table>",
			
			'active'=>true
		),
		
		array(
		'label'=>'Employment', 
		'content'=>$emp,
			
		),
		
		
		array(
		'label'=>'Bank Details', 
		'content'=>$bk,
			
		),
		
		array(
		'label'=>'Qualifications', 
		'content'=>$ql,
			
		),
		
		array(
		'label'=>'Dependants', 
		'content'=>$dp,
			
		),
		
		array(
		'label'=>'Next of Kin', 
		'content'=>$nk,
			
		),
		
		array(
		'label'=>'Contacts', 
		'content'=>$ct,
			
		),
		
		array(
		'label'=>'Disabilty', 
		'content'=>$ds,
			
		),
		
		array(
		'label'=>'Documents/ Uploads', 
		'content'=>$fl,
			
		),
		
     ),  
)); ?>

</td>
</tr>
</table>

<br /><br /><br /><br />
