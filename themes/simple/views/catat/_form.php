<div class="form">

<?php $form=$this->beginWidget('CActiveForm',array('action'=>Yii::app()->createUrl('catat'))); ?>
<?php echo CHtml::errorSummary($model); ?>

	<div class="row text-catatan">
		<?php echo $form->textarea($model,'title',array()); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',Lookup::items('PostStatus')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Catat' : 'Simpan'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->