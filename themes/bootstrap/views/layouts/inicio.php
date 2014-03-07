<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Fabrica de Sofware</title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/scroll.css" />
	
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.lettering-0.6.1.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.scrollorama.js"></script>

	<?php Yii::app()->bootstrap->register(); ?>
</head>
<body style="padding-top: 40px;">
	<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'inicio', 'url'=>array('/site/index')),
                array('label'=>'Registrar', 'url'=>array('/Usuarios/create')),
                array('label'=>'Crear roles', 'url'=>array('/Roles/create'), 'visible'=>Yii::app()->Rules->isAdmin()),
                array('label'=>'Intereses', 'url'=>array('/Intereses/create'), 'visible'=>Yii::app()->Rules->isAdmin()),
                array('label'=>'Eventos', 'url'=>array('/eventos/index')),
                array('label'=>'Proyectos', 'url'=>array('/proyectos/index')),
                array('label'=>'Aspirantes', 'url'=>array('/aspirante/admin')),
                array('label'=>'Acerca', 'url'=>array('/site/page', 'view'=>'about')),
                array('label'=>'Contactenos', 'url'=>array('/site/contact')),
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'cerrar sesion ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
	            ),
	        ),
	    ),
	)); ?>

	<div class="scrollblock foto f0">
		<div style="margin-left: 40%; padding-top:100px;">
			<h1>Fabrica de Software</h1>
		</div>
	</div>
	<div id="fondo" class="scrollblock foto f1" style="z-index: -1;">
		<div>			
			<div id="ftop1" style="margin-left: 20%; margin-top:-10%; transform: scale(0.5);">
				<h1>Fabrica</h1>
			</div>
			<div id="ftop2" style="margin-left: 500px; padding-top:-100px; transform: scale(1.5);">
				<h1>Sotware</h1>
			</div>
			<div id="ftop3" style="margin-left: 16%; padding-top:-100px; ">
				<h1>Quienes!</h1>
			</div>
			<div id="ftop4" style="margin-left: 27%; padding-top:-100px; transform: scale(1.3);">
				<h1>Somos</h1>
			</div>
			<div id="ftop5" style="margin-left: 40%; padding-top:0px; transform: scale(1.2);">
				<h1>Fabrica</h1>
			</div>
			<div id="ftop6" style="margin-left: 25%; padding-top:600;">
				<h1>Sotware</h1>
			</div>
			<div id="ftop7" style="margin-left: 32%; padding-top:-100px; transform: scale(0.6);">
				<h1>Quienes</h1>
			</div>
			<div id="ftop8" style="margin-left: 22%; padding-top:-5px;">
				<h1>Somos@</h1>
			</div>
			<div id="ftop9" style="margin-left: 7%; padding-top:800; transform: scale(0.4);">
				<h1>Fabrica</h1>
			</div>
			<div id="ftop10" style="margin-left: 25%; padding-top:600;">
				<h1>Sotware</h1>
			</div>
			<div id="ftop11" style="margin-left: 32%; padding-top:-100px;">
				<h1>Quienes</h1>
			</div>
			<div id="ftop12" style="margin-left: 22%; padding-top:-100px;">
				<h1>Somos</h1>
			</div>
		</div>
		<div id="salida" style="margin-left: 54%; margin-top:-150px;">
			<h1>Fabrica de Software</h1>
		</div>
		<div id="salidaTxt" style="margin-left: 55%; width: 350px">
			<p>
				<h3 style="color: white">						
					Practicantes que participan en un espacio de desarrollo real,ena proveedor Sena, es decir, productos internos para el Sena, así que cualquier proyecto ya sea de cualquier centro o regional es bienvenido.
				</h3>
			</p>
		</div>		
	</div>
	<div class="scrollblock foto f2">
		<div id="left0" style="padding-top:30px; transform: scale(1.7);">
			<h1>Fabrica</h1>
		</div>
		<div id="left1" style="padding-top:3px; transform: scale(1.2);">
			<h1>Software</h1>
		</div>
		<div id="left2" style="padding-top:30px;">
			<h1>nos</h1>
		</div>
		<div id="left3" style="padding-top:30px; transform: scale(0.7);">
			<h1>proyectamos</h1>
		</div>
		<div id="left4" style="padding-top:30px; transform: scale(1.5);">
			<h1>nos</h1>
		</div>
		<div id="left5" style="padding-top:30px; transform: scale(0.7);">
			<h1>Software</h1>
		</div>
		<div id="left6" style="padding-top:30px; transform: scale(0.5);">
			<h1>Fabrica</h1>
		</div>
		<div id="left7" style="padding-top:30px; transform: scale(1.3);">
			<h1>proyectamos</h1>
		</div>
		<div id="left8" style="padding-top:-700px;">
			<h1>nos</h1>
		</div>
		<div id="left9" style="padding-top:-700px;">
			<h1>Fabrica</h1>
		</div>
	</div>
	<div class="scrollblock foto f3" id="fondo_2"></div>
	<div class="scrollblock foto f4"></div>
	<div class="scrollblock foto f5"></div>
	<div class="scrollblock foto f0"></div>
	<div class="scrollblock foto f1"></div>
	<div class="scrollblock foto f2"></div>
	<div class="scrollblock foto f3"></div>
	<div class="scrollblock foto f4"></div>
	<div class="scrollblock foto f5"></div>

	<script>
		$(document).ready(function() {
			var scrollorama = $.scrollorama({blocks:'.scrollblock'});

			scrollorama.animate('#salida',{delay:400, duration:400, property:'opacity', start:0});
			scrollorama.animate('#salidaTxt',{delay:400, duration:500, property:'opacity', start:0});

			scrollorama.animate('#ftop1',{delay:200, duration:1300, property:'top', start:-100, end:1000});
			scrollorama.animate('#ftop2',{delay:300, duration:950, property:'top', start:-100, end:1000});
			scrollorama.animate('#ftop3',{delay:300, duration:800, property:'top', start:-50, end:1000});
			scrollorama.animate('#ftop4',{delay:300, duration:700, property:'top', start:-100, end:1000});
			scrollorama.animate('#ftop5',{delay:300, duration:800, property:'top', start:-100, end:1000});
			scrollorama.animate('#ftop6',{delay:300, duration:550, property:'top', start:-500, end:1500});
			scrollorama.animate('#ftop7',{delay:300, duration:2000, property:'top', start:-100, end:1000});
			scrollorama.animate('#ftop8',{delay:200, duration:1000, property:'top', start:-100, end:1000});
			scrollorama.animate('#ftop9',{delay:200, duration:1200, property:'top', start:1000, end:0});
			scrollorama.animate('#ftop10',{delay:200, duration:600, property:'top', start:1000, end:0});
			scrollorama.animate('#ftop11',{delay:500, duration:500, property:'top', start:600, end:0});
			scrollorama.animate('#ftop12',{delay:200, duration:1000, property:'top', start:800, end:0});

			scrollorama.animate('#left0',{delay:50, duration:800, property:'left', start:2300, end:-200});
			scrollorama.animate('#left1',{delay:200, duration:800, property:'left', start:0, end:2200});
			scrollorama.animate('#left2',{delay:0, duration:1000, property:'left', start:1900, end:-200});
			scrollorama.animate('#left3',{delay:300, duration:800, property:'left', start:2300, end:-200});
			scrollorama.animate('#left4',{delay:100, duration:1500, property:'left', start:0, end:2200});
			scrollorama.animate('#left5',{delay:100, duration:600, property:'left', start:2300, end:-200});
			scrollorama.animate('#left6',{delay:30, duration:2200, property:'left', start:0, end:2200});
			scrollorama.animate('#left7',{delay:100, duration:1700, property:'left', start:2300, end:-200});
			scrollorama.animate('#left8',{delay:200, duration:1200, property:'left', start:1600, end:-200});
			scrollorama.animate('#left9',{delay:100, duration:1000, property:'left', start:-500, end:2200});

			scrollorama.animate('#fondo_2',{delay:100, duration:700, property:'top', start:-500, end:2200});	
		});
	</script>
</body>
</html>