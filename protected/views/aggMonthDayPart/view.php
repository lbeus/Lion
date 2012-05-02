<?php
$this->breadcrumbs=array(
	'Agg Month Day Parts'=>array('index'),
	$model->reading_id,
);

$this->menu=array(
	array('label'=>'List AggMonthDayPart', 'url'=>array('index')),
	array('label'=>'Create AggMonthDayPart', 'url'=>array('create')),
	array('label'=>'Update AggMonthDayPart', 'url'=>array('update', 'id'=>$model->reading_id)),
	array('label'=>'Delete AggMonthDayPart', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->reading_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AggMonthDayPart', 'url'=>array('admin')),
);
?>

<h1>View AggMonthDayPart #<?php echo $model->reading_id; ?></h1>

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
