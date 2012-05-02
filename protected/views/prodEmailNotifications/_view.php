<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('notification_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->notification_id), array('view', 'id'=>$data->notification_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_notification_asked')); ?>:</b>
	<?php echo CHtml::encode($data->time_notification_asked); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_notification_approved')); ?>:</b>
	<?php echo CHtml::encode($data->time_notification_approved); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_id')); ?>:</b>
	<?php echo CHtml::encode($data->unit_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sensor_id')); ?>:</b>
	<?php echo CHtml::encode($data->sensor_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prod_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->prod_user_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_name')); ?>:</b>
	<?php echo CHtml::encode($data->unit_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_name_upper')); ?>:</b>
	<?php echo CHtml::encode($data->unit_name_upper); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sensor_name')); ?>:</b>
	<?php echo CHtml::encode($data->sensor_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('xml_name')); ?>:</b>
	<?php echo CHtml::encode($data->xml_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('critical_value')); ?>:</b>
	<?php echo CHtml::encode($data->critical_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resending_interval')); ?>:</b>
	<?php echo CHtml::encode($data->resending_interval); ?>
	<br />

	*/ ?>

</div>