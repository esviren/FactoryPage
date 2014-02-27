<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php 

$a = Yii::app()->user->isGuest? 'create' : 'update'.'&id='.Yii::app()->user->getId();

$this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'inicio', 'url'=>array('/site/index')),
                #array('label'=>'Usuarios', 'url'=>array('/Usuarios/create'), 'visible'=>!Yii::app()->Rules->isNoAdmin()),
                array('label'=>'Usuarios', 'url'=>array('/Usuarios/'.$a), 'visible'=>!Yii::app()->Rules->isAdmin()),
                array('label'=>'Usuarios', 'url'=>array('/Usuarios/create'), 'visible'=>Yii::app()->Rules->isAdmin()),
                array('label'=>'Permisos', 'url'=>array('/Roles/create'), 'visible'=>Yii::app()->Rules->isAdmin()),
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

<div class="container" id="page">

    <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
        )); ?><!-- breadcrumbs -->
    <?php endif?>

    <?php echo $content; ?>

    <div class="clear"></div>

    <div id="footer">
        <center>    
            Copyright &copy; <?php echo date('Y'); ?> Fábrica de Software SENA Medellín.<br/>
            Todos los derechos Reservados.<br/>
            <?php echo Yii::powered(); ?>
        </center>
    </div><!-- footer -->

</div><!-- page -->

</body>
</html>