<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'aspirante-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son requeridos</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'aspUsuarioId',array('class'=>'span5','placeholder'=>Yii::app()->user->name, 'disabled'=>true)); ?>

	<?php echo $form->textFieldRow($model,'aspEmpresa',array('class'=>'span5','maxlength'=>95)); ?>
		<?php //$lista = CHtml::listData(Proyectos::model()->findAll('proFaceId=?',array(1)));
	//echo $form->dropDownList($model, 'aspProyectoId', $lista,'proId', 'proNombre')?>
	<?php
	$proyect = Proyectos::model()->findByPk($idp); 
	// $proyecto = CHtml::listData(Proyectos::model()->findAll(),'proId','proNombre');?>
	<?php echo $form->textFieldRow($proyect,'proNombre',array('class'=>'span5','maxlength'=>60, 'disabled'=>true)); ?>
	<?php echo $form->textFieldRow($model,'aspTecnologiaAD',array('class'=>'span5','maxlength'=>60)); ?>
	<?php $experiencia = CHtml::listData(ExperinciaAgil::model()->findAll(),'expId','expEspesificacion');?>
	<?php echo $form->radioButtonListRow($model, 'aspExperienciaAgilId', $experiencia, array()); ?>

	<?php echo $form->textAreaRow($model,'aspComentario',array('class'=>'span5', 'rows'=>5)); ?>

	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Guardar' : 'Guardar',
		)); ?>
	 <?php echo CHtml::link(CHtml::Button('Atras', array('class'=>'btn btn-danger')), array('Proyectos/index')); ?>	

<?php $this->endWidget(); ?>
<?php 

 ?>

