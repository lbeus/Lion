<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('watchdog_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->watchdog_id), array('view', 'id'=>$data->watchdog_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_watchdog_asked')); ?>:</b>
	<?php echo CHtml::encode($data->time_watchdog_asked); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_watchdog_approved')); ?>:</b>
	<?php echo CHtml::encode($data->time_watchdog_approved); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sensor_id')); ?>:</b>
	<?php echo CHtml::encode($data->sensor_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sensor_name')); ?>:</b>
	<?php echo CHtml::encode($data->sensor_name); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('xml_name')); ?>:</b>
	<?php echo CHtml::encode($data->xml_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('critical_period')); ?>:</b>
	<?php echo CHtml::encode($data->critical_period); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period_script')); ?>:</b>
	<?php echo CHtml::encode($data->period_script); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('minimal_delay_between_emails')); ?>:</b>
	<?php echo CHtml::encode($data->minimal_delay_between_emails); ?>
	<br />

	*/ ?>

</div>