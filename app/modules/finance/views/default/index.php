<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	"Student Finance",
);
?><?php
$this->menu = array(
	array('label' => Yii::t('app', 'Manage Fees Items '), 'url'=>array('feepayable/admin')),
	array('label' => Yii::t('app', 'Receipt Student '), 'url'=>array('studentReceipt/pay')),
	array('label' => Yii::t('app', 'Manage Student Receipts'), 'url'=>array('studentReceipt/admin')),
	array('label' => Yii::t('app', 'Invoice a Class'), 'url'=>array('studentInvoice/create')),
	array('label' => Yii::t('app', 'Manage Invoicing'), 'url'=>array('studentInvoice/admin')),
	array('label' => Yii::t('app', 'Invoice a Student'), 'url'=>array('studentInvoice/invoiceStudent')),
);
?>
<h1>The Student Finance</h1>

<p>
This is where you invoice a class or a student, capture student payments, check student fee balances, among others.
</p>
