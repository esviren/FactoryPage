<?php /**
* 
*/
class UsuEventosController extends Controller
{
	
	function actionIngresar($idU, $idE)
	{
		# code...
		
		$model = new UsuariosXTblEventos;
		//$modeloEventos = new Eventos;
					
		$model->tblUsuarios_usuId = $idU;
		$model->tblEventos_eveId = $idE;
		if ($model->save()) {
			# code...
			
			$this->redirect(Yii::app()->createUrl('eventos/index'));
			//$model->render('index',array('model'=>$modeloEventos));
		}
		
	}
} 