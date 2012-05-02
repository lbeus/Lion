<?php
$this->breadcrumbs=array(
	'Prod Email Notifications',
);

$this->menu=array(
	array('label'=>'Create ProdEmailNotifications', 'url'=>array('create')),
	array('label'=>'Manage ProdEmailNotifications', 'url'=>array('admin')),
);
?>

<h1>Prod Email Notifications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
