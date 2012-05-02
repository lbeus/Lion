<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('report_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->report_id), array('view', 'id'=>$data->report_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sensor_id')); ?>:</b>
	<?php echo CHtml::encode($data->sensor_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gsn_id')); ?>:</b>
	<?php echo CHtml::encode($data->gsn_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />


</div>