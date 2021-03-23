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

    <title>Manage Blog Posts Here</title>

	<?php include("header.html"); ?>

    <?php include("sidebar.php"); ?>
<?php  
		$query = "SELECT * FROM info order by id desc";
		$result = mysql_query($query);
		
		if(!$result){echo"Could not download data";}
	
		date_default_timezone_set('Africa/Lagos');
				 
?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-files-o"></i> Manage Blog Posts</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="icon_document_alt"></i>Manage Blog Posts</li>
						
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
          
              <div class="row">
                  <div class="col-md-12">
				 			<section>
							<div class="panel">
							 <?php if(isset($_REQUEST["deletesuccess"])){ ?>
							<div class='alert alert-success' style='text-align: center;'>Post Successfully Deleted <button class='close' data-dismiss='alert'>X</button></div>
							<?php } ?>
							 <br clear="all" />
							</div>
						</section>
				 
				  
				
                <section class="panel">
                          <header class="panel-heading">
                             Add New Items
                          </header>
                          <div class="panel-body">
			
                <div class="row">
					   
				<div class="col-md-12">
			
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
										    <th>S/N</th>
											<th>Image</th>
                                            <th>Topic</th>
                                            <th>Text</th>
                                            <th>Date Posted</th>
											<th>Action</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                    
									<?php 
									$i = 1;
									while($info = mysql_fetch_array($result)) { ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo"$i"; ?></td>
											 <td><?php echo"<img src='../$info[imageurl]' height='100' />"; ?></td>
                                            <td><?php echo"$info[topic]"; ?></td>
                                            <td><?php $txt = substr($info['text'], 0,100); echo "$txt..."; ?></td>
                                            <td><?php
											
											 echo $date = date('jS \of F, Y, h:i a', $info['id']); 
                            
                                       ?>
											</td>
											<td><?php echo" <a href='cancel.php?cid=$info[id]' class='label label-danger'>Delete</a> <br><br> <a href='postinfo.php?edit=$info[id]' class='label label-info'>Edit <i class='fa fa-text-width'></i></a>"; ?></td>
										</tr>
									<?php $i++; } ?>
                                                                                                                                                   
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
		  
		 </div> <!---/panel -->
                          
						  </div>
                      </section>
				 
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->

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
