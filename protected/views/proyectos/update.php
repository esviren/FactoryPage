<?php
$this->breadcrumbs=array(
	'Proyectoses'=>array('index'),
	$model->proId=>array('view','id'=>$model->proId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Proyectos','url'=>array('index')),
	array('label'=>'Create Proyectos','url'=>array('create')),
	array('label'=>'View Proyectos','url'=>array('view','id'=>$model->proId)),
	array('label'=>'Manage Proyectos','url'=>array('admin')),
);
?>

<h1>Update Proyectos <?php echo $model->proId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>