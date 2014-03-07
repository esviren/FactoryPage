<?php
	$this->breadcrumbs=array(
		'Roles'=>array('Roles/create'),
		'asignar',
	);
?>

<h3>Seleccione un Controlador</h3>

<?php
	$this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered condensed',
		'dataProvider'=>$dataProvider,
		'columns'=>array(
			'conNombre',
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'template'=>'<table><tr><td> {buscar} </td></tr></table>',
				'buttons'=>array(
					'buscar'=>array(
						'label'=>'Buscar acciones',
						'icon'=>'list',
						'url'=>'Yii::app()->createUrl("Permisos/asignar", array("rol"=>'.$role.', "controlador"=>$data->conId));',
						'options'=>array(
							'class'=>'btn btn-info',
						),
					),
				),
			),
		),
		'htmlOptions'=>array('style'=>'width:20%'),
	));
?>

<h3><?php echo $mensaje; ?></h3>

<p>Esta es la lista de las acciones a las que tiene y no tien permiso el rol que seleccionó,</p>
<p>"Si" significa que un usuario con ese rol podra acceder a esa acción.</p>
<p>"No" significa que un usuario con ese rol no podra acceder a esa acción.</p>

<?php echo CHtml::beginForm(); ?>
	
<?php
	echo Chtml::submitButton('Guardar cambios', array('class'=>'btn btn-primary- btn-large', 'name'=>'guardar', 'id'=>'guardar'));
?>
<br><br>

<?php foreach ($acciones as $keya => $acc): ?>

	<div class="Moption">
		<div class="row">
			<div class="span3">
				<b>Id: </b>
				<?php echo $acc->accId; ?><br>
				<b>Nombre: </b>
				<?php echo $acc->accNombre; ?>

				<?php
					$estado = "inactivo";
					$tag = "no asignado";
					if(count($permisos) > 0)
					{
						foreach ($permisos as $keyp => $per)
						{
							if($acc->accNombre == $per->perAccion && $acc->accControladorId == $per->perControllerId)
							{
								if($per->perEstado == "activo")
								{
									$tag = "asignado";
									$estado = "activo";
								}
								else
								{
									$tag = "no asignado";
									$estado = "inactivo";
								}
							}
						}
					}
					else
					{
						$tag = "no asignado";
						$estado = "inactivo";
					}
				?>

				<input type="hidden" id="<?php echo $acc->accId; ?>" name="<?php echo $acc->accId; ?>" value="<?php echo $estado; ?>">
				
				<p><?php echo $tag; ?></p>
			</div>
			<div class="span3">
				Permisos
				<div class="btn-group" data-toggle="buttons-radio">
					<a onclick="change('<?php echo $acc->accId; ?>', 'si')" class="btn btn-primary <?php echo $estado == 'activo' ? 'active' : ''; ?>">Si</a>
					<a onclick="change('<?php echo $acc->accId; ?>', 'no')" class="btn btn-primary <?php echo $estado != 'activo' ? 'active' : ''; ?>">No</a>
				</div>
			</div>
		</div>
	</div>
	<br>
<?php endforeach; ?>

<?php echo CHtml::endForm(); ?>

<script type="text/javascript">

 	function change(id, answer){
 		var input = document.getElementById(id);
 		if(answer == 'si'){
 			input.value = 'activo';
 		}else{
 			input.value = 'inactivo';
 		}
 		//alert(input.value);
 	}
 </script>