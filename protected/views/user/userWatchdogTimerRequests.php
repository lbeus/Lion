<?php
$this->pageTitle=Yii::app()->name . ' - Email watchdog timers';
$this->breadcrumbs=array(
	'Email watchdog timers',
);
?>

<h1>Reviewing email watchdog-timer requests</h1>
<p>Here user can view his/hers email wathdog timers that are currently in the system</p>

<?php

	$rawData=Yii::app()->db->createCommand('SELECT n.*,u.username, u.first_name || \' \' || u.last_name as full_name, s.sensor_user_name FROM prod_email_watchdog_timer n JOIN di_sensors s ON s.sensor_id = n.sensor_id JOIN prod_users u ON u.user_id = n.user_id WHERE u.user_id = '.Yii::app()->user->id)->queryAll();
	// or using: $rawData=User::model()->findAll();
	$dataProvider=new CArrayDataProvider($rawData, array(
		'keyField'=>'watchdog_id',
		'id' => 'watchdog_id',
		'sort'=>array(
			'attributes'=>array(
				'username', 'full_name', 'sensor_user_name', 'watchdog_id'
			),
		),
		'pagination'=>array(
			'pageSize'=>10,
		),
	));


	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'watchdog_id-grid',
	'dataProvider'=>$dataProvider,
	//'filter'=>$model->model_view,
	//'selectableRows'=>2,
	'columns'=>array(
		//array( 'name' => 'gsn_privilege_id'),
		//'notification_id',
		'full_name',
		'sensor_user_name',
		//'xml_name',
		'critical_period',
		'minimal_delay_between_emails',
                'period_script',
                'email',
		'is_active',
                //'time_notification_asked',
                'time_notification_approved',
            		array(
				'class'=>'CLinkColumn',
				'label'=>'Delete',
				'urlExpression'=>'Yii::app()->createUrl("site/userEmailNotificationRequests", array("notification_id"=>$data["notification_id"],"action"=>\'delete\'))',
				'header'=>'Delete',
			  ),
	),
));
?>