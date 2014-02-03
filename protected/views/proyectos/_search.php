<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'proId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'proNombre',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textFieldRow($model,'proDescripcion',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'proFechaPostulacion',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'proFechaInicio',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'proFechaFinal',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'proCantidadUsuarios',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'proCantidadMaximoUsuarios',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'proCantidadMinimaUsuarios',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'proEstado',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'tblFases_fasId',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
