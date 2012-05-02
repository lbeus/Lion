<?php
$this->breadcrumbs=array(
	'Di Days',
);

$this->menu=array(
	array('label'=>'Create DiDays', 'url'=>array('create')),
	array('label'=>'Manage DiDays', 'url'=>array('admin')),
);
?>

<h1>Di Days</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
