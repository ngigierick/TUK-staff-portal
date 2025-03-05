<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 

?>


<?php $title = 'Payment from '.$model->studentReg->title.' '.$model->studentReg->surname.' '.$model->studentReg->firstname.' '.$model->studentReg->othername; ?>

<h1><?php echo Yii::t('app', 'Print') . '  ' . GxHtml::encode($model->label()) . ' | ' .$model->studentReg->title.' '.$model->studentReg->surname.' '.$model->studentReg->firstname.' '.$model->studentReg->othername; ?></h1>

<table class="receipt" cellpadding="10" style="border:0px solid #dedede;padding:20px;text-transform:uppercase;background:url(http://127.0.0.1:8090/campus/images/bg-shadow.jpg) no-repeat center center">
<tr><td class="header" style="font-size:30px;text-align:center">TECHNICAL UNIVERISTY OF KENYA</td></tr>
<tr><td style="font-size:25px;text-align:center">Student Finance Office</td></tr>
<tr><td style="font-size:20px;text-align:center">Student Official Receipt</td></tr>
<tr><td><hr/></td></tr>
<tr><td><b>Receipt #:</b> <?php echo $model->receiptnumber;?></td></tr>
<tr><td><b>Received from:</b> <?php echo $model->studentReg->title.' '.$model->studentReg->surname.' '.$model->studentReg->firstname.' '.$model->studentReg->othername;?></td></tr>
<tr><td><b>Amount:</b> <?php echo Yii::app()->numberFormatter->formatCurrency($model->amount,"KES "); ?><br/>
(in words) <?php echo $model->amount_in_words;?>
</td></tr>
<tr><td><b>Served by:</b><?php echo $model->cashier;?> <b>Date & time: </b><?php echo date('F j, Y, g:i a',$model->date_modified);?></td></tr>
<tr><td><b>Sign:</b></td></tr>
<tr><td><hr/></td></tr>
</table>	

<div class="form-actions">
 <?php $this->widget('application.extensions.print.printWidget', array(
                   'title'=>$title,
				   'cssFile' => 'print.css',
                   'printedElement'=>'.receipt',
				   ));
  ?>
  Print Receipt
</div>