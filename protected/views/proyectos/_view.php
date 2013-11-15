<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('proId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->proId),array('view','id'=>$data->proId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proNombre')); ?>:</b>
	<?php echo CHtml::encode($data->proNombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proDescripcion')); ?>:</b>
	<?php echo CHtml::encode($data->proDescripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proFechaPostulacion')); ?>:</b>
	<?php echo CHtml::encode($data->proFechaPostulacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proFechaInicio')); ?>:</b>
	<?php echo CHtml::encode($data->proFechaInicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proFechaFinal')); ?>:</b>
	<?php echo CHtml::encode($data->proFechaFinal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proCantidadUsuarios')); ?>:</b>
	<?php echo CHtml::encode($data->proCantidadUsuarios); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('proCantidadMaximoUsuarios')); ?>:</b>
	<?php echo CHtml::encode($data->proCantidadMaximoUsuarios); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proCantidadMinimaUsuarios')); ?>:</b>
	<?php echo CHtml::encode($data->proCantidadMinimaUsuarios); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proEstado')); ?>:</b>
	<?php echo CHtml::encode($data->proEstado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblFases_fasId')); ?>:</b>
	<?php echo CHtml::encode($data->tblFases_fasId); ?>
	<br />

	

</div>