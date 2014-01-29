<?php 
$this->breadcrumbs=array(
	'Acciones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Acciones', 'url'=>array('index')),
	array('label'=>'Administrar Acciones', 'url'=>array('admin')),
);
?>

<h1>Crear Acciones</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->widget('bootstrap.widgets.TbListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php if(Yii::app()->user->hasFlash('act')): ?>
<?php
	if(Yii::app()->user->getFlash('act') === "Ya existe")
	{
		$style = "danger";
		$mensaje = "Ya se encuentra registrada una accion con ese nombre!";
		$titulo = "Error";
	}
	else
	{
		$titulo = "Registro exitoso";
		$style = "success";
		$mensaje = "La accion a sido registrada correctamente!";
	}
?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#modal").modal('show');
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
			<button class="btn btn-<?php echo isset($style)? $style : ''; ?>" data-dismiss="modal" aria-hidden="true">Cerrar</button>
		</center>
	</div>
</div>