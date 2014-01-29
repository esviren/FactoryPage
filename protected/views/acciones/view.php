<?php
$this->breadcrumbs=array(
	'Acciones'=>array('index'),
	$model->accId,
);

$this->menu=array(
	array('label'=>'List Acciones','url'=>array('index')),
	array('label'=>'Create Acciones','url'=>array('create')),
	array('label'=>'Update Acciones','url'=>array('update','id'=>$model->accId)),
	array('label'=>'Delete Acciones','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->accId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Acciones','url'=>array('admin')),
);
?>

<h1>View Acciones #<?php echo $model->accId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'accId',
		'accNombre',
		'accControladorId',
	),
)); ?>
