<?php
$this->breadcrumbs=array(
	'Units'=>array('index'),
	$model->unit_id,
);

$this->menu=array(
	array('label'=>'List Units', 'url'=>array('index')),
	array('label'=>'Create Units', 'url'=>array('create')),
	array('label'=>'Update Units', 'url'=>array('update', 'id'=>$model->unit_id)),
	array('label'=>'Delete Units', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->unit_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Units', 'url'=>array('admin')),
);
?>

<h1>View Units #<?php echo $model->unit_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'unit_id',
		'unit_name',
		'unit_mark',
	),
)); ?>
