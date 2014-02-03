<div class="view">
	 <div class="hero-unit opcion" onclick="javascript: location.href='<?php echo Yii::app()->createUrl('Proyectos/View', array('id'=>$data->proId))?>'">
	 	<!--
		<b><?php //echo CHtml::encode($data->getAttributeLabel('proId')); ?>:</b>
		<?php //echo CHtml::link(CHtml::encode($data->proId),array('view','id'=>$data->proId)); ?>
		<br /> 
		-->

		<b><?php echo CHtml::encode($data->getAttributeLabel('proNombre')); ?>:</b>
		<? //php echo CHtml::encode($data->proNombre); ?>
		<?php echo CHtml::encode($data->proNombre); ?>
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
        <?php echo CHtml::link(CHtml::Button('Ver más', array('class'=>'btn btn-info')), array('Proyectos/View','id'=>$data->proId))."&nbsp;&nbsp;"; ?>	
        </div>

	 </div>
	
</div>