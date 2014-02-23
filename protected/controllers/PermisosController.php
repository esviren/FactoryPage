<?php
class PermisosController extends Controller
{
	public function actionIndex()
	{
		echo "index";
	}

	public function filters(){
		return array(
			'accessControl',
			'postOnly + delete',
			);
	}

	public function accessRules(){
		return Yii::app()->Rules->getRules("Permisos");
	}

	public function actionAsignar($rol)
	{
		$controllers = new CActiveDataProvider('Controladores');
		//$criterio = "Ninguno";
		$controlador = 0;
		$rolName = Roles::model()->findByPk($rol);

		if(isset($_GET['controlador']))
		{
			$ctrlr = Controladores::model()->findByPk($_GET['controlador']);
			$mensaje = "Acciones del controlador \"".$ctrlr->conNombre."\".";
			$criterio = $ctrlr->conId;
			$controlador = $ctrlr->conId;
		}
		else
		{
			$mensaje = "No a seleccionado un controlador";
		}
		$acciones = Acciones::model()->findAll('accControladorId = ?', array($controlador));
		$permisos = Permisos::model()->findAll('perRolesId = ? and perControllerId = ?', array($rol, $controlador));

		if(isset($_POST['guardar']) && isset($_GET['controlador']))
		{
			foreach($acciones as $key => $value)
			{
				if(isset($_POST[$value->accId]))
				{
					if($this->isAsigned($value->accNombre, $controlador, $rol))
					{
						$permiso = Permisos::model()->find('perAccion = ? and perControllerId = ? and perRolesId = ?', array($value->accNombre, $controlador, $rol));
						$permiso->perEstado = $_POST[$value->accId];
						$permiso->save();
					}
					else
					{
						if($_POST[$value->accId] != "inactivo")
						{
							$permiso = new Permisos();
							$permiso->perRolesId = $rol;
							$permiso->perControllerId = $controlador;
							$permiso->perAccion = $value->accNombre;
							$permiso->perEstado = $_POST[$value->accId];
							$permiso->save();
						}
					}
					//echo "<p>".$value->accNombre."-->".$_POST[$value->accId]."</p>";
				}
			}
			$this->redirect(array('asignar', 'rol'=>$rol, 'controlador'=>$controlador));
		}
		$this->render('asignar', array(
			'role'=>$rol,
			'dataProvider'=>$controllers,
			'acciones'=>$acciones,
			'mensaje'=>$mensaje,
			'permisos'=>$permisos,
			'rolName'=>$rolName->rolNombre,
		));
	}

	public function isAsigned($accion, $controlador, $rol)
	{
		$model = Permisos::model()->findAll('perAccion = ? and perControllerId = ? and perRolesId = ?', array($accion, $controlador, $rol));
		if(count($model) > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getPermiso($accion, $controlador)
	{
		$model = Permisos::model()->findAll('perAccion = ? and perControllerId = ?', array($accion, $controlador));
		return $model;
	}
}
?>