<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuNombre')); ?>:</b>
	<?php echo CHtml::encode($data->usuNombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuApellido')); ?>:</b>
	<?php echo CHtml::encode($data->usuApellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuTelefono')); ?>:</b>
	<?php echo CHtml::encode($data->usuTelefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuEmail')); ?>:</b>
	<?php echo CHtml::encode($data->usuEmail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuRole')); ?>:</b>
	<?php echo CHtml::encode($data->nombreRol(Yii::app()->user->userID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuUsuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usuUsuario), array('view','id'=>$data->usuId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuPassword')); ?>:</b>
	<?php echo CHtml::encode($data->usuPassword); ?>
	<br />


	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('usuEstado')); ?>:</b>
	<?php echo CHtml::encode($data->usuEstado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuImagen')); ?>:</b>
	<?php echo CHtml::encode($data->usuImagen); ?>
	<br />

	*/ ?>

</div><br>