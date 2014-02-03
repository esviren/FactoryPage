<?php 
class UsuproyectoController extends Controller
{
	//public $layout='//layouts/column2';

	public function actionAceptar($idU, $idP, $Ida)
	{
			$model=new UsuariosXTblProyectos;
			$apirar = new Aspirante;
			
			if(isset($_POST['UsuariosXTblProyectos']))
			{

				$model->attributes=$_POST['UsuariosXTblProyectos'];
				$model->usuProUsuarioId = $idU;
				$model->usuProProyectosId = $idP;
				if($model->save()){

					$proy = Proyectos::model()->findByPk($idP);
					$proy->proCantidadUsuarios = $proy->proCantidadUsuarios + 1;
					$proy->save();
					//Yii::app()->user->setFlash('registro', 'Postulacion exitosa');   
					$this->redirect(array('aspirante/delete','id'=>$Ida));
					}
					//$this->loadModel($id)->delete();
			}
			

				
			//$proy = Proyectos::model()->findbyPk($idP);
			$this->render('aceptar',array(
			'model'=>$model,
			//'idp'=>$idp,
			
		));
	}
	public function actionActualizar()
	{

	}
}
?>

