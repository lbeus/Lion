<?php
$this->breadcrumbs=array(
	'Di Units'=>array('index'),
	$model->unit_id=>array('view','id'=>$model->unit_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DiUnits', 'url'=>array('index')),
	array('label'=>'Create DiUnits', 'url'=>array('create')),
	array('label'=>'View DiUnits', 'url'=>array('view', 'id'=>$model->unit_id)),
	array('label'=>'Manage DiUnits', 'url'=>array('admin')),
);
?>

<h1>Update DiUnits <?php echo $model->unit_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>