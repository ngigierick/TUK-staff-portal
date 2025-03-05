<?php $total=0;?>
<div id="fee-payable-grid">
<table class="items table table-striped table-bordered table-condensed">
<tr><th>Fee item</th><th class="amount">Amount</th></tr>
<?php for($i=0;$i<count($feeitems);$i++): ?>
<?php $total += $feeitems[$i]['amount'];?>
<?php if($feeitems[$i]['amount']>0):?>
<tr><td><?php echo $feeitems[$i]['name'];?></td><td class="amount"><?php echo Yii::app()->numberFormatter->formatCurrency($feeitems[$i]['amount'],"KES "); ?></td></tr>
<?php endif;?>
<?php endfor;?>
<tr><td>Grand Total</td><td class="amount"><?php echo Yii::app()->numberFormatter->formatCurrency($total,"KES "); ?></td></tr>
</table>
</div>