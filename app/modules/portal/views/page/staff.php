<h1><?php echo $header;?></h1>
<hr />
<?php $total = count($staff); $i=$c=0; foreach($staff as $d): $c++;?>
			<?php if (isset($views)):?>
				<?php $l = '<h5 class="link">'.($i+1).' ) '.$d->names().'</h5>'; ?> <div class="span12"> <?php echo GxHtml::link($l, array('/portal/profile/public', 'id' => $d->id)).'( '.User::number($views[$i]).' views )';?></div>
			<?php else:?>
				<?php $l = '<h5 class="link">'.($i+1).' ) '.$d->names().' '.$d->professorName().'</h5>';  ?> <div class="span12"> <?php echo GxHtml::link($l, array('/portal/profile/public', 'id' => $d->id));?></div>
			<?php endif; $i++;?>
			<div class="span2"><?php echo StaffHelper::picSmall($d);?></div>
			<div class="span8">
			<b>Position:</b><?php echo StaffHelper::employment($d);?><br/>
			<b>Highest Qualification:</b> <?php echo StaffHelper::qualifcations($d);?> <br/>
			<b>Interest Areas:</b> <?php echo StaffHelper::qualificationsAreas($d);?><br/>
			<?php echo GxHtml::link('<span class="icon-user"> </span> view profile...', array('/portal/profile/public', 'id' => $d->id));?>
			</div>
			<div class="span12"><?php if ($c<$total) echo "<hr />";?></div>
<?php endforeach;?>

