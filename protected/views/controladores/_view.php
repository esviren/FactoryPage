<?php
/* @var $this ControladoresController */
/* @var $data Controladores */
?>

<div class="Moption" id="<?php echo $data->conId; ?>" 
	onmouseover="moveDiv('<?php echo $data->conId; ?>')"
	onmouseout="stopDiv('<?php echo $data->conId; ?>');"
	title="Asignar Acciones"
	onclick="javascript:location.href=('<?php echo Yii::app()->createUrl('Acciones/create', array('controllerId'=>$data->conId)); ?>');"
	style="cursor:pointer;" >
	<?php echo CHtml::encode($data->conNombre); ?>
	<b>Controller</b>
	<br>
</div><br>

<script type="text/javascript">
	var shouldMove=true;
	function moveDiv(id)
	{
		$("#" + conId).animate({left:'5%'});
	}
	function stopDiv(id)
	{
		$("#" + conId),animate({left:'0%'});
	}
</script>