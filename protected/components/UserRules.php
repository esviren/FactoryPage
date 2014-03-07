<?php
class UserRules extends CApplicationComponent
{
	/*public function getRules($role, $controllerName)
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
	*/

	private $actions = array('none');

	public function getRules($controlador)
	{
		
		if(Yii::app()->user->isGuest)
		{
			$users = '*';
		}
		else
		{
			$user = Usuarios::model()->findByPk(Yii::app()->user->userID);
			$role = Roles::model()->findByPk($user->usuRole);
			$cr = new CDbCriteria;
			$cr->condition='conNombre = :b';
			$cr->params=array(':b'=>$controlador);

			$controller = Controladores::model()->find($cr);
			
			/*$rol = array();

			foreach($role as $ro)
			{
				array_push($rol,$ro->attributes);
			}
			print_r("<prev>");
			print_r($controller);
			exit();

			*/
			

			$permisos = Permisos::model()->findAll(
				'perRolesId = ? and perControllerId = ? and perEstado <> "inactivo"',
				array($role->rolId, $controller->conId));




			foreach ($permisos as $key => $value)
			{
				$this->actions[] = $value->perAccion;
			}
			$users = $user->usuUsuario;
		}

		return array(
			array('allow',
				'actions'=>$this->actions,
				'users'=>array($users),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}

	public function setNewActions($actions)
	{
		if(!is_array($actions))
		{
			return;
		}
		else
		{
			$this->actions = $actions;
		}
	}

	public function isAdmin()
	{
		if(Yii::app()->user->isGuest)
		{
			return false;
		}
		else
		{
			$role = Roles::model()->find('rolNombre = ?', array(Yii::app()->user->role));
			if($role->rolEstado === '1' && $role->rolNombre === 'Directivos')
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}

	public function isNoAdmin()
	{
		if(Yii::app()->user->isGuest)
		{
			return false;
		}
		else
		{
			$role = Roles::model()->find('rolNombre = ?', array(Yii::app()->user->role));
			if($role->rolEstado === '1' && $role->rolNombre === 'Miembro Comunidad' || $role->rolNombre === 'Admin CMS' || $role->rolNombre === 'Instructor Lider')
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}

	public function isScrumMaster($idUser, $idProyec)
	{
		if(Yii::app()->user->isGuest)
		{
			return false;
		}
		else
		{

			$rolProyecto = UsuariosXTblProyectos::model()->find('usuProUsuarioId = ? AND usuProProyectosId = ?', array(Yii::app()->user->userID, $idProyec));

			if(count($rolProyecto) > 0){

			$Roles = Roles::model()->find('rolId=?',array($rolProyecto->usuProRoles));

			if( $Roles->rolEstado === '1' && $Roles->rolNombre === 'Scrum Master')
			{
				return true;
			}
			else
			{
				return false;
			}
			}else{
				return false;
			}
		}
	}

}
?>