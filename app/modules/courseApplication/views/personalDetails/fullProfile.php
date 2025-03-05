<h1>FULL PROFILE VIEW</h1>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Preview your Application',
    'type'=>'success', 
    'size'=>'mini', 
	'icon'=>'print',
	'url'=>array('//courseApplication/personalDetails/preview'),
)); ?>

<div class="home">
<fieldset><legend>Personal Details</legend>



<table class="table preview" width="100%">
<tr><td style="text-align:right" width="200"><b>Applicant Full Names: </b></td><td><?php echo $details->title;?> <?php echo $details->surname;?> <?php echo $details->firstname.' '.$details->othername;?></td></tr>
<tr><td style="text-align:right"><b>Module:</b> </td><td><?php echo $details->module;?></td></tr>
<tr><td style="text-align:right"><b>Birth Date:</b> </td><td><?php echo $details->dob;?></td></tr>
<tr><td style="text-align:right"><b>ID Number:</b> </td><td><?php echo $details->id_number;?></td></tr>
<tr><td style="text-align:right"><b>County:</b> </td><td><?php echo $details->county;?></td></tr>
<tr><td style="text-align:right"> </td>
<td>
<?php echo  CHtml::link('<span id="add_new_item" class="icon-pencil" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Edit Peronal Details', array('//courseApplication/personalDetails/edit','id'=>$details->id));?>
</td>
</tr>
</table>
</fieldset>

<fieldset><legend>Course(s) Applied for</legend>
<table class="table preview" width="100%">
<tr><td style="text-align:right"><b>Course Code:</b> </td><td>Course name</td></tr>
<?php for($i=0;$i<count($courses);$i++):?>
<tr><td style="text-align:right"><?php echo $courses[$i]->programme_id;?> </td><td><?php echo $courses[$i]->programme;?></td></tr>
<?php endfor;?>
<tr><td style="text-align:right"> </td>
<td>
<?php echo  CHtml::link('<span id="add_new_item" class="icon-pencil" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Add or remove courses', array('//courseApplication/course/manage'));?>
</td>
</tr>
</table>
</fieldset>


<fieldset><legend>Academic Qualifications</legend>
<table class="table preview" width="100%">
<?php for($s=0;$s<count($academicQual);$s++):?>
	<?php if (!empty($academicQual[$s]->school)):?>
	<tr>
	<td style="text-align:right" width="200"><b><?php echo $academicQual[$s]->name;?>:</b></td>
	<td>
	<?php echo $academicQual[$s]->year;?>,
	<?php echo $academicQual[$s]->school;?>,
	<?php echo $academicQual[$s]->grade;?>,
	</td>
	</tr>
	<?php endif;?>
<?php endfor;?>
<tr>
<td>
</td>
<td>
<?php echo  CHtml::link('<span id="add_new_item" class="icon-pencil" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Edit Qualifications', array('//courseApplication/AcademicQualifications/add','edit'=>$details->id));?>
</td>

</table>
</fieldset>


<fieldset><legend>Contact Details</legend>

<table class="table preview" width="100%">
<tr><td style="text-align:right" width="200"><b>Postal Address: </b></td><td> P.O. Box <?php echo $details->postal_address;?> <?php echo $details->postcode;?> <?php echo $details->town;?> </td></tr>
<tr><td style="text-align:right"><b>Mobile:</b></td><td> <?php echo $details->mobile;?></td></tr>
<tr><td style="text-align:right"><b>Email:</b></td><td class="email" style="text-transform:lowercase"> <?php echo $details->email;?></td></tr>
<tr><td style="text-align:right"> </td>
<td>
<?php echo  CHtml::link('<span id="add_new_item" class="icon-pencil" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Edit Contact Details', array('//courseApplication/personalDetails/edit','id'=>$details->id));?>
</td>
</tr>
</table>
</fieldset>
</div>

<hr />

<br /><br />
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Preview your Application',
    'type'=>'success', 
    'size'=>'mini', 
	'icon'=>'print',
	'url'=>array('//courseApplication/personalDetails/preview'),
)); ?>

<br /><br /><br /><br />