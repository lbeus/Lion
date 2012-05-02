<?php
$this->pageTitle=Yii::app()->name . ' - SMS watchdog timers';
$this->breadcrumbs=array(
	'Sms watchdog timers',
);
?>

<h1>Reviewing sms watchdog-timer requests</h1>
<p>Here user can view his/hers SMS wathdog timers that are currently in the system</p>

<?php

	$rawData=Yii::app()->db->createCommand('SELECT n.*,u.username, u.first_name || \' \' || u.last_name as full_name, s.sensor_user_name FROM prod_sms_watchdog_timer n JOIN di_sensors s ON s.sensor_id = n.sensor_id JOIN prod_users u ON u.user_id = n.user_id WHERE u.user_id = '.Yii::app()->user->id)->queryAll();
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
        array('name' => 'sensor_user_name', 'header' => 'Sensor name'),
       
        array('name' => 'critical_period', 'header' => 'Critical period'),
        
        array('name' => 'minimal_delay_between_emails', 'header' => 'Minimal delay between emails'),
        
        array('name' => 'phone', 'header' => 'Phone'),
       
        array('value' => '($data["is_active"]==1)?"Active":"Inactive"', 'name' => 'Activity'),
        //'is_active',
        //'time_notification_asked',
        array('name' => 'time_watchdog_approved', 'header' => 'Time of approval'),
		
        array(
				'class'=>'CLinkColumn',
				'label'=>'Delete',
				'urlExpression'=>'Yii::app()->createUrl("user/userWatchdogRequests", array("watchdog_id"=>$data["watchdog_id"],"action"=>\'delete\'))',
				'header'=>'Delete',
			  ),
	),
));
?>
