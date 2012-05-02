<?php
$this->breadcrumbs=array(
	'Di Units'=>array('index'),
	$model->unit_id,
);

$this->menu=array(
	array('label'=>'List DiUnits', 'url'=>array('index')),
	array('label'=>'Create DiUnits', 'url'=>array('create')),
	array('label'=>'Update DiUnits', 'url'=>array('update', 'id'=>$model->unit_id)),
	array('label'=>'Delete DiUnits', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->unit_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DiUnits', 'url'=>array('admin')),
);
?>

<h1>View DiUnits #<?php echo $model->unit_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'unit_id',
		'unit_name',
		'unit_mark',
	),
)); ?>
