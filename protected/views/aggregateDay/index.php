<?php
$this->breadcrumbs=array(
	'Aggregate Days',
);

$this->menu=array(
	array('label'=>'Create AggregateDay', 'url'=>array('create')),
	array('label'=>'Manage AggregateDay', 'url'=>array('admin')),
);
?>

<h1>Aggregate Days</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
