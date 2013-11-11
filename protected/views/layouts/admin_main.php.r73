<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <style type="text/css">
            body {
                font-size: 10px;
            }
        </style>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    </head>

    <body>

        <div class="container" id="page">

            <div id="header">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/pictures/lion-banner.jpg" alt="lion-head" height="150" width="950"/>
                <div id="user_name"><?php if (!Yii::app()->user->isGuest)
            echo "Welcome " . Yii::app()->user->name; ?></div>
            </div><!-- header -->

            <div id="mainmenu">
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'items' => array(
                        array('label' => 'Index', 'url' => array('/admin/index')),
                        array('label' => 'Users', 'url' => array('/prodUsers/index'), 'visible' => !Yii::app()->user->isGuest && Yii::app()->user->group == 1),
                        //array('label'=>'GSN privileges', 'url'=>array('/diGsnPrivileges/index'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->group ==1),
                        array('label' => 'GSN', 'url' => array('/diGsn/index'), 'visible' => !Yii::app()->user->isGuest && Yii::app()->user->group == 1),
                        array('label' => 'GSN privileges', 'url' => array('/admin/adminGsnPrivileges'), 'visible' => !Yii::app()->user->isGuest && Yii::app()->user->group == 1),
                        array('label' => 'Reports managing', 'url' => array('/admin/adminReportsManaging'), 'visible' => !Yii::app()->user->isGuest && Yii::app()->user->group == 1),
                       // array('label' => 'Email notifications', 'url' => array('/admin/adminEmailNotificationRequests'), 'visible' => !Yii::app()->user->isGuest && Yii::app()->user->group == 1),
                        array('label' => 'Notifications managing', 'url' => array('/admin/adminNotificationRequests'), 'visible' => !Yii::app()->user->isGuest && Yii::app()->user->group == 1),
                        array('label' => 'Sensors', 'url' => array('/diSensors/index'), 'visible' => !Yii::app()->user->isGuest && Yii::app()->user->group == 1),
                        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->group == 1),
                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest && Yii::app()->user->group == 1),
                        array('label' => 'Home', 'url' => array('/site/index'), 'visible' => !Yii::app()->user->isGuest && Yii::app()->user->group == 1),
                    ),
                ));
                ?>
            </div><!-- mainmenu -->

            <?php if (isset($this->breadcrumbs)): ?>
            <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                    ));
            ?><!-- breadcrumbs -->
            <?php endif ?>
                <div id="content">
                    <div class="span-4 last">
                        <div id="logo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/pictures/projectLogo.png" width="151" height="42" /></div><br />

                <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'items' => $this->menu,
                        'htmlOptions' => array('class' => 'operations'),
                    ));
                ?>
                </div>
                    <div class="span-18">
                <?php echo $content; ?>
                    </div>
                <div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by FER.<br/>
		All Rights Reserved.<br/>
                Matija Renić, Luka Postružin<br/>
            </div><!-- footer -->
                </div>
        </div><!-- page -->

    </body>
</html>
