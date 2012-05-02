<?php
$this->breadcrumbs=array(
	'Daily Reports',
);

$this->menu=array(
	array('label'=>'Create DailyReports', 'url'=>array('create')),
	array('label'=>'Manage DailyReports', 'url'=>array('admin')),
);
?>

<h1>Daily Reports</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
