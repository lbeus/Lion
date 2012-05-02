<?php
$this->breadcrumbs=array(
	'Prod Sms Notifications'=>array('index'),
	$model->notification_id=>array('view','id'=>$model->notification_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProdSmsNotifications', 'url'=>array('index')),
	array('label'=>'Create ProdSmsNotifications', 'url'=>array('create')),
	array('label'=>'View ProdSmsNotifications', 'url'=>array('view', 'id'=>$model->notification_id)),
	array('label'=>'Manage ProdSmsNotifications', 'url'=>array('admin')),
);
?>

<h1>Update ProdSmsNotifications <?php echo $model->notification_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>