<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('student_reg')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->studentReg)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('receiptnumber')); ?>:
	<?php echo GxHtml::encode($data->receiptnumber); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('bank_account_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->bankAccount)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('bankslip')); ?>:
	<?php echo GxHtml::encode($data->bankslip); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('amount')); ?>:
	<?php echo GxHtml::encode($data->amount); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	*/ ?>

</div>