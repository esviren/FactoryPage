<?php
class UserRules extends CApplicationComponent
{
	public function getRules($role, $controllerName)
	{
		$role = Roles::model()->find("rolNombre = ?", array($role));
		$controller = Controladores::model()->find('conNombre = ?', array($controllerName));
		$permisos = Permisos::model()->findAll(
			'perRolesId = ? and perControllerId = ? and perEstado != "inactivo"',
			array($role->rolId, $controller->conId)
		);

		$user = Yii::app()->user->name;

		$acciones = array();
		$acciones[] = "none";
		foreach($permisos as $key =>$value)
		{
			$acciones[] = $value->perAccion;
		}

		$rules = array(
			array(
				0=>'allow',
				'actions'=>$acciones,
				'users'=>array(0=>$user),
			),
			array(
				0=>'deny',
				'users'=>array(0=>'*'),
			),
		);

		return $rules;
	}
}
?>