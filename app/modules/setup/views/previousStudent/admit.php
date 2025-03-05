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


<h1>Migrate Students from PolyMIS to TuSOFT</h1>

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
    'id'=>'course_code',
    'name'=>'PreviousStudent[course_code]',
    'source'=>$this->createUrl('/setup/previousStudent/programmeName'),
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

$yr = AcademicYear::model()->findAll(array('order' => 'id DESC'));

$sem = Semester::model()->findAll(array('order' => 'id DESC'));

?>
 Programme Name:<input type="text" id="reg" disabled="disabled"/><br/><br/>
 New Programme Code:<input type="text" name="code" /><br/><br/>
Year started:
<?php echo $form->dropDownList($model, 'course_year', GxHtml::listDataEx($yr),array('prompt'=>'Select one')); ?>

<br/><br/>
Semester/Term started:
<?php echo $form->dropDownList($model, 'study_term', GxHtml::listDataEx($sem),array('prompt'=>'Select one')); ?>
<br/><br/>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'MIGRATE CLASS TO TuSOFT')); ?>
 
<?php $this->endWidget(); ?>

