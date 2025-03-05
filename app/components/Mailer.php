<?php

class Mailer extends CApplicationComponent
{
	
	
	public function sendMail( $msg, $emails, $subject)
	{
	
		//initialize mail
		$mail = new YiiMailer('system', array('message' => $msg, 'name' => 'The Technical University of Kenya Mailer', 'description' => 'Mailer form'));
		
		//format message		
		$msg = "<div style='font-family:Trebuchet MS;color:#00AFFD;font-size:13px'>".$msg."</div>";
		
		//set mail body with the formatted message
		$mail->Body = $msg;
		
		//we are using SMTP
		$mail->IsSMTP();

		//SMTP settings
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->CharSet="UTF-8";
		$mail->SMTPSecure = 'tls';
		
		$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
												   // 1 = errors and messages
												   // 2 = messages only										   
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->Host       = "smtp.gmail.com"; // sets the SMTP server
		$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
		$mail->Username   = "tu.kwebmaster@gmail.com"; // SMTP account username
		$mail->Password   = "liege0gmail";        // SMTP account password

		$mail->render();
		
		//set properties as usually with PHPMailer
		$mail->From = "tu.kwebmaster@gmail.com";
		$mail->FromName = "The Technical University of Kenya Mailer";
		$mail->Subject = $subject;

		for ($i=0;$i<count($emails);$i++){
			
			$mail->AddAddress($emails[$i]);
		}
		
	
		//send
		if ($mail->Send()) {
			$mail->ClearAddresses();
			return true;
		
		} else {
			return $mail->ErrorInfo;
		
		}
		
		$this->refresh();
	
	}
}