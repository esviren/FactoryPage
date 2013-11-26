<div class="view">
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('aspId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->aspId),array('view','id'=>$data->aspId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aspUsuarioId')); ?>:</b>
	<?php $usuario = Usuarios::model()->findByPk ($data->aspUsuarioId);?>
	<?php echo $usuario->usuNombre.' '.$usuario->usuApellido?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('aspEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->aspEmpresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aspProyectoId')); ?>:</b>
		<?php $proyecto = Proyectos::model()->findByPk ($data->aspProyectoId);?>
	<?php echo $proyecto->proNombre ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aspTecnologiaAD')); ?>:</b>
	<?php echo CHtml::encode($data->aspTecnologiaAD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aspExperienciaAgilId')); ?>:</b>
	<?php echo CHtml::encode($data->aspExperienciaAgilId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aspComentario')); ?>:</b>
	<?php echo CHtml::encode($data->aspComentario); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('aspEstado')); ?>:</b>
	<?php echo CHtml::encode($data->aspEstado); ?>
	<br />

	*/ ?>

</div>