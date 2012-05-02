<?php
$this->breadcrumbs=array(
	'Monthly Reports'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MonthlyReports', 'url'=>array('index')),
	array('label'=>'Manage MonthlyReports', 'url'=>array('admin')),
);
?>

<h1>Create MonthlyReports</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>