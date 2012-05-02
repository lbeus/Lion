<?php
$this->breadcrumbs=array(
	'Sensors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sensors', 'url'=>array('index')),
	array('label'=>'Manage Sensors', 'url'=>array('admin')),
);
?>

<h1>Create Sensors</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>