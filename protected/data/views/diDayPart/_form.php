<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'di-day-part-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'day_part_id'); ?>
		<?php echo $form->textField($model,'day_part_id'); ?>
		<?php echo $form->error($model,'day_part_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'day_part_name'); ?>
		<?php echo $form->textField($model,'day_part_name',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'day_part_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_time'); ?>
		<?php echo $form->textField($model,'start_time'); ?>
		<?php echo $form->error($model,'start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'finish_time'); ?>
		<?php echo $form->textField($model,'finish_time'); ?>
		<?php echo $form->error($model,'finish_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->