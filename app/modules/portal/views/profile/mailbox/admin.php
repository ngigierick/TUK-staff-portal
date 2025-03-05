<h1>My Mailbox</h1>
<?php
Yii::app()->clientScript->registerScript('search', "

jQuery.fn.clear = function()
{
    var form = $(this);

    form.find('input:text, input:password, input:file, textarea').val('');
    form.find('select option:selected').removeAttr('selected');
    form.find('input:checkbox, input:radio').removeAttr('checked');

    return this;
};

$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});

$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('student-grid', {
		data: $(this).serialize()
	});
	return false;
});

$('.clear-button').on('click',function(){
	$('.search-form,.filters').clear();
});
");

?>



<div class='btn-group'>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Send Us Mail',
    'type'=>'success', 
    'size'=>'medium', 
	'url'=>array('sendMail'),
)); 
?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Inbox',
    'type'=>'info', 
    'size'=>'medium', 
	'url'=>array('mailbox'),
)); 
?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Sent Items',
    'type'=>'danger', 
    'size'=>'medium', 
	'url'=>array('mailbox','id'=>'1'),
)); 
?>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn btn-warning'));?></div>
<div class="search-form well-small" style="display:none">
<?php $this->renderPartial('mailbox/_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<h2><?php echo $this->header;?></h2>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'institution-grid',
	'type'=>'striped bordered condensed',
	'dataProvider'=>$mailbox,
	'filter'=>$model,
	'columns'=>array(
		'subject',
		'body',
		'status_id:html',
		'date_modified:datetime',
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
			 'template'=>'{view} {update}',
		),
	),
)); ?>
