<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'usuProRoles-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php $roles = CHtml::listData(Roles::model()->findAll(),'rolId','rolNombre');?>
<?php echo $form->DropDownList($model,'usuProRoles', $roles, array('empty'=>'Seleccione una opción','class'=>'span5','maxlength'=>45)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Aceptar' : 'Actualizar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>