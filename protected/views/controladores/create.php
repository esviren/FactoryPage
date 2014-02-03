<?php
$this->breadcrumbs=array(
	'Controladores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Controladores','url'=>array('index')),
	array('label'=>'Administrar Controladores','url'=>array('admin')),
);
?>

<h1>Registrar Nuevo Controladores</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'dataProvider'=>$dataProvider,)); ?>

<?php if(Yii::app()->user->hasFlash('ctrl'))
	{
		if(Yii::app()->user->getFlash('ctrl') === "Ya existe")
		{
			$style = "danger";
			$mensaje = "Ya se encuentra registrado un controlador con ese nombre!";
			$titulo = "Error";
		}
		else
		{
			$titlo = "Registro Exitoso";
			$style = "success";
			$mensaje = "Controlador registrado con exito!";
		}
		$mostrarModal = true;
	}
	else
		if(Yii::app()->user->hasFlash('actionDeleted'))
		{
			$style = "primary";
			$mensaje = "Accion borrada correctamente.";
			$titulo = "Borrado exitoso";
			$mostrarModal = true;
		}
?>

<?php if(isset($mostrarModal) && $mostrarModal): ?>

<script type="text/javascript">
	$(document).ready(function()
	{
		$('#modal').modal('show');
	});
</script>

<?php endif; ?>

<div id="modal" class="modal hide fade">
	<div class="modal-header">
		<center>
			<h3 class="btn-<?php echo isset($style)? $style : ''; ?>"><?php echo isset($titulo)? $titulo : ''; ?></h3>
		</center>
	</div>
	<div class="modal-body">
		<center>
			<p><?php echo isset($mensaje)? $mensaje : ''; ?></p>
			<button class="btn btn-<?php echo isset($style)? $style : ''; ?>" data-dismiss="modal" aria-hidden="true">
				Cerrar
			</button>
		</center>
	</div>
</div>