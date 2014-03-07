<?php

class AspiranteController extends Controller
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
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return Yii::app()->Rules->getRules("Aspirante");
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
	public function actionCreate($idp)
	{
		


		$model=new Aspirante;
		$model_Proyectos=new Proyectos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Aspirante']))
		{
			$model->attributes=$_POST['Aspirante'];
			$model->aspProyectoId = $idp;
			$model->aspUsuarioId = Yii::app()->user->userID;

			if(!$this->validateAspirante(Yii::app()->user->userID, $idp)){

			if($model->save())
				Yii::app()->user->setFlash('registro', 'Postulacion exitosa');   
				$this->redirect(array('site/index'));
				
			}else{
				Yii::app()->user->setFlash('Advertencia', 'Usuario existente');
				$this->redirect(array('site/index'));
			}

		}
		

		$this->render('create',array(
			'model'=>$model,
			'idp'=>$idp,
			
		));
	}

	public function validateAspirante($id, $idp){
		
			$model = Aspirante::model()->find('aspUsuarioId=? and aspProyectoId=?',array($id, $idp));
			$model2 = UsuariosXTblProyectos::model()->find('usuProUsuarioId=? and usuProProyectosId=?',array($id, $idp));
			if(count($model) > 0 || count($model2) > 0)
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Aspirante']))
		{
			$model->attributes=$_POST['Aspirante'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->aspId));
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

		
		
			// we only allow deletion via POST request

			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		
		
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Aspirante');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Aspirante('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Aspirante']))
			$model->attributes=$_GET['Aspirante'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function listarProyecto()
	{
		//$proyecto = Proyectos::model()->
		//$rueda = TblRuedanegocios::model()->findByPk($id);
        //$encuesta = TblEncuesta::model()->find('enc_id = :a', array(':a'=>$rueda->enc_id));
        //$preguntas = TblPregunta::model()->findAll('enc_codigo = :a', array(':a'=>$encuesta->enc_id));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Aspirante::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='aspirante-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	
}
