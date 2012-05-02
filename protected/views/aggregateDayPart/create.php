<?php
$this->breadcrumbs=array(
	'Aggregate Day Parts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AggregateDayPart', 'url'=>array('index')),
	array('label'=>'Manage AggregateDayPart', 'url'=>array('admin')),
);
?>

<h1>Create AggregateDayPart</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>