<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<?php if(Yii::app()->user->getFlash('registro')){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#registro').modal('show');
        });
    </script>
<?php } ?>

<div id="registro" class="modal hide fade">
    <div class="modal-header">
        <h3 class="btn-primary">Inscripción</h3>
    </div>
    <div class="modal-body">
       Su solicitud ha sido enviada con exito, pronto se le informará la respuesta del lider de la fabrica. Gracias por su participación
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    </div>
</div>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Welcome to '.CHtml::encode(Yii::app()->name),
)); ?>

<p>Congratulations! You have successfully created your Yii application.</p>

<?php $this->endWidget(); ?>

<p>Hola como estas</p>

<ul>
    <li>View file: <code><?php echo __FILE__; ?></code></li>
    <li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
    the <a href="http://www.yiiframework.com/doc/">documentation</a>.
    Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
    should you have any questions.</p>
