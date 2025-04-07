<h2>
    Kindly Take Part in the 
    <a href="https://forms.gle/ipX1esUihaKQMmWo9" class="btn btn-primary" target="_blank">
        TU-K Staff Survey on ODeL e-READINESS
    </a>
</h2>

<h3>
    Enquiries on official staff email should be sent to: 
    <a href="mailto:ictsupport@tukenya.ac.ke">ictsupport@tukenya.ac.ke</a> 
    quoting your payroll number.
</h3>

<div class="well">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'user-form',
        'type' => 'horizontal',    
    ));
    ?>

    <h1>Staff Sign In</h1>
    <hr/>

    <?php
    $this->widget('bootstrap.widgets.TbAlert', array(
        'block' => true,
        'fade' => true,
        'closeText' => '&times;',
        'alerts' => array(
            'success' => array('block' => true, 'fade' => true, 'closeText' => '&times;'),
            'error' => array('block' => true, 'fade' => true, 'closeText' => '&times;'),
            'info' => array('block' => true, 'fade' => true, 'closeText' => '&times;'),
            'warning' => array('block' => true, 'fade' => true, 'closeText' => '&times;'),
        ),
    ));
    ?>

    <br/>
    
    <!-- Username Field -->
    <?php echo $form->textFieldRow($model, 'username', array(
        'prepend' => '<i class="icon-user"></i>',
        'maxlength' => 255,
        'value' => '',
    )); ?>

    <div class="control-group hint">
        <label class="control-label"></label>
        <i>HINT: Use your PF number as username</i>
    </div>

    <br/>

    <!-- Password Field -->
    <?php echo $form->passwordFieldRow($model, 'password', array(
        'prepend' => '<i class="icon-lock"></i>',
        'maxlength' => 255,
        'value' => '',
    )); ?>

    <div class="control-group hint">
        <label class="control-label"></label>
        <i>HINT: Use your ID/Passport number as password if you have never logged in and changed it.</i>
    </div>

    <hr/>

    <!-- Sign In Button -->
    <div class="control-group hint">
        <label class="control-label"></label>
        <?php 
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'success',
            'size' => 'large',
            'label' => 'Sign In',
        )); 
        ?>
        
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <i>Unable to proceed?&nbsp;
        <i class="icon-lock"></i> <?php echo CHtml::link('Recover password', array('//portal/profile/recoverPassword')); ?> |
        <i class="icon-flag"></i> <?php echo CHtml::link('Help', array('//portal/profile/help')); ?> |
        <i class="icon-home"></i> <?php echo CHtml::link('Home', array('//portal/profile/home')); ?> |
        <i class="icon-shopping-cart"></i> <?php echo CHtml::link('Products', array('//portal/products/index')); ?>
        </i>
    </div>

    <hr/>

    <?php $this->endWidget(); ?>
</div>
