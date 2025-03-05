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
	<?php $this->renderPartial("//site/common/notifications"); ?>
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
		<?php $c=0;foreach($data as $d): $c++;?>
			<?php
				
			?>
			<div class="span12"><?php $l = '<h2>'.$d->names().'</h2>'; echo GxHtml::link($l, array('/portal/profile/public', 'id' => $d->id));?></div>
			<div class="span2"><?php echo StaffHelper::picSmall($d);?></div>
			<div class="span8">
			<b>Position:</b><?php echo StaffHelper::employment($d);?><br/>
			<b>Highest Qualification:</b> <?php echo StaffHelper::qualifcations($d);?> <br/>
			<b>Interest Areas:</b> <?php echo StaffHelper::qualificationsAreas($d);?><br/>
			<?php echo GxHtml::link('<span class="icon-user"> </span> view profile...', array('/portal/profile/public', 'id' => $d->id));?>
			</div>
			<div class="span12"><?php if ($c<$total) echo "<hr />";?></div>
		<?php endforeach;?>
	
	<?php endif;?>
	