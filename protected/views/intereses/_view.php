<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('intId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->intId),array('view','id'=>$data->intId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('intNombre')); ?>:</b>
	<?php echo CHtml::encode($data->intNombre); ?>
	<br />


</div>