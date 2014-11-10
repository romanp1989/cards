<?php
/* @var $this CardController */
/* @var $model Card */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'card-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'series'); ?>
		<?php echo $form->textField($model,'series',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'series'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'number'); ?>
		<?php echo $form->textField($model,'number',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php 
		// $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		// 	'name'=>'create_date',
		// 	'model'=>$model,
		// 	'attribute'=>'create_date',
		// 	// 'mode'=>'datetime',
		// 	'options'=>array(
		// 		'showAnim'=>'fold',
		// 		'dateFormat'=>'yy-mm-dd'
		// 	),
		// 	'htmlOptions'=>array(
		// 		'style'=>'height:20px;'
		// 		),
		// 	// 'language'=>'ru'
		// ));

		$this->widget('ext.EJuiDateTimePicker.EJuiDateTimePicker',array(
	        'model'=>$model, //Model object
	        'attribute'=>'create_date', //attribute name
	                'mode'=>'datetime', //use "time","date" or "datetime" (default)
	        'options'=>array('dateFormat'=>'yy-mm-dd'), // jquery plugin options
	        'language'=>'en'
	    ));

		?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expiration_date'); ?>
		<?php// echo $form->textField($model,'expiration_date'); ?>
		<?php
		$this->widget('ext.EJuiDateTimePicker.EJuiDateTimePicker',array(
	        'model'=>$model, //Model object
	        'attribute'=>'expiration_date', //attribute name
	                'mode'=>'datetime', //use "time","date" or "datetime" (default)
	        'options'=>array('dateFormat'=>'yy-mm-dd'), // jquery plugin options
	        'language'=>'en'
	    ));
		?>
		<?php echo $form->error($model,'expiration_date'); ?>
	</div>

	<!-- <div class="row">
		<?php// echo $form->labelEx($model,'used_date'); ?>
		<?php// echo $form->textField($model,'used_date'); ?>
		<?php// echo $form->error($model,'used_date'); ?>
	</div> -->

	<!-- <div class="row"> -->
		<?php// echo $form->labelEx($model,'total'); ?>
		<?php// echo $form->textField($model,'total'); ?>
		<?php// echo $form->error($model,'total'); ?>
	<!-- </div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status', Code::items('CardStatus')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->