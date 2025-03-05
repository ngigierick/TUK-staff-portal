<h1><?php echo $header;?></h1>
	<hr />
	<?php for($i=0;$i<count($staff);$i++) :?>
				<?php
					
				?>
				<?php $l = '<h5 class="link">'.$staff[$i]->title.' '.$staff[$i]->firstname.' '.$staff[$i]->othername.' '.$staff[$i]->surname.'</h5>'; echo GxHtml::link($l, array('/portal/profile/public', 'id' => $staff[$i]->id));?>
				
				<?php if (isset($staff[$i]->employeeContacts[0])):?>
				<p>Currently, <?php echo $staff[$i]->employeeContacts[0]->designation;?></p>
				<?php endif;?>
				<?php if (isset($staff[$i]->employeeQualifications[0])):?>
					Qualifications: 
					<?php
					$criteria = new CDbCriteria;
					$criteria->with = array('level');
					$criteria->condition  = "t.pf_number='".$staff[$i]->pf_number."'";
					$criteria->order='level.weight ASC';
					$qual 	= EmployeeQualification::model()->findAll($criteria);		
					foreach($qual as $relatedModel) {
						echo $relatedModel->level. ', ';
					}
					?>
				<?php endif;?>
				<?php echo GxHtml::link('<span class="icon-user"> </span> view profile...', array('/portal/profile/public', 'id' => $staff[$i]->id));?><hr />
<?php endfor;?>
