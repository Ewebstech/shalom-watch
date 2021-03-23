<?php		
        
        $dbhost = 'localhost';
		$dbuser = 'yxtzskqp_watch';
		$dbpass = 'Watchalert247';
		
		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		if(! $conn )
		{
		  die('Could not connect:' . mysql_error());
		}
		$database = "yxtzskqp_watchalert";
		mysql_select_db("$database");
?>