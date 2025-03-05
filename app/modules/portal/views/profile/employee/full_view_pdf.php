<?php $this->renderPartial('employee/pdf_header', array('model'=>$model));?>
<table class="table table-condensed table-bordered staff_div profile">
<tr>
<td class="header" colspan="2">
NAME: <?php echo $model->names(); ?>
</td>
</tr>
<tr>
<td width="85%" class="profile">
	<?php echo StaffHelper::contactsDisplay($model,1);?>
</td>
<td width="15%" class="picture"  align="center" valign="top" style="border:0px solid;background-color: #f6f6f6">
	<?php echo StaffHelper::pic($model);?>
</td>
</tr>
</table>

<?php if (count($model->employeeQualifications)>0) 
	$this->renderPartial('employee/full_view_part', array('model'=>$model,'heading'=>'EDUCATION','content'=>StaffHelper::qualificationsDisplay($model,1)));?>
<?php if ((count($model->employeeWorkExperience)>0)&&($model->id!=2026))
	$this->renderPartial('employee/full_view_part', array('model'=>$model,'heading'=>'WORK EXPERIENCE','content'=>StaffHelper::work($model,1)));?>
<?php if (count($model->employeeStatement)>0)
	$this->renderPartial('employee/full_view_part', array('model'=>$model,'heading'=>'GENERAL STATEMENT ON RESEARCH AREAS','content'=>StaffHelper::statement($model,1)));?>
<?php if (count($model->employeeProject)>0)
	$this->renderPartial('employee/full_view_part', array('model'=>$model,'heading'=>'CURRENT RESEARCH PROJECTS','content'=>StaffHelper::projects($model,1)));?>	
<?php if (count($model->employeePublication)>0)
	$this->renderPartial('employee/full_view_part', array('model'=>$model,'heading'=>'SELECTED PUBLICATIONS','content'=>StaffHelper::publications($model,1)));?>	
<?php if (count($model->employeeSupervision)>0)
	$this->renderPartial('employee/full_view_part', array('model'=>$model,'heading'=>'POSTGRADUATE STUDENTS SUPERVISION','content'=>StaffHelper::supervision($model,1)));?>	
<?php if (count($model->employeeCourses)>0)
	$this->renderPartial('employee/full_view_part', array('model'=>$model,'heading'=>'COURSES TAUGHT','content'=>StaffHelper::courses($model,1)));?>	
<?php if (count($model->employeeProfessional)>0)
	$this->renderPartial('employee/full_view_part', array('model'=>$model,'heading'=>'PROFESSIONAL AFFILIATIONS AND SOCIETIES','content'=>StaffHelper::professional($model,1)));?>	
<?php if (count($model->employeeExtra)>0)
	$this->renderPartial('employee/full_view_part', array('model'=>$model,'heading'=>'EXTRA INFORMATION','content'=>StaffHelper::extras($model,1)));?>	
