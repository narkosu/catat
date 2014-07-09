<div class="row-list">

  <?php if (!empty($listmodel) ) { ?>
    <?php foreach ($listmodel as $row) { ?>
      <div class="row">
          <A href="<?php echo Yii::app()->createUrl('catat/content').'?id='.$row->id?>"><?php echo $row->title; ?></a>
      </div>
    <?php } ?>  
  <?php } ?>
	
</div><!-- form -->