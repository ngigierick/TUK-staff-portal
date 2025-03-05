<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<?php $this->widget('bootstrap.widgets.TbLabel', array(
    'type'=>'warning', // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>'Error '.$code,
)); ?>

<br/><br/>
<div class="flash-error">
<?php echo CHtml::encode($message); ?><br/><br/>
This has been logged.
</div>