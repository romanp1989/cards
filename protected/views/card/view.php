<?php
/* @var $this CardController */
/* @var $model Card */

$this->breadcrumbs=array(
	'Cards'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Card', 'url'=>array('index')),
	array('label'=>'Create Card', 'url'=>array('create')),
	array('label'=>'Update Card', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Card', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Activate Card', 'url'=>array('activate', 'id'=>$model->id)),
	array('label'=>'Manage Card', 'url'=>array('admin')),
);
?>

<h1>View Card #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'series',
		'number',
		'create_date',
		'expiration_date',
		'used_date',
		'total',
		// 'status',
		array(
			'name'=>'status',
			'value'=>Code::item("CardStatus", $model->status),
			'filter'=>Code::items('CardStatus')
			)
	),
)); ?>

<?php

$dataProvider = new CActiveDataProvider('Order', array('data'=>$model->order));

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>$dataProvider,
	// 'filter'=>$model,
	'columns'=>array(
		// 'id',
		'order_number',
		'total',
		array(
			'class'=>'CButtonColumn',
			'viewButtonUrl'=>'Yii::app()->createUrl("/order/view", array("id"=>$data["id"]))',
			'updateButtonUrl'=>'Yii::app()->createUrl("order/update", array("id"=>$data["id"]))',
			'deleteButtonUrl'=>'Yii::app()->createUrl("order/delete", array("id"=>$data["id"]))'
		),
	),
)); ?>
