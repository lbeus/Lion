<?php
$this->pageTitle=Yii::app()->name . ' - Watchdog Timers managing';
$this->breadcrumbs=array(
	'Watchdog Timers managing',
);
?>

<h1>Watchdog Timers administrations</h1>
<p>You can enable or decline all user SMS and E-mail watchdog timer requests</p>

<?php

	$rawData=Yii::app()->db->createCommand('SELECT n.*,u.username, u.first_name || \' \' || u.last_name as full_name, s.sensor_user_name
            FROM
            (
                select s.phone as recipient, s.watchdog_id,s.time_watchdog_approved, s.sensor_id, s.user_id, s.xml_name, s.critical_period, s.is_active, s.minimal_delay_between_emails, \'SMS\' as type
                from prod_sms_watchdog_timer s
                union all 
                select e.email as recipient, e.watchdog_id,e.time_watchdog_approved, e.sensor_id, e.user_id, e.xml_name, e.critical_period, e.is_active, e.minimal_delay_between_emails, \'E-mail\' as type
                from prod_email_watchdog_timer e
            ) n
            JOIN di_sensors s ON s.sensor_id = n.sensor_id
            JOIN prod_users u ON u.user_id = n.prod_user_id')->queryAll();
	// or using: $rawData=User::model()->findAll();
	$dataProvider=new CArrayDataProvider($rawData, array(
		'keyField'=>'watchdog_id',
		'id' => 'watchdog_id',
		'sort'=>array(
			'attributes'=>array(
				'type','username', 'full_name', 'sensor_user_name', 'watchdog_id'
			),
		),
		'pagination'=>array(
			'pageSize'=>10,
		),
	));


	$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'notification_id-grid',
    'dataProvider' => $dataProvider,
    //'filter'=>$model->model_view,
    //'selectableRows'=>2,
    'columns' => array(
        //array( 'name' => 'gsn_privilege_id'),
        array(
            'name' => 'type',
            'header' => 'Watchdog type',
        ),
        array(
            'name' => 'watchdog_id',
            'header' => 'ID',
        ),
        array(
            'name' => 'full_name',
            'header' => 'User name',
        ),
        array(
            'name' => 'sensor_user_name',
            'header' => 'Sensor name',
        ),
        array(
            'name' => 'xml_name',
            'header' => 'XML name',
        ),
        array(
            'name' => 'critical_period',
            'header' => 'Critical period',
        ),
        array(
            'name' => 'minimal_delay_between_emails',
            'header' => 'Minimal delay between emails',
        ),
        array(
            'name' => 'recipient',
            'header' => 'Recipient',
        ),
        array(
            'name' => 'Activity',
            'value' => '($data["is_active"]=="1")?"Active":"Inactive"',
        ),
        //'is_active',
        //'time_notification_asked',
        array(
            'name' => 'time_watchdog_approved',
            'header' => 'Time of approval',
        ),
        array(
            'class' => 'CLinkColumn',
            'labelExpression' => '($data["is_active"] == 1 ? "Revoke" : "Activate")',
            'urlExpression' => 'Yii::app()->createUrl("admin/adminWatchdogRequests", array("watchdog_id"=>$data["watchdog_id"], "type"=>$data["type"]))',
            'header' => 'Activate',
        ),
        array(
            'class' => 'CLinkColumn',
            'label' => 'Delete',
            'urlExpression' => 'Yii::app()->createUrl("admin/adminWatchdogRequests", array("watchdog_id"=>$data["watchdog_id"],"type"=>$data["type"],"action"=>\'delete\'))',
            'header' => 'Delete',
        ),
    ),
));
?>
