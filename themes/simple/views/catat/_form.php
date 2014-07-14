<div class="form">

<?php $form=$this->beginWidget('CActiveForm',array('action'=>Yii::app()->createUrl('catat'))); ?>
<?php echo CHtml::errorSummary($model); ?>

  <div class="row text-catatan">
		<?php echo $form->textField($model,'title',array('class'=>'flat-standard title','placeholder'=>'Catat Apa ?')); ?>
	</div>  
	<div class="row">
		<?php echo $form->textarea($model,'content',array('class'=>'flat-standard resizable','placeholder'=>'Tentang Apa ?')); ?>
	</div>

	<div class="row buttons" style="text-align: right;margin:10px 0px;">
		 <div style="display: inline-block;">
        <?php echo $form->dropDownList($model,'status',Lookup::items('PostStatus'),array('class'=>'form-control')); ?>
    </div>
      <div style="display: inline-block;">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Catat' : 'Simpan', array('class'=>'btn btn-default btn-info')); ?>
    </div>
	</div>
    
<?php $this->endWidget(); ?>

</div><!-- form -->