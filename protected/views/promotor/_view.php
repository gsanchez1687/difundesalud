<?php
/* @var $this PromotorController */
/* @var $data Promotor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promotor_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->promotor_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state_id')); ?>:</b>
	<?php echo CHtml::encode($data->state_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('municipality_id')); ?>:</b>
	<?php echo CHtml::encode($data->municipality_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parishe_id')); ?>:</b>
	<?php echo CHtml::encode($data->parishe_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code_phone_office')); ?>:</b>
	<?php echo CHtml::encode($data->code_phone_office); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number_phone_office')); ?>:</b>
	<?php echo CHtml::encode($data->number_phone_office); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code_phone_personal')); ?>:</b>
	<?php echo CHtml::encode($data->code_phone_personal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number_phone_personal')); ?>:</b>
	<?php echo CHtml::encode($data->number_phone_personal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userlast_id')); ?>:</b>
	<?php echo CHtml::encode($data->userlast_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_last')); ?>:</b>
	<?php echo CHtml::encode($data->date_last); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_last')); ?>:</b>
	<?php echo CHtml::encode($data->time_last); ?>
	<br />

	*/ ?>

</div>