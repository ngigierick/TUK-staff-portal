<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/images/favicon.ico" />
    
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    <div class="container" id="page">
        <header id="header">
            <div id="logo"><br/></div>
        </header><!-- header -->

        <nav id="mainmenu">
            <?php 
            $this->widget('bootstrap.widgets.TbNavbar', array(
                'type' => 'inverse',
                'brand' => '<span id="brand">TuSOFT Management System</span>',
                'brandUrl' => array('/site'),
                'collapse' => true,
                'items' => array(
                    array(
                        'class' => 'bootstrap.widgets.TbMenu',
                        'htmlOptions' => array('class' => 'pull-left'),
                        'items' => array(
                            // Add Products link here, it will be visible for users with access level 3
                            array('label' => 'Products', 'url' => array('/products/index'), 'visible' => Yii::app()->user->checkAccess(3)),
                            array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                            array(
                                'label' => 'Application',
                                'url' => '#',
                                'visible' => Yii::app()->user->checkAccess(3),
                                'items' => array(
                                    array('label' => 'Enrol new applicant', 'url' => array('/intake/applicant/enroll')),
                                    array('label' => 'Manage applicants', 'url' => array('/intake/applicant/admin'))
                                ),
                            ),
                            array(
                                'label' => 'Admission',
                                'url' => array('/admission'),
                                'visible' => Yii::app()->user->checkAccess(3),
                                'items' => array(
                                    array('label' => 'Verify Admission Requirements', 'url' => array('/admission/student/verify')),
                                    array('label' => 'Admit new Student', 'url' => array('/admission/student/admit')),
                                    array('label' => 'Manage Students', 'url' => array('/admission/student/admin')),
                                ),
                            ),
                            array(
                                'label' => 'Finance',
                                'url' => '#',
                                'visible' => Yii::app()->user->checkAccess(2),
                                'items' => array(
                                    array('label' => 'Receive Fees Payment', 'url' => array('/finance/studentReceipt/pay')),
                                    array('label' => 'Check Student Fee Statement', 'url' => array('/admission/student/statement')),
                                ),
                            ),
                        ),
                    ),
                    array(
                        'class' => 'bootstrap.widgets.TbMenu',
                        'htmlOptions' => array('class' => 'pull-right'),
                        'items' => array(
                            array(
                                'label' => '',
                                'icon' => 'cog',
                                'url' => '#',
                                'visible' => (Yii::app()->user->id == 1),
                                'items' => array(
                                    array('label' => 'Manage University', 'url' => array('/setup/institution/admin')),
                                    array('label' => 'Manage Faculties', 'url' => array('/setup/faculty/admin')),
                                    array('label' => 'Manage Schools', 'url' => array('/setup/school/admin')),
                                    array('label' => 'Manage Programme Classes', 'url' => array('/setup/courseClass/admin')),
                                    array('label' => 'Manage Users', 'url' => array('/user/user/admin'), 'visible' => Yii::app()->user->checkAccess(1)),
                                ),
                            ),
                            array(
                                'label' => '',
                                'icon' => 'user',
                                'url' => '#',
                                'visible' => !Yii::app()->user->isGuest,
                                'items' => array(
                                    array('label' => 'Go to my profile', 'url' => array('/user/user/view&id=' . Yii::app()->user->id)),
                                    array('label' => 'Logout', 'url' => array('/site/logout')),
                                ),
                            ),
                        ),
                    ),
                ),
            ));
            ?>
        </nav><!-- mainmenu -->

        <main>
            <?php echo $content; ?>
        </main>

        <div style="clear:both"></div>
    </div><!-- page -->

    <footer id="footer">
        <div class="copyright">
            <div id="copyright">
                The portal has been designed, developed & being maintained by the Directorate of ICT Services. 
                All inquiries should be directed to webmaster@tukenya.ac.ke<br/>
                Copyright &copy; <?php echo date('Y'); ?> The Technical University of Kenya. All Rights Reserved.<br/>
            </div>
        </div>
    </footer><!-- footer -->
</body>
</html>
