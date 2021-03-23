<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">
	<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
	<script>
tinymce.init({
    selector: "textarea#trump",
	forced_root_block :"false",
    force_p_newlines : "false",
	force_br_newlines : "true",
	theme: "modern",
    width: 450,
    height: 300,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link  | print preview fullpage | forecolor backcolor emoticons | searchreplace tabfocus insertdatetime paste charmap template", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
 
 tinymce.init({
    selector: "textarea#trum",
	forced_root_block :"false",
    force_p_newlines : "false",
	force_br_newlines : "true",
	theme: "modern",
    width: 700,
    height: 200,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | print preview  fullpage | forecolor backcolor emoticons | searchreplace tabfocus insertdatetime paste charmap template", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
</script>
    <title>Post to Blog</title>

	<?php include("header.html"); ?>

    <?php include("sidebar.php"); ?>
<?php error_reporting(0);

if(isset($_REQUEST["edit"])){
	$q = mysql_query("select * from info where id='$_REQUEST[edit]'");
	$i = mysql_fetch_assoc($q);
	
	$_SESSION["d"] = $i["id"];
	
}
?>
 <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-files-o"></i> Add Products</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="icon_document_alt"></i>Add Products</li>
						
					</ol>
				</div>
			</div>
 <section class="panel">
  <header class="panel-heading">
	 <?php if(!isset($_POST['submit'])){ ?>
     <h2>Post Information to your Blog</h2> 
     <?php } ?>  
  </header>
  <div class="panel-body">
 
 <?php if(!isset($_POST['submit'])){ ?>
 <div class="col-md-10">
<form ENCTYPE="multipart/form-data" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method='post' accept-charset='UTF-8'>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Blog Topic: </label>
<input type='text' value='<?php echo$i["topic"]; ?>' name='topic' class="form-control" value='' size='90'/></td>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Blog Text: </label>
<textarea id="trump" class="form-control" name='text'><?php echo$i["text"]; ?></textarea></td>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Upload Picture if any: </label><input type='file' class="form-control" name='image' value='select file'></td>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<input type='submit' name='submit' class="btn btn-danger" value='PUBLISH NOW' />
</div>
</div>
</div>
</form>
</div>
<?php }

if(isset($_POST['submit']))
{
	
	if($_POST['topic'] != "" && $_POST['text'] !="")
	{	//save data to database
		include("../temp/database.php");
	
		
		
		//create table
						
		$sql= "	Create Table if not exists info (id VARCHAR(50),
				topic VARCHAR( 253 ) NOT NULL,
				link VARCHAR( 253 ),
				text TEXT,
				imageurl VARCHAR(100),
				date VARCHAR (200),
				PRIMARY KEY ( id )
				)";
		// Execute query
		if (!mysql_query($sql,$conn)) {
					echo "Error creating table: " . mysql_error($conn);
		}
		else
		{
		// escaping variables for security
			date_default_timezone_set('GMT');
			$id = time();
			$text = mysql_real_escape_string($_POST['text'], $conn);
			$topic = ucwords(mysql_real_escape_string($_POST['topic'], $conn));
			$topic2 = preg_replace('/[^a-z]+/i', '', $topic);
			$current_date = date('jS \of F, Y');
			
		$tobedeleted = $topic2;
		$deleted = unlink("../".$tobedeleted.".php");
		$delquery = mysql_query("DELETE from info where `topic`='$topic' and link='$topic2'");
					
			if(!$conn)
			{
			  die('Could not connect:' . mysql_error());
			}
			
			$file_upload="true";
			$file_up_size=$_FILES['file_up'][size];
			if ($_FILES['image']['size']>25000000){$msg=$msg."Your uploaded file size is more than 2500KB
	 		so please reduce the file size and then upload.<BR>";
			$file_upload="false";}
			$type = end(explode('.', strtolower($_FILES[image][name])));
			$allowtype = array("jpg","png","gif","jpeg");
			if (in_array($type, $allowtype))
			{
				$add = "upload/$id/$id".".$type";
			}
			else
			{$msg=$msg."BUT NO PICTURE WAS UPLOADED<BR>";
			$file_upload="false";}
			if($file_upload=="true")
			{
				if(!is_dir("upload")){  mkdir("upload"); }
				if(!is_dir("upload/$id")){ mkdir("upload/$id"); }
				if(move_uploaded_file ($_FILES[image][tmp_name], $add)){
					echo "<span class='data-reg'><br/> <center><img src='$add' style='text-align: center' height='auto' width='500'></center>";
				// do your coding here to give a thanks message or any other thing.
				}
				else{echo "Failed to upload file Contact Site admin to fix the problem";}
			}
			else{echo $msg;}
			$time = $id;
			for($key = 0;$key < count($_FILES['images']['name']); $key++)
			{
				
				$file_upload="true";
				if ($_FILES[image][size][$key]>2500000){$msg=$msg."Your uploaded file size is more than 2500KB
 				so please reduce the file size and then upload.<BR>";
				$file_upload="false";}
				$time++;
				$type = end(explode('.', strtolower($_FILES[images][name][$key])));
				$allowtype = array("jpg","png","gif","jpeg","mp4","3gp","mp3","pdf");
				if (in_array($type, $allowtype))
				{
					$add = "upload/$id/$time".".$type";
					echo $add; echo "<br> <br> ";
				}
				else
				{
					echo $type;
					$msg=$msg."Your uploaded file must be of JPG,png or GIF. Other file types are not allowed<BR>";
					$file_upload="false";
				}
				if($file_upload=="true")
				{
					if(move_uploaded_file ($_FILES[images][tmp_name][$key], $add)){
						echo "<span class='data-reg'>Picture Uploaded --> $add!--> \n <br> <br>";
					// do your coding here to give a thanks message or any other thing.
					}
					else{echo "err?error  Failed to upload file Contact Site admin to fix the problem";}
				}
				else{echo $msg;}
		
			}
		
			$sql = "INSERT INTO `info` (id, topic, link, text, imageurl, date) values ('$id', '$topic', '$topic2', '$text', 'admin/$add', '$current_date')";
		
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
			  die("<span class='data-reg'>Failed to insert into Database $topic");
			}
			echo "<br clear='all'><br><span class='btn btn-success form-control'>Post has been sent to the blog successfully!!<br>";
				
			if(! $conn )
			{
			  die('Could not connect:' . mysql_error());
			}
	
		$head = "";
		$body = "
<?php error_reporting(0);
        include(\"database.php\");
        \$query = \"SELECT * FROM info where id='$id'\";
		\$result = mysql_query(\$query); 
		if(!\$result){
			(\"Could not download data\");
		}
		\$blog = mysql_fetch_array(\$result);
		
		\$query = \"SELECT * FROM comments where `id`='$id' ORDER BY time DESC\";
		\$result1 = mysql_query(\$query); 
		\$result2 = mysql_query(\$query); 
		\$result3 = mysql_query(\$query);
		\$comments2 = mysql_fetch_array(\$result3);
		\$com_row = mysql_num_rows(\$result1);
	     	
?>
<!DOCTYPE html>
<html lang=\"en-US\">
  <head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
    <title>Blog | <?php echo \$blog[\"topic\"]; ?></title>
    <?php include(\"header.html\"); ?>
	<main role=\"main\">
	<section class=\"section background-dark text-center padding-top height-pages\">
        <div class=\"line\">
          <div class=\"s-12 m-10 l-8 center\">
		   <h2 class=\"headline text-thin\" style=\"padding-top: 20px; font-size: 28px !important;\"><?php echo \$blog[\"topic\"]; ?></h2>
          </div>
        </div>  
      </section>
	 <section class=\"background-white padding-top\" >
        <div class=\"line\">
		<!-- Left Side -->
    <div class=\"s-12 m-12 l-12\">
	<div class=\"container\">
      <div class=\"row\">
	   <div class=\"s-12 m-12 l-9\">
          <div class=\"blog-item\">
            <div class=\"row\">
              <div class=\"s-12 l-2 padding\">
                <div class=\"date-wrap\">
                  <span class=\"date\">
                   <?php echo date(\"d\", \$blog[\"id\"]); ?>
                  </span>
                  <span class=\"month\">
                   <?php echo date(\"F\", \$blog[\"id\"]); ?>
                  </span>
				  <span class=\"date\">
                    <?php echo date(\"Y\", \$blog[\"id\"]); ?>
                  </span>
                </div>

              </div>
              <div class=\"s-12 l-9 padding\">


                <div class=\"blog-img gs\">
                  <?php echo\"<img src='\$blog[imageurl]' alt='image'/>\"; ?>
                </div>

              </div>
            </div>
            <div class=\"row\">
              <div class=\"s-3 m-3 l-2 text-right padding\">
                <div class=\"author\">
                  By:
                  <a href=\"#\">
                    Ayprime Services
                  </a>
                </div>
                <ul class=\"list-unstyled\">
                  <li>
                    <a href=\"javascript:;\">
                      <em>
                        <?php echo date(\"jS\", \$blog[\"id\"]); ?>
                      </em>
                    </a>
                  </li>
                  <li>
                    <a href=\"javascript:;\">
                      <em>
                       <?php echo date(\"\of F\", \$blog[\"id\"]); ?>
                      </em>
                    </a>
                  </li>
                  <li>
                    <a href=\"javascript:;\">
                      <em>
                        <?php echo date(\"Y\", \$blog[\"id\"]); ?>
                      </em>
                    </a>
                  </li>
                  <li>
                    <a href=\"javascript:;\">
                      <em>
                        <?php echo date(\"h:i a\", \$blog[\"id\"]); ?>
                      </em>
                    </a>
                  </li>
                </ul>
                <div class=\"st-view\">
                  <ul class=\"list-unstyled\">
                   
                    <li>
                      <a href=\"javascript:;\">
                        <b><?php echo \$com_row; ?></b> people commented on this post
                      </a>
                    </li>

                  </ul>
                </div>
              </div>
              <div class=\"s-9 m-9 l-9 padding\">
			   <a href=\"<?php echo \"\$blog[link].php\"; ?>\">
                <h1 class=\"someheading\">         
                    <?php echo \"\$blog[topic]\"; ?>
               </h1>
				</a>
                <div class=\"textstyle\">
				<p>
				<?php echo \"\$blog[text]\"; ?>
                </p>
                </div>
				<hr>
				<br clear=\"all\" />
				</div>
				<div class=\"s-12 m-12 l-9 padding\">
                <div class=\"media\">
                  <h2>
                   See All Comments on this Post
                  </h2>
                
                </div>
				<?php
			\$msg = '';
			if(\$_REQUEST[\"err\"])
			{
				switch(\$_REQUEST[\"err\"])
				{
					case \"success\":
					{ \$msg = \"<div class='alert alert-success center'>Your comment was posted successfully! <button class='close' data-dismiss='alert' style='float: right'>X</button></div>\";
					break; 
					}
					case \"error\":
					{ \$msg = \"<div class='success-upload'>Comment Not Posted!</div>\";
					break; 
					}
				}
			}
			echo \$msg;
?>	
				<hr>
				<?php 
				
				while(\$comments = mysql_fetch_array(\$result1)) {
				
				?>
                <div class=\"media\" >
                  <a class=\"pull-left\" style='padding-right: 7px;' href=\"javascript:;\">
                    
					<?php
						\$imagesDir = 'avatars/';

						\$images = glob(\$imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

						\$randomImage = \$images[array_rand(\$images)];

						echo \"<img src='\$randomImage'  class='media-object' style='border: 1px solid rgba(0,0,0,0.2); border-radius: 5px; padding: 4px; display: inline-block;  max-width: 50px; max-height: 50px; ' />\";
						
						?>
                  </a>
                  <div class=\"media-body\">
                    <h4 class=\"media-heading\" style=\"font-size: 12px; font-weight: bold;\">
                      <?php \$nameupper = ucwords(strtolower(\$comments['name'])); echo \"\$nameupper\"; ?>
                      <span>
                        |
                      </span>
                      <span>
                        <?php echo date(\"d-M-y, h:i a\", \$comments[\"id\"]); ?>
                      </span>
                    </h4>
                    <p style=\"font-size: 12px;\">
                      <?php echo \"\$comments[comments]\"; ?>
                    </p>
                   
                  </div>
                </div>
				<hr>
				<?php } ?>
                <div class=\"post-comment\">
				 <div class=\"s-12 m-12 l-9\">
                  <h1 class=\"someheading\">
                    Post Comments on this Topic
                  </h1>
				  </div>
                   <form  class=\"customform\" name=\"contact-form\" method=\"post\" action=\"admin/cprocess.php\">
                                <div class=\"row\">
								<div class=\"line\">
									<div class=\"margin\">
                                    <div class=\"s-12 m-12 l-8\">
                                        <div class=\"form-group\">
                                            <label>Your Name *</label>
                                            <input type=\"text\" name=\"name\" style='color: #000; border-color: rgba(0,0,0,0.3);' class=\"form-control\" required=\"required\">
                                        </div>
                                        <div class=\"form-group\">
                                            <label>Your Email *</label>
                                            <input type=\"email\" name=\"email\" style='color: #000; border-color: rgba(0,0,0,0.3);'  class=\"form-control\" required=\"required\">
                                        </div>
                                   <input type='hidden' name='id' value='$id'/>  
									<input type='hidden' name='topic' value='Happy Ending For Us All' /> 								   
                                    </div>
									</div>
									</div>
								</div>
								<div class=\"line\">
									<div class=\"margin\">
                                    <div class=\"s-12 m-12 l-8\">                        
                                        <div class=\"form-group\">
                                            <label>Your Comment *</label>
                                            <textarea name=\"comment\" id=\"message\" style='color: #000; border-color: rgba(0,0,0,0.3);' required=\"required\" class=\"form-control\" ></textarea>
                                        </div>  
										<div class=\"form-group\">
										  <div class=\"g-recaptcha\" data-sitekey=\"6LetMykTAAAAAH89LMA7Gx8psz5To9pRYaOVGNbN\"></div>
										  </div>
										 <br clear='all' />	
                                        <div class=\"form-group\">
                                            <button type=\"submit\" name=\"comment_submit\" class=\"btn btn-primary btn-lg\" required=\"required\">Publish</button>
                                        </div>
                                    </div>
								</div>
								</div>
                </div>
                </form> 
                </div>

              </div>
            </div>
          </div>

        </div>
	
    <?php include(\"right-side.php\"); ?> 
		
	
	</div>
	
	<!------------------------------------------------------------------------------------------------------------------------>
   

   </div><!--/.blog-->
     </div> <!-- copied ended here -->
		</div>
	
		</section>
</main>
	<?php include(\"footer.html\"); ?>
    <script type=\"text/javascript\" src=\"js/responsee.js\"></script>
    <script type=\"text/javascript\" src=\"owl-carousel/owl.carousel.js\"></script>
    <script type=\"text/javascript\" src=\"js/template-scripts.js\"></script>   
   </body>
</html>
";
				$foot = "<?php include(\"footer.php\"); ?>";
					
					$file = "../".$topic2.".php";
					
					if(!file_exists($file))
					{
						$fh = fopen($file,"w");
						fwrite($fh,"$head\n");
						fwrite($fh,"$body\n");
						fwrite($fh,"$foot\n");
						fclose($fh);
					}
				
		
		
		
		}
		
	}
}



?>
 </div>
 </div>
 </section>
 </div>
 </section>
 </section>
     <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery validate js -->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>

    <!-- custom form validation script for this page-->
    <script src="js/form-validation-script.js"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>    


  </body>
</html>