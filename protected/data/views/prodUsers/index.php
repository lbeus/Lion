<?php
$this->breadcrumbs=array(
	'Prod Users',
);

$this->menu=array(
	array('label'=>'Create ProdUsers', 'url'=>array('create')),
	array('label'=>'Manage ProdUsers', 'url'=>array('admin')),
);
?>

<h1>Prod Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
