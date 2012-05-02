<?php
$this->breadcrumbs=array(
	'Sensors'=>array('index'),
	$model->sensor_id=>array('view','id'=>$model->sensor_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sensors', 'url'=>array('index')),
	array('label'=>'Create Sensors', 'url'=>array('create')),
	array('label'=>'View Sensors', 'url'=>array('view', 'id'=>$model->sensor_id)),
	array('label'=>'Manage Sensors', 'url'=>array('admin')),
);
?>

<h1>Update Sensors <?php echo $model->sensor_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>