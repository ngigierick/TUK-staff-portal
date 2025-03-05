<h1>APPLICATION FOR 2014 SEPTEMBER INTAKE </h1>

<?php $count = $messages['count'];?>
<?php if ($count>0):?>
<?php echo $messages['txt'];?>
<?php endif;?>


<h2>STEPS FOR SUCCESSFUL APPLICATION PROCEDURE:</h2>

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
<table class="table stripped bordered condensed stage">
<tr class="header">
<th><h3>Step/ Stage</h3></th>
<th><h3>Status</h3></th>
<th><h3>Action</h3></th>
</tr>
<tr>
<td>
1 - Create Account with Us 
</td>
<td>
<span class="icon-ok done">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Done</span>
</td>
<td>
</td>
</tr>

<tr>
<td>
2 - Enter Personal Details  
</td>

<?php if (!empty($personalDetails->id)):?>
<td>
<span class="icon-ok done">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Done</span>
</td>
<td>
<?php echo  CHtml::link('<span id="add_new_item" class="icon-pencil" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Edit Details', array('//courseApplication/personalDetails/edit','id'=>$personalDetails->id));?>
</td>
<?php else:?>
<td class="pending">Pending</td>
<td>
<?php echo  CHtml::link('<span id="add_new_item" class="icon-plus" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;Enter Details Now! ', array('//courseApplication/personalDetails/add'));?>
</td>
<?php endif;?>

</tr>

<tr>
<td>
3 - Academic Qualifications
</td>
<?php if (isset($academicQualifications[0]->id)):?>
<td>
<span class="icon-ok done">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Done</span>
</td>
<td>
<?php echo  CHtml::link('<span id="add_new_item" class="icon-pencil" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Edit Qualifications', array('//courseApplication/AcademicQualifications/add','edit'=>$personalDetails->id));?>
</td>
<?php else:?>
<td class="pending">Pending</td>
<td>
<?php if (!empty($personalDetails->id)):?>
	<?php echo  CHtml::link('<span id="add_new_item" class="icon-plus" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;Add Qualifications ', array('//courseApplication/AcademicQualifications/add'));?>
<?php endif;?>
</td>
<?php endif;?>
</tr>


<tr>
<td>
3 - Choose your Course(s)
</td>
<?php if (count($courses)>0):?>
<td>
<span class="icon-ok done">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Done</span>
</td>
<td>
Number of Course(s) applied(<?php echo count($courses);?>)
<br/>
<?php echo  CHtml::link('<span id="add_new_item" class="icon-pencil" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Add or Remove Courses', array('//courseApplication/course/manage'));?>
</td>
<?php else:?>
<td class="pending">Pending</td>
<td>
	<?php if ( (!empty($personalDetails->id)) && (isset($academicQualifications[0]->id)) ):?>
		<?php echo  CHtml::link('<span id="add_new_item" class="icon-plus" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;Choose Course ', array('//courseApplication/course/add'));?>
	<?php endif;?>
</td>
<?php endif;?>
</tr>

<tr>
<td>
4 - Download and Print Application Form
</td>
<td colspan="2">
<?php if (count($courses)>0):?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Full Profile View',
    'type'=>'info', 
    'size'=>'mini', 
	'icon'=>'user',
	'url'=>array('//courseApplication/personalDetails/fullView'),
)); ?>
<br /><br />
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Print Preview your Application',
    'type'=>'success', 
    'size'=>'mini', 
	'icon'=>'print',
	'url'=>array('//courseApplication/personalDetails/preview'),
)); ?>
<?php else:?>
	<span class="pending">Pending</span>
<?php endif;?>
</td>
<td>
</td>
</tr>



<tr>
<td colspan="3">5 - Pay Application Fees KES 2, 000 using Application Number as Bank Reference Number
</td>
</tr>

<tr>
<td colspan="3">6 - Submit you Application Form together with the Bank Slip and Copies of your Certificates and Testimonials
</td>
</tr>


<tr>
<td colspan="3"><hr />
</td>
</tr>

<tr>
<td colspan="3">
<h3>Application Tracking Panel</h3>
<hr />
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Add Another Course',
    'type'=>'info', 
    'size'=>'mini', 
	'icon'=>'plus',
	'url'=>array('add'),
)); ?>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'applicant-grid',
	'type'=>'striped bordered condensed',
	'dataProvider' => $courses,
	//'filter' => '',
	'columns' => array(
		'programme',
		array(
				'name'=>'date_modified',
				'header'=>'Date of application',
				//'value'=>'date("M j, Y g:i A", $data->date_modified)',
				'value'=>'date("d/m/Y g:i A", $data->date_modified)',
				//'filter'=>GxHtml::listDataEx(Courseclass::model()->findAllAttributes(null, true)),
				),
	
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
			'template'=>'{delete}',
			'buttons'=>array(
          
					'delete' => array(
					'visible'=>'($data->status ==0)&&(Yii::app()->user->getState("role") === 999)',
					),
					
				),
		),
	),
)); ?>
</td>
</tr>
</table>

<hr />
<h2 class="unread">KINDLY NOTE THAT NO APPLICATION SHALL BE CONSIDERED WITHOUT OUR APPLICATION REFERENCE NUMBER</h2>

<hr />
