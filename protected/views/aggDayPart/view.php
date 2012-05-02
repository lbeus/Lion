<?php
$this->breadcrumbs=array(
	'Agg Day Parts'=>array('index'),
	$model->reading_id,
);

$this->menu=array(
	array('label'=>'List AggDayPart', 'url'=>array('index')),
	array('label'=>'Create AggDayPart', 'url'=>array('create')),
	array('label'=>'Update AggDayPart', 'url'=>array('update', 'id'=>$model->reading_id)),
	array('label'=>'Delete AggDayPart', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->reading_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AggDayPart', 'url'=>array('admin')),
);
?>

<h1>View AggDayPart #<?php echo $model->reading_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'reading_id',
		'gsn_id',
		'sensor_id',
		'unit_id',
		'date_id',
		'day_part_id',
		'avg_value',
		'max_value',
		'min_value',
		'amplitude',
	),
)); ?>
