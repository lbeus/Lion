<?php
$this->breadcrumbs=array(
	'Di Day Parts'=>array('index'),
	$model->day_part_id,
);

$this->menu=array(
	array('label'=>'List DiDayPart', 'url'=>array('index')),
	array('label'=>'Create DiDayPart', 'url'=>array('create')),
	array('label'=>'Update DiDayPart', 'url'=>array('update', 'id'=>$model->day_part_id)),
	array('label'=>'Delete DiDayPart', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->day_part_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DiDayPart', 'url'=>array('admin')),
);
?>

<h1>View DiDayPart #<?php echo $model->day_part_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'day_part_id',
		'day_part_name',
		'start_time',
		'finish_time',
	),
)); ?>
