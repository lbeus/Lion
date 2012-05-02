<?php
$this->breadcrumbs=array(
	'Di Sensors'=>array('index'),
	$model->sensor_id=>array('view','id'=>$model->sensor_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DiSensors', 'url'=>array('index')),
	array('label'=>'Create DiSensors', 'url'=>array('create')),
	array('label'=>'View DiSensors', 'url'=>array('view', 'id'=>$model->sensor_id)),
	array('label'=>'Manage DiSensors', 'url'=>array('admin')),
);
?>

<h1>Update DiSensors <?php echo $model->sensor_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>