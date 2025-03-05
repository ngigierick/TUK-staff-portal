
<?php $c=0;?>
<?php 
if($data->reg_fee){ $c++; $reg_fee=$data->reg_fee;}
if($data->caution){ $c++; $caution=$data->caution;}
if($data->union_){ $c++; $union_=$data->union_;}
if($data->sports){ $c++; $sports=$data->sports;}
if($data->maint){ $c++; $maint=$data->maint;}
if($data->medical){ $c++; $medical=$data->medical;}
if($data->tuition){ $c++; $tuition=$data->tuition;}
if($data->misc){ $c++; $misc=$data->misc;}
if($data->exam){ $c++; $exam=$data->exam;}
if($data->hostel){ $c++; $hostel=$data->hostel;}
?>
<tr class="debit">
<td rowspan="<?php echo $c;?>" valign="top" >YEAR<?php echo GxHtml::encode($data->course_yr); ?></td>
<td rowspan="<?php echo $c;?>" valign="top"><?php echo GxHtml::encode($data->date_); ?></td>

<?php if(isset($reg_fee)):?>
<td><?php echo GxHtml::encode("Registration(" ).$data->descript." )"; ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($reg_fee,"KES "); ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency(0,"KES "); ?></td>
<?php $this->total += $reg_fee; ?>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($this->total,"KES "); ?></td>
</tr><tr>
<?php endif;?>

<?php if(isset($tuition)):?>
<td><?php echo GxHtml::encode("Tuition( ").$data->descript." )" ; ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($tuition,"KES "); ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency(0,"KES "); ?></td>
<?php $this->total += $tuition; ?>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($this->total,"KES "); ?></td>
</tr><tr>
<?php endif;?>

<?php if(isset($caution)):?>
<td><?php echo GxHtml::encode("Caution( ").$data->descript.")"  ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($caution,"KES "); ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency(0,"KES "); ?></td>
<?php $this->total += $caution; ?>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($this->total,"KES "); ?></td>
</tr><tr>
<?php endif;?>

<?php if(isset($union_)):?>
<td><?php echo GxHtml::encode("Union( ").$data->descript.")"  ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($union_,"KES "); ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency(0,"KES "); ?></td>
<?php $this->total += $union_; ?>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($this->total,"KES "); ?></td>
</tr><tr>
<?php endif;?>

<?php if(isset($sports)):?>
<td><?php echo GxHtml::encode("Sports( ").$data->descript.")"  ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($sports,"KES "); ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency(0,"KES "); ?></td>
<?php $this->total += $sports; ?>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($this->total,"KES "); ?></td>
</tr><tr>
<?php endif;?>

<?php if(isset($maint)):?>
<td><?php echo GxHtml::encode("Maintenance( ").$data->descript.")"  ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($maint,"KES "); ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency(0,"KES "); ?></td>
<?php $this->total += $maint; ?>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($this->total,"KES "); ?></td>
</tr><tr>
<?php endif;?>

<?php if(isset($medical)):?>
<td><?php echo GxHtml::encode("Medical( ").$data->descript.")"  ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($medical,"KES "); ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency(0,"KES "); ?></td>
<?php $this->total += $medical; ?>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($this->total,"KES "); ?></td>
</tr><tr>
<?php endif;?>

<?php if(isset($misc)):?>
<td><?php echo GxHtml::encode("Miscellaneos( ").$data->descript.")"  ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($misc,"KES "); ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency(0,"KES "); ?></td>
<?php $this->total += $misc; ?>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($this->total,"KES "); ?></td>
</tr><tr>
<?php endif;?>

<?php if(isset($exam)):?>
<td><?php echo GxHtml::encode("Examinations( ").$data->descript.")"  ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($exam,"KES "); ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency(0,"KES "); ?></td>
<?php $this->total += $exam; ?>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($this->total,"KES "); ?></td>
</tr><tr>
<?php endif;?>

<?php if(isset($hostel)):?>
<td><?php echo GxHtml::encode("Hostel( ").$data->descript.")"  ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($hostel,"KES "); ?></td>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency(0,"KES "); ?></td>
<?php $this->total += $hostel; ?>
<td align="right"><?php echo Yii::app()->numberFormatter->formatCurrency($this->total,"KES "); ?></td>
</tr>
<?php endif;?>