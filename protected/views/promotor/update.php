<?php
/* @var $this PromotorController */
/* @var $model Promotor */

$this->breadcrumbs=array(
	'Promotors'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Promotor', 'url'=>array('index')),
	array('label'=>'Create Promotor', 'url'=>array('create')),
	array('label'=>'View Promotor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Promotor', 'url'=>array('admin')),
);
?>

<h1>Update Promotor <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>