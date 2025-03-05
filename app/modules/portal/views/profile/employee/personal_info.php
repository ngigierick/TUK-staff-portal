<style>
/* printing */
table.staff_div{
	width:100%;
	margin-bottom: 10px;
}
table.staff_div tr td tr td{
	border:1px dotted #dedede;
}
 table td{
	font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
	font-size:12px;
	padding:5px 7px;
	border:0px solid #dedede;
	color:#555;
	
}
table td.lbl1{
	
	font-weight:bold;
	text-transform:uppercase;

}
table.staff_div td.picture{
	border:1px solid #777;
	z-index:100;
	width:100px;
}

table th{
	text-align:left;
	text-transform:uppercase;
	color:#333;
	padding:7px 2px;
}
td.header{
	
	font-weight:bold;
	text-transform:uppercase;
	color:#efefef;
	background:#888;
	font-size:18px;
	padding:3px 10px;
}
span.num{
	color:#888;
	font-style:italic;
	font-size:14px;
}

.notes
{
	font-size: 12px;
    text-align: start;
	color: #777;
	font-style:italic;
	padding:20px 5px;
	text-align: left;
	letter-spacing:1px;
}
table td b{
	margin-right:20px;
}
td.email{
	text-transform:lowercase !important;
}
span.notes
{
	font-size:11px;
	color:#888;
}
h1{
	font-size:18px;
	
	margin-bottom:2px;
	
}
 h1.title{
	font-size:18px;
	text-align:center;
	margin-bottom:2px;
	
}
p.center{
	text-align:center;
	font-size:10px;
}

 h2{
	font-size:17px;
	text-align:center;
	margin-bottom:2px;
	
}

 h4{
	font-size:15px;
	font-weight:bold;
}
.home legend{
	font-size:17px;

}
.passport1{
	
	border:1px solid #dedede;
}


/* end print */
</style>
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


<?php	$this->renderPartial('employee/header', array('model'=>$model));?>

<table class="staff_div profile">
	<tr>
	<td class="header" colspan="2">
	<span class="icon-flag"></span> SUMMARY OF IMPORTANT NOTIFICATIONS
	</td>
	</tr>
	<tr>
		<td class="profile">
			<?php
				 $today = new DateTime();
				 $dob = DateTime::createFromFormat('d/m/Y',$model->dob);
				 $emp = EmployeeEmployment::model()->find('position_id=?',array($model->current_designation_id));
				 $cat = EmployeeCategory::model()->findByPk($emp->category_id);
				 $dff = $today->diff($dob); 
				 $yrs = $dff->format('%y');
				 $rem = $cat->retirement - $yrs;
				 
				 if ($rem>=0){
					
					$s = 'P'.$rem.'Y';
					$interval = new DateInterval($s);
					$today->add($interval);
					$termination = $today->format('d/m/Y');
					$r = ' [remaining '.$rem. ' years]';
				}
				else{
					
					$rem = $rem*-1;
					$s = 'P'.$rem.'Y';
					$interval = new DateInterval($s);
					$interval->invert = 1; 
					$today->add($interval);
					$termination = $today1->format('d/m/Y');
					$r = ' [exceeded '.$rem. ' years]';
				}
				
				
			?>
			<table style='width:100%;'>
				<tr><td class='lbl1'>Expected Termination Date:</td><td><span class="read"><?php echo $termination.'&nbsp;&nbsp;&nbsp;'.$r;?></span></td></tr>
				<tr><td class='lbl1'>No of Dependants:</td><td><span class="read"><?php echo count($model->employeeDependants);?></span></td></tr>
				<tr><td class='lbl1'>No of Next of Kin:</td><td><span class="read"><?php echo count($model->employeeNextOfKin);?></span></td></tr>
				<tr><td class='lbl1'>No of Beneficiaries:</td><td><span class="read"><?php echo count($model->employeeBeneficiary);?></span></td></tr>
			</table>
		
		</td>
	</tr
