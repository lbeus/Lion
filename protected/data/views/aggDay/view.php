<?php
$this->breadcrumbs=array(
	'Agg Days'=>array('index'),
	$model->reading_id,
);

$this->menu=array(
	array('label'=>'List AggDay', 'url'=>array('index')),
	array('label'=>'Create AggDay', 'url'=>array('create')),
	array('label'=>'Update AggDay', 'url'=>array('update', 'id'=>$model->reading_id)),
	array('label'=>'Delete AggDay', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->reading_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AggDay', 'url'=>array('admin')),
);
?>

<h1>View AggDay #<?php echo $model->reading_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'reading_id',
		'gsn_id',
		'sensor_id',
		'unit_id',
		'date_id',
		'avg_value',
		'max_value',
		'min_value',
		'amplitude',
	),
)); ?>
