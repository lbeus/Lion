<?php
$this->breadcrumbs=array(
	'Prod Email Watchdog Timers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProdEmailWatchdogTimer', 'url'=>array('index')),
	array('label'=>'Manage ProdEmailWatchdogTimer', 'url'=>array('admin')),
);
?>

<h1>Create ProdEmailWatchdogTimer</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>