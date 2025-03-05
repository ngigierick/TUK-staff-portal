<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('semester_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->semester)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('reg_number')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->regNumber)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('year_of_study')); ?>:
	<?php echo GxHtml::encode($data->year_of_study); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('semester_of_study')); ?>:
	<?php echo GxHtml::encode($data->semester_of_study); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />

</div>