<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'controladores-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'conNombre',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<h3>Controladores</h3>
<?php $this->Widget('bootstrap.widgets.TbListView',
	array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	)); ?>