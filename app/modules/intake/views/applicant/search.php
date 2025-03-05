<?php
$this->breadcrumbs = array(
	$model->label(2) => array('admin'),
	Yii::t('app', 'Manage'),
);



?>

<h1>Enroll New Applicant</h1>
<div class="notes">
Enroll an applicant for a course. A valid receipt is required for payment of application fees. 
This is obtained from the Finance Office upon payment of application fees. 
Enter the receipt number of the applicant to proceed.
</div>

<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 

?>

<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'searchForm',
    'type'=>'search',
    'htmlOptions'=>array('class'=>'well'),
)); 




?>
<?php echo $form->labelEx($model,'receiptnumber'); ?>
&nbsp;&nbsp;
<?php echo $form->textFieldRow($model, 'receiptnumber', array('class'=>'input-medium', 'prepend'=>'<i class="icon-search"></i>')); ?>
&nbsp;&nbsp;
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'ENROLL')); ?>
 
<?php $this->endWidget(); ?>

