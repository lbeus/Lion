<?php
$this->breadcrumbs=array(
	'Prod Sms Notifications',
);

$this->menu=array(
	array('label'=>'Create ProdSmsNotifications', 'url'=>array('create')),
	array('label'=>'Manage ProdSmsNotifications', 'url'=>array('admin')),
);
?>

<h1>Prod Sms Notifications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
