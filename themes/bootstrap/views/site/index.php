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
    'heading'=>'Bienvenido a '.CHtml::encode(Yii::app()->name),
)); ?>

<!-- <p>Eslogan</p> -->

<?php $this->endWidget(); ?>

<div class="row-fluid">
    <div class="span12">
        <div class="span4">
           <div class="hero-unit">
               <header>
                   <hgroup>
                       <h2>Quienes Somos?</h2>
                   </hgroup>
                   <p id="pQS">
                      Practicantes que participan en un espacio de desarrollo real,
                   </p>
                   <p id="pQS2" style="display:none">
                      Sena proveedor Sena, es decir, productos internos para el Sena, así que cualquier proyecto ya sea de cualquier 
                      centro o regional es bienvenido. <br><br><br><br>
                   </p>
                   <button id="btn1">Ver Mas</button>
                   <button id="btn2" style="display:none">Ocultar</button>
               </header>
           </div> 
        </div>
        <div class="span4">
            <div class="hero-unit">
                <hgroup>
                   <h2>Misión</h1>
                    <p id="pM">
                      Somos una fábrica de software orientada a la satisfacción y al compromiso con sus clientes;
                   </p>
                   <p id="pM2" style="display:none">
                      que ofrece soluciones integrales en sistemas de información de manera innovadora, eficiente, eficaz, ágil, rentable y competitiva, con equipos auto-organizados interesados en crear comunidad dentro y fuera del SENA.
                   </p>
                   <button id="btn3">Ver Mas</button>
                   <button id="btn4" style="display:none">Ocultar</button>
               </hgroup>
            </div>
        </div>
        <div class="span4">
            <div class="hero-unit">
                <hgroup>
                   <h2>Visión</h1>
                    <p id="pV">
                      Seremos una fábrica de software reconocida a nivel nacional e internacional, 
                   </p>
                   <p id="pV2" style="display:none">
                      con equipos auto-organizados, excelencia en desarrollo de software y en prácticas ágiles, brindando un producto de 
                      excelente calidad, comprometidos con el servicio al cliente y la formación integral de su talento humano. <br><br>
                   </p>
                   <button id="btn5">Ver Mas</button>
                   <button id="btn6" style="display:none">Ocultar</button>
               </hgroup>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function()
    {
        var pQSomos = $('#pQS2');
        var cssP = {
            'display' : 'block',
        };
        var cssPO = {
            'display' : 'none',
        };

        $('#btn1').click(function()
        {
            $(pQSomos).css(cssP);
            $('#btn1').css('display','none');
            $('#btn2').css('display','block');
        });

        $('#btn2').click(function()
        {
            $(pQSomos).css(cssPO);
            $('#btn1').css('display','block');
            $('#btn2').css('display','none');
        });

        var pM = $('#pM2');

        $('#btn3').click(function()
        {
            $(pM).css(cssP);
            $('#btn3').css('display','none');
            $('#btn4').css('display','block');
        });

        $('#btn4').click(function()
        {
            $(pM).css(cssPO);
            $('#btn3').css('display','block');
            $('#btn4').css('display','none');
        });

        var pV = $('#pV2');

        $('#btn5').click(function()
        {
            $(pV).css(cssP);
            $('#btn5').css('display','none');
            $('#btn6').css('display','block');
        });

        $('#btn6').click(function()
        {
            $(pV).css(cssPO);
            $('#btn5').css('display','block');
            $('#btn6').css('display','none');
        });
    });
</script>