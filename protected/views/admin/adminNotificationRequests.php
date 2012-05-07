<?php
$this->pageTitle = Yii::app()->name . ' - Notifications managing';
$this->breadcrumbs = array(
    'Notifications managing',
);
?>
<div class="post">
    <p class="date"><?php echo date("M"); ?><b><?php echo date("j"); ?></b></p>
    <h2 class="title">Notification administrations</h2>
    <p class="posted">Lion development team</p>
    <div class="entry">
	<p>You can enable or decline all user SMS and E-mail notification requests</p>

	<?php
	$rawData = Yii::app()->db->createCommand('SELECT n.*,u.username, u.first_name || \' \' || u.last_name as full_name, s.sensor_user_name
            FROM
            (
                select s.criteria_type,s.phone as recipient, s.notification_id, s.sensor_id, s.prod_user_id, s.xml_name, s.critical_value, s.is_active, s.resending_interval,s.time_notification_approved, \'SMS\' as type
                from prod_sms_notifications s
                union all 
                select e.criteria_type,e.email as recipient, e.notification_id, e.sensor_id, e.prod_user_id, e.xml_name, e.critical_value, e.is_active, e.resending_interval,e.time_notification_approved, \'E-mail\' as type
                from prod_email_notifications e
            ) n
            JOIN di_sensors s ON s.sensor_id = n.sensor_id
            JOIN prod_users u ON u.user_id = n.prod_user_id')->queryAll();
	// or using: $rawData=User::model()->findAll();
	$dataProvider = new CArrayDataProvider($rawData, array(
		    'keyField' => 'notification_id',
		    'id' => 'notification_id',
		    'sort' => array(
			'attributes' => array(
			    'type', 'username', 'full_name', 'sensor_user_name', 'notification_id'
			),
		    ),
		    'pagination' => array(
			'pageSize' => 10,
		    ),
		));

	foreach ($rawData as $notification)
	{
	    echo '<div class="roundedBox" id="type1">';
	    //when we have a round frame, we can print what we wanted
	    echo "Notification ID: ".$notification['notification_id'].'<br/>';
	    echo "Notification type: ".$notification['type'].'<br/>';
	    echo "Criteria type: ".($notification['criteria_type']==1?"Below":"Above").'<br/>';
	    echo "Sensor name: ".$notification['sensor_user_name'].'<br/>';
	    echo "XML name: ".$notification["xml_name"].'<br/>';
	    echo "Critical value: ".$notification["critical_value"].'<br/>';
	    echo "Resending interval: ".$notification["resending_interval"].'<br/>';
	    echo "Recipient: ".$notification['recipient'].'<br/>';
	    echo "Time of approval: ".$notification['time_notification_approved'].'<br/>';
	    echo "Activity: ".(($notification["is_active"]=="1")?"Active":"Inactive").'<br/>';
	    echo "Activation: ".CHtml::link(($notification["is_active"] == 1) ? "Revoke" : "Activate",array('admin/adminNotificationRequests', "notification_id"=>$notification["notification_id"], "type"=>$notification["type"])).'<br/>';
	    echo "Delete: ".CHtml::link('Delete',array('admin/adminNotificationRequests', "notification_id"=>$notification["notification_id"],"type"=>$notification["type"],"action"=>"delete")).'<br/>';
	    echo '<div class="corner topLeft"></div><div class="corner topRight"></div><div class="corner bottomLeft"></div><div class="corner bottomRight"></div>';
	    echo '</div>';
	}
/*
	$this->widget('zii.widgets.grid.CGridView', array(
	    'id' => 'notification_id-grid',
	    'dataProvider' => $dataProvider,
	    //'filter'=>$model->model_view,
	    //'selectableRows'=>2,
	    'columns' => array(
		//array( 'name' => 'gsn_privilege_id'),
		array(
		    'name' => 'notification_id',
		    'header' => 'ID',
		),
		array(
		    'name' => 'type',
		    'header' => 'Notification type',
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
*/
	?>

    </div>
</div>