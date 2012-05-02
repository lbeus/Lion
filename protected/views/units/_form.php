<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'units-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'unit_name'); ?>
		<?php echo $form->textField($model,'unit_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'unit_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unit_mark'); ?>
		<?php echo $form->textField($model,'unit_mark',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'unit_mark'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->