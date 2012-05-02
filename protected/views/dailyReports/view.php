<?php
$this->breadcrumbs=array(
	'Daily Reports'=>array('index'),
	$model->report_id,
);

$this->menu=array(
	array('label'=>'List DailyReports', 'url'=>array('index')),
	array('label'=>'Create DailyReports', 'url'=>array('create')),
	array('label'=>'Update DailyReports', 'url'=>array('update', 'id'=>$model->report_id)),
	array('label'=>'Delete DailyReports', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->report_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DailyReports', 'url'=>array('admin')),
);
?>

<h1>View DailyReports #<?php echo $model->report_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'report_id',
		'is_active',
		'sensor_id',
		'gsn_id',
		'user_id',
		'email',
	),
)); ?>
