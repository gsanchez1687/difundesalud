<?php
/* @var $this PromotorController */
/* @var $model Promotor */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'promotor_type_id'); ?>
		<?php echo $form->textField($model,'promotor_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'state_id'); ?>
		<?php echo $form->textField($model,'state_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'municipality_id'); ?>
		<?php echo $form->textField($model,'municipality_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parishe_id'); ?>
		<?php echo $form->textField($model,'parishe_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textArea($model,'name',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textArea($model,'email',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'code_phone_office'); ?>
		<?php echo $form->textField($model,'code_phone_office',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'number_phone_office'); ?>
		<?php echo $form->textField($model,'number_phone_office',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'code_phone_personal'); ?>
		<?php echo $form->textField($model,'code_phone_personal',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'number_phone_personal'); ?>
		<?php echo $form->textField($model,'number_phone_personal',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'userlast_id'); ?>
		<?php echo $form->textField($model,'userlast_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_last'); ?>
		<?php echo $form->textField($model,'date_last'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_last'); ?>
		<?php echo $form->textField($model,'time_last'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->