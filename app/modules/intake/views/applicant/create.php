<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Create'),
);

?>
<h1>Applicant Enrollment</h1>


<fieldset><legend><?php echo Yii::t('app', 'Enroll') . ' ' . GxHtml::valueEx($model->title) .' '.GxHtml::encode($model->surname.' '.$model->firstname.' '.$model->othername);?></legend>
<?php echo '<h2>Course applied: '.$model->programme.' <br/>Academic Year: '.$model->academicyear; ?>
</fieldset>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'applicant'=>$applicant,
		'buttons' => 'create'));
?>

<?php $this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'list',
    'items'=>array(
		array('label'=>'APPLICATION NAVIGATION LINKS'),
		array('label'=>Yii::t('app', 'Enroll new') . ' ' . $model->label(), 
				'url'=>array('enroll'),
				'icon'=>'pencil',						
				'visible'=>Yii::app()->user->checkAccess(3),
				),
		array('label'=>Yii::t('app', 'Manage the') . ' ' . $model->label(2), 
				'url'=>array('admin'),
				'icon'=>'th',						
				'visible'=>Yii::app()->user->checkAccess(3),
				),
	),

));?>