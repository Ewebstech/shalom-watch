<!doctype html>
<html>
<head>
<title>Cancel Published Posts</title>
</head>
<body>
<?php 
	
	if(isset($_REQUEST["cid"]))
	{
		error_reporting(0);
		include("../database.php");
		$req = $_REQUEST["cid"];
		$res = mysql_query("SELECT * FROM info where `id`='$req'");
		$file = mysql_fetch_assoc($res); 
		$tobedeleted = $file['link'];
		if($tobedeleted ){
			$deleted = unlink("../".$tobedeleted.".php");
		
		if($deleted){$delquery = "DELETE from info where `id`='$req'";
		$do = mysql_query($delquery);
		if($do){
			
			header("location: deleteposts.php?deletesuccess");
			}
		
		}
		else
		{
		echo "The file you are trying to delete has already been deleted...But we will still delete the post from your blog. Please hold for 20 seconds...";
	
		$delquery = "DELETE from info where `id`='$req'";
		$do = mysql_query($delquery);
		if($do){
			header("location: deleteposts.php?deletesuccess");
			}
		
		}
			
		}
	}

?>
		
</body>
</html>