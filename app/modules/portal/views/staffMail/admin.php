<h1>MAILS</h1>
<table class="table table-condensed">
<tr><td>
<?php 
$this->widget('CTabView', array(
    'tabs'=>array(
        'tab1'=>array(
            'title'=>'<span>Received Mails - Inbox</span>',
            'view'=>'_inbox',
           'data'=>array('inbox'=>$inbox),
        ),
		'tab2'=>array(
            'title'=>'<span>Sent Mails - Outbox</span>',
            'view'=>'_sent',
            'data'=>array('sent'=>$sent),
        ),
		 
    ),
)); ?>
</td>
</tr>
</table>