<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('pf_number')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->pfNumber)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('course_name')); ?>:
	<?php echo GxHtml::encode($data->course_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('brief_description')); ?>:
	<?php echo GxHtml::encode($data->brief_description); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('elearning_link')); ?>:
	<?php echo GxHtml::encode($data->elearning_link); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('institution')); ?>:
	<?php echo GxHtml::encode($data->institution); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('country_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->country)); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('starting_date')); ?>:
	<?php echo GxHtml::encode($data->starting_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ending_date')); ?>:
	<?php echo GxHtml::encode($data->ending_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('currently_on')); ?>:
	<?php echo GxHtml::encode($data->currently_on); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />
	*/ ?>

</div>