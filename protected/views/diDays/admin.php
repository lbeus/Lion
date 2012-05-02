<?php
$this->breadcrumbs=array(
	'Di Days'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DiDays', 'url'=>array('index')),
	array('label'=>'Create DiDays', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('di-days-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Di Days</h1>

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
	'id'=>'di-days-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'date_id',
		'date',
		'date_type',
		'year',
		'month',
		'day',
		/*
		'quartal',
		'year_month',
		'day_of_the_year',
		'week_of_the_year',
		'day_of_the_week',
		'name_day',
		'name_day_short',
		'name_month',
		'name_month_short',
		'days_in_month',
		'season',
		'is_leap_year',
		'is_weekend',
		'is_work_day',
		'is_last_day_of_month',
		'is_dummy',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
