<?php
$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	$model->usuId,
);

$this->menu=array(
	array('label'=>'Listar Usuarios','url'=>array('index'), 'visible'=>Yii::app()->Rules->isAdmin()),
	array('label'=>'Crear Usuarios','url'=>array('create'), 'visible'=>Yii::app()->Rules->isAdmin()),
	array('label'=>'Actualizar Usuarios','url'=>array('update','id'=>$model->usuId)),
	array('label'=>'Borrar Usuarios','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->usuId),'confirm'=>'Are you sure you want to delete this item?'), 'visible'=>Yii::app()->Rules->isAdmin()),
	array('label'=>'Administrar Usuarios','url'=>array('admin'), 'visible'=>Yii::app()->Rules->isAdmin()),
);
?>

<h1>Detalle del Usuarios <?php echo $model->usuUsuario; ?></h1>

<div class="hero-unit divi">
	<div>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.$model->usuImagen, "",
		array('class'=>'imagen', 'width'=>200, 'href'=>"#myModal", 'data-toggle'=>"modal")); ?>
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel"><?php echo $model->usuUsuario; ?></h3>
			</div>
			<div class="modal-body">
				<?php echo CHtml::image(Yii::app()->request->baseUrl.$model->usuImagen, "", array('width'=>500)); ?>
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'usuId',
		'usuNombre',
		'usuApellido',
		'usuTelefono',
		'usuEmail',
		array(
			'name'=>'usuRole',
			'value'=>$model->nombreRol($model->usuRole),
		),
		'usuUsuario',
		'usuPassword',
		array(
			'name'=>'usuEstado',
			'value'=>$model->nombreEstado(),
		),
	),
)); ?>

<a href="#myModal2" role="button" class="btn" data-toggle="modal">Ver Intereses</a>

<!-- Modal -->
<center>
<div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
    	<h3 id="myModalLabel">Intereses</h3>
    </div>
    <div class="modal-body">
	<div class="well">
	<!-- <center> -->
		<?php if($list!==null){ ?>
			<table>
				<?php foreach($list as $lis) { ?>
				<tr>
					<td><?php echo $lis['intNombre']; ?></td>
				</tr>
				<?php } ?>
			</table>
		<?php }else
		{
			echo 'No se encontraron intereses';
		} ?>
		<!-- </center> -->
	</div>
    </div>
    <div class="modal-footer">
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    </div>
</div>
</center>