<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	$model->surname.' '.$model->firstname.' '.$model->othername => array('view', 'id' => GxActiveRecord::extractPkValue($model, true)),
	Yii::t('app', 'Update'),
);

?>

<h1><?php echo Yii::t('app', 'Update my Profile') . ' | ' .GxHtml::valueEx($model->title).' '.GxHtml::encode($model->surname.' '.$model->firstname.' '.$model->othername); ?></h1>
<div class="notes">
Hi <?php echo $model->firstname;?>, This is where you will be able to confirm your details as contained in our records. You can update some details as is provided below, however, certain details can ONLY be viewed. In that regard, if those details are not correct then, you are advised to check with the Admissions Office, especially the spelling mistakes, wrong course, wrong name order, amomg others.
</div>
<?php
$this->renderPartial('account/_form', array(
		'model' => $model));
?>
