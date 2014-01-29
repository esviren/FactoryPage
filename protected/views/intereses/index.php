<?php
$this->breadcrumbs=array(
	'Intereses',
);

$this->menu=array(
	array('label'=>'Crear Intereses','url'=>array('create')),
	array('label'=>'Administrar Intereses','url'=>array('admin')),
);
?>

<h1>Intereses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
