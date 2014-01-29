<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->rolId=>array('view','id'=>$model->rolId),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Roles','url'=>array('index')),
	array('label'=>'Crear Roles','url'=>array('create')),
	array('label'=>'Detalle Roles','url'=>array('view','id'=>$model->rolId)),
	array('label'=>'Administrar Roles','url'=>array('admin')),
);
?>

<h1>Update Roles <?php echo $model->rolId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>