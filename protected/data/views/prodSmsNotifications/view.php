<?php
$this->breadcrumbs=array(
	'Prod Sms Notifications'=>array('index'),
	$model->notification_id,
);

$this->menu=array(
	array('label'=>'List ProdSmsNotifications', 'url'=>array('index')),
	array('label'=>'Create ProdSmsNotifications', 'url'=>array('create')),
	array('label'=>'Update ProdSmsNotifications', 'url'=>array('update', 'id'=>$model->notification_id)),
	array('label'=>'Delete ProdSmsNotifications', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->notification_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProdSmsNotifications', 'url'=>array('admin')),
);
?>

<h1>View ProdSmsNotifications #<?php echo $model->notification_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'notification_id',
		'time_notification_asked',
		'time_notification_approved',
		'is_active',
		'unit_id',
		'sensor_id',
		'prod_user_id',
		'unit_name',
		'unit_name_upper',
		'sensor_name',
		'xml_name',
		'phone',
		'critical_value',
		'resending_interval',
	),
)); ?>
