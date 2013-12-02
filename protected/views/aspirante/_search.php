<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'aspId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'aspUsuarioId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'aspEmpresa',array('class'=>'span5','maxlength'=>95)); ?>

	<?php echo $form->textFieldRow($model,'aspProyectoId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'aspTecnologiaAD',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textFieldRow($model,'aspExperienciaAgil',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'aspComentario',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'aspEstado',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
			'id'=>'guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
