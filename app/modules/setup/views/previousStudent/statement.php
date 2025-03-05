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

<?php

$this->breadcrumbs = array(
	'Home' => array('index'),
	'Student Financial Statement'
);

$this->menu=array(
	array('label'=>Yii::t('app', 'ViewStudent List'), 'url'=>array('/setup/previousStudent/admin'),),
);



?>

<h1>Check Student Financial Statement</h1>

<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'searchForm',
    'type'=>'search',
    'htmlOptions'=>array('class'=>'well'),
)); 

//autocomplete
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$model,
    //'attribute'=>'name',
    'id'=>'reg_number',
    'name'=>'PreviousStudent[reg_number]',
    'source'=>$this->createUrl('/setup/previousStudent/autocomplete'),
    'options'=>array(
        'delay'=>300,
        'minLength'=>2,
        'showAnim'=>'fold',
        'select'=>"js:function(event, ui) {
            $('#reg').val(ui.item.id);
            //$('#code').val(ui.item.code);
        }"
    ),
    'htmlOptions'=>array(
        'size'=>'40'
    ),
));



?>
 Student Name:<input type="text" id="reg" disabled="disabled"/>
<?php //echo $form->textFieldRow($model, 'reg_number', array('class'=>'input-medium', 'prepend'=>'<i class="icon-search"></i>')); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'VIEW STATEMENT')); ?>
 
<?php $this->endWidget(); ?>

