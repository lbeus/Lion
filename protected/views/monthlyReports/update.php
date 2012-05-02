<?php
$this->breadcrumbs=array(
	'Monthly Reports'=>array('index'),
	$model->report_id=>array('view','id'=>$model->report_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MonthlyReports', 'url'=>array('index')),
	array('label'=>'Create MonthlyReports', 'url'=>array('create')),
	array('label'=>'View MonthlyReports', 'url'=>array('view', 'id'=>$model->report_id)),
	array('label'=>'Manage MonthlyReports', 'url'=>array('admin')),
);
?>

<h1>Update MonthlyReports <?php echo $model->report_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>