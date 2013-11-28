<div class="view">
	 <div class="well">
	 	<!--
		<b><?php //echo CHtml::encode($data->getAttributeLabel('proId')); ?>:</b>
		<?php //echo CHtml::link(CHtml::encode($data->proId),array('view','id'=>$data->proId)); ?>
		<br /> 
		-->

		<b><?php echo CHtml::encode($data->getAttributeLabel('proNombre')); ?>:</b>
		<? //php echo CHtml::encode($data->proNombre); ?>
		<?php echo CHtml::link(CHtml::encode($data->proNombre),array('view','id'=>$data->proId)); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('proDescripcion')); ?>:</b>
		<?php echo CHtml::encode($data->proDescripcion); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('tblFases_fasId')); ?>:</b>
		<?php 
			$modelo= Fases::model()-> findByPk($data->tblFases_fasId);
            echo $departamento = $modelo->fasTipo; 
        ?>
		<br />
        <div class="row-fluid">
        	
        </div>

	 </div>

</div>