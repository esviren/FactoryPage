<?php
$this->breadcrumbs=array(
	'Eventos'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Eventos','url'=>array('index')),
	array('label'=>'Crear Evento','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('eventos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Eventoses</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'eventos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'eveId',
		'eveNombre',
		'eveDescripcion',
		'eveLugar',
		'eveDireccion',
		'eveDepartamento',
		'eveNumParticipantes',
		/*
		'eveMunicipio',
		'eveFechaInicio',
		'eveFechaFin',
		'eveHoraInicio',
		'eveHoraFin',
		'eveExpositor',
		'eveUsuario',
		'eveFase',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
