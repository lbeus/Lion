<?php
$this->breadcrumbs=array(
	'Di Gsns',
);

$this->menu=array(
	array('label'=>'Create DiGsn', 'url'=>array('create')),
	array('label'=>'Manage DiGsn', 'url'=>array('admin')),
);
?>

<h1>Di Gsns</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
