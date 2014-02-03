<div class="view">
	 <div class="hero-unit opcion" onclick="javascript: location.href='<?php echo Yii::app()->createUrl('Eventos/View', array('id'=>$data->eveId))?>'">

		<b><?php echo CHtml::encode($data->getAttributeLabel('eveNombre')); ?>:</b>
		<? //php echo CHtml::encode($data->proNombre); ?>
		<?php echo CHtml::encode($data->eveNombre); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('eveDescripcion')); ?>:</b>
		<?php echo CHtml::encode($data->eveDescripcion); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('eveLugar')); ?>:</b>
		<?php echo CHtml::encode($data->eveLugar); ?>
		<br />

        <div class="row-fluid">
        <?php echo CHtml::link(CHtml::Button('Ver más', array('class'=>'btn btn-info')), array('Eventos/View','id'=>$data->eveId))."&nbsp;&nbsp;"; ?>	
        </div>

	 </div>
	
</div>