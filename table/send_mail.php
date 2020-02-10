<?php
//send_mail.php

if(isset($_POST['email_data']))
{
	require 'class/class.phpmailer.php';
	$output = '';
	foreach($_POST['email_data'] as $row)
	{
		$mail = new PHPMailer;
		$mail->IsSMTP();								//Sets Mailer to send message using SMTP
		$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail->Port = '465';								//Sets the default SMTP server port
		$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->Username = 'foundingfathers2018@gmail.com';					//Sets SMTP username
		$mail->Password = 'ffathers2019';					//Sets SMTP password
		$mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
		$mail->From = 'foundingfathers2018@gmail.com';			//Sets the From email address for the message
		$mail->FromName = 'Founding Fathers';					//Sets the From name of the message
		$mail->AddAddress($row["email"], $row["name"]);	//Adds a "To" address
		$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
		$mail->IsHTML(true);							//Sets message type to HTML
		$mail->Subject = 'EmpowerU: Your Application'; //Sets the Subject of the com_message_pump()
		//An HTML or plain text message body
		$mail->Body = '
		<p>Good day,</p>
		<p>Thank you for applying with us! Your application has been received</p>
		<p>We just received your application and one of our team member will contact you within 24 hours.</p>
		<p>Note: This is an auto generated email.</p>
		<p>If you have any concerns regarding with  your application.</p>
		<p>Contact us through info@empower.com.ph</p> 
		';

		$mail->AltBody = '';

		$result = $mail->Send();						//Send an Email. Return true on success or false on error
		echo 'Success';
	}
}

?>