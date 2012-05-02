<?php
$this->breadcrumbs=array(
	'Aggregate Months'=>array('index'),
	$model->reading_id,
);

$this->menu=array(
	array('label'=>'List AggregateMonth', 'url'=>array('index')),
	array('label'=>'Create AggregateMonth', 'url'=>array('create')),
	array('label'=>'Update AggregateMonth', 'url'=>array('update', 'id'=>$model->reading_id)),
	array('label'=>'Delete AggregateMonth', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->reading_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AggregateMonth', 'url'=>array('admin')),
);
?>

<h1>View AggregateMonth #<?php echo $model->reading_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'reading_id',
		'gsn_id',
		'sensor_id',
		'unit_id',
		'year',
		'month',
		'day_part_id',
		'avg_value',
		'avg_max_value',
		'avg_min_value',
		'avg_amplitude',
	),
)); ?>
