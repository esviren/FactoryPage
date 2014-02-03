<?php

class AccionesController extends Controller
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
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return Yii::app()->Rules->getRules("Acciones");
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($controllerId)
	{
		$model=new Acciones;
		//$model->accControladorId = $controllerId;
		$control = new Controladores;
		$control->conId = $controllerId;

		if(isset($_POST['Acciones']))
		{
			$model->attributes=$_POST['Acciones'];
			$model->accControladorId = $controllerId;

			if($this->validateAction($model->accNombre, $controllerId))
			{
				Yii::app()->user->setFlash('act', 'Ya existe');
			}
			else
			{
				if($model->save())
				{
					Yii::app()->user->setFlash('act', 'No existe');
				}
			}
		}
		$criterio = new CDbCriteria();
		$criterio->compare('accControladorId', $controllerId);

		$dataProvider = new CActiveDataProvider('acciones', array('criteria'=>$criterio));
		$this->render('create', array('model'=>$model, 'dataProvider'=>$dataProvider,));
	}

	public function validateAction($nombre, $controlador)
	{
		$model = Acciones::model()->findAll('accNombre = ? and accControladorId = ?', array($nombre, $controlador));

		if(count($model) > 0)
			return true;
		else
			return false;
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$accion = $model->accNombre;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Acciones']))
		{
			$model->attributes=$_POST['Acciones'];
			if($model->save())
			{
				$permiso = Permisos::model()->find('perControllerId = ? and perAccion = ?',
							 array($model->accControladorId, $accion));
				$permiso->perAccion = $model->accNombre;
				$permiso->save();
				$this->redirect(array('create','controllerId'=>$model->accControladorId));
			}

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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		/*if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));*/

		$permisos = Permisos::model()->findAll('perControllerId = ? and perAccion = ?',
					array($model->accControladorId, $model->accNombre));
		// borramos permiso por permiso
		if(count($permisos) > 0){				
			foreach ($permisos as $key => $value) {
				$permisoAct = Permisos::model()->find('perId = ?', array($value->perId));
				$permisoAct->delete();
			}
		}

		$this->loadModel($id)->delete();
		Yii::app()->user->setFlash('actionDeleted', 'Accion elimindada correctamente.');
		$this->redirect(array('controladores/create'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Acciones');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Acciones('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Acciones']))
			$model->attributes=$_GET['Acciones'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Acciones the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Acciones::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Acciones $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='acciones-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
