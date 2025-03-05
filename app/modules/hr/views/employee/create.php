<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Create'),
);


?>
<fieldset>
<legend>
<h1>Stage 1 - Enter Staff Personal Details</h1>
</legend>
<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>
</fieldset>