<?php
class RecuperarContrasena extends CFormModel
{
	public $usuUsuario;
	public $usuEmail;
	
	public function rules()
	{
		return array(
			array(
				'usuUsuario, usuEmail',
				'required',
				'message' => 'El campo es requerido',
			),
			array(
				'usuUsuario',
				'match',
				'pattern' => '/^[a-z0-9áéíóúàèòùaeiouñ\_]+$/i',
				'message' => 'Verifique su usuario.',
			),
			array(
				'usuEmail',
				'email',
				'message' => 'Verifique su correo.',
			),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'usuUsuario' => 'Usuario',
			'usuEmail' => 'Email'
		);
	}
}
?>