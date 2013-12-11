<?php
$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	$model->proNombre,
);

$this->menu=array(
	array('label'=>'Listar Proyectos','url'=>array('index')),
	array('label'=>'Crear Proyectos','url'=>array('create')),
	array('label'=>'Actualizar Proyectos','url'=>array('update','id'=>$model->proId)),
	array('label'=>'Eliminar Proyectos','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->proId),'confirm'=>'realmente desea eliminar este proyecto?')),
	array('label'=>'Administrar Proyectos','url'=>array('admin')),
);
?>

<h1>Proyecto <?php echo $model->proNombre; ?></h1>

<div class="hero-unit">
	
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
			'tblFasesFas.fasTipo',
		),
	)); ?>

	<?php
		if ($model->proCantidadUsuarios < $model->proCantidadMaximoUsuarios) {
			echo CHtml::link(CHtml::Button('Postularme a este proyecto', array('class'=>'btn btn-success btn-large')), array('aspirante/create', 'idp'=>$model->proId))."&nbsp;&nbsp;"; } ?>
		
	 
	<?php echo CHtml::link(CHtml::Button('Atras', array('class'=>'btn btn-danger btn-large')), array('Proyectos/index')); ?>
</div>

