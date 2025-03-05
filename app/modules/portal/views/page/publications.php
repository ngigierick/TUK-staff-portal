<h1><?php echo $header;?></h1>
	<hr />
	<?php foreach($publications as $d) :?>
		Title:<?php echo GxHtml::link($d->title, $d->link);?>
		By: <?php $l = '<span class="link">'.$d->pfNumber->title.' '.$d->pfNumber->firstname.' '.$d->pfNumber->othername.' '.$d->pfNumber->surname.'</span>'; echo GxHtml::link($l, array('/portal/profile/public', 'id' => $d->pfNumber->id));?>
		<?php if (isset($d->pfNumber->employeeContacts[0])):?>
				<p>Currently, <?php echo $d->pfNumber->employeeContacts[0]->designation;?>
				<?php endif;?>
				<?php if (isset($d->pfNumber->employeeQualifications[0])):?>
					| Qualifications: 
					<?php
					$criteria = new CDbCriteria;
					$criteria->with = array('level');
					$criteria->condition  = "t.pf_number='".$d->pfNumber->pf_number."'";
					$criteria->order='level.weight ASC';
					$qual 	= EmployeeQualification::model()->findAll($criteria);		
					foreach($qual as $relatedModel) {
						echo $relatedModel->level. ', ';
					}
					?>
				<?php endif;?>
				<?php echo GxHtml::link('<span class="icon-user"> </span> view profile...', array('/portal/profile/public', 'id' => $d->pfNumber->id));?></p>
		<hr />		
<?php endforeach;?>
