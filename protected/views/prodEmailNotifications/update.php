<?php
$this->breadcrumbs=array(
	'Prod Email Notifications'=>array('index'),
	$model->notification_id=>array('view','id'=>$model->notification_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProdEmailNotifications', 'url'=>array('index')),
	array('label'=>'Create ProdEmailNotifications', 'url'=>array('create')),
	array('label'=>'View ProdEmailNotifications', 'url'=>array('view', 'id'=>$model->notification_id)),
	array('label'=>'Manage ProdEmailNotifications', 'url'=>array('admin')),
);
?>

<h1>Update ProdEmailNotifications <?php echo $model->notification_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>