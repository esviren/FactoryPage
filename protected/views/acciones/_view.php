<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('accId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->accId),array('view','id'=>$data->accId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accNombre')); ?>:</b>
	<?php echo CHtml::encode($data->accNombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accControladorId')); ?>:</b>
	<?php echo CHtml::encode($data->accControladorId); ?>
	<br />


</div>