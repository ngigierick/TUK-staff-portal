<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Create'),
);

/*$this->menu = array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url' => array('admin')),
);*/
?>


<h4><span class="icon-plus" >&nbsp;</span> &nbsp;&nbsp;Add Academic Qualifications</h4>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'staff' => $staff,
		'buttons' => 'create'));
?>
</fieldset>
