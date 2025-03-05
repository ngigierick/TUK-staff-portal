
<?php $this->total += $data->total;?>
<tr>
<td><?php echo GxHtml::encode($data->trans_no); ?></td>
<td><?php echo GxHtml::encode($data->date_); ?></td>
<td><?php echo GxHtml::encode($data->descript."(".$data->xref.")"); ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency(0,"KES "); ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency(-$data->total,"KES "); ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($this->total,"KES "); ?></td>
</tr>