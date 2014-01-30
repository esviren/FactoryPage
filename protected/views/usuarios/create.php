<?php
$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Usuarios','url'=>array('index')),
	array('label'=>'Manage Usuarios','url'=>array('admin')),
);
?>

<h1>Create Usuarios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php if(Yii::app()->user->hasFlash('Registro')): ?>
	<?php 
		$titulo = "Error";
		$mensaje = Yii::app()->user->getFlash('Registro');
	 ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#modal").modal('show');
		});
	</script>
<?php endif; ?>

<div class="modal hide fade" id="modal">
	<div class="modal-header" align="center">
		<h3 class="btn-danger"><?php echo isset($titulo)? $titulo : ""; ?></h3>
	</div>
	<div class="modal-body">
		<center>
			<p><?php echo isset($mensaje)? $mensaje : "";?></p>
			<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
		</center>
	</div>
</div>