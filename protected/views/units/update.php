<?php
$this->breadcrumbs=array(
	'Units'=>array('index'),
	$model->unit_id=>array('view','id'=>$model->unit_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Units', 'url'=>array('index')),
	array('label'=>'Create Units', 'url'=>array('create')),
	array('label'=>'View Units', 'url'=>array('view', 'id'=>$model->unit_id)),
	array('label'=>'Manage Units', 'url'=>array('admin')),
);
?>

<h1>Update Units <?php echo $model->unit_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>