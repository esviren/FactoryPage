<?php
$this->breadcrumbs=array(
	'Aspirantes'=>array('index'),
	$model->aspId=>array('view','id'=>$model->aspId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Aspirante','url'=>array('index')),
	array('label'=>'Create Aspirante','url'=>array('create')),
	array('label'=>'View Aspirante','url'=>array('view','id'=>$model->aspId)),
	array('label'=>'Manage Aspirante','url'=>array('admin')),
);
?>

<h1>Update Aspirante <?php echo $model->aspId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>