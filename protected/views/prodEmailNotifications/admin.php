<?php
$this->breadcrumbs=array(
	'Prod Email Notifications'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ProdEmailNotifications', 'url'=>array('index')),
	array('label'=>'Create ProdEmailNotifications', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('prod-email-notifications-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Prod Email Notifications</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'prod-email-notifications-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'notification_id',
		'time_notification_asked',
		'time_notification_approved',
		'is_active',
		'unit_id',
		'sensor_id',
		/*
		'prod_user_id',
		'unit_name',
		'unit_name_upper',
		'sensor_name',
		'xml_name',
		'critical_value',
		'resending_interval',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
