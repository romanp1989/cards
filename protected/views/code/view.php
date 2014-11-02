<?php
/* @var $this CodeController */
/* @var $model Code */

$this->breadcrumbs=array(
	'Codes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Code', 'url'=>array('index')),
	array('label'=>'Create Code', 'url'=>array('create')),
	array('label'=>'Update Code', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Code', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Code', 'url'=>array('admin')),
);
?>

<h1>View Code #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'name',
		'code',
	),
)); ?>
