<?php
$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Proyectos','url'=>array('index')),
	array('label'=>'Crear Proyectos','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('proyectos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Proyectoses</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'btn btn-success btn btn-large')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'proyectos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'proId',
		'proNombre',
		'proDescripcion',
		'proFechaPostulacion',
		'proFechaInicio',
		'proFechaFinal',
		/*
		'proCantidadUsuarios',
		'proCantidadMaximoUsuarios',
		'proCantidadMinimaUsuarios',
		'proEstado',
		'tblFases_fasId',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
