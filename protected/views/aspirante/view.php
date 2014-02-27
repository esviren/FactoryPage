<?php
$this->breadcrumbs=array(
	'Aspirantes'=>array('index'),
	$model->aspId,
);

$this->menu=array(
	array('label'=>'Lista Aspirante','url'=>array('aspirante/admin')),
	//array('label'=>'Create Aspirante','url'=>array('create')),
	//array('label'=>'Update Aspirante','url'=>array('update','id'=>$model->aspId)),
	//array('label'=>'Delete Aspirante','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->aspId),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Aspirante','url'=>array('admin')),
);
?>


 		<H1>
			<?php $usuario= Usuarios::model()-> findByPk($model->aspUsuarioId); ?>
 		<?php

 			 echo CHtml::image(Yii::app()->request->baseUrl.$usuario->usuImagen,"",
 			 	array('class'=>'imagen', 'width'=>200,'href'=>"#myModal",'data-toggle'=>"modal"));		
 		 ?>	
 		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    			<h3 id="myModalLabel"><?php echo $usuario->usuNombre.' '.$usuario->usuApellido; ?></h3>
  		</div>
  		<div class="modal-body">

 		<?php
 			 echo CHtml::image(Yii::app()->request->baseUrl.$usuario->usuImagen,"",
 			 	array('width'=>500));
		
 		 ?>	
  		</div>
  		<div class="modal-footer">
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    	
	  	</div>
		</div>		
 		
 		</H1>
<h1> Aspirante <?php echo $model->aspId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(	
		'aspUsuario.usuNombre',
		'aspUsuario.usuApellido',
		'aspUsuario.usuTelefono',
		'aspUsuario.usuEmail',
		'aspEmpresa',
		'aspProyecto.proNombre',
		'aspTecnologiaAD',
		'aspExperienciaAgil.expEspesificacion',
		'aspComentario',
		'aspEstado',
	),
)); 
?>
/* JDiaz, se desactiva el boton cuando la cantidad maxima del Proyecto este completa. */
<?php 
$Proyecto = Proyectos::model()->findByPk($model->aspProyectoId);
if($Proyecto->proCantidadUsuarios == $Proyecto->proCantidadMaximoUsuarios){
	$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Aceptar solicitud',
    'htmlOptions'=>array('class'=>'btn btn-success btn-large','disabled'=>true , 'data-content'=>'Se ha alcanzado la cantidad maxima de usuarios en este proyecto', 'rel'=>'popover','data-placement'=>'top'),
    )); 

}else{
 echo CHtml::link(CHtml::Button('Aceptar solicitud', array('class'=>'btn btn-success btn-large')), array('Usuproyecto/Aceptar','idU' => $model->aspUsuarioId, 'idP' => $model->aspProyectoId, 'Ida'=>$model->aspId)); 	
}
?>&nbsp;&nbsp;
	<?php echo CHtml::link(CHtml::Button('Rechazar solucitud', array('class'=>'btn btn-danger btn-large')), array('aspirante/delete','id'=>$model->aspId)); ?>