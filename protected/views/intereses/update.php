<?php
$this->breadcrumbs=array(
	'Intereses'=>array('index'),
	$model->intId=>array('view','id'=>$model->intId),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Intereses','url'=>array('index')),
	array('label'=>'Crear Intereses','url'=>array('create')),
	array('label'=>'Detalle Intereses','url'=>array('view','id'=>$model->intId)),
	array('label'=>'Administrar Intereses','url'=>array('admin')),
);
?>

<h1>Update Intereses <?php echo $model->intId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>