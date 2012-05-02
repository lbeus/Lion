<?php
$this->breadcrumbs=array(
	'Prod Email Notifications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProdEmailNotifications', 'url'=>array('index')),
	array('label'=>'Manage ProdEmailNotifications', 'url'=>array('admin')),
);
?>

<h1>Create ProdEmailNotifications</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>