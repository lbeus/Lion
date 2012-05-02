<?php
$this->breadcrumbs=array(
	'Di Units'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DiUnits', 'url'=>array('index')),
	array('label'=>'Manage DiUnits', 'url'=>array('admin')),
);
?>

<h1>Create DiUnits</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>