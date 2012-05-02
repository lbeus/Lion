<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'reading_id'); ?>
		<?php echo $form->textField($model,'reading_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gsn_id'); ?>
		<?php echo $form->textField($model,'gsn_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sensor_id'); ?>
		<?php echo $form->textField($model,'sensor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unit_id'); ?>
		<?php echo $form->textField($model,'unit_id'); ?>
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
		<?php echo $form->label($model,'day_part_id'); ?>
		<?php echo $form->textField($model,'day_part_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'avg_value'); ?>
		<?php echo $form->textField($model,'avg_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'avg_max_value'); ?>
		<?php echo $form->textField($model,'avg_max_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'avg_min_value'); ?>
		<?php echo $form->textField($model,'avg_min_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'avg_amplitude'); ?>
		<?php echo $form->textField($model,'avg_amplitude'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->