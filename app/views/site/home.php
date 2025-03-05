<?php
$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'PolyMIS+',
);
?>
<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    //'heading'=>'TuSOFT - Technical University Software ',
)); ?>
	
    <p>
	<br/>
	<?php echo CHtml::image(Yii::app()->baseUrl.'/images/tuk-logo.png','Logo',array('style'=>'float:left;padding-right:20px;')); ?>
	This is a new system of manging students in both Universities and Polytechnics. It is a high-brid of Polytechnic Systems and University Systems</p>
	<br/>
	<h2>System Features</h2>
	<ul>
	<li>Comprehensive User Management</li>
	<li>Student Intake/ Course Application</li>
	<li>Application Selection</li>
	<li>Student Admission</li>
	<li>Comprehensive Student Finance( Invoicing & Receipting)</li>
	<li>Information Reports</li>
	<li>Enhanced System Security</li>
	</ul>
	
    <p><?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'Proceed',
		 'url'=>array('/setup/institution/staticView','id'=>1),
    )); ?>
	</p>
 
<?php $this->endWidget(); ?>