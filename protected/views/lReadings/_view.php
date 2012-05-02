<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('reading_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->reading_id), array('view', 'id'=>$data->reading_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gsn_id')); ?>:</b>
	<?php echo CHtml::encode($data->gsn_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sensor_id')); ?>:</b>
	<?php echo CHtml::encode($data->sensor_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_id')); ?>:</b>
	<?php echo CHtml::encode($data->unit_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_id')); ?>:</b>
	<?php echo CHtml::encode($data->date_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_id')); ?>:</b>
	<?php echo CHtml::encode($data->time_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_of_the_reading')); ?>:</b>
	<?php echo CHtml::encode($data->time_of_the_reading); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />

	*/ ?>

</div>