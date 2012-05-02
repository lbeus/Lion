<?php
$this->breadcrumbs=array(
	'Prod Sms Watchdog Timers'=>array('index'),
	$model->watchdog_id=>array('view','id'=>$model->watchdog_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProdSmsWatchdogTimer', 'url'=>array('index')),
	array('label'=>'Create ProdSmsWatchdogTimer', 'url'=>array('create')),
	array('label'=>'View ProdSmsWatchdogTimer', 'url'=>array('view', 'id'=>$model->watchdog_id)),
	array('label'=>'Manage ProdSmsWatchdogTimer', 'url'=>array('admin')),
);
?>

<h1>Update ProdSmsWatchdogTimer <?php echo $model->watchdog_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>