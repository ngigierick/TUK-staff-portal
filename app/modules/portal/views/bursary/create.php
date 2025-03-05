<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Create'),
);


?>

<h1>STUDENT ASSOCIATION OF TECHNICAL UNIVERSITY OF KENYA (SATUK) </h1>
<h1>OFFICE OF THE ACADEMIC SECRETARY</h1>
<h1>ONLINE BURSARY APPLICATION</h1>


<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'student'=>$student,
		'bursaryAw'=>$bursaryAw,
		'buttons' => 'create'));
?>