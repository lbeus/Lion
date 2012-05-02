<?php
$this->breadcrumbs=array(
	'Lreadings'=>array('index'),
	$model->reading_id=>array('view','id'=>$model->reading_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LReadings', 'url'=>array('index')),
	array('label'=>'Create LReadings', 'url'=>array('create')),
	array('label'=>'View LReadings', 'url'=>array('view', 'id'=>$model->reading_id)),
	array('label'=>'Manage LReadings', 'url'=>array('admin')),
);
?>

<h1>Update LReadings <?php echo $model->reading_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>