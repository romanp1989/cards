<?php
/* @var $this CardController */
/* @var $model Card */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!-- <div class="row"> -->
		<?php// echo $form->label($model,'id'); ?>
		<?php// echo $form->textField($model,'id'); ?>
	<!-- </div> -->

	<div class="row">
		<?php echo $form->label($model,'series'); ?>
		<?php echo $form->textField($model,'series',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'number'); ?>
		<?php echo $form->textField($model,'number',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expiration_date'); ?>
		<?php echo $form->textField($model,'expiration_date'); ?>
	</div>

	<!-- <div class="row"> -->
		<?php// echo $form->label($model,'used_date'); ?>
		<?php// echo $form->textField($model,'used_date'); ?>
	<!-- </div> -->

	<!-- <div class="row"> -->
		<?php// echo $form->label($model,'total'); ?>
		<?php// echo $form->textField($model,'total'); ?>
	<!-- </div> -->

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->