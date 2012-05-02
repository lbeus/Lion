<?php
$this->breadcrumbs=array(
	'Sensors'=>array('index'),
	$model->sensor_id,
);

$this->menu=array(
	array('label'=>'List Sensors', 'url'=>array('index')),
	array('label'=>'Create Sensors', 'url'=>array('create')),
	array('label'=>'Update Sensors', 'url'=>array('update', 'id'=>$model->sensor_id)),
	array('label'=>'Delete Sensors', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sensor_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sensors', 'url'=>array('admin')),
);
?>

<h1>View Sensors #<?php echo $model->sensor_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sensor_id',
		'sensor_name',
		'sensor_user_name',
		'gsn_id',
		'sensor_type',
		'location_x',
		'location_y',
		'date_activated_id',
		'date_deactivated_id',
		'is_active',
		'is_dummy',
		'is_real_sensor',
	),
)); ?>
