<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm',
		array(
		'action'=>Yii::app()->createUrl('//examinations/score/classTranscript/format/pdf')
		)
	); 

?>

<fieldset>

<legend>
<h2>Programme: <?php echo  $students[0]['programme'];?> | Class Code: <?php echo $students[0]['class_code'];?> 

 Transcript for <?php echo 'Year '.$year_of_study.$final;?>  </h2>
 
</legend>

<table class="items table  table-bordered table-condensed">

<tr>
<th>
<?php echo CHtml::checkbox('toggler',false,array('id'=>'toggler'));?>
</th>
<th>S/N</th>
<th>Reg. Number</th>
<th>Student Name</th>
<th>Scores</th>
</tr>

<?php
	Yii::app()->clientScript->registerScript('show', "
		$('#toggler').click(function(){
					
			if ($('#toggler').attr('checked'))
			$('.studs').attr('checked',true)
			else $('.studs').attr('checked',false)
	});
	");
?>

<?php for ($i=0;$i<count($students);$i++):?>

<tr>
<td><?php echo CHtml::checkbox('studentids[]',false,array('value'=>$students[$i]->id,'checked'=>'checked','class'=>'studs'));?></td>
<td><?php echo $i+1;?></td>

<td><?php echo $students[$i]['reg_number'];?></td>	

<td><?php echo $students[$i]->firstname.' '.$students[$i]->surname.' '.$students[$i]->othername;?></td>



	<?php foreach ($scores->getData() as $data => $singleRecord):?>
	
		<?php if($students[$i]['reg_number'] == $singleRecord->student_reg):?>
		
		<td>
		<table>
		<tr><td><?php echo $singleRecord->course_unit;?></td></tr>
		<tr><td><?php echo $singleRecord->marks_obtained;?></td></tr>
		</table>
		</td>
			
		<?php endif;?>
		
	<?php endforeach;?>

</tr>	

<?php endfor;?>

</table>



<?php $model->student_reg = $students[0]['class_code']; echo $form->hiddenField($model, 'student_reg'); ?>
<?php $model->year_of_study = $year_of_study; echo $form->hiddenField($model, 'year_of_study'); ?>



<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Generate Printable Transcripts for the Selected Students',
    'type'=>'warning', 
	'buttonType'=>'submit',
    'size'=>'large', 
	'icon' => 'ok',
)); 
?>

<?php
$this->endWidget();
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<br /><br/>

<?php /** @var BootActiveForm $form */
$form2 = $this->beginWidget('bootstrap.widgets.TbActiveForm',
		array(
		'action'=>Yii::app()->createUrl('//examinations/score/classTranscript/format/delete')
		)
	); 

?>

<?php $model->student_reg = $students[0]['class_code']; echo $form2->hiddenField($model, 'student_reg'); ?>
<?php $model->year_of_study = $year_of_study; echo $form2->hiddenField($model, 'year_of_study'); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Delete Results for this Class',
    'type'=>'danger', 
	'buttonType'=>'submit',
    'size'=>'large', 
	'icon' => 'trash',
	'htmlOptions' => array(
		//'name'=>'ActionButton',
		'confirm'=>'Are you sure you want to delete results for this class, remember the action CANNOT BE REVERVED?',
	),
	
)); 
?>

<?php
$this->endWidget();
?>
<br/><br/>
</fieldset>