<tr>
<td class="header" colspan="2">
<span class="icon-user"></span> BIO-DATA AND RELATED INFORMATION
</td>
</tr>
<tr>
	<td class="profile">
		<?php $str="
		<table class='account' style='width:100%;'>
			
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
			<tr><td class='lbl1'>Date of Birth:</td><td>".$model->dob."</td></tr>
			<tr><td class='lbl1'>Terms of Employment:</td><td>".$model->empTerms."</td></tr>
			<tr><td class='lbl1'>PF Number:</td><td>".$model->pf_number."</td></tr>
			<tr><td class='lbl1'>ID Number:</td><td>".$model->id_number."</td></tr>
			<tr><td class='lbl1'>NSSF Number:</td><td>".$model->nssf_number."</td></tr>
			<tr><td class='lbl1'>NHIF Number:</td><td>".$model->nhif_number."</td></tr>
			<tr><td class='lbl1'>PIN:</td><td>".$model->pin_number."</td></tr>
			</table>
			</td>
			</tr>
		</table>";
		
		echo $str;?>
	</td>
	
</tr>
<tr>
<td class="header" colspan="2">
<span class="icon-thumbs-up"></span> EMPLOYMENT HISTORY IN THE TECHNICAL UNIVERSITY OF KENYA
</td>
</tr>
<tr>
	<td class="profile">
		<?php 
		//employment
		$emp = "<table class='account' style='width:100%;'>";
		$emp .= '<tr>
				<th>Designation</th>
				<th>Period</th>
				<th>Grade</th>
				
				<th colspan="2"></th>
				';
		
		$now=time();//capture current time	
		$criteria = new CDbCriteria;
		$criteria->condition  = "t.pf_number='".$model->pf_number."'";
		$criteria->order='d_start DESC';
		$employment = EmployeeEmployment::model()->findAll($criteria);	
		
		foreach($employment as $relatedModel) {
			$emp .= GxHtml::openTag('tr');
			$emp .= '<td>'.$relatedModel->position.' at '.$relatedModel->position->name.'</td>';
			if(empty($relatedModel->d_end)){
				$end = 'Now';
				
				
				if ($relatedModel->id==$model->current_designation_id){
					
					$today = new DateTime();
				
					$today1 = new DateTime(); 
					$dob = DateTime::createFromFormat('d/m/Y',$model->dob);
					//get category
					$cat = EmployeeCategory::model()->findByPk($relatedModel->category_id);
					$dff = $today1->diff($dob); 
					$yrs =  $dff->format('%y');
					$rem = $cat->retirement - $yrs;
				
					if ($rem>=0){
					
					$s = 'P'.$rem.'Y';
					$interval = new DateInterval($s);
					$today1->add($interval);
					$termination = $today1->format('d/m/Y');
					$r = '<br/>[remaining '.$rem. ' years]';
					}
					else{
						
						$rem = $rem*-1;
						$s = 'P'.$rem.'Y';
						$interval = new DateInterval($s);
						$interval->invert = 1; 
						$today1->add($interval);
						$termination = $today1->format('d/m/Y');
						$r = '<br/>[exceeded '.$rem. ' years]';
					}
				}
				
				
				
				
				
			}
			else{
				
				$end = $relatedModel->d_end;
				$today = DateTime::createFromFormat('d/m/Y',$relatedModel->d_end);
				$termination = $relatedModel->d_end;
				
				$today1 = new DateTime(); 
				$df = $today1->diff($today);
				$y =  $df->format('%y');
				$m = $df->format('%m');
				$d = $df->format('%d');
				
				$dur = ($y>0)?$y.' years ':'';
				$dur .= ($m>0)?$m.' months':'';
				//$dur .= ($d>0)?--$months.' days':'';
				$r='<br>['.$dur.']';
				//$started = DateTime::createFromFormat('d/m/Y',$relatedModel->d_start);
			} 
			
			
			
			//calculate duration
			/*$started = DateTime::createFromFormat('d/m/Y',$relatedModel->d_start);
			
			$diff = $started->diff($today); 
			$years =  $diff->format('%y');
			$months = $diff->format('%m');
			
			$duration = ($years>0)?$years.' years ':'';
			$duration .= ($months>0)?$months.' months':'';*/
			//$years++;
			//$emp .= '<td>'.$relatedModel->d_start.' - '.$end.'<br/>('.$duration.')</td>';
			$emp .= '<td>'.$relatedModel->d_start.' - '.$end;
			$emp .= '<td>'.$relatedModel->grade.'</td>';
			
			//$st = SalaryScale::model()->find('category_id=? AND grade_id=? AND step=?',array($relatedModel->category_id, $relatedModel->starting_grade_id, $years));
			
			//$emp .= '<td>'.$termination.$r.'</td>';

			
			$emp .= GxHtml::closeTag('tr');
		}
	
		
			
		$emp .= GxHtml::closeTag('table');
		
		echo $emp;?>
	</td>
	
