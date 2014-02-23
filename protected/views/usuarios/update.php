<?php
$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	$model->usuId=>array('view','id'=>$model->usuId),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Usuarios','url'=>array('index'), 'visible'=>Yii::app()->Rules->isAdmin()),
	array('label'=>'Crear Usuarios','url'=>array('create'), 'visible'=>Yii::app()->Rules->isAdmin()),
	array('label'=>'Ver Detalle','url'=>array('view','id'=>$model->usuId)),
	array('label'=>'Administrar Usuarios','url'=>array('admin'), 'visible'=>Yii::app()->Rules->isAdmin()),
);
?>
<?php
	// $usuInte = new CDbCriteria();
	// $usuInte->condition = 'tblUsuarios_usuId = :a';
	// $usuInte->params = array(':a'=>$model->usuId);
	// $usuIntereses = UsuariosXTblIntereses::model()->findAll($usuInte);
?>

<?php
	$usuInte = new CDbCriteria();
	$usuInte->condition = 'tblUsuarios_usuId = :a';
	$usuInte->params = array(':a'=>$model->usuId);
	$usuIntereses = UsuariosXTblIntereses::model()->findAll($usuInte);

	$interes = new Intereses; 
	$interes = Intereses::model()->findAll();

	$arrayInte = array();

	foreach ($interes as $value1)
	{
		$varCheck = false;

		foreach ($usuIntereses as $value2)
		{
			if($value1['intId'] == $value2['tblIntereses_intId'])
			{
				$varCheck = true;
				break;
			}
			else
			{
				$varCheck = false;
			}
		}
		$arrayInte[] = array(
			'intId'=>$value1['intId'],
			'intNombre'=>$value1['intNombre'],
			'estado'=>$varCheck
		);
	}
?>

<h1>Update Usuarios <?php echo $model->usuId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'usuIntereses'=>$usuIntereses)); ?>