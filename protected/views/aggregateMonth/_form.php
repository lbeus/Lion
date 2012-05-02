<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'aggregate-month-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'gsn_id'); ?>
		<?php echo $form->textField($model,'gsn_id'); ?>
		<?php echo $form->error($model,'gsn_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sensor_id'); ?>
		<?php echo $form->textField($model,'sensor_id'); ?>
		<?php echo $form->error($model,'sensor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unit_id'); ?>
		<?php echo $form->textField($model,'unit_id'); ?>
		<?php echo $form->error($model,'unit_id'); ?>
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
		<?php echo $form->labelEx($model,'day_part_id'); ?>
		<?php echo $form->textField($model,'day_part_id'); ?>
		<?php echo $form->error($model,'day_part_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avg_value'); ?>
		<?php echo $form->textField($model,'avg_value'); ?>
		<?php echo $form->error($model,'avg_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avg_max_value'); ?>
		<?php echo $form->textField($model,'avg_max_value'); ?>
		<?php echo $form->error($model,'avg_max_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avg_min_value'); ?>
		<?php echo $form->textField($model,'avg_min_value'); ?>
		<?php echo $form->error($model,'avg_min_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avg_amplitude'); ?>
		<?php echo $form->textField($model,'avg_amplitude'); ?>
		<?php echo $form->error($model,'avg_amplitude'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->