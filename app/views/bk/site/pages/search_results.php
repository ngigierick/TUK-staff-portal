<?php /** @var BootActiveForm $form */
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'action'=>Yii::app()->createUrl('/site/search/'),
	    'id'=>'searchForm',
	    'method'=>'get',
	    'type'=>'search',
	     'htmlOptions' => array('enctype' => 'multipart/form-data'),
	)); 
	
	?>
	    <h1>Search for Staff</h1>
	    <?php
	 $this->widget('bootstrap.widgets.TbAlert', array(
	        'block'=>true, // display a larger alert block?
	        'fade'=>true, // use transitions?
	        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
	        'alerts'=>array( // configurations per alert type
	            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
				'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
				'info'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
				'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
		   ),
		)
	); 
	
	?>
	    <?php echo CHtml::textField('term','',array('id'=>'fullSearch','placeholder'=>'Find Staff By First Name, Surname or Middle Name',));?>
	    &nbsp;&nbsp;&nbsp;&nbsp;
	    	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'warning',
			'icon'=>'search',
			'label'=>'GO',
		)); ?>
	    <hr />
	  <?php
	$this->endWidget();
	?>
	
	<?php if(isset($data)):?>
		
		<?php $total = count($data); if ($total<1):?>
			<h3 class="t">Showing  No Results for <b><i><?php echo $term;?> </i></b> </h3>
			<?php elseif ($total<2):?>
				<h3 class="t">Showing  <?php echo number_format($total, 0, '', ', ');?> Result for <b><i><?php echo $term;?> </i></b> </h3>
			<?php elseif ($total>1):?>
				<h3 class="t">Showing  <?php echo number_format($total, 0, '', ', ');?> Results for <b><i><?php echo $term;?> </i></b> </h3>
		<?php endif;?>
		<br/>
		<?php foreach($data as $d) :?>
			<?php
				
			?>
			<?php $l = strtoupper('<h5>'.$d->names().'</h5>'); echo GxHtml::link($l, array('/portal/profile/public', 'id' => $d->id));?>
			<b>Position:</b><?php echo StaffHelper::employment($d);?><br/>
			<b>Highest Qualification:</b> <?php echo StaffHelper::qualifcations($d);?> <br/>
			<b>Interest Areas:</b> <?php echo StaffHelper::qualificationsAreas($d);?><br/>
			<?php echo GxHtml::link('<span class="icon-user"> </span> view profile...', array('/portal/profile/public', 'id' => $d->id));?><hr />
		<?php endforeach;?>
	
	<?php endif;?>
	