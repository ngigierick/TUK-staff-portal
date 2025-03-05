<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1>HELP CENTER - TuSOFT MANAGEMENT SYSTEM</h1>

<div>
<?php echo $doc->content;?>
</div>

<?php $this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'list',
    'items'=>array(
		
		array('label'=>Yii::t('app', 'Manage Documentation'), 
				'url'=>array('documentation/admin'),
				'icon'=>'pencil',						
				'visible'=>Yii::app()->user->checkAccess(1),
				),
		array('label'=>Yii::t('app', 'Manage Documentation Categories'), 
				'url'=>array('documentationCategory/admin'),
				'icon'=>'pencil',						
				'visible'=>Yii::app()->user->checkAccess(1),
				),
		array('label'=>Yii::t('app', 'Manage Comments'), 
				'url'=>array('comment/admin'),
				'icon'=>'pencil',						
				'visible'=>Yii::app()->user->checkAccess(1),
				),
		array('label'=>Yii::t('app', 'Manage Project Activities'), 
				'url'=>array('projectActivity/admin'),
				'icon'=>'pencil',						
				'visible'=>Yii::app()->user->checkAccess(1),
				),
	),

));?>
