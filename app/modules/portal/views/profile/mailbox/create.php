<?php
/* @var $this MailboxController */
/* @var $model Mailbox */

$this->breadcrumbs=array(
	'Mailboxes'=>array('index'),
	'Create',
);

?>

<h1>Report Missing or Incorrect Details</h1>

<?php echo $this->renderPartial('mailbox/_form', array('model'=>$model)); ?>