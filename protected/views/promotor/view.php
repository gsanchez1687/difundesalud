<?php
/* @var $this PromotorController */
/* @var $model Promotor */

$this->breadcrumbs=array(
	'Promotors'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Promotor', 'url'=>array('index')),
	array('label'=>'Create Promotor', 'url'=>array('create')),
	array('label'=>'Update Promotor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Promotor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Promotor', 'url'=>array('admin')),
);
?>

<h1>View Promotor #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'promotor_type_id',
		'user_id',
		'address',
		'state_id',
		'municipality_id',
		'parishe_id',
		'name',
		'active',
		'email',
		'code_phone_office',
		'number_phone_office',
		'code_phone_personal',
		'number_phone_personal',
		'date',
		'time',
		'userlast_id',
		'date_last',
		'time_last',
	),
)); ?>
