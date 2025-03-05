<h1><?php echo Yii::t('app', 'Update Details'); ?></h1>

<?php
$this->renderPartial('_update', array(
		'model' => $model));
?>