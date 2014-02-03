<?php
$this->breadcrumbs=array(
	'Eventos'=>array('index'),
	$model->eveId,
);

$this->menu=array(
	array('label'=>'Listar Eventos','url'=>array('index')),
	array('label'=>'Crear Evento','url'=>array('create')),
	array('label'=>'Actuslizar Evento','url'=>array('update','id'=>$model->eveId)),
	array('label'=>'Eliminar Evento','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->eveId),'confirm'=>'Esta realmente seguro que desea eliminar este evento?')),
	array('label'=>'Administrar Eventos','url'=>array('admin')),
);
?>

<h1>Vista Eventos <?php echo $model->eveNombre; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'eveId',
		'eveNombre',
		'eveDescripcion',
		'eveLugar',
		'eveDireccion',
		'eveMunicipio0.depCodigo.dep_nombre',
		'eveMunicipio0.mun_nombre',
		'eveNumParticipantes',
		'eveFechaInicio',
		'eveFechaFin',
		'eveHoraInicio',
		'eveHoraFin',
		'eveExpositor',
		'eveUsuario',
		'eveFase0.fasTipo',
	),
)); ?>

<?php
	echo CHtml::link(CHtml::Button('Asistir a Evento', array('class'=>'btn btn-success btn-large')), array('UsuEventos/Ingresar', 'idE'=>$model->eveId, 'idU'=>$model->eveUsuario));

 ?>
