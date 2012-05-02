<?php
$this->breadcrumbs=array(
	'Agg Days',
);

$this->menu=array(
	array('label'=>'Create AggDay', 'url'=>array('create')),
	array('label'=>'Manage AggDay', 'url'=>array('admin')),
);
?>

<h1>Agg Days</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
