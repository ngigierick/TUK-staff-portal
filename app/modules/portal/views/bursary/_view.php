<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('reg_number')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->regNumber)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_created')); ?>:
	<?php echo GxHtml::encode($data->date_created); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fee_balance')); ?>:
	<?php echo GxHtml::encode($data->fee_balance); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('guardian_status')); ?>:
	<?php echo GxHtml::encode($data->guardian_status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('f_name')); ?>:
	<?php echo GxHtml::encode($data->f_name); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('f_id')); ?>:
	<?php echo GxHtml::encode($data->f_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('f_occupation')); ?>:
	<?php echo GxHtml::encode($data->f_occupation); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('m_name')); ?>:
	<?php echo GxHtml::encode($data->m_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('m_id')); ?>:
	<?php echo GxHtml::encode($data->m_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('m_occupation')); ?>:
	<?php echo GxHtml::encode($data->m_occupation); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('g_name')); ?>:
	<?php echo GxHtml::encode($data->g_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('g_id')); ?>:
	<?php echo GxHtml::encode($data->g_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('g_occupation')); ?>:
	<?php echo GxHtml::encode($data->g_occupation); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fee_payment_plan')); ?>:
	<?php echo GxHtml::encode($data->fee_payment_plan); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fee_payment')); ?>:
	<?php echo GxHtml::encode($data->fee_payment); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('bursary_beneficiary')); ?>:
	<?php echo GxHtml::encode($data->bursary_beneficiary); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('beneficiary_amount')); ?>:
	<?php echo GxHtml::encode($data->beneficiary_amount); ?>
	<br />
	*/ ?>

</div>