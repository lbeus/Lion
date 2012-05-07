<div class="roundedBox" id="type1">

	<b><?php echo CHtml::encode($data->getAttributeLabel('sensor_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->sensor_id), array('view', 'id'=>$data->sensor_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sensor_name')); ?>:</b>
	<?php echo CHtml::encode($data->sensor_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sensor_user_name')); ?>:</b>
	<?php echo CHtml::encode($data->sensor_user_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gsn_id')); ?>:</b>
	<?php echo CHtml::encode($data->gsn_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sensor_type')); ?>:</b>
	<?php echo CHtml::encode($data->sensor_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_x')); ?>:</b>
	<?php echo CHtml::encode($data->location_x); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_y')); ?>:</b>
	<?php echo CHtml::encode($data->location_y); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_activated_id')); ?>:</b>
	<?php echo CHtml::encode($data->date_activated_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_deactivated_id')); ?>:</b>
	<?php echo CHtml::encode($data->date_deactivated_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_dummy')); ?>:</b>
	<?php echo CHtml::encode($data->is_dummy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_real_sensor')); ?>:</b>
	<?php echo CHtml::encode($data->is_real_sensor); ?>
	<br />

	*/ ?>

    <div class="corner topLeft"></div><div class="corner topRight"></div><div class="corner bottomLeft"></div><div class="corner bottomRight"></div>
</div>