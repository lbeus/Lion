<?php
$this->breadcrumbs=array(
	'Prod Email Watchdog Timers'=>array('index'),
	$model->watchdog_id,
);

$this->menu=array(
	array('label'=>'List ProdEmailWatchdogTimer', 'url'=>array('index')),
	array('label'=>'Create ProdEmailWatchdogTimer', 'url'=>array('create')),
	array('label'=>'Update ProdEmailWatchdogTimer', 'url'=>array('update', 'id'=>$model->watchdog_id)),
	array('label'=>'Delete ProdEmailWatchdogTimer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->watchdog_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProdEmailWatchdogTimer', 'url'=>array('admin')),
);
?>

<h1>View ProdEmailWatchdogTimer #<?php echo $model->watchdog_id; ?></h1>

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
		'xml_name',
		'critical_period',
		'period_script',
		'minimal_delay_between_emails',
		'email',
	),
)); ?>
