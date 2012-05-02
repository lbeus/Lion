<?php
$this->breadcrumbs=array(
	'Prod Sms Watchdog Timers'=>array('index'),
	$model->watchdog_id,
);

$this->menu=array(
	array('label'=>'List ProdSmsWatchdogTimer', 'url'=>array('index')),
	array('label'=>'Create ProdSmsWatchdogTimer', 'url'=>array('create')),
	array('label'=>'Update ProdSmsWatchdogTimer', 'url'=>array('update', 'id'=>$model->watchdog_id)),
	array('label'=>'Delete ProdSmsWatchdogTimer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->watchdog_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProdSmsWatchdogTimer', 'url'=>array('admin')),
);
?>

<h1>View ProdSmsWatchdogTimer #<?php echo $model->watchdog_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'watchdog_id',
		'time_watchdog_asked',
		'time_watchdog_approved',
		'is_active',
		'sensor_id',
		'user_id',
		'sensor_name',
		'phone',
		'xml_name',
		'critical_period',
		'period_script',
		'minimal_delay_between_emails',
	),
)); ?>
