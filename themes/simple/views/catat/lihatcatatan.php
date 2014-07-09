<?php
$this->breadcrumbs=array(
	'Catatanku',
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php echo $this->renderPartial('_lihatcatatan', array('listmodel'=>$lihatmodel)); ?>