<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/login.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/facebox/facebox.css" media="screen" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
 	
	<meta name="description" content="" />

	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/protected/javascripts/jquery.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/protected/javascripts/facebox/facebox.js"></script>
</head>
<body>

<div class="container" id="page">

	<div id="header">
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/css/pictures/lion-banner.jpg" alt="lion-head" height="150" width="950"/>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'GSN', 'url'=>array('/site/page','view'=>'gsn'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Sensors', 'url'=>array('/site/page','view'=>'sensors'), 'visible'=>!Yii::app()->user->isGuest),				
				array('label'=>'Reports', 'url'=>array('/site/page','view'=>'reports'), 'visible'=>!Yii::app()->user->isGuest),	
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Notifications', 'url'=>array('/site/notifications'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),		
			),
		)); ?>
	</div><!-- mainmenu -->
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>
	
	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by FER.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div>
	
</body>
</html>


