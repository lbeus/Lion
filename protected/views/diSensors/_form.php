<div class="roundedBox" id="type1">
    <div class="form">

	<?php
	$form = $this->beginWidget('CActiveForm', array(
		    'id' => 'di-sensors-form',
		    'enableAjaxValidation' => false,
		));
	?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	    <?php echo $form->labelEx($model, 'sensor_name'); ?>
	    <?php echo $form->textField($model, 'sensor_name', array('size' => 30, 'maxlength' => 30)); ?>
	    <?php echo $form->error($model, 'sensor_name'); ?>
	</div>

	<div class="row">
	    <?php echo $form->labelEx($model, 'sensor_user_name'); ?>
	    <?php echo $form->textField($model, 'sensor_user_name', array('size' => 30, 'maxlength' => 30)); ?>
	    <?php echo $form->error($model, 'sensor_user_name'); ?>
	</div>

	<div class="row">
	    <?php echo $form->labelEx($model, 'gsn_id'); ?>
	    <?php echo $form->textField($model, 'gsn_id'); ?>
	    <?php echo $form->error($model, 'gsn_id'); ?>
	</div>

	<div class="row">
	    <?php echo $form->labelEx($model, 'sensor_type'); ?>
	    <?php echo $form->textField($model, 'sensor_type', array('size' => 20, 'maxlength' => 20)); ?>
	    <?php echo $form->error($model, 'sensor_type'); ?>
	</div>

	<div class="row">
	    <?php echo $form->labelEx($model, 'location_x'); ?>
	    <?php echo $form->textField($model, 'location_x'); ?>
	    <?php echo $form->error($model, 'location_x'); ?>
	</div>

	<div class="row">
	    <?php echo $form->labelEx($model, 'location_y'); ?>
	    <?php echo $form->textField($model, 'location_y'); ?>
	    <?php echo $form->error($model, 'location_y'); ?>
	</div>

	<div class="row">
	    <?php echo $form->labelEx($model, 'date_activated_id'); ?>
	    <?php echo $form->textField($model, 'date_activated_id'); ?>
	    <?php echo $form->error($model, 'date_activated_id'); ?>
	</div>

	<div class="row">
	    <?php echo $form->labelEx($model, 'date_deactivated_id'); ?>
	    <?php echo $form->textField($model, 'date_deactivated_id'); ?>
	    <?php echo $form->error($model, 'date_deactivated_id'); ?>
	</div>

	<div class="row">
	    <?php echo $form->labelEx($model, 'is_active'); ?>
	    <?php echo $form->textField($model, 'is_active', array('size' => 1, 'maxlength' => 1)); ?>
	    <?php echo $form->error($model, 'is_active'); ?>
	</div>

	<div class="row">
	    <?php echo $form->labelEx($model, 'is_dummy'); ?>
	    <?php echo $form->textField($model, 'is_dummy', array('size' => 1, 'maxlength' => 1)); ?>
	    <?php echo $form->error($model, 'is_dummy'); ?>
	</div>

	<div class="row">
	    <?php echo $form->labelEx($model, 'is_real_sensor'); ?>
	    <?php echo $form->textField($model, 'is_real_sensor', array('size' => 1, 'maxlength' => 1)); ?>
	    <?php echo $form->error($model, 'is_real_sensor'); ?>
	</div>

	<div class="row buttons">
	    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

    </div><!-- form -->
    <div class="corner topLeft"></div><div class="corner topRight"></div><div class="corner bottomLeft"></div><div class="corner bottomRight"></div>
</div>