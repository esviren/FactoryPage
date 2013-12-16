<?php
$this->breadcrumbs=array(
	'Eventos',
);

$this->menu=array(
	array('label'=>'Crear Evento','url'=>array('create')),
	array('label'=>'Administrar Eventos','url'=>array('admin')),
);
?>

<h1>Eventos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
