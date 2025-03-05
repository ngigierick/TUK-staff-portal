<?php $feearray = unserialize($data->invoice_array);?>
<?php if(count($feearray)>0):?>
<tr >
<td><?php echo GxHtml::encode($data->semester->name); ?></td>
<td><?php echo date('F j, Y',$data->date_modified); ?></td>
<td colspan="4"><?php $this->renderPartial('_debit_items_view', array('feearray'=>$feearray)); ?></td>
</tr>
<?php endif;?>