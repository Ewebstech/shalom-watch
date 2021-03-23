<?php //error_reporting(0);
include("../database.php");
session_start();
ob_start();
if(isset($_POST['additem'])){
	
			date_default_timezone_set('Africa/Lagos');
		
			$id = uniqid().rand().time();
			//$itemname = mysql_real_escape_string($_POST['itemname']);
			$subcategory = mysql_real_escape_string($_POST['subcategory']);
			$maincategory = mysql_real_escape_string($_POST['maincategory']);
			$ptype = mysql_real_escape_string($_POST['ptype']);
			$remark = mysql_real_escape_string($_POST['remark']);
			if($ptype == "ads" or $ptype == "gallery"){ $status = "show"; } else { $status = "hide"; }
			$time = time();
			$microtime = microtime();
			
			for($key = 0; $key < count($_FILES['images']['name']); $key++)
			{
			
				$remove = array("/","~","!","+","=","#","'","$","&","Ǿ");
				$filename = str_replace($remove,'',$_FILES['images']['name'][$key]);
				$type = end(explode('.', strtolower($_FILES['images']['name'][$key])));
				$explode = explode($type, $filename);
				
				$newfilename = trim($explode[0],'.');

			$ps = mysql_query("select * from items where `itemname`='$newfilename'");
			$check = mysql_fetch_assoc($ps);
				
			if(empty($check)){
			
			$file_upload="true";
			//$file_up_size=$_FILES['file_up']['size'][$key];
			if ($_FILES['images']['size'][$key] > 250000000000){$msg=$msg."Your uploaded file size is more than 2500KB
	 		so please reduce the file size and then upload.<BR>";
			$file_upload="false";}
			$time++;
			
			$allowtype = array("jpg","png","gif","jpeg");
			if (in_array($type, $allowtype))
			{
				$add = "../itemimages/$id/$filename";
			}
			else
			{$msg=$msg."BUT NO PICTURE WAS UPLOADED<BR>";
			$file_upload="false";}
			if($file_upload=="true")
			{
				echo $maincategory;
				if(!is_dir("../itemimages")){  mkdir("../itemimages"); }
				if(!is_dir("../itemimages/$id")){ mkdir("../itemimages/$id"); }
				if(move_uploaded_file ($_FILES['images']['tmp_name'][$key], $add)){
									  
				//include("imageresize.php");
				//store_uploaded_image($add,300,300);	
		
		$code = rand();	  
		$itemcode = "AYP-$code";
		//create table
		$id++;
		$sql= "	Create Table if not exists `items` (
				id VARCHAR (100),
				itemname VARCHAR(100),
				itemcode VARCHAR (50),
				itemtype VARCHAR(100),
				itemremark TEXT,
				status VARCHAR(10),
				imageurl VARCHAR (100),
				time VARCHAR (20),
				PRIMARY KEY ( id )
				)";
		// Execute query
		if (!mysql_query($sql,$conn)) {
					echo "Error creating table: " . mysql_error($conn);
		}
		else
		{
			
		if(! $conn )
		{
		  die('Could not connect:' . mysql_error());
		}
	
	$newadd = substr($add,3);
	$sql = "INSERT INTO `items` (id, itemname, itemcode, itemtype, itemremark, status, imageurl, time) values ( '$id', '$newfilename', '$itemcode', '$ptype', '$remark', '$status', '$newadd', '$time')";
		
			$retval = mysql_query($sql);
			$time++;			
			$k = $key + 1;
			// do your coding here to give a thanks message or any other thing.
			echo "<span class='data-reg'>Successfully Uploaded <br/> <img src='$add'>";
			echo $key;
			
			header("location: add.php?success=$id&upload=$k");
			
		}
			
				
				}
				else {echo "Failed to upload file Contact Site admin to fix the problem";}
			}
			else{echo $msg;}
		}
		else{
			
			header("location: add.php?success=$id&upload=$k");
		}
  }//for loop ends
  }
	
  if(isset($_POST['addproduct'])){
	
		date_default_timezone_set('Africa/Lagos');
		
			$id = uniqid().rand().time();
			//$itemname = mysql_real_escape_string($_POST['itemname']);
			$productname = mysql_real_escape_string($_POST['productname']);
			$qty = mysql_real_escape_string($_POST['qty']);
			$ptype = mysql_real_escape_string($_POST['ptype']);
			$remark = mysql_real_escape_string($_POST['remark']);
			$price = mysql_real_escape_string($_POST['price']);
			$uploaderemail = $_SESSION["useremail"];
			$uploaderphone = $_SESSION["userphone"];
			$time = time();
			$microtime = microtime();
			for($key = 0; $key < count($_FILES['images']['name']); $key++)
			{
				$remove = array("/","~","!","+","=","#","'","$","&","Ǿ");
				$filename = str_replace($remove,'',$_FILES['images']['name'][$key]);
				$type = end(explode('.', strtolower($_FILES['images']['name'][$key])));
				$explode = explode($type, $filename);
				
				$newfilename = trim($explode[0],'.');
			
			$file_upload="true";
			//$file_up_size=$_FILES['file_up']['size'][$key];
			if ($_FILES['images']['size'][$key] > 250000000){$msg=$msg."Your uploaded file size is more than 2500KB
	 		so please reduce the file size and then upload.<BR>";
			$file_upload="false";}
			$time++;
			
			$allowtype = array("jpg","png","gif","jpeg");
			if (in_array($type, $allowtype))
			{
				$add = "../productimages/$id/$filename";
			}
			else
			{$msg=$msg."BUT NO PICTURE WAS UPLOADED<BR>";
			$file_upload="false";}
			if($file_upload=="true")
			{
				echo $maincategory;
				if(!is_dir("../productimages")){  mkdir("../productimages"); }
				if(!is_dir("../productimages/$id")){ mkdir("../productimages/$id"); }
				if(move_uploaded_file ($_FILES['images']['tmp_name'][$key], $add)){
									  
				//include("imageresize.php");
				//store_uploaded_image($add,300,300);	
		
		$code = rand();	  
		
		//create table
		$id++;
		$sql= "	Create Table if not exists `products` (
				id VARCHAR (100),
				productname VARCHAR(100),
				description TEXT,
				type VARCHAR(100),
				imageurl VARCHAR (100),
				uploaderemail VARCHAR (100),
				uploaderphone VARCHAR (100),
				price VARCHAR (50),
				qty VARCHAR (20),
				time VARCHAR (20),
				PRIMARY KEY ( id )
				)";
		// Execute query
		if (!mysql_query($sql,$conn)) {
					echo "Error creating table: " . mysql_error($conn);
		}
		else
		{
			
		if(! $conn )
		{
		  die('Could not connect:' . mysql_error());
		}
	
	$newadd = substr($add,3);
	$sql = "INSERT INTO `products` (id, productname, description, type, imageurl, uploaderemail, uploaderphone, price, qty, time) values ( '$id', '$productname', '$remark', '$ptype', '$newadd', '$uploaderemail', '$uploaderphone', '$price', '$qty', '$time')";
		
			$retval = mysql_query($sql);
			$time++;			
			$k = $key + 1;
			// do your coding here to give a thanks message or any other thing.
			echo "<span class='data-reg'>Successfully Uploaded <br/> <img src='$add'>";
			echo $key;
			
			header("location: addproducts.php?success=$id&upload=$k");
			
		}
			
				
				}
				else {echo "Failed to upload file Contact Site admin to fix the problem";}
			}
			else{echo $msg;}
		
  }
  }
  			
?>