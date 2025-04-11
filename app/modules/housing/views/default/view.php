
<?php


/* @var $this DefaultController */
/* @var $model Housing */

$this->breadcrumbs = array(
    'Housing' => array('index'),
    'View',
);

$this->menu = array(
    array('label' => 'Manage Housing', 'url' => array('index')),
    array('label' => 'Update Housing', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Housing', 'url' => array('delete', 'id' => $model->id)),
);

?>

<h1>View Housing</h1>

<div>
    <b>House Name:</b> <?php echo CHtml::encode($model->housename); ?><br />
    <b>Location:</b> <?php echo CHtml::encode($model->location); ?><br />
    <b>Type:</b> <?php echo CHtml::encode($model->type->name); ?><br />
    <b>Rent:</b> <?php echo CHtml::encode($model->rent); ?><br />
</div>
