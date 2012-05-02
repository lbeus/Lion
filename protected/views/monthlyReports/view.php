<?php
$this->breadcrumbs=array(
	'Monthly Reports'=>array('index'),
	$model->report_id,
);

$this->menu=array(
	array('label'=>'List MonthlyReports', 'url'=>array('index')),
	array('label'=>'Create MonthlyReports', 'url'=>array('create')),
	array('label'=>'Update MonthlyReports', 'url'=>array('update', 'id'=>$model->report_id)),
	array('label'=>'Delete MonthlyReports', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->report_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MonthlyReports', 'url'=>array('admin')),
);
?>

<h1>View MonthlyReports #<?php echo $model->report_id; ?></h1>

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
