<?php
$this->breadcrumbs=array(
	'Prod Sms Watchdog Timers',
);

$this->menu=array(
	array('label'=>'Create ProdSmsWatchdogTimer', 'url'=>array('create')),
	array('label'=>'Manage ProdSmsWatchdogTimer', 'url'=>array('admin')),
);
?>

<h1>Prod Sms Watchdog Timers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
