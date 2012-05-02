<?php
$this->breadcrumbs=array(
	'Lreadings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LReadings', 'url'=>array('index')),
	array('label'=>'Manage LReadings', 'url'=>array('admin')),
);
?>

<h1>Create LReadings</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>