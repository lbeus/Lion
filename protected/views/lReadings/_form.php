<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lreadings-form',
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
		<?php echo $form->labelEx($model,'date_id'); ?>
		<?php echo $form->textField($model,'date_id'); ?>
		<?php echo $form->error($model,'date_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_id'); ?>
		<?php echo $form->textField($model,'time_id'); ?>
		<?php echo $form->error($model,'time_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_of_the_reading'); ?>
		<?php echo $form->textField($model,'time_of_the_reading'); ?>
		<?php echo $form->error($model,'time_of_the_reading'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value'); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->