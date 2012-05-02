<?php
$this->breadcrumbs=array(
	'Agg Day Parts',
);

$this->menu=array(
	array('label'=>'Create AggDayPart', 'url'=>array('create')),
	array('label'=>'Manage AggDayPart', 'url'=>array('admin')),
);
?>

<h1>Agg Day Parts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
