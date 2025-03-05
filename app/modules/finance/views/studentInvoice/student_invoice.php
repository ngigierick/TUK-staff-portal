<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'danger'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			
        ),
	)
); 

?><div class="form">
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'student-invoice-form',
	'enableAjaxValidation' => true,
));
?>
<h2><?php echo $form->labelEx($model,'reg_number'); ?><?php echo $model->reg_number.' : '.$model->regNumber->title.' '.$model->regNumber->surname.' '.$model->regNumber->firstname.' '.$model->regNumber->othername;?></h2>
<h2><?php echo $form->labelEx($model,'semester_id'); ?> <?php echo $model->semester;?></h2>
<h2><?php //echo $form->labelEx($model,'module_id'); ?> <?php //echo $model->regNumber->module;?></h2>
<!-- capture hidden fields -->
<?php echo CHtml::hiddenField('reg_number',$model->reg_number); ?>
<?php echo CHtml::hiddenField('semester_id',$model->semester_id); ?>
<?php echo CHtml::hiddenField('save-invoice',1); ?>
<?php //echo CHtml::textField('id',$model->id); ?>
<?php if(isset($fees)):?>
<?php $this->renderPartial('_feeitems', array('model'=>$fees));?>
<?php else:?>
<!-- the fees form -->
<div id="fee-payable-grid">
<table class="items table table-striped table-bordered table-condensed">
<tr><th>Fee item</th><th class="amount">Amount</th></tr>
<?php for($i=0;$i<count($feeitems);$i++): ?>
<tr><td><?php $amount = 'amount['.$i.']'; echo $feeitems[$i]['name'];?></td><td class="amount"><?php echo CHtml::textField($amount,$feeitems[$i]['amount']); ?></td></tr>
<?php endfor;?>
</table>
</div>
<?php endif;?>
<?php
echo GxHtml::submitButton(Yii::t('app', 'Update Invoice'));
$this->endWidget();
?>
</div><!-- form -->