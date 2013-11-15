<?php
$this->breadcrumbs=array(
	'Proyectoses'=>array('index'),
	$model->proId,
);

$this->menu=array(
	array('label'=>'List Proyectos','url'=>array('index')),
	array('label'=>'Create Proyectos','url'=>array('create')),
	array('label'=>'Update Proyectos','url'=>array('update','id'=>$model->proId)),
	array('label'=>'Delete Proyectos','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->proId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Proyectos','url'=>array('admin')),
);
?>

<h1>View Proyectos #<?php echo $model->proId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'proId',
		'proNombre',
		'proDescripcion',
		'proFechaPostulacion',
		'proFechaInicio',
		'proFechaFinal',
		'proCantidadUsuarios',
		'proCantidadMaximoUsuarios',
		'proCantidadMinimaUsuarios',
		'proEstado',
		'tblFases_fasId',
	),
)); ?>
