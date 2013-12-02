<?php
$this->breadcrumbs=array(
	'Aspirantes'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('aspirante-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administración de aspirantes</h1>
</div><!-- search-form -->



<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'aspirante-grid',
    'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'columns'=>array(
        'aspUsuario.usuNombre',
		'aspUsuario.usuApellido',
		'aspUsuario.usuTelefono',
		'aspUsuario.usuEmail',
		'aspEmpresa',
		'aspProyecto.proNombre',
		'aspTecnologiaAD',
		'aspExperienciaAgil.expEspesificacion',
		'aspComentario',
				array(
                    'class'=>'bootstrap.widgets.TbButtonColumn',
                    'template'=>'<table><tr><td> {delete} </td><td> {view} </td></tr></table>',
                         'buttons'=>array
                    	(
                        'delete' => array
                        (
                            'label'=>'Borrar',
                            'icon'=>'minus',
                            'url'=>'Yii::app()->createUrl("aspirante/Delete", array("id"=>$data->aspId))',
                                'options'=>array
                                    (
                                     'class'=>'btn btn-danger',
                                    ),
                        ),
                        'view' => array
                        (
                            'label'=>'Ver',
                            'icon'=>'eye-open',
                            'url'=>'Yii::app()->createUrl("aspirante/view", array("id"=>$data->aspId))',
                                'options'=>array
                                    (
                                     'class'=>'btn btn-success',
                                    ),
                        ),
                )
	),
))); 

 ?> 