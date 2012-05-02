<?php
$this->breadcrumbs=array(
	'Monthly Reports',
);

$this->menu=array(
	array('label'=>'Create MonthlyReports', 'url'=>array('create')),
	array('label'=>'Manage MonthlyReports', 'url'=>array('admin')),
);
?>

<h1>Monthly Reports</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
