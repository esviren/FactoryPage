<?php
$this->breadcrumbs=array(
	'Intereses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Intereses','url'=>array('index')),
	array('label'=>'Administrar Intereses','url'=>array('admin')),
);
?>

<h1>Crear Intereses</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>