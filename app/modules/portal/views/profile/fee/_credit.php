
<?php $this->total -= $data->amount;?>
<tr>
<td><?php echo GxHtml::encode($data->receiptnumber); ?></td>
<td><?php echo $data->date_modified; ?></td>
<td><?php echo GxHtml::encode($data->bankAccount->name."(".$data->bankslip.")"); ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency(0,"KES "); ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($data->amount,"KES "); ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($this->total,"KES "); ?></td>
</tr>