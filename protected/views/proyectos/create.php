<?php
$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Proyectos','url'=>array('index')),
	array('label'=>'Administrar Proyectos','url'=>array('admin')),
);
?>

<h1>Crear Proyecto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>