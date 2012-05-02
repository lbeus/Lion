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

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('month')); ?>:</b>
	<?php echo CHtml::encode($data->month); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('day_part_id')); ?>:</b>
	<?php echo CHtml::encode($data->day_part_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('avg_value')); ?>:</b>
	<?php echo CHtml::encode($data->avg_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avg_max_value')); ?>:</b>
	<?php echo CHtml::encode($data->avg_max_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avg_min_value')); ?>:</b>
	<?php echo CHtml::encode($data->avg_min_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avg_amplitude')); ?>:</b>
	<?php echo CHtml::encode($data->avg_amplitude); ?>
	<br />

	*/ ?>

</div>