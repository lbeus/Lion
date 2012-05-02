<?php
$this->breadcrumbs=array(
	'Di Sensors',
);

$this->menu=array(
	array('label'=>'Create DiSensors', 'url'=>array('create')),
	array('label'=>'Manage DiSensors', 'url'=>array('admin')),
);
?>

<h1>Di Sensors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
