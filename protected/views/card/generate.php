<?php

$this->breadcrumbs=array(
	'Cards'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Card', 'url'=>array('index')),
	array('label'=>'Create Card', 'url'=>array('create')),
	array('label'=>'Manage Card', 'url'=>array('admin'))
	);
?>

<h1>Generate Cards</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'generate-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<label>Count cards</label>
		<input id="countID" name="count"/>
	</div>

	<div class="row">
		<label>Series cards</label>
		<input name="series"/>
	</div>

	<div>
		<label>Expiration Date</label>
		<!-- <input name="expiration_date"/> -->
		<?php
		$this->widget('ext.EJuiDateTimePicker.EJuiDateTimePicker',array(
	        'model'=>$model, //Model object
	        'attribute'=>'expiration_date', //attribute name
	                'mode'=>'datetime', //use "time","date" or "datetime" (default)
	        'options'=>array('dateFormat'=>'yy-mm-dd'), // jquery plugin options
	        'language'=>'en'
	    ));
		?>

	</div>
	<label><?php echo $test; ?></label>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Generate'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>

