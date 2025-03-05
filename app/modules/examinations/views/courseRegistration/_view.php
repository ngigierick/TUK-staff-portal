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
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />

</div>