<?php
ob_start();
if(isset($_POST['comment_submit']))
{	
		$from = $_SERVER['HTTP_REFERER'];
		include("../database.php");
		if(!isset($_POST['g-recaptcha-response']))
		{
			header("location: ".$from."");
		}
		else{
		
		$captcha=$_POST['g-recaptcha-response'];
	$secretKey = "6LetMykTAAAAAPrFt6YxH3Fe8UQq-GxKOG2yCY0u";
	$ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
	$responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          $from = $_SERVER["HTTP_REFERER"]; header("location: ".$from."?spamming");
        } else {
		//create table
		$id = mysql_real_escape_string ($_POST['id']);
		$topic = mysql_real_escape_string ($_POST['topic']);
		$result = mysql_query("select * from info where `topic`='$topic'");
		if(!$result){header("location:$from");}
		
		$sql= "	Create Table if not exists `comments` (id VARCHAR(50),
				comments TEXT NOT NULL,
				topic VARCHAR( 253 ) NOT NULL,
				name VARCHAR (100) NOT NULL,
				email VARCHAR (100) NOT NULL,
				time VARCHAR (50) NOT NULL,
				PRIMARY KEY ( time )
				)";
		// Execute query
		if (!mysql_query($sql,$conn)) {
					echo "Error creating table: " . mysql_error($conn);
		}
		else
		{
					// escape variables for security
			
			$comment = mysql_real_escape_string($_POST['comment'], $conn);
			$name = mysql_real_escape_string($_POST['name'], $conn);
			$email = mysql_real_escape_string($_POST['email'], $conn);
		    $time = time();
			
		
			$sql = "INSERT INTO `comments` (id, comments, topic, name, email, time) values ( '$id', '$comment', '$topic', '$name', '$email', '$time')";
		
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
			  die("<span class='data-reg'>Error!. Failed to insert to database");
			}
			$_SESSION["ssid"] = $id;
			header("location:".$from."?err=success");
			
		}
	}	
}
}