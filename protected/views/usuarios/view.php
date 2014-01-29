<?php
$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	$model->usuId,
);

$this->menu=array(
	array('label'=>'List Usuarios','url'=>array('index')),
	array('label'=>'Create Usuarios','url'=>array('create')),
	array('label'=>'Update Usuarios','url'=>array('update','id'=>$model->usuId)),
	array('label'=>'Delete Usuarios','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->usuId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usuarios','url'=>array('admin')),
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
		array(
			'name'=>'Intereses',
			'value'=>$model->nombreInteres($model->usuId),
		),
	),
)); ?>
