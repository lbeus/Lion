<?php
$this->breadcrumbs=array(
	'Di Day Parts',
);

$this->menu=array(
	array('label'=>'Create DiDayPart', 'url'=>array('create')),
	array('label'=>'Manage DiDayPart', 'url'=>array('admin')),
);
?>

<h1>Di Day Parts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
