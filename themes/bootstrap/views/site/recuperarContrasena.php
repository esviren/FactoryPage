<?php
$this->pageTitle = "Recuperar Contraseña";

$this->breadcrumbs = array('Recuperar Contraseña');

echo $msg;
?>

<div class="form">
	<?php
		$form = $this->beginWidget('CActiveForm',
			array(
				'method' => 'POST',
				'action' => Yii::app()->createUrl('site/recuperarContrasena'),
				'enableClientValidation' => true,
				'clientOptions' => array(
					'validateOnSubmit' => true,
				),
			)
		);
	?>
		<div class="row-fluid">
			<?php
				echo $form->labelEx($model, 'usuUsuario');
				echo $form->textField($model, 'usuUsuario');
				echo $form->error($model, 'usuUsuario', array('class' => 'text-error'));
			?>
		</div>
		
		<div class="row-fluid">
			<?php
				echo $form->labelEx($model, 'usuEmail');
				echo $form->textField($model, 'usuEmail');
				echo $form->error($model, 'usuEmail', array('class' => 'text-error'));
			?>
		</div>
		
		<!-- <div class="row">
			<?php
				//echo $form->labelEx($model, 'captcha');
				//$this->widget('CCaptcha', array('buttonLabel' => 'Actualizar Código'));
				//echo $form->textField($model, 'captcha');
			?>
			<div class="text-info">
				Por favor introduzca el código de la imagén.
			</div>
			<?php //echo $form->error($model, 'captcha', array('class' => 'text-error')); ?>
		</div> -->
		
		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton',array(
	            'buttonType'=>'submit',
	            'type'=>'primary',
	            'label'=>'Recuperar',
	        )); ?>
		</div>
		
	<?php
		$this->endWidget();
	?>
</div>