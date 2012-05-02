<?php
$this->breadcrumbs=array(
	'Lreadings',
);

$this->menu=array(
	array('label'=>'Create LReadings', 'url'=>array('create')),
	array('label'=>'Manage LReadings', 'url'=>array('admin')),
);
?>

<h1>Lreadings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
