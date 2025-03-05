<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('semester_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->semester)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('student_reg')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->studentReg)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('course_unit_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->courseUnit)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('exam_type_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->examType)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('year_of_study')); ?>:
	<?php echo GxHtml::encode($data->year_of_study); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('semester_of_study')); ?>:
	<?php echo GxHtml::encode($data->semester_of_study); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('marks_obtained')); ?>:
	<?php echo GxHtml::encode($data->marks_obtained); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('marks_total')); ?>:
	<?php echo GxHtml::encode($data->marks_total); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('grade')); ?>:
	<?php echo GxHtml::encode($data->grade); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('remarks')); ?>:
	<?php echo GxHtml::encode($data->remarks); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />
	*/ ?>

</div>