<?php
$this->breadcrumbs=array(
	'Prod Sms Notifications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProdSmsNotifications', 'url'=>array('index')),
	array('label'=>'Manage ProdSmsNotifications', 'url'=>array('admin')),
);
?>

<h1>Create ProdSmsNotifications</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>