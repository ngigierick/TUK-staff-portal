<h1><?php echo $header;?></h1>
	<hr />
	<?php foreach($courses as $d) :?>
		<b><?php echo $d->course_name;?></b>:<?php echo $d->brief_description;?> &nbsp;&nbsp;&nbsp;<?php if (!empty($d->elearning_link)) echo CHtml::link('<span class="icon-thumbs-up"> </span> content available online',$d->elearning_link);?><br />
		Taught between <b><?php echo $d->starting_date;?> - <?php echo $d->ending_date;?></b> in <b><?php echo $d->institution;?>(<?php echo $d->country;?>)</b><br />
		By: <?php $l = '<span class="link">'.$d->pfNumber->title.' '.$d->pfNumber->firstname.' '.$d->pfNumber->othername.' '.$d->pfNumber->surname.'</span>'; echo GxHtml::link($l, array('/portal/profile/public', 'id' => $d->pfNumber->id));?>
		
		
		<hr />		
<?php endforeach;?>
