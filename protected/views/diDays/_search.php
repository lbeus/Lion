<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'date_id'); ?>
		<?php echo $form->textField($model,'date_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_type'); ?>
		<?php echo $form->textField($model,'date_type',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'year'); ?>
		<?php echo $form->textField($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'month'); ?>
		<?php echo $form->textField($model,'month'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'day'); ?>
		<?php echo $form->textField($model,'day'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'quartal'); ?>
		<?php echo $form->textField($model,'quartal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'year_month'); ?>
		<?php echo $form->textField($model,'year_month'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'day_of_the_year'); ?>
		<?php echo $form->textField($model,'day_of_the_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'week_of_the_year'); ?>
		<?php echo $form->textField($model,'week_of_the_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'day_of_the_week'); ?>
		<?php echo $form->textField($model,'day_of_the_week'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name_day'); ?>
		<?php echo $form->textArea($model,'name_day',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name_day_short'); ?>
		<?php echo $form->textArea($model,'name_day_short',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name_month'); ?>
		<?php echo $form->textArea($model,'name_month',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name_month_short'); ?>
		<?php echo $form->textArea($model,'name_month_short',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'days_in_month'); ?>
		<?php echo $form->textField($model,'days_in_month'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'season'); ?>
		<?php echo $form->textArea($model,'season',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_leap_year'); ?>
		<?php echo $form->textField($model,'is_leap_year',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_weekend'); ?>
		<?php echo $form->textField($model,'is_weekend',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_work_day'); ?>
		<?php echo $form->textField($model,'is_work_day',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_last_day_of_month'); ?>
		<?php echo $form->textField($model,'is_last_day_of_month',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_dummy'); ?>
		<?php echo $form->textField($model,'is_dummy',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->