<?php
$this->breadcrumbs=array(
	'Acciones',
);

$this->menu=array(
	array('label'=>'Create Acciones','url'=>array('create')),
	array('label'=>'Manage Acciones','url'=>array('admin')),
);
?>

<h1>Acciones</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