</tr>
<tr>
<td class="header" colspan="2">
<span class="icon-book"></span> OFFICIAL BANK DETAILS
</td>
</tr>
<tr>
	<td class="profile">
		<?php
			//bank 
			$bk = "<table class='account' style='width:100%;'>";
			$bk .= '<tr>
					<th>Bank</th>
					<th>Account Number</th>
					<th>Branch</th>
					<th colspan="2">Status</th>
					';
		
					
			foreach($model->employeeBanks as $relatedModel) {
				$bk .= GxHtml::openTag('tr');
				$bk .= '<td>'.$relatedModel->bank.'</td>';
				$bk .= '<td>'.$relatedModel->account_number.'</td>';
				$bk .= '<td>'.$relatedModel->branch.'</td>';
				$bk .= '<td colspan="3">'.(($relatedModel->status==1)?'Active':'Disabled').'</td>';
				
				
				$bk .= GxHtml::closeTag('tr');
			}
		
			
				
			$bk .= GxHtml::closeTag('table');
			
			echo $bk;
		?>
	</td>
</tr>
<tr>
<td class="header" colspan="2">
<span class="icon-group"></span> LIST OF DEPENDANTS
</td>
</tr>
<tr>
	<td class="profile">
		<?php
			//dependant
		$dp = "<table class='account' style='width:100%;'>";
		$dp .= '<tr>
				<th>Relationship</th>
				<th>Dependant Names</th>
				<th colspan="2">Gender</th>
				';
		
				
		foreach($model->employeeDependants as $relatedModel) {
			$dp .= GxHtml::openTag('tr');
			$dp .= '<td>'.$relatedModel->relationship.'</td>';
			$name = $relatedModel->surname.' '.$relatedModel->firstname.' '.$relatedModel->othername;
			$dp .= '<td>'.$name.'</td>';
			$dp .= '<td>'.$relatedModel->gender.'</td>';
			$dp .= GxHtml::closeTag('tr');
		}
	
		
			
		$dp .= GxHtml::closeTag('table');
			
		echo $dp;
		
		?>
	</td>
</tr>
<tr>
<td class="header" colspan="2">
<span class="icon-flag"></span> NEXT OF KIN ( IN CASE OF EMERGENCY THESE PEOPLE CAN USED TO REACH YOU)
</td>
</tr>
<tr>
	<td class="profile">
		<?php
	
		$nk = "<table class='account' style='width:100%;'>";
		$nk .= '<tr>
				<th>Relationship</th>
				<th>Next of Kin Names</th>
				<th>Level</th>
				<th colspan="2">Active</th>
				';
		
				
		foreach($model->employeeNextOfKin as $relatedModel) {
			$nk .= GxHtml::openTag('tr');
			$nk .= '<td>'.$relatedModel->relationship.'</td>';
			$name = $relatedModel->surname.' '.$relatedModel->firstname.' '.$relatedModel->othername;
			$nk .= '<td>'.$name.'</td>';
			$nk .= '<td>'.$relatedModel->level.'</td>';
			$nk .= '<td colspan="3">'.(($relatedModel->status==1)?'Yes':'No').'</td>';
			
			$nk .= GxHtml::closeTag('tr');
		}
	
		
			
		$nk .= GxHtml::closeTag('table');
			
		echo $nk;
		
		?>
	</td>
