<table border="0">
<?php for($i=1;$i<$this->feeitems->totalItemCount;$i++):?>
<tr>
<?php if($feearray[$i] !=0):?>
<?php $this->total += $feearray[$i];?>
<td style="width:148px"><?php echo $this->feeitems->data[$i]->name;?></td>
<td align="right" style="width:140px"><?php echo Yii::app()->numberFormatter->formatCurrency($feearray[$i],"KES "); ?></td>
<td align="right" style="width:142px"><?php echo Yii::app()->numberFormatter->formatCurrency(0,"KES "); ?></td>
<td align="right" style="width:140px"><?php echo Yii::app()->numberFormatter->formatCurrency($this->total,"KES "); ?></td>
<?php endif;?>
</tr>
<?php endfor;?>
</table>