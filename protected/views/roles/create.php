<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	'Create',
);

$this->menu=array(
	//rray('label'=>'List Roles','url'=>array('index')),
	array('label'=>'Administrar Roles','url'=>array('admin')),
);
?>

<?php if(Yii::app()->user->hasFlash('role')): ?>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#modal').modal('show');
		}
		);
	</script>
<?php endif; ?>

<style type="text/css">
	.boton
	{
		position: relative;
		text-align: center;
		left: 10%;
	}
</style>

<h1>Crear Roles</h1>

<div class="span12">
	<div class="span4">
		<div class="hero-unit">
			<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
	<div class="span6">
		<div class="row">
			<div class="span3">
				<div class="Mcontainer">
					<table>
						<tr>
							<td><?php echo CHtml::link(CHtml::button('Registrar controladores', 
							array('class'=>'boton btn btn-large', 'id'=>'btn1', 'onmouseover'=>'moveForward("bnt1")')), array('controladores/create')); ?><br><br></td>
						</tr>
						<tr>
							<td><?php echo CHtml::link(CHtml::button('Asignar permisos a rol  ', 
							array('class'=>'boton btn btn-large', 'id'=>'btn2', 'onmouseover'=>'moveForward("btn2")')), array('')); ?><br><br></td>
						</tr>
						<tr>
							<td><?php echo CHtml::link(CHtml::button('Quitar permisos a rol    ', 
							array('class'=>'boton btn btn-large', 'id'=>'btn3', 'onmouseover'=>'moveForward("btn3")')), array('')); ?><br><br></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="span3">
				<?php $this->widget('bootstrap.widgets.TbGridView', array(
				    'type'=>'striped bordered condensed',
				    'dataProvider'=>$dataProvider,				    		   
				    'columns'=>array(
							    'rolNombre',
							    'rolEstado',
							    array(
							    	'class'=>'bootstrap.widgets.TbButtonColumn',
							    	'template'=>'<table><tr> <td>{delete}</td> <td> {edit} </td><td> {permisos} </td></tr></table>',
							    	'buttons'=>array(
							    			'delete'=>array(
							    				'label'=>'Borrar',
								    			'icon'=>'icon-trash',
								    			'url'=>'Yii::app()->createUrl("Roles/Delete", array("id"=>$data->rolId))',
								    			'options'=>array(
								    				'class'=>'btn btn-danger',
								    				),
							    				),
							    			'edit'=>array(
							    				'label'=>'Editar',
							    				'icon'=>'edit',
							    				'url'=>'Yii::app()->createUrl("Roles/Update", array("id"=>$data->rolId))',
							    				'options'=>array(
							    					'class'=>'btn btn-success',
							    					),
							    				),
							    			'permisos'=>array(
							    				'label'=>'permisos',
							    				'icon'=>'user',
							    				'url'=>'Yii::app()->createUrl("Permisos/asignar", array("rol"=>$data->rolId));',
							    				'options'=>array(
							    					'class'=>'btn btn-success',
							    					),
							    				),
							    		),
							    	),
				    			),
				    'htmlOptions'=>array('style'=>'width: 100%'),
				)); ?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function moveForward(id)
	{
		$("#" + id).animate({left: '10%'});
	}
</script>

<div id="modal" class="modal hide fade">
	<div class="model-header">
		<h3 class="btn-danger" align="center">Error</h3>
	</div>
	<div class="modal-body">
		<center>
			<p>El role <?php echo "\"".$model->rolNombre."\" "; ?> ya existe!</p>
			<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
		</center>
	</div>
</div>