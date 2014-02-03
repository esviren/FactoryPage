<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'roles-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'rolNombre',array('maxlength'=>45)); ?>

	<?php echo $form->dropDownListRow($model,'rolEstado', array(''=>'', '1'=>'Activo', '0'=>'Inactivo')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
