<?php

/* @var $this DefaultController */
/* @var $housing Housing[] */

$this->breadcrumbs = array(
    'Housing List', // Title of the page
);

$this->menu = array(
    array('label' => 'Create Housing', 'url' => array('create')), // Option to create a new housing record
);
?>

<h1>Housing Listings</h1>

<!-- Add a Create Housing link here as well -->
<p><?php echo CHtml::link('Create New Housing', array('create'), array('class' => 'btn btn-primary')); ?></p>

<?php if (count($housing) > 0): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>House Name</th>
                <th>Location</th>
                <th>Type</th>
                <th>Rent</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($housing as $house): ?>
                <tr>
                    <td><?php echo CHtml::encode($house->housename); ?></td>
                    <td><?php echo CHtml::encode($house->location); ?></td>
                    <td><?php echo CHtml::encode($house->type->name); ?></td> <!-- Assuming 'type' is a relation to HousingTukHouseType model -->
                    <td><?php echo CHtml::encode($house->rent); ?></td>
                    <td>
                        <?php echo CHtml::link('View', array('view', 'id' => $house->id)); ?> |
                        <?php echo CHtml::link('Update', array('update', 'id' => $house->id)); ?> |
                        <?php echo CHtml::link('Delete', array('delete', 'id' => $house->id), array('onclick' => 'return confirm("Are you sure you want to delete this item?");')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No housing records available.</p>
<?php endif; ?>
