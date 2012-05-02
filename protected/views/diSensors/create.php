<?php
$this->breadcrumbs=array(
	'Di Sensors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DiSensors', 'url'=>array('index')),
	array('label'=>'Manage DiSensors', 'url'=>array('admin')),
);
?>

<h1>Create DiSensors</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>