<?php
Yii::import('application.extensions.phpmailer.JPhpMailer');

class EnviarEmail
{
	public function enviar(array $de, array $para, $subject, $mensaje)
	{
		$mail = new JPhpMailer;
		$mail->IsSMTP();
		$mail->Host = 'localhost';
		$mail->SetFrom($de[0], $de[1]);
		$mail->Subject = $subject;
		$mail->MsgHTML($mensaje);
		$mail->AddAddress($para[0], $para[1]);
		$mail->send();
	}
}
?>