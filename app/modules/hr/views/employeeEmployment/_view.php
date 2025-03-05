<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('pf_number')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->pfNumber)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('position_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->position)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('grade_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->grade)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('d_start')); ?>:
	<?php echo GxHtml::encode($data->d_start); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('d_end')); ?>:
	<?php echo GxHtml::encode($data->d_end); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('increment_date')); ?>:
	<?php echo GxHtml::encode($data->increment_date); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('salary_scale_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->salaryScale)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('category_id')); ?>:
	<?php echo GxHtml::encode($data->category_id); ?>
	<br />
	*/ ?>

</div>