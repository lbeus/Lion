<?php
$this->breadcrumbs=array(
	'Agg Month Day Parts',
);

$this->menu=array(
	array('label'=>'Create AggMonthDayPart', 'url'=>array('create')),
	array('label'=>'Manage AggMonthDayPart', 'url'=>array('admin')),
);
?>

<h1>Agg Month Day Parts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
