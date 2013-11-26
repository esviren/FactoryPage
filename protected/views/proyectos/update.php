<?php
$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	$model->proNombre=>array('view','id'=>$model->proNombre),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Proyectos','url'=>array('index')),
	array('label'=>'Crear Proyectos','url'=>array('create')),
	array('label'=>'Ver Proyectos','url'=>array('view','id'=>$model->proId)),
	array('label'=>'Administrar Proyectos','url'=>array('admin')),
);
?>

<h1>Actualizar Proyecto <?php echo $model->proNombre; ?></h1>

<?php //echo $this->renderPartial('_form',array('model'=>$model)); ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'proyectos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Los campos <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'proNombre',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textAreaRow($model, 'proDescripcion', array('class'=>'span5', 'rows'=>5)); ?>
	
	<?php echo $form->labelEx($model,'fecha de postulación');  ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	    'model' => $model,
	    'attribute' => 'proFechaPostulacion',
	    'language' => 'es',
	    //'i18nScriptFile' => 'jquery.ui.datepicker-es.js',
	    'htmlOptions' => array(
	        'size' => '10',
	        'maxlength' => '10',
	    ),
	));?>

	<?php echo $form->labelEx($model,'Fecha de inicio');  ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	    'model' => $model,
	    'attribute' => 'proFechaInicio',
	    'language' => 'es',
	    
	    'htmlOptions' => array(
	        'size' => '10',
	        'maxlength' => '10',

	    ),
	    'defaultOptions' => array(  // (#3)
                    'showOn' => 'focus', 
                    'dateFormat' => 'yy/mm/dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    'showButtonPanel' => true,
                ),
	));?>

	<?php echo $form->labelEx($model,'fecha de Finalización');  ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	    'model' => $model,
	    'attribute' => 'proFechaFinal',
	    'language' => 'es',
	    //'i18nScriptFile' => 'jquery.ui.datepicker-es.js',
	    'htmlOptions' => array(
	        'size' => '10',
	        'maxlength' => '10',
	    ),
	));?>

	<?php echo $form->textFieldRow($model,'proCantidadMaximoUsuarios',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'proCantidadMinimaUsuarios',array('class'=>'span5')); ?>

	<?php $fases = CHtml::listData(Fases::model()->findAll(),'fasId','fasTipo');?>
	<?php echo $form->dropDownListRow($model, 'tblFases_fasId',$fases, array('class'=>'span5','empty'=>'seleccione fase')); ?>	

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>