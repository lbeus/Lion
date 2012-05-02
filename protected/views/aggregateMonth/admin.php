<?php
$this->breadcrumbs=array(
	'Aggregate Months'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AggregateMonth', 'url'=>array('index')),
	array('label'=>'Create AggregateMonth', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('aggregate-month-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Aggregate Months</h1>

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
	'id'=>'aggregate-month-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'reading_id',
		'gsn_id',
		'sensor_id',
		'unit_id',
		'year',
		'month',
		/*
		'day_part_id',
		'avg_value',
		'avg_max_value',
		'avg_min_value',
		'avg_amplitude',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
