<?php
$this->breadcrumbs=array(
	'Prod Email Watchdog Timers',
);

$this->menu=array(
	array('label'=>'Create ProdEmailWatchdogTimer', 'url'=>array('create')),
	array('label'=>'Manage ProdEmailWatchdogTimer', 'url'=>array('admin')),
);
?>

<h1>Prod Email Watchdog Timers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
