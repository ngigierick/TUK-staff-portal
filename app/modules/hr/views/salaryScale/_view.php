<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('step')); ?>:
	<?php echo GxHtml::encode($data->step); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('grade_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->grade)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('category_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->category)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('basic_salary')); ?>:
	<?php echo GxHtml::encode($data->basic_salary); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('house_allowance')); ?>:
	<?php echo GxHtml::encode($data->house_allowance); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />
	*/ ?>

</div>