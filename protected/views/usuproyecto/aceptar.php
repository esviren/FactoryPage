<?php
$this->breadcrumbs=array(
	'UsuariosXTblProyectos'=>array('index'),
	'aceptar',
);

/*	array('label'=>'Listar Proyectos','url'=>array('index')),
	array('label'=>'Administrar Proyectos','url'=>array('admin')),
);*/
?>

<h1>Asignar rol dentro del proyecto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>