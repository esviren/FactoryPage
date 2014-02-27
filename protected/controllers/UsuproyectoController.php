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
					$proy->proCantidadUsuarios = $this->ContarUsuarios($idP);
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

	/* 
    * JDiaz, 19/02/2014, 
    * NOTA:este metodo es utilizado para eliminar un usuario registrado en un proyecto,
    * Parametros:  actionDelete('ID del usuario a eliminar','ID del proyecto')
    */
	public function actionDelete($id, $idProyecto){
        
            $this->loadModel($id)->delete();
            $proy = Proyectos::model()->findByPk($idProyecto);
            $proy->proCantidadUsuarios = $this->ContarUsuarios($idProyecto);
			$proy->save();
             if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('proyectos/usuariosxProyectos','idProyec'=>$idProyecto));

    }

    public function ContarUsuarios($idP)
	{
    	$contador = 0;
    	$UsuXPro=UsuariosXTblProyectos::model()->findAll('usuProProyectosId=?',array($idP));
		foreach ($UsuXPro as $value) {
				$contador++;
		}
		return $contador;
    }

    public function loadModel($id){

        $model=UsuariosXTblProyectos::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'El usuario por Proyecto no existe en la base de datos.');
        return $model;

    }


}
?>

