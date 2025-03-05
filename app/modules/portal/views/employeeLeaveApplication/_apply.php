<table class="table table-condensed table-stripped">
	<?php for($i=0; $i<count($leaves); $i++):?>
	<tr><td><span class="icon-book"> </span> &nbsp;&nbsp;&nbsp;<?php echo GxHtml::link("<b>".$leaves[$i]->name."<b>", array('//portal/employeeLeaveApplication/apply', 'id' => $leaves[$i]->id));?></td></tr>
	<?php endfor;?>
</table>
	