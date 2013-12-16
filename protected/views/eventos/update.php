<?php
$this->breadcrumbs=array(
	'Eventos'=>array('index'),
	$model->eveId=>array('view','id'=>$model->eveId),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Eventos','url'=>array('index')),
	array('label'=>'Crear Evento','url'=>array('create')),
	array('label'=>'Ver Eventos','url'=>array('view','id'=>$model->eveId)),
	array('label'=>'Aminstrar Eventos','url'=>array('admin')),
);
?>

<h1>Actualizar Eventos <?php echo $model->eveId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>