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

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<script language="JavaScript">
		function reload(form){
			var gsn_id=form.NotificationsForm_gsnList.options[form.NotificationsForm_gsnList.options.selectedIndex].value; 
			var gsn_name=form.NotificationsForm_gsnList.options[form.NotificationsForm_gsnList.options.selectedIndex].text;
			var sensor_id=form.NotificationsForm_sensorList.options[form.NotificationsForm_sensorList.options.selectedIndex].value; 
			var sensor_name=form.NotificationsForm_sensorList.options[form.NotificationsForm_sensorList.options.selectedIndex].text;
			var not_type="not_selected";
			
			var radioButtons = document.getElementsByName('NotificationsForm[notificationType]');
			
			not_type = radioButtons.length;
      		
			for (var x = 0; x < radioButtons.length; x ++) {
				
				if (radioButtons[x].type=='radio' && radioButtons[x].checked) {
					not_type=radioButtons[x].value;
				}
			}
			
			self.location = 'index.php?r=site/notifications&gsn_id=' + gsn_id+ '&gsn_name=' + gsn_name + '&sensor_id='+ sensor_id + '&sensor_name=' + sensor_name + '&notification_type=' + not_type;
		}
	</script>
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
	
	<!--Side menu for notification tab-->
	<?php if (strcmp($this->breadcrumbs[0],"Notification")==0) : ?>
	<div id="sidemenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'New', 'url'=>array('/site/notifications')),
				array('label'=>'SMS notifications', 'url'=>array('/site/index')),
				array('label'=>'E-mail notifications', 'url'=>array('/site/index')),
			),
		)); ?>
	</div><!-- sidemenu -->
	<?php endif; ?>

	<!--Side menu for gsn tab-->
	<?php if (strcmp($this->breadcrumbs[0],"GSN")==0) : ?>
	<div id="sidemenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'GSN list', 'url'=>array('/site/gsnList')),
				array('label'=>'GSN privileges', 'url'=>array('/site/index')),
			),
		)); ?>
	</div><!-- sidemenu -->
	<?php endif; ?>
	
	<!--Side menu for gsn tab-->
	<?php if (strcmp($this->breadcrumbs[0],"Sensors")==0) : ?>
	<div id="sidemenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Sensor list', 'url'=>array('/site/page','view'=>'sensors')),
				array('label'=>'Sensor privileges', 'url'=>array('/site/index')),
			),
		)); ?>
	</div><!-- sidemenu -->
	<?php endif; ?>
	
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

</div><!-- page -->

</body>
</html>
