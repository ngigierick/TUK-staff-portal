<h1>Assign Service Request Ticket Number: <?php echo $model->id;?></h1>
<fiedset>
<legend>Ticket Description</legend>

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
</fiedset>
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
<fiedset>
<legend>Comment on this Service Request Ticket</legend>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'ict-service-request-action-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<?php echo $form->errorSummary($model,$action); ?>

	<div class="control-group">
		<div class="control-label required">
		<h3><span class='icon-envelope'>&nbsp;</span> Message:</h3>
		</div>
		<div class="controls">
		<?php 
		
		$this->widget('application.extensions.cleditor.ECLEditor', array(
        'model'=>$action,
        'attribute'=>'description', //Model attribute name. Nome do atributo do modelo.
        'options'=>array(
            'width'=>715,
            'height'=>180,
            'useCSS'=>true,
        ),
      //  'value'=>$model->description, //If you want pass a value for the widget. I think you will. Se voc� precisar passar um valor para o gadget. Eu acho ir�.
		));
		?>
		</div>
	</div>
		
				
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		'label'=>'Submit Comment',
		'icon'=>'ok',
	)); ?>
	</div>
<?php	
$this->endWidget();
?>
</fiedset>