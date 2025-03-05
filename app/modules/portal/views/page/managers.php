<h1>UNIVERSITY TOP MANAGEMENT</h1>
<p><i>The Vice Chancellor, Deputy Vice Chancellors, and the Executive Deans</i></p>
<hr />
<?php $total = count($managers); $c=0; for($i=0;$i<count($managers);$i++): $m=$managers[$i]; $j = $i+1; $d = $managers[$i]->pfNumber;?>
			<?php $l = '<h5 class="link">'.($j).' ) '.$d->names().' '.$d->professorName().'</h5>';  ?> 
			<div class="span12"> <?php echo GxHtml::link($l, array('/portal/profile/public', 'id' => $d->id));?></div>
			<div class="span2"><?php echo StaffHelper::picSmall($d);?></div>
			<div class="span8">
			<b>Position:</b><?php echo $m->position->name;?>, <?php echo $m->office;?><br/>
			<b>Highest Qualification:</b> <?php echo StaffHelper::qualifcations($d);?> <br/>
			<b>Interest Areas:</b> <?php echo StaffHelper::qualificationsAreas($d);?><br/>
			<?php echo GxHtml::link('<span class="icon-user"> </span> view profile...', array('/portal/profile/public', 'id' => $d->id));?>
			</div>
			<div class="span12"><?php if ($c<$total) echo "<hr />";?></div>
<?php endfor;?>
