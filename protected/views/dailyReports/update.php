<?php
$this->breadcrumbs=array(
	'Daily Reports'=>array('index'),
	$model->report_id=>array('view','id'=>$model->report_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DailyReports', 'url'=>array('index')),
	array('label'=>'Create DailyReports', 'url'=>array('create')),
	array('label'=>'View DailyReports', 'url'=>array('view', 'id'=>$model->report_id)),
	array('label'=>'Manage DailyReports', 'url'=>array('admin')),
);
?>

<h1>Update DailyReports <?php echo $model->report_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>