<?php
$this->breadcrumbs=array(
	'Aggregate Months',
);

$this->menu=array(
	array('label'=>'Create AggregateMonth', 'url'=>array('create')),
	array('label'=>'Manage AggregateMonth', 'url'=>array('admin')),
);
?>

<h1>Aggregate Months</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