</tr>
<tr>
<td class="header" colspan="2">
<span class="icon-list"></span> YOUR BENEFICIARIES
</td>
</tr>
<tr>
	<td class="profile">
		<?php
	
		
		//beneficiaries
		$bf =  "<table class='account' style='width:100%;'>";
		$bf .= '<tr>
				<th>Relationship</th>
				<th>Beneficiary Names</th>
				<th>Share Percentage</th>
				<th colspan="2">Active</th>
				';
		
				
		foreach($model->employeeBeneficiary as $relatedModel) {
			$bf .= GxHtml::openTag('tr');
			$bf .= '<td>'.$relatedModel->relationship.'</td>';
			$name = $relatedModel->surname.' '.$relatedModel->firstname.' '.$relatedModel->othername;
			$bf .= '<td>'.$name.'</td>';
			$bf .= '<td>'.$relatedModel->benefit_percentage.'</td>';
			$bf .= '<td colspan="3">'.(($relatedModel->status==1)?'Yes':'No').'</td>';
		
			$bf .= GxHtml::closeTag('tr');
		}
	
			
		$bf .= GxHtml::closeTag('table');
			
		echo $bf;
		
		?>
	</td>
</tr>
<tr>
<td class="header" colspan="2">
<span class="icon-globe"></span> YOUR CONTACTS
</td>
</tr>
<tr>
	<td class="profile">
		<?php
	
		
		//beneficiaries
		$ct =  "<table class='account' style='width:100%;'>";
		$ct .= '<tr>
				<th>Nationality</th>
				<th>County</th>
				<th>Postal address</th>
				<th>Email address</th>
				<th colspan="2">Mobile phone</th>

				';
	
		foreach($model->employeeContacts as $relatedModel) {
			$ct .= GxHtml::openTag('tr');
			$ct .= '<td>'.$relatedModel->nationality.'</td>';
			$ct .= '<td>'.$relatedModel->county.'</td>';
			$postaladdress = $relatedModel->postal_address.' '.$relatedModel->postal_code.' '.$relatedModel->town;
			$ct .= '<td>'.$postaladdress.'</td>';
			$ct .= '<td>'.$relatedModel->email.'</td>';
			$ct .= '<td>'.$relatedModel->mobile.'</td>';
			$ct .= GxHtml::closeTag('tr');
		}
	
		
		$ct .= GxHtml::closeTag('table');
			
		echo $ct;
		
		?>
	</td>
</tr>
<tr>
<td class="header" colspan="2">
<span class="icon-th"></span> DIABILITY INFORMATION
</td>
</tr>
<tr>
	<td class="profile">
		<?php
		//disability
		$ds =  "<table class='account' style='width:100%;'>";
		$ds .= '<tr>
				<th>Disability description</th>
				<th colspan="2"></th>

				';
	
		foreach($model->employeeDisability as $relatedModel) {
			$ds .= GxHtml::openTag('tr');
			$ds .= '<td>'.$relatedModel->description.'</td>';
			$ds .= GxHtml::closeTag('tr');
		}
	
	
			
		$ds .= GxHtml::closeTag('table');
			
		echo $ds;
		
		?>
	</td>
</tr>
<tr>
<td class="header" colspan="2">
<span class="icon-download-alt"></span> DOCUMENTS (CERTIFICATES, BIRTH CERTIFICATES, TESTIMONIALS, ETC)
</td>
</tr>
<tr>
	<td class="profile">
		<?php

		$fl =  "<table class='account' style='width:100%;'>";
		$fl .= '<tr>
				<th>Document category</th>
				<th>Description/ name</th>
				<th colspan="2"></th>

				';
		
		foreach($model->employeeDocs as $relatedModel) {
			$fl .= GxHtml::openTag('tr');
			$fl .= '<td>'.$relatedModel->category.'</td>';
			$fl .= '<td>'.$relatedModel->file_name.'</td>';
			$fl .= GxHtml::closeTag('tr');
		}
	
		
			
		$fl .= GxHtml::closeTag('table');
			
		echo $fl;
		
		?>
	</td>
</tr>
</table>


		
	
