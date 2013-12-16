<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'eventos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'eveNombre',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textFieldRow($model,'eveDescripcion',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'eveLugar',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textFieldRow($model,'eveDireccion',array('class'=>'span5','maxlength'=>60)); ?>
	
	<?php echo $form->textFieldRow($model,'eveNumParticipantes',array('class'=>'span5')); ?>

	<!-- dropDownlist dependientes -->
    <?php echo $form->dropDownListRow($model,'eveDepartamento',

          CHtml::ListData(Departamento::model()-> findAll(), 'dep_id', 'dep_nombre'),
            array(
                'ajax'=>array(
                	'type'=>'POST',
                	'url'=>  CController::createUrl('Eventos/seleccion'),
                	'update'=>'#'.CHtml::activeId($model, 'eveMunicipio'),
                ),
                'prompt'=>'Seleccione un departamento'                           
        	)
    ); ?>
	<?php echo $form->error($model,'eveDepartamento'); ?>
                
    <?php $datos = CHtml::listData(Municipio::model()->findAll(),'mun_id','mun_nombre');?>
    <?php echo $form->DropDownListRow($model,'eveMunicipio',$datos, array('empty'=>'----------------------')); ?>        
	<?php echo $form->error($model,'eveMunicipio'); ?>  


	<?php echo $form->labelEx($model,'fecha de inicio');  ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	    'model' => $model,
	    'attribute' => 'eveFechaInicio',
	    'language' => 'es',
	    'options' => array(
	    	'currentText'=>'Now',
    		'dateFormat'=>'yy/mm/dd',
	    ),	    
	    'htmlOptions' => array(
	        'size' => '10',
	        'maxlength' => '10',
	    ),
	));?>
	
	<?php echo $form->labelEx($model,'fecha de finalizacion');  ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	    'model' => $model,
	    'attribute' => 'eveFechaFin',
	    'language' => 'es',
	    'options' => array(
	    	'currentText'=>'Now',
    		'dateFormat'=>'yy-mm-dd',
	    ),
	    'htmlOptions' => array(
	        'size' => '10',
	        'maxlength' => '10',
	    ),
	));?>

	<?php echo $form->labelEx($model, 'eveHoraInicio'); ?>
	<?php
		$this->widget('application.extensions.jui_timepicker.JTimePicker', array(
		    'model'=>$model,
		    'attribute'=>'eveHoraInicio',
		    'language' => 'es',
		     // additional javascript options for the date picker plugin
		    'options'=>array(
		        'showPeriod'=>true,
		        ),
		    'htmlOptions'=>array('size'=>8,'maxlength'=>8 ),
		));
	?>

	<?php echo $form->labelEx($model, 'eveHoreFin'); ?>
	<?php
		$this->widget('application.extensions.jui_timepicker.JTimePicker', array(
		    'model'=>$model,
		    'attribute'=>'eveHoraFin',
		    'language' => 'es',
		     // additional javascript options for the date picker plugin
		    'options'=>array(
		        'showPeriod'=>true,
		        ),
		    'htmlOptions'=>array('size'=>8,'maxlength'=>8 ),
		));
	?>

	<?php echo $form->textFieldRow($model,'eveExpositor',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textFieldRow($model,'eveUsuario',array('class'=>'span5')); ?>
	

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
