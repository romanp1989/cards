<?php
/* @var $this CardController */
/* @var $model Card */

$this->breadcrumbs=array(
	'Cards'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Card', 'url'=>array('index')),
	array('label'=>'Create Card', 'url'=>array('create')),
	array('label'=>'Generate Cards', 'url'=>array('site/generate')),
	array('label'=>'Create Order', 'url'=>array('order/create')),
	array('label'=>'Manage Orders', 'url'=>array('order/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#card-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cards</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'card-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'series',
		// 'number',
		array(
			'name' => 'number',
			'type' => 'raw',
			'value' => 'CHtml::link(CHtml::encode($data->number), $data->url)'
			),
		'create_date',
		'expiration_date',
		// 'used_date',		
		// 'total',
		// 'status',
		array(
			'name' => 'status',
			'value' => 'Code::item("CardStatus", $data->status)',
			'filter' => Code::items("CardStatus")
			),
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
