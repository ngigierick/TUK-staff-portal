<h1><span class='icon-book'>&nbsp;</span> Service Request Ticket Number: <?php echo $model->id;?></h1>
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
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Comment',
    'type'=>'success', 
    'icon'=>'envelope',
    //'confirm'=>'Are you sure you want to delete this work experience?',
    'size'=>'mini', 
	'url'=>array('comment','id'=>$model->id),
	//array('style'=>'cursor: pointer;', 'confirm'=>'Are you sure you want to delete this work experience?'),
)); ?>
&nbsp;&nbsp;&nbsp;
<?php if($model->status<3):?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Mark as Completed',
    'type'=>'danger', 
    'icon'=>'ok',
    //'confirm'=>'Are you sure you want to delete this work experience?',
    'size'=>'mini', 
	'url'=>array('close','id'=>$model->id),
	'htmlOptions'=>array('confirm'=>'Are you sure you are satisfied and want to close this service request ticket ?'),
)); ?>
&nbsp;&nbsp;&nbsp;
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Update Ticket',
    'type'=>'info', 
    'icon'=>'edit',
    'size'=>'mini',
	'url'=>array('update','id'=>$model->id),
)); ?>

<?php endif;?>
&nbsp;&nbsp;&nbsp;
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'My Service Request Tickets',
    'type'=>'primary', 
    'icon'=>'book',
    'size'=>'mini', 
	'url'=>array('admin'),
)); ?>
<br/><br/><br/>
<?php	$this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'bordered striped condensed',
	'data' => $model,
	'attributes' => array(
'statustxt:html',
'type',
'office',
'description:html',
'date_modified:datetime',

	),
)); ?>
<?php if(count($model->ictServiceRequestActions>0)): ?>
	<table class="table table-bordered table-condensed">
		<tr><th>Action</th><th>User/Staff</th><th>Date/Time</th></tr>
	<?php foreach($model->ictServiceRequestActions as $relatedModel):?>
		<tr>
			<td>
				<?php if($relatedModel->status==1):?><span class='icon-thumbs-up'>&nbsp;</span>Assigned
					<?php elseif($relatedModel->status==2):?><span class='icon-thumbs-down'>&nbsp;</span>Reassigned
					 	<?php else: echo $relatedModel->description;?>
				<?php endif;?>
			</td>
		
			<td>
				<?php if($relatedModel->status==4):
						$user = Employee::model()->findByPk($relatedModel->assigned);
						echo $user->surname.'-'.$user->pf_number;
						
					?>
					<?php else:
						$user = User::model()->findByPk($relatedModel->assigned);
						echo $user->name.'-'.$user->pf_number;
						?>
				<?php endif;?>
			</td>
			<td>
				<?php echo date('Y/m/d H:i:s',$relatedModel->date_modified)?>
			</td>
		
		</tr>
	<?php endforeach;?>
	</table>
	
<?php endif;?>
