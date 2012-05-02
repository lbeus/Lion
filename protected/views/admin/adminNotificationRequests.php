<?php
$this->pageTitle=Yii::app()->name . ' - Notifications managing';
$this->breadcrumbs=array(
	'Notifications managing',
);
?>

<h1>Notification administrations</h1>
<p>You can enable or decline all user SMS and E-mail notification requests</p>

<?php

	$rawData=Yii::app()->db->createCommand('SELECT n.*,u.username, u.first_name || \' \' || u.last_name as full_name, s.sensor_user_name
            FROM
            (
                select s.phone as recipient, s.notification_id, s.sensor_id, s.prod_user_id, s.xml_name, s.critical_value, s.is_active, s.resending_interval, \'SMS\' as type
                from prod_sms_notifications s
                union all 
                select e.email as recipient, e.notification_id, e.sensor_id, e.prod_user_id, e.xml_name, e.critical_value, e.is_active, e.resending_interval, \'E-mail\' as type
                from prod_email_notifications e
            ) n
            JOIN di_sensors s ON s.sensor_id = n.sensor_id
            JOIN prod_users u ON u.user_id = n.prod_user_id')->queryAll();
	// or using: $rawData=User::model()->findAll();
	$dataProvider=new CArrayDataProvider($rawData, array(
		'keyField'=>'notification_id',
		'id' => 'notification_id',
		'sort'=>array(
			'attributes'=>array(
				'type','username', 'full_name', 'sensor_user_name', 'notification_id'
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
            'header' => 'Notification type',
        ),
        array(
            'name' => 'notification_id',
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
            'name' => 'critical_value',
            'header' => 'Critical value',
        ),
        array(
            'name' => 'resending_interval',
            'header' => 'Resending interval',
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
            'name' => 'time_notification_approved',
            'header' => 'Time of approval',
        ),
        array(
            'class' => 'CLinkColumn',
            'labelExpression' => '($data["is_active"] == 1 ? "Revoke" : "Activate")',
            'urlExpression' => 'Yii::app()->createUrl("admin/adminNotificationRequests", array("notification_id"=>$data["notification_id"], "type"=>$data["type"]))',
            'header' => 'Activate',
        ),
        array(
            'class' => 'CLinkColumn',
            'label' => 'Delete',
            'urlExpression' => 'Yii::app()->createUrl("admin/adminNotificationRequests", array("notification_id"=>$data["notification_id"],"type"=>$data["type"],"action"=>\'delete\'))',
            'header' => 'Delete',
        ),
    ),
));
?>