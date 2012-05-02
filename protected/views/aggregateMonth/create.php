<?php
$this->breadcrumbs=array(
	'Aggregate Months'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AggregateMonth', 'url'=>array('index')),
	array('label'=>'Manage AggregateMonth', 'url'=>array('admin')),
);
?>

<h1>Create AggregateMonth</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>