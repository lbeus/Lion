<?php
$this->breadcrumbs=array(
	'Lreadings'=>array('index'),
	$model->reading_id,
);

$this->menu=array(
	array('label'=>'List LReadings', 'url'=>array('index')),
	array('label'=>'Create LReadings', 'url'=>array('create')),
	array('label'=>'Update LReadings', 'url'=>array('update', 'id'=>$model->reading_id)),
	array('label'=>'Delete LReadings', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->reading_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LReadings', 'url'=>array('admin')),
);
?>

<h1>View LReadings #<?php echo $model->reading_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'reading_id',
		'gsn_id',
		'sensor_id',
		'unit_id',
		'date_id',
		'time_id',
		'time_of_the_reading',
		'value',
	),
)); ?>
