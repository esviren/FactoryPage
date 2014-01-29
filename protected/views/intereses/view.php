<?php
$this->breadcrumbs=array(
	'Intereses'=>array('index'),
	$model->intId,
);

$this->menu=array(
	array('label'=>'Listar Intereses','url'=>array('index')),
	array('label'=>'Crear Intereses','url'=>array('create')),
	array('label'=>'Actualizar Intereses','url'=>array('update','id'=>$model->intId)),
	array('label'=>'Borrar Interes','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->intId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Intereses','url'=>array('admin')),
);
?>

<h1>View Intereses #<?php echo $model->intId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'intId',
		'intNombre',
	),
)); ?>
