<?php

class UsuariosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		Yii::app()->Rules->setNewActions(array('create', 'UserAjax','verificarCheckbox'));
		return Yii::app()->Rules->getRules("Usuarios");
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$list = Yii::app()->db->createCommand("SELECT i.intNombre FROM tblIntereses AS i JOIN tblUsuarios_X_tblIntereses AS ui ON i.intId = ui.tblIntereses_intId JOIN tblUsuarios AS u ON u.usuId = ui.tblUsuarios_usuId WHERE ui.tblUsuarios_usuId ='".$id."'")->queryAll();

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'list'=>$list,
		));
	}

	public function verificarCheckbox($usuId){
	$model= new Usuarios;
	$usuInte = new CDbCriteria();
	$usuInte->condition = 'tblUsuarios_usuId = :a';
	$usuInte->params = array(':a'=>$usuId);
	$usuIntereses = UsuariosXTblIntereses::model()->findAll($usuInte);

	$interes = new Intereses; 
	$interes = Intereses::model()->findAll();

	$arrayInte = array();

	foreach ($interes as $value1)
	{
		$varCheck = false;

		foreach ($usuIntereses as $value2)
		{
			if($value1['intId'] == $value2['tblIntereses_intId'])
			{
				$varCheck = true;
				break;
			}
			else
			{
				$varCheck = false;
			}
		}
		$arrayInte[] = array(
			'intId'=>$value1['intId'],
			'intNombre'=>$value1['intNombre'],
			'estado'=>$varCheck
		);
	}
		echo json_encode($arrayInte);
		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		/*
		$model=new Usuarios;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuarios']))
		{
			$model->attributes=$_POST['Usuarios'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->usuId));
		}

		$this->render('create',array(
			'model'=>$model,
		));
		*/
		$model = new Usuarios;
		$interes = new Intereses;
		if(isset($_POST['Usuarios']))
		{
			$model->attributes=$_POST['Usuarios'];
					
			$model->usuRole = $model->usuRole == '' ? 3 : $model->usuRole;

			if(!$this->validateUser($model->usuUsuario)){
				if($this->validateUser($model->usuEmail, true))
				{
					$mensaje = "Ya hay un usuario registrado con ese email!";
					Yii::app()->user->setFlash('Error', $mensaje);
				}
				else
				{
					$Urlimage = "Error imagen";

					if(isset($_FILES) and $_FILES['Usuarios']['error']['usuImagen']==0)
					{
						$uf = CUploadedFile::getInstance($model, 'usuImagen');
						$nombre=$model->usuUsuario;
						$Urlimage="/images/".$nombre;
						if($uf->getExtensionName() == "jpg" || $uf->getExtensionName() == "png" || $uf->getExtensionName() == "jpeg" || $uf->getExtensionName() == "gif")
						{
							$uf->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$nombre);
							// print_r("<prev>");
							// print_r($Urlimage);
							// exit();
							Yii::app()->user->setFlash('imagen','/images/'.$uf->getName());
						}
						else
						{
							Yii::app()->user->setFlash('Error','Imagen no valida');
						}
					}


					$model->usuImagen=$Urlimage;


					Yii::app()->user->setFlash('Registro', 'Registro exitoso!');
					if($model->save())
					{
						$userId=Yii::app()->db->getLastInsertID('Usuarios');
						
						if(isset($_POST['Intereses']))
						{
							$int=array();
							foreach ($_POST['Intereses'] as $key => $value)
							{
								array_push($int, $value);

							}

							for ($i=0; $i < count($int[0]); $i++)
							{
								$usuXint=new UsuariosXTblIntereses;
								//$usuXint->attributes=$_POST['UsuariosXTblIntereses'];
								$usuXint->usuIntId=0;
								$usuXint->tblUsuarios_usuId=$userId;
								$usuXint->tblIntereses_intId=$int[0][$i];
								// print_r($usuXint->tblUsuarios_usuId.' ');
								// print_r($usuXint->tblIntereses_intId);
							 // 	//echo ($int[0][$i]).'Hola';
							 // 	print('<br>');
								$usuXint->save();
								//print_r($usuXint->tblIntereses_intId);
							 	// echo ($int[0][$i]).'Hola';
							 	// print('<br>');
							}
							//exit();
							// exit();
						}
						Yii::app()->user->setFlash('Registro', 'Registro exitoso!');
						$this->redirect(array('site/index'));
					}
				}
			}
			else
			{
				Yii::app()->user->setFlash('Error', 'Ya existe ese nombre de usuario!');
			}
		}
		$this->render('create', array('model'=>$model,));
	}

	public function validateUser($nombre, $mail= false){
		if($mail){
			$model = Usuarios::model()->findAll('usuEmail = ?', array($nombre));
			if(count($model) > 0)
				return true;
			else
				return false;	
		}else{			
			$model = Usuarios::model()->findAll('usuUsuario = ?', array($nombre));
			if(count($model) > 0)
				return true;
			else
				return false;			
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id, $verificar=false)
	{
		if($verificar==true) return $this->verificarCheckbox($id);
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuarios']))
		{
			if(isset($_FILES) and $_FILES['Usuarios']['error']['usuImagen'] == 0)
			{
				$uf = CUploadedFile::getInstance($model, 'usuImagen');
				$model->attributes=$_POST['Usuarios'];

				$nombre = $model->usuUsuario;
				$Urlimage = "/images/".$nombre;
				$uf->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$nombre);
				Yii::app()->user->SetFlash('imagen', '/images/'.$uf->getName());
			}
			else
			{
				$model->attributes=$_POST['Usuarios'];
				$Urlimage=$model->usuImagen;
				Yii::app()->user->setFlash('imagen', $model->usuImagen);
			}

			if(isset($_POST['Intereses']))
			{
				$int=array();
				foreach ($_POST['Intereses'] as $key => $value)
				{
					array_push($int, $value);

				}

				$usuXint2 = UsuariosXTblIntereses::model()->deleteAll('tblUsuarios_usuId=?', array($id));
				
				for ($i=0; $i < count($int[0]); $i++)
				{
					$usuXint=new UsuariosXTblIntereses;
					//$usuXint->attributes=$_POST['UsuariosXTblIntereses'];
					$usuXint->usuIntId=0;
					$usuXint->tblUsuarios_usuId=Yii::app()->user->userID;
					$usuXint->tblIntereses_intId=$int[0][$i];
					$usuXint->save();
				}
			}
			$model->attributes=$_POST['Usuarios'];
			$model->usuImagen=$Urlimage;
			if($model->save())
				$this->redirect(array('view','id'=>$model->usuId));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$usuXint = UsuariosXTblIntereses::model()->deleteAll('tblUsuarios_usuId=?', array($id));
			// print_r('<pre>');
			// print_r($usuXint);
			// exit;
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		#Yii::import('application.extensions.phpmailer.*');
		// Yii::import("ext.Mailer.*");
		// $mail = new phpmailer(); 
		// $mail->SetFrom("jstiven10@misena.edu.co", "Yo");
		// $mail->Subject = "Asunto";
		// $mail->MsgHTML("<<h1>Hola Correo</h1>");
		// $mail->AddAddress("jstiven10@misena.edu.co", "Mi");
		// $mail->send();

		$dataProvider=new CActiveDataProvider('Usuarios');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usuarios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuarios']))
			$model->attributes=$_GET['Usuarios'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Usuarios::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuarios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionUserAjax()
	{
		if(isset($_POST['user']))
		{
			$user = Usuarios::model()->find('usuUsuario = ?', array($_POST['user']));
			if(count($user) > 0)
			{
				echo "Y";
			}
			else
			{
				echo "N";
			}
		}
		else
		{
			echo "ajaxError not post user comming";
		}
	}
}
