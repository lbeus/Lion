<?php
$this->breadcrumbs=array(
	'Aggregate Days'=>array('index'),
	$model->reading_id,
);

$this->menu=array(
	array('label'=>'List AggregateDay', 'url'=>array('index')),
	array('label'=>'Create AggregateDay', 'url'=>array('create')),
	array('label'=>'Update AggregateDay', 'url'=>array('update', 'id'=>$model->reading_id)),
	array('label'=>'Delete AggregateDay', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->reading_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AggregateDay', 'url'=>array('admin')),
);
?>

<h1>View AggregateDay #<?php echo $model->reading_id; ?></h1>

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
