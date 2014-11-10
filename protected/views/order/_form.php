<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'order_number'); ?>
		<?php echo $form->textField($model,'order_number',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'order_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'card_id'); ?>
		<?php echo $form->dropDownList($model,'card_id',CHtml::listData(Card::model()->findAll(array('condition'=>'expiration_date > NOW()')), 'id', 'fullNumber')); ?>
		<?php echo $form->error($model,'card_id'); ?>
	</div>

	<!-- <div class="row"> -->
		<?php// echo $form->labelEx($model,'total'); ?>
		<?php// echo $form->textField($model,'total'); ?>
		<?php// echo $form->error($model,'total'); ?>
	<!-- </div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->