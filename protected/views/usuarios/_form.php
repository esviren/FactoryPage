<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'usuarios-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
 	'clientOptions'=>array(
 	'validateOnSubmit'=>true,
 	),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'usuNombre',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'usuApellido',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'usuTelefono',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'usuEmail',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'usuUsuario',array('class'=>'span5','maxlength'=>45, 'onblur'=>'validarUsuario("user", "'.Yii::app()->createUrl('Usuarios/UserAjax').'")',
															'id'=>'user')); ?>

	<?php echo $form->passwordFieldRow($model,'usuPassword', array('size'=>20,'maxlength'=>45, 'id'=>'pass1', 'class'=>'span5')); ?>

	<label class="required" id="pass2lb">Confirmar contraseña <span class="required">*</span></label>
	<?php echo CHtml::passwordField('pass2', $model->usuPassword, array('class'=>'span5', 'onblur'=>'validarPass("pass1", "pass2", "none")')); ?>
	
	<?php //if(isset($usuIntereses)!=""){ ?>
		<?php $interes = new Intereses; ?>
		<?php $datos = CHtml::listData(Intereses::model()->findAll(), 'intId', 'intNombre'); ?>
		<?php echo $form->checkBoxListInLineRow($interes, 'intNombre', $datos, array('empty'=>'Seleccione')); ?>
	<?php //}else{ ?>
		<?php //$interes = new Intereses; ?>
		<?php //$datos = CHtml::listData(Intereses::model()->findAll(), 'intId', 'intNombre'); ?>
		<?php //$datos2 = CHtml::listData($usuIntereses, 'tblIntereses_intId'); ?>
		<?php //echo $form->activeCheckBoxList($interes, 'intNombre',  $datos, array('empty'=>'Seleccione')); ?>
	<?php //} ?>

	<?php if(Yii::app()->Rules->isAdmin()): ?>
		<?php $datos = CHtml::listData(Roles::model()->findAll(), 'rolId', 'rolNombre'); ?>
		<?php echo $form->dropDownListRow($model,'usuRole', $datos, array('empty'=>'Seleccione un rol')); ?>
	<?php endif; ?>

	<?php if(Yii::app()->Rules->isAdmin()): ?>

		<?php echo $form->textFieldRow($model,'usuEstado', array('style'=>'display:none', 'readonly'=>'', 'id'=>'usuEstado')); ?>						
		<div class="btn-group" data-toggle="buttons-radio">
			<a class="btn btn-info <?php echo $model->usuEstado == 1? 'active' : ''; ?>" onclick="setEstado('estado', 'activo')">Activo</a>
			<a class="btn btn-info <?php echo $model->usuEstado == 0? 'active' : ''; ?>" onclick="setEstado('estado', 'inactivo')">Inactivo</a>
		</div>
	<?php endif; ?>

	<?php echo $form->fileFieldRow($model,'usuImagen'); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Registrar' : 'Save',
			'htmlOptions'=>array('id'=>'validarPass("pass1", "pass2", "user")')
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">


/**
Funcion para checkear los checkbox segun el interes por usuario q haya en la bd.
**/
<?php if(Yii::app()->controller->action->id == 'update') { ?>
$(function(){	
	verificarCheckbox();
})

function verificarCheckbox()
{
	$.post("index.php?r=usuarios/update&id=<?php echo $_GET['id'];?>&verificar=1",{},function(result)
	{
		result = $.parseJSON(result);
			for(i in result)
			{
				if(result[i].estado==true)
				{
					$("input[value="+result[i].intId+"]").attr("checked","true");
				}
			}
	});
}
<?php } ?>

/*
* funcion para cambiar el estado de los permisos
*/
function change(id, answer){
	var input = document.getElementById(id);
	if(answer == 'si'){
		input.value = 'activo';
	}else{
		input.value = 'inactivo';
	}
	//alert(input.value);
}

/*
* funcion para cambiar el estado de un input
* la funcion debe recibir el id del input a asignar el valor
* y activo para insertar 1 o inactivo para insertar 0
*/
function setEstado(id, value){
	if(value == 'activo'){
		$("#" + id).val(1);
	}else if(value == 'inactivo'){
		$("#" + id).val(0);
	}else{
		alert("Error en funcion estado el valor que ingreso es incorrecto")
	}
}

/*
* funcion para validar dos campos de contraseña
* y a dichos campos les cambia el color 
* dependiendo de su estado (error-rojo, correcto-verde)
*/
function validarPass(pass1, pass2, user){

	if($("#" + user).val() == ""){
		return false;
		alert("Debe ingresar un nombre de usuario.");
	}

	if($("#" + pass1).val() == ""){
		$("#" + pass1).addClass("btn-danger");
		alert("Debe ingresar una contraseña.");
		return false;
	}else if($("#" + pass2).val() == ""){
		$("#" + pass2).addClass("btn-danger");
		alert("Debe confirmar la contraseña.");
		return false;
	}else if($("#" + pass1).val() != $("#" + pass2).val()){
		$("#" + pass1).addClass("btn-danger");
		$("#" + pass2).addClass("btn-danger");
		alert("Las contraseñas no coinciden.");
		return false;
	}else{
		$("#" + pass1).removeClass("btn-danger");
		$("#" + pass2).removeClass("btn-danger");

		$("#" + pass1).addClass("btn-success");
		$("#" + pass2).addClass("btn-success");
		return true;
	}
}

/* validacion ajax para campo usuario*/
function validarUsuario(id, url){
	var input = $("#" + id).val();
	if($.trim(input) != ''){
		$.post(url, {user : input}, function(data){
			if(data == "Y"){
				alert("Ese nombre de usuario ya esta inscrito");
			}else if(data == "N"){
				alert("Correcto");
			}
		});
	}
}
</script>