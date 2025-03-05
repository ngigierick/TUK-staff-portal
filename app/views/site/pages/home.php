<?php
$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'PolyMIS+',
);
?>
<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading'=>'PolyMIS+',
)); ?>
 
    <p>This is a new system of manging students in both Universities and olytechnics. It is a high-brid of Polytechnic Systems and University Systems</p>
    <p><?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'Learn more',
		 'url'=>array('/setup/institution/admin'),
    )); ?></p>
 
<?php $this->endWidget(); ?>