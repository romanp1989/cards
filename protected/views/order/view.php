<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Create Order', 'url'=>array('create')),
	array('label'=>'Update Order', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Order', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Order', 'url'=>array('admin')),
	array('label'=>'Add Order Line', 'url'=>array('orderLine/create', 'order_id'=>$model->id)),
);
?>

<h1>View Order #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'order_number',
		// 'card_id',
		array(
			'name'=>'card_id',
			'value'=>$model->card->fullNumber,
			),
		'total',
	),
)); ?>

<?php

$dataProvider = new CActiveDataProvider('OrderLine', array('data'=>$model->lines));

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'orderLine-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		// 'id',
		'name',
		'price',
		array(
			'class'=>'CButtonColumn',
			'viewButtonUrl'=>'Yii::app()->createUrl("/orderLine/view", array("id"=>$data["id"]))',
			'updateButtonUrl'=>'Yii::app()->createUrl("/orderLine/update", array("id"=>$data["id"]))',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/orderLine/delete", array("id"=>$data["id"]))'
			)
		)
	));
?>
