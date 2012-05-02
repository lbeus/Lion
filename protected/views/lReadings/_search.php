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
		<?php echo $form->label($model,'date_id'); ?>
		<?php echo $form->textField($model,'date_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_id'); ?>
		<?php echo $form->textField($model,'time_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_of_the_reading'); ?>
		<?php echo $form->textField($model,'time_of_the_reading'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'value'); ?>
		<?php echo $form->textField($model,'value'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->