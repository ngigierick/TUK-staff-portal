<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'icon'=>'ok',
		'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>
	&nbsp;&nbsp;&nbsp;
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		//'type'=>'warning',
		'size'=>'small',
		'icon'=>'remove',
		'url' => array('admin'),
		'label'=>'Cancel operation',
	)); ?>
</div>