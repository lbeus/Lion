<?php
$this->breadcrumbs=array(
	'Aggregate Day Parts',
);

$this->menu=array(
	array('label'=>'Create AggregateDayPart', 'url'=>array('create')),
	array('label'=>'Manage AggregateDayPart', 'url'=>array('admin')),
);
?>

<h1>Aggregate Day Parts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
