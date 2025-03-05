<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>
<?php echo CHtml::ajaxLink(Yii::t('job','Add School Term'),$this->createUrl('//main/schoolTerm/addNew'),
			array('onclick'=>'$("#jobDialog").html("loading..."); $("#jobDialog").dialog("open"); return false;','replace'=>'#jobDialog'),array('id'=>'showJobDialog'));?>
<div id="jobDialog"></div>