<?php
$this->breadcrumbs=array(
	'Prod Email Watchdog Timers'=>array('index'),
	$model->watchdog_id=>array('view','id'=>$model->watchdog_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProdEmailWatchdogTimer', 'url'=>array('index')),
	array('label'=>'Create ProdEmailWatchdogTimer', 'url'=>array('create')),
	array('label'=>'View ProdEmailWatchdogTimer', 'url'=>array('view', 'id'=>$model->watchdog_id)),
	array('label'=>'Manage ProdEmailWatchdogTimer', 'url'=>array('admin')),
);
?>

<h1>Update ProdEmailWatchdogTimer <?php echo $model->watchdog_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>