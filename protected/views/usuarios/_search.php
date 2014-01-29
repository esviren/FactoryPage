<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'usuId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'usuNombre',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'usuApellido',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'usuTelefono',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'usuEmail',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'usuUsuario',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'usuPassword',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'usuRole',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'usuEstado',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'usuImagen',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
