<?php
$this->breadcrumbs=array(
	'Aspirantes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Aspirante','url'=>array('index')),
	array('label'=>'Manage Aspirante','url'=>array('admin')),
);
?>

<h1>Registro de aspirantes a participar en la fábrica de software</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'idp'=>$idp)); ?>