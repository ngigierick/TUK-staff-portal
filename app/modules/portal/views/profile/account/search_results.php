

<?php if(!empty($results)):?>
	<h1>General Search Results </h1>
	<?php $total = count($results); if ($total<1):?>
		<h3 class="t">Showing  No Results for <b><i><?php echo $term;?> </i></b> </h3>
		<?php elseif ($total<2):?>
			<h3 class="t">Showing  <?php echo number_format($total, 0, '', ', ');?> Result for <b><i><?php echo $term;?> </i></b> </h3>
		<?php elseif ($total>1):?>
			<h3 class="t">Showing  <?php echo number_format($total, 0, '', ', ');?> Results for <b><i><?php echo $term;?> </i></b> </h3>
	<?php endif;?>
	<br/>
	<?php for($i=0;$i<count($results);$i++) :?>
		<h4><?php echo GxHtml::link($results[$i]->label_name, array($results[$i]->url));?></h4>
		<p><?php echo $results[$i]->description;?></p>
	<?php endfor;?>

<?php endif;?>

<?php if(isset($data)):?>
	<h1>Search Results for Staff</h1>
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
		<?php $l = '<h5 class="link">'.$d->title.' '.$d->firstname.' '.$d->othername.' '.$d->surname.'</h5>'; echo GxHtml::link($l, array('/portal/profile/public', 'id' => $d->id));?>
		
		<?php if (isset($d->employeeContacts[0])):?>
		<p>Currently, <?php echo $d->employeeContacts[0]->designation;?></p>
		<?php endif;?>
		<?php if (isset($d->employeeQualifications[0])):?>
			Qualifications: 
			<?php
			$criteria = new CDbCriteria;
			$criteria->with = array('level');
			$criteria->condition  = "t.pf_number='".$d->pf_number."'";
			$criteria->order='level.weight ASC';
			$qual 	= EmployeeQualification::model()->findAll($criteria);		
			foreach($qual as $relatedModel) {
				echo $relatedModel->level. ', ';
			}
			?>
		<?php endif;?>
		<?php echo GxHtml::link('<span class="icon-user"> </span> view profile...', array('/portal/profile/public', 'id' => $d->id));?><hr />
	<?php endforeach;?>

<?php endif;?>




<br />
