<?php
$this->breadcrumbs=array(
	'Aspirantes',
);

$this->menu=array(
	array('label'=>'Create Aspirante','url'=>array('create')),
	array('label'=>'Manage Aspirante','url'=>array('admin')),
);
?>

<h1>Aspirantes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
