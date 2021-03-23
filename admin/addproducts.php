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

    <title>Add New Products</title>

	<?php include("header.html"); ?>

    <?php include("sidebar.php"); ?>

      <!--main content start-->
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
              <!-- Form validations -->              
          
              <div class="row">
                  <div class="col-md-5">
				 
				  <?php if(isset($_REQUEST["success"])) { 
					
				  ?>
						<section>
							<div class="panel">
							 <p class="text-center panel-heading"><span class="btn btn-success" style="margin: 5px; ">(<?php echo $_REQUEST["upload"] ?>) Product Successfully Uploaded</span></p>
							 <center><a href="addproducts.php" class="btn btn-danger"><i class="fa fa-plus"></i> Add More</a> </center>
							 <br clear="all" />
							</div>
						</section>
				         
					   
					<?php } ?>
				  
				 <?php if(!isset($_REQUEST["success"])) { ?>
                <section class="panel">
                          <header class="panel-heading">
                             Add New Product
                          </header>
                          <div class="panel-body">
			
                <div class="row">
				<div class="col-md-9">
				<form action="process.php" method="post" class="form-group" ENCTYPE="multipart/form-data">
				
				<div class="form-group">
				<label>Product Name</label>
				<input type="text" name="productname" class="form-control" value="<?php $_POST["productname"]; ?>" placeholder="Product's Name" required/>
				</div>		
				<div class="form-group">
				<label>Price</label>
				<input type="number" name="price" class="form-control" value="<?php $_POST["remark"]; ?>" placeholder="Price" required/>
				</div>
				<div class="form-group">
				<label>Qty Available</label>
				<input type="number" name="qty" class="form-control" value="<?php $_POST["remark"]; ?>" placeholder="Product's Name" required/>
				</div>
				<div class="form-group">
				<label>Product Description</label>
				<textarea name="remark" class="form-control" value="<?php $_POST["remark"]; ?>" placeholder="Write captivating words about this product"></textarea>
				</div>				
				<div class="form-group">
				<label>Type</label>
				<select class="form-control" name="ptype">
				<option value="products">Products</option>
				</select>
				</div>
				<div class="form-group">
				<label>Upload Items</label>
				<input type='file' name='images[]' value='select file'>
				</div>
				<div class="form-group">
				<input type="submit" class="btn btn-primary" name="addproduct" value="Add Product" />
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
