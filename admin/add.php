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

    <title>Add New Items</title>

	<?php include("header.html"); ?>

    <?php include("sidebar.php"); ?>

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-files-o"></i> Add New Items</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="icon_document_alt"></i>Add Gallery Images | Add Ads</li>
						
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
          
              <div class="row">
                  <div class="col-md-5">
				 
				  <?php if(isset($_REQUEST["success"])) { 
					
				  ?>
						<section>
							<div class="panel">
							 <p class="text-center panel-heading"><span class="btn btn-success" style="margin: 5px; ">(<?php echo $_REQUEST["upload"] ?>) Items Successfully Uploaded</span></p>
							 <center><a href="add.php" class="btn btn-danger"><i class="fa fa-plus"></i> Add More</a> </center>
							 <br clear="all" />
							</div>
						</section>
				         
					   
					<?php } ?>
				  
				 <?php if(!isset($_REQUEST["success"])) { ?>
                <section class="panel">
                          <header class="panel-heading">
                             Add New Items
                          </header>
                          <div class="panel-body">
			
                <div class="row">
					   
				<div class="col-md-9">
				<form action="process.php" method="post" class="form-group" ENCTYPE="multipart/form-data">
				
							
				<div class="form-group">
				<label>Item Type</label>
				<select class="form-control" name="ptype">
				<option value="">Choose Product Type</option>
				<option value="ads">Ads</option>
				<option value="gallery">Gallery</option>
				</select>
				</div>
			
				<div class="form-group">
				<label>Item Description</label>
				<textarea name="remark" class="form-control" value="<?php $_POST["remark"]; ?>" placeholder="Description..."></textarea>
				</div>
				<div class="form-group">
				<label>Upload Items</label>
				<input type='file' multiple name='images[]' value='select file'>
				</div>
				
				<div class="form-group">
				<input type="submit" class="btn btn-primary" name="additem" value="Add Item" />
				</div>
			  </form>
		  </div>
		  </div>
		 </div> <!---/panel -->
                          
						  </div>
                      </section>
				 <?php } ?>
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
