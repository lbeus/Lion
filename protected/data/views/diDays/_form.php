<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'di-days-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date_id'); ?>
		<?php echo $form->textField($model,'date_id'); ?>
		<?php echo $form->error($model,'date_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_type'); ?>
		<?php echo $form->textField($model,'date_type',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'date_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year'); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'month'); ?>
		<?php echo $form->textField($model,'month'); ?>
		<?php echo $form->error($model,'month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'day'); ?>
		<?php echo $form->textField($model,'day'); ?>
		<?php echo $form->error($model,'day'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quartal'); ?>
		<?php echo $form->textField($model,'quartal'); ?>
		<?php echo $form->error($model,'quartal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year_month'); ?>
		<?php echo $form->textField($model,'year_month'); ?>
		<?php echo $form->error($model,'year_month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'day_of_the_year'); ?>
		<?php echo $form->textField($model,'day_of_the_year'); ?>
		<?php echo $form->error($model,'day_of_the_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'week_of_the_year'); ?>
		<?php echo $form->textField($model,'week_of_the_year'); ?>
		<?php echo $form->error($model,'week_of_the_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'day_of_the_week'); ?>
		<?php echo $form->textField($model,'day_of_the_week'); ?>
		<?php echo $form->error($model,'day_of_the_week'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_day'); ?>
		<?php echo $form->textArea($model,'name_day',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'name_day'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_day_short'); ?>
		<?php echo $form->textArea($model,'name_day_short',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'name_day_short'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_month'); ?>
		<?php echo $form->textArea($model,'name_month',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'name_month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_month_short'); ?>
		<?php echo $form->textArea($model,'name_month_short',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'name_month_short'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'days_in_month'); ?>
		<?php echo $form->textField($model,'days_in_month'); ?>
		<?php echo $form->error($model,'days_in_month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'season'); ?>
		<?php echo $form->textArea($model,'season',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'season'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_leap_year'); ?>
		<?php echo $form->textField($model,'is_leap_year',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'is_leap_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_weekend'); ?>
		<?php echo $form->textField($model,'is_weekend',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'is_weekend'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_work_day'); ?>
		<?php echo $form->textField($model,'is_work_day',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'is_work_day'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_last_day_of_month'); ?>
		<?php echo $form->textField($model,'is_last_day_of_month',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'is_last_day_of_month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_dummy'); ?>
		<?php echo $form->textField($model,'is_dummy',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'is_dummy'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->