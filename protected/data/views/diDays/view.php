<?php
$this->breadcrumbs=array(
	'Di Days'=>array('index'),
	$model->date_id,
);

$this->menu=array(
	array('label'=>'List DiDays', 'url'=>array('index')),
	array('label'=>'Create DiDays', 'url'=>array('create')),
	array('label'=>'Update DiDays', 'url'=>array('update', 'id'=>$model->date_id)),
	array('label'=>'Delete DiDays', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->date_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DiDays', 'url'=>array('admin')),
);
?>

<h1>View DiDays #<?php echo $model->date_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'date_id',
		'date',
		'date_type',
		'year',
		'month',
		'day',
		'quartal',
		'year_month',
		'day_of_the_year',
		'week_of_the_year',
		'day_of_the_week',
		'name_day',
		'name_day_short',
		'name_month',
		'name_month_short',
		'days_in_month',
		'season',
		'is_leap_year',
		'is_weekend',
		'is_work_day',
		'is_last_day_of_month',
		'is_dummy',
	),
)); ?>
