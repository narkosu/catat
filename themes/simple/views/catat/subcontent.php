<?php
$this->breadcrumbs=array(
	'Catatanku'=>array('catat/lihat'),
    $model->title,
);
$this->pageTitle=$model->title;
?>
<?php 
$baseUrl = Yii::app()->theme->baseUrl;
Yii::app()->clientScript->registerScript('helloscript',"
    
",CClientScript::POS_READY);
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/subcontent.js');

?>
<div class="post">
    <div style="margin-bottom: 10px;border-bottom: 1px solid #eee">
        <div class="title">
        <?php echo CHtml::link(CHtml::encode($model->title), $model->url); ?>
        </div>
        <div class="content" style="padding:5px 0px;">
          <?php
            $this->beginWidget('CMarkdown', array('purifyOutput'=>true));
            echo $model->content;
            $this->endWidget();
          ?>
        </div>
    </div>
  <div id="subcontent">
      <?php if ( !empty($subcontent) ) {
      $number = 1;
      ?>
      <?php foreach ( $subcontent as $content ) { ?>
      <div class="item_subcontent" data-id="row-<?php echo $content->id?>" style="position: relative;">
          <div class="number" style="float:left;width:10px;"><?php echo $number?>.</div>
          <div style="float:left;width:650px;">
                <div style="width:650px;min-height: 21px;" id="contentmd-<?php echo $content->id?>" data-id="<?php echo $content->id?>" class="markdown-content-area">
                    <?php
                      $this->beginWidget('CMarkdown', array('purifyOutput'=>true));
                      echo $content->contents;
                      $this->endWidget();
                    ?>
                </div>
              <div class="editable-content" id="editable-content-<?php echo $content->id?>">
                  <form id="form-<?php echo $content->id?>">
                    <div style="width:650px;" id="content-<?php echo $content->id?>" data-id="<?php echo $content->id?>" class="content-area" contenteditable="true"><?php
                          echo $content->contents;
                        ?></div>
                    <div class="toolbar-content">
                        <Div class="box-button simpancatat" data-post-id="<?php echo $content->post_id?>" data-id="<?php echo $content->id?>" data-url="<?php echo Yii::app()->createUrl('catat/ajaxsave')?>" id="button-catat-<?php echo $content->id?>" style="display:inline-block;float:right;">Catat</div>
                        <div style="clear:both"></div>
                    </div>  
                  </form>
              </div>    
          </div>
          <?php /*
          <div style="position:absolute;right:0px;">
              <span class="button" title="Hapus">X</span>
              <span class="button edit" title="Edit">E</span>
          </div>
           * 
           */?>
          <div style="clear:both"></div>
      </div>
      <?php 
        $number++;
      } ?>
      <?php } ?>
  </div>
<div class="form-subcontent">
    <?php $form=$this->beginWidget('CActiveForm'); ?>
    <div class="text-catatan">
        <?php echo $form->textarea($subModel,'contents',array()); ?>
    </div>
    <div class="row buttons">
        <?php echo CHtml::submitButton($subModel->isNewRecord ? 'Catat' : 'Simpan',array('class'=>'button')); ?>
      </div>
    <?php $this->endWidget(); ?>
</div>
</div>
