<?php
/* @var $this PromotorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Promotors',
);

$this->menu=array(
	array('label'=>'Create Promotor', 'url'=>array('create')),
	array('label'=>'Manage Promotor', 'url'=>array('admin')),
);
?>

<h1>Promotors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
