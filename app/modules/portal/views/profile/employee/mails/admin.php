<h1>MAILS</h1>
<table class="table table-condensed">
<tr><td>
<?php 
$this->widget('CTabView', array(
    'tabs'=>array(
        'tab1'=>array(
            'title'=>'<span>Received Mails - Inbox</span>',
            'view'=>'employee/mails/_inbox',
           'data'=>array('inbox'=>StaffMail::received()),
        ),
		'tab2'=>array(
            'title'=>'<span>Sent Mails - Outbox</span>',
            'view'=>'employee/mails/_sent',
            'data'=>array('sent'=>StaffMail::sent()),
        ),
		 
    ),
)); ?>
</td>
</tr>
</table>