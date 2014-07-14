<div class="row-list">

  <?php if (!empty($listmodel) ) { ?>
    <?php foreach ($listmodel as $row) { ?>
      <div class="row" style="position:relative;">
          <A href="<?php echo Yii::app()->createUrl('catat/content').'?id='.$row->id?>"><?php echo $row->title; ?></a>
          <div class='fiture-right' style="position:absolute;right:0px;bottom:0px;font-size:11px;font-family: arial;"><i>Diedit <?php echo (date('d M Y h:i:s',$row->update_time))?></i></div>
      </div>
    <?php } ?>  
  <?php } ?>
	
</div><!-- form -->