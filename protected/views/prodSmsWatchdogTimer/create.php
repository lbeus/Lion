<?php
$this->breadcrumbs=array(
	'Prod Sms Watchdog Timers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProdSmsWatchdogTimer', 'url'=>array('index')),
	array('label'=>'Manage ProdSmsWatchdogTimer', 'url'=>array('admin')),
);
?>

<h1>Create ProdSmsWatchdogTimer</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>