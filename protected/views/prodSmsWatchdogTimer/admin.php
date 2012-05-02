<?php
$this->breadcrumbs=array(
	'Prod Sms Watchdog Timers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ProdSmsWatchdogTimer', 'url'=>array('index')),
	array('label'=>'Create ProdSmsWatchdogTimer', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('prod-sms-watchdog-timer-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Prod Sms Watchdog Timers</h1>

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
	'id'=>'prod-sms-watchdog-timer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'watchdog_id',
		'time_watchdog_asked',
		'time_watchdog_approved',
		'is_active',
		'sensor_id',
		'user_id',
		/*
		'sensor_name',
		'phone',
		'xml_name',
		'critical_period',
		'period_script',
		'minimal_delay_between_emails',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
