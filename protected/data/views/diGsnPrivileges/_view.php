<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('gsn_privilege_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->gsn_privilege_id), array('view', 'id'=>$data->gsn_privilege_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_id_given')); ?>:</b>
	<?php echo CHtml::encode($data->date_id_given); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gsn_id')); ?>:</b>
	<?php echo CHtml::encode($data->gsn_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_privilege_given')); ?>:</b>
	<?php echo CHtml::encode($data->time_privilege_given); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active); ?>
	<br />


</div>