<?php
$this->breadcrumbs=array(
	'Daily Reports'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DailyReports', 'url'=>array('index')),
	array('label'=>'Manage DailyReports', 'url'=>array('admin')),
);
?>

<h1>Create DailyReports</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>