<?php
$this->breadcrumbs=array(
	'Acciones'=>array('index'),
	$model->accId=>array('view','id'=>$model->accId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Acciones','url'=>array('index')),
	array('label'=>'Create Acciones','url'=>array('create')),
	array('label'=>'View Acciones','url'=>array('view','id'=>$model->accId)),
	array('label'=>'Manage Acciones','url'=>array('admin')),
);
?>

<h1>Update Acciones <?php echo $model->accId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>