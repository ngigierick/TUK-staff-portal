<?php $dashboard = StaffHelper::dashboard($model); ?>
<?php $personal = StaffHelper::personalInfo($model); ?>
<?php $contacts = StaffHelper::contactsDisplay($model); ?>
<?php $qualifications = StaffHelper::qualificationsDisplay($model); ?>
<?php $work = StaffHelper::work($model); ?>
<?php $statement = StaffHelper::statement($model); ?>
<?php $projects = StaffHelper::projects($model); ?>
<?php $publications = StaffHelper::publications($model); ?>
<?php $supervision = StaffHelper::supervision($model); ?>
<?php $courses = StaffHelper::courses($model); ?>
<?php $professional = StaffHelper::professional($model); ?>
<?php $extras = StaffHelper::extras($model); ?>
<?php $docs = StaffHelper::docs($model); ?>

<?php echo CHtml::link('Manage products', Yii::app()->createUrl('product/default/index'), array('class' => 'btn btn-success')); ?>


<?php $this->widget('bootstrap.widgets.TbTabs', array(
    'type'=>'tabs',
    'placement'=>'top', 
    'tabs'=>array(
        array(
            'label'=>'Dashboard', 
            'content'=>$dashboard,
            'active'=>($page==1),
        ),
        array(
            'label'=>'Personal & Academic Info', 
            'content'=>$personal.$qualifications,
        ),
        array(
            'label'=>'Work Experience', 
            'content'=>$work,
        ),
        array(
            'label'=>'Research Statement & Projects', 
            'content'=>$statement.$projects,
        ),
        array(
            'label'=>'Publications', 
            'content'=>$publications,
        ),
        array(
            'label'=>'Students Supervision', 
            'content'=>$supervision,
        ),
        array(
            'label'=>'Courses Taught', 
            'content'=>$courses,
        ),
        array(
            'label'=>'Professional Qualifications', 
            'content'=>$professional,
        ),
        array(
            'label'=>'Any other Information', 
            'content'=>$extras,
        ),
        array(
            'label'=>'Document Uploads', 
            'content'=>$docs,
        ),
    ),  
)); 
?>
