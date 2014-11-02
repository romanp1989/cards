<?php
/* @var $this CodeController */
/* @var $model Code */

$this->breadcrumbs=array(
	'Codes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Code', 'url'=>array('index')),
	array('label'=>'Manage Code', 'url'=>array('admin')),
);
?>

<h1>Create Code</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>