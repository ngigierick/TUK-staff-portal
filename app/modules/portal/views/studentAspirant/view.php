<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'bursary-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 

?>
<h1>SATUK GENERAL ELECTIONS | ASPIRANT SEEKING ELECTIVE POSTION AS <?php echo strtoupper($model->position);?> </h1>
<hr/>
<table>
	<tr>
		<td style="vertical-align:top;border-right: 1px dotted #dedede;" >
			<input type='hidden' name='pdf' value='1'/>		
			<?php if($model->status==0):?>
			<h3><span class="unread">Application Pending!</span></h3><br/>
			<?php elseif ($model->status==1):?>
				<h3><span class="icon-ok"> &nbsp;</span>&nbsp;<span class="read">Application Confirmed and Received!</span></h3>
			<?php endif;?>	
			
				<br/><br/>
				<?php 
				/*
				$this->widget('bootstrap.widgets.TbButton', array(
			        'type'=>'success',
			        'size'=>'small',
					'icon'=>'pencil',
			        'label'=>'Edit My Application',
					'url'=>array('update','id'=>$model->id),
			)); 
				 * 
				 */?>
			<br /><br />
			
			<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'danger',
					'size'=>'small',
					'icon'=>'print',
					'label'=>'Export to PDF and Print all Forms',
				)); ?>
			
			<br /><br />	<br /><br />
			
	

			<?php	
			$this->endWidget();
			?>
			
			<?php if($model->position_id==11):?>
			<hr />
			<h1>My Running Mate</h1>
			<table class="budget ir ir-item table table-bordered table-condensed" width="100%">
			<tr><th>S/N</th><th>Running Mate Name </th><th>Reg. Number </th><th>Status</th></tr>
			<?php $c=1; foreach($model->agent as $relatedModel): if ($relatedModel->running_mate==1):?>
			<tr>
				<td><?php echo $c;?></td>
			<td><?php echo $relatedModel->firstname.' '.$relatedModel->surname.' '.$relatedModel->othername;?></td>
			<td><?php echo $relatedModel->reg_number;?></td>
			<td>
			<?php 
			
			if( $relatedModel->status==0) echo "<span class='unread'>Pending!</span>"; 
			else if ( $relatedModel->status==2) echo "<span class='read'><span class='icon-ok'>&nbsp;</span>&nbsp;Accepted Awaiting Printing!</span>"; 
			else if ( $relatedModel->status==3) echo "<span class='unread'>DECLINED!</span>"; 
			else if ( $relatedModel->status==4) echo "<span class='read'><span class='icon-print'>&nbsp;</span>&nbsp;Accepted and Printed!</span>"; 
			else echo "<span class='read'><span class='icon-ok'>&nbsp;</span>&nbsp;Accepted!</span>"; 
			
			?></td>
			</tr>
			<?php $c++; endif;?>
			<?php  endforeach;?>
			</table>
			<?php $this->widget('bootstrap.widgets.TbButton', array(
			        'type'=>'success',
			        'size'=>'small',
					'icon'=>'user',
			        'label'=>'Choose a Running Mate',
					'url'=>array('//portal/studentAspirantAgent/runningMate'),
			)); ?><br/><br/>
			
			<?php endif;?>
			<hr />		
			<h1>My Agents</h1>
			
			<table class="budget ir ir-item table table-bordered table-condensed" width="100%">
			<tr><th>S/N</th><th>Agent Name </th><th>Reg. Number </th><th>Status</th></tr>
			<?php $c=1; foreach($model->agent as $relatedModel): if ($relatedModel->running_mate!=1):?>
			<tr>
				<td><?php echo $c;?></td>
			<td><?php echo $relatedModel->firstname.' '.$relatedModel->surname.' '.$relatedModel->othername;?></td>
			<td><?php echo $relatedModel->reg_number;?></td>
			<td>
			<?php 
			
			if( $relatedModel->status==0) echo "<span class='unread'>Pending!</span>"; 
			else if ( $relatedModel->status==2) echo "<span class='read'><span class='icon-ok'>&nbsp;</span>&nbsp;Accepted Awaiting Printing!</span>"; 
			else if ( $relatedModel->status==3) echo "<span class='unread'>DECLINED!</span>"; 
			else if ( $relatedModel->status==4) echo "<span class='read'><span class='icon-print'>&nbsp;</span>&nbsp;Accepted and Printed!</span>"; 
			else echo "<span class='read'><span class='icon-ok'>&nbsp;</span>&nbsp;Accepted!</span>"; 
			
			?></td>
			</tr>
			<?php $c++; endif;?>
			<?php  endforeach;?>
			</table>
		
			<?php $this->widget('bootstrap.widgets.TbButton', array(
			        'type'=>'success',
			        'size'=>'small',
					'icon'=>'user',
			        'label'=>'Request an Agent',
					'url'=>array('//portal/studentAspirantAgent/request'),
			)); ?>
			&nbsp;&nbsp;&nbsp;
			<?php $this->widget('bootstrap.widgets.TbButton', array(
			        'type'=>'primary',
			        'size'=>'small',
					'icon'=>'list',
			        'label'=>'Assign Agents to Polling Stations',
					'url'=>array('//portal/studentAspirantAgent/assign'),
			)); ?><br/><br/>
			
		</td>
		<td valign="top">
		<div class="profile">
		<?php 
			
			//structure passport photo url
			if (empty($model->photo)){
				
				$photo = str_replace("/", "-", $model->reg_number).'.JPG';
				$photo = 'http://192.168.100.50/images/student/'.$photo;
			}	
			else{
				
				 $photo = $model->photo;
				 $photo = Yii::app()->getBaseUrl(true).'/images/passports/'.$photo;
			}
				
			echo CHtml::image($photo,'Passport photo not yet submitted',array('height'=>150,'class'=>'passport')); 
		
		?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $model->surname.' '.$model->firstname.' '.$model->othername;?></b>
		[ <span class="num">REF # <?php echo str_pad( $model->id, 10, "0", STR_PAD_LEFT );?></span> ]
		</div>
		<?php	$this->widget('bootstrap.widgets.TbDetailView', array(
		    'type'=>'striped condensed',
			'data' => $model,
			'attributes' => array(
		'reg_number',
		array(
					'name' => 'academicyear',
					'type' => 'raw',
					'value' => $model->academicyear !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->academicyear)), array('academicyear/view', 'id' => GxActiveRecord::extractPkValue($model->academicyear, true))) : null,
					),
		'id_number',
		array(
					'name' => 'gender',
					'type' => 'raw',
					'value' => $model->gender !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->gender)), array('gender/view', 'id' => GxActiveRecord::extractPkValue($model->gender, true))) : null,
					),
		'surname',
		'firstname',
		'othername',
		array(
					'name' => 'school',
					'type' => 'raw',
					'value' => $model->school !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->school)), array('school/view', 'id' => GxActiveRecord::extractPkValue($model->school, true))) : null,
					),
		array(
					'name' => 'department',
					'type' => 'raw',
					'value' => $model->department !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->department)), array('department/view', 'id' => GxActiveRecord::extractPkValue($model->department, true))) : null,
					),
		array(
					'name' => 'programme',
					'type' => 'raw',
					'value' => $model->programme !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->programme)), array('programme/view', 'id' => GxActiveRecord::extractPkValue($model->programme, true))) : null,
					),
		'programme_end',
		'mobile',
		'email',
			),
		)); ?>
		</td>
	</tr>
</table>



<br /><br/>