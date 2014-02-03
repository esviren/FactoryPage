<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'eveId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'eveNombre',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textFieldRow($model,'eveDescripcion',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'eveLugar',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textFieldRow($model,'eveDireccion',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textFieldRow($model,'eveDepartamento',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'eveMunicipio',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'eveNumParticipantes',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'eveFechaInicio',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'eveFechaFin',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'eveHoraInicio',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'eveHoraFin',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'eveExpositor',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textFieldRow($model,'eveUsuario',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'eveFase',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
