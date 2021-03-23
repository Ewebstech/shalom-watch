<?php //error_reporting(0);
	
	include("database.php");
    //$captcha=$_POST['g-recaptcha-response'];
	//$secretKey = "6LetMykTAAAAAPrFt6YxH3Fe8UQq-GxKOG2yCY0u";
	//$ip = $_SERVER['REMOTE_ADDR'];
      //  $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
	//$responseKeys = json_decode($response,true);
    //    if(intval($responseKeys["success"]) !== 1) {
    //      $from = $_SERVER["HTTP_REFERER"]; header("location: ".$from."?spamming");
    //    } else {
	if($_POST["name"] == "" or $_POST["email"] == "" or $_POST["mobile"] == "" or $_POST["message"] == "")
	{
		header("location: contact.php?cid=empty");
	}
	else{
		
	$name = @trim(stripslashes(mysql_real_escape_string($_POST['name']))); 
    $email = @trim(stripslashes(mysql_real_escape_string($_POST['email']))); 
    $mobile = @trim(stripslashes(mysql_real_escape_string($_POST['mobile']))); 
    $message = @trim(stripslashes(mysql_real_escape_string($_POST['message']))); 
	
	//$from = $_SERVER['HTTP_REFERER'];
	include("emails.php");
	$mail->addAddress($email, $name);     // Add a recipient
	//$mail->addAddress('ellen@example.com');               // Name is optional
	$mail->addReplyTo('info@shalomwatch-alert.com.ng', 'SHALOM WATCH-ALERT LTD');
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Thank you '.$name.' for contacting SHALOM WATCH-ALERT LTD';
	$mail->Body    = "<html>
			<body>	
			<table cellpadding='10' border='0' width='500'>
			<tr style='background-color: rgba(0,102,153,1);'>
			<td width='30%' colspan='2' align='center'>
			<img src='http://www.shalomwatch-alert.com.ng/images/security-services.jpg' width='100' height='100' />
			</td>
			<td width='70%' align='center'>
			<span style='color: #fff; font-size: 30px; text-align: center; font-family: Arial;'>SHALOM <BR> WATCH-ALERT LTD</span>
			</td>
			</tr>
			
			<tr>
			<td style='color: #fff; background-color: rgba(0,102,153,1)' colspan='3' align='center'>Thank you for Contacting US</td>
			</tr>
			<tr>
			<td style='color: #000; background-color: rgba(0,102,153,0.1)' colspan='3' align='left'>We have recieved your message and you will recieve a reply from our correspondents soonest.<br><br> Thanks for Choosing SHALOM WATCH-ALERT LTD. <br><br> We Trust you'll have a nice day!!
			</td>
			</tr>
			<tr>
			<td align='center' colspan='3'>
			<p style='color: red; font-size: 9px;'>&copy; Powered by <a href='www.ewebstechnologies.online'>Ewebstechnologies Inc.</a>;</p>
			</td>
			</tr>
			</table>
			</body>
			</html>	";
	//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'Message has been sent';
	}
	$mail->ClearAllRecipients( ); // clear all
	$ayprime = "Shalom Watch-Alert Limited";
	$mail->addAddress($adminemails[0], $ayprime);     // Add a recipient
	          // Name is optional
	$mail->addReplyTo($email, $name);
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = 'Hi '.$ayprime.', you were just contacted!';
	$mail->Body    = "<html>
			<body>				
			<table cellpadding='10' border='0' width='500'>
			<tr style='background-color: rgba(0,102,153,1);'>
			<td width='30%' colspan='2' align='center'>
			<img src='http://www.shalomwatch-alert.com.ng/images/security-services.jpg' width='100' height='100' />
			</td>
			<td width='70%' align='center'>
			<span style='color: #fff; font-size: 30px; text-align: center; font-family: Arial;'>SHALOM <BR> WATCH-ALERT LTD</span>
			</td>
			</tr>
			
			<tr>
			<td style='color: #fff; background-color: rgba(0,102,153,1)' colspan='3' align='center'>Here is the Sender's Contact Information</td>
			</tr>
			<tr>
			<td width='30%' colspan='2' style='color: #000; background-color: rgba(0,102,153,0.1)' align='center'>
			Name:
			</td>
			<td width='70%' style='color: #000; background-color: rgba(0,102,153,0.1)' align='center'>
			$name
			</td>
			</tr>
			<tr>
			<td width='30%' colspan='2' style='color: #000; background-color: rgba(0,102,153,0.1)' align='center'>
			Phone-Number:
			</td>
			<td width='70%' style='color: #000; background-color: rgba(0,102,153,0.1)' align='center'>
			$mobile
			</td>
			</tr>
			<tr>
			<td width='30%' colspan='2' style='color: #000; background-color: rgba(0,102,153,0.1)' align='center'>
			Email Address:
			</td>
			<td width='70%' style='color: #000; background-color: rgba(0,102,153,0.1)' align='center'>
			$email
			</td>
			</tr>
			<tr>
			<td style='color: #000; background-color: rgba(0,102,153,0.1)' colspan='3' align='left'>$message</td>
			</tr>
			<tr>
			<td style='color: #fff; background-color: rgba(0,102,153,1)' colspan='3' align='center'>Please Establish Contact Soon, Regards</td>
			</tr>
			<tr>
			<td align='center' colspan='3'>
			<p style='color: red; font-size: 10px;'>&copy; Powered by <a href='www.ewebstechnologies.online'>Ewebstechnologies Inc.</a>;</p>
			</td>
			</tr>
			</table>
		</body>
		</html>";
		if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
			$sql= "Create Table if not exists `contactinfo` (id VARCHAR(50),
				name VARCHAR (200) NOT NULL,
				phonenumber VARCHAR( 253 ) NOT NULL,
				email VARCHAR(250),
				message TEXT,
				status VARCHAR(30),
				PRIMARY KEY ( id )
				)";
		// Execute query
		if (!mysql_query($sql)) {
					echo "Error creating table: " . mysql_error();
		}
			$id = time();
			$sql2 = "INSERT INTO `contactinfo` (id, name, phonenumber, email, message, status) values ('$id', '$name', '$mobile', '$email', '$message', 'unread')";
		
			$retval = mysql_query($sql2);
			if(! $retval )
			{
			  die("<span class='data-reg'>Error!. Failed to insert to database");
			}
			else{
				header("location: contact.php?cid=msg");
			}
	}
	}
