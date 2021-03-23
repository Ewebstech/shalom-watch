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
	<link href="datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

    <title>View Ads</title>

	<?php include("header.html"); ?>

    <?php include("sidebar.php"); ?>
	
	<?php 
		
	if(isset($_REQUEST["deleteitem"]))
	{
		
		
		function delete_files($dir) {
		  if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
			  if ($object != "." && $object != "..") {
				if (filetype($dir."/".$object) == "dir") 
				   delete_files($dir."/".$object); 
				else unlink   ($dir."/".$object);
			  }
			}
			reset($objects);
			rmdir($dir);
		  }
		 }
		 delete_files("../itemimages/$_REQUEST[deleteitem]");
		$delete = mysql_query("delete from items where id='$_REQUEST[deleteitem]'");
		if($delete) { 
		
		header("location: viewads.php"); 
		
		}
	}
	if(isset($_REQUEST["show"]))
	{
		$show = mysql_query("update items set status='show' where itemtype='ads' and id='$_REQUEST[show]'");
		if($show) { 		
		header("location: viewads.php"); 
		}
	}
	if(isset($_REQUEST["hide"]))
	{
		$hide = mysql_query("update items set status='hide' where itemtype='ads' and id='$_REQUEST[hide]'");
		if($hide) { 		
		header("location: viewads.php"); 
		}
	}
	
	?>
      <!--main content start-->
      <section id="main-content">
	  <?php $viewcopier = mysql_query("select * from items where itemtype='ads' order by time desc"); ?>
	  <?php $viewcopiernum = mysql_query("select * from items where itemtype='ads' order by time desc"); ?>
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-files-o"></i> View Ads</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="icon_document_alt"></i>View Ads</li>
						<?php if(!isset($_REQUEST["viewproduct"])) { ?>
						<li><span class="label label-success"><b><?php echo $r = mysql_num_rows($viewcopiernum); ?></b> Ads are Currently Active</span>
						<?php } ?>
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
          
              <div class="row">
                  
				
				  <?php if(isset($_REQUEST["viewproduct"])) { 
					$get = mysql_query("select * from items where id='$_REQUEST[viewproduct]' order by time desc"); 
					$success = mysql_fetch_assoc($get);
				  ?>
						<section>
							<div class="panel" style="text-align: center;">
							 
								<div class="panel-body">
									<?php echo"<img src='../$success[imageurl]' style='text-align: center; max-width: 400px; margin: auto;' />"; ?>
								</div>
							</div>
						</section>
				         <section class="panel">
						
                          <div class="panel-body">
						  <center>
                            <table class="table" style="width: 400px;">
                            <tbody>
                              <tr>
							  <td style="font-weight: bold;">Status:</td>
							  <td><?php echo($success['status'] == "show") ? $status = "Showing" : $status = "Hidden"; ?></td>
							  </tr>
                              <tr>
							  <td style="font-weight: bold;">Type:</td>
                              <td><?php echo ucwords(strtolower($success["itemtype"])); ?></td> 
							  </tr>
                              
							  <tr>
							  <td style="font-weight: bold;">Time Added:</td>
							  <td><?php echo $time = date('jS \of F, Y h:i:A', $success["time"]); ?></td> 
							  </tr>
                              </tbody>
                          </table>
						  </center>
                                                      
                          </div>
					
                      </section>
				  <?php } if(!isset($_REQUEST["viewproduct"])) { ?>
				<div class="col-md-12">	  
				 <table id="example1" class="table table-striped table-advance table-bordered table-hover" style='text-align: center;'>
							<thead >
                              <tr >
								<th style='text-align: center;'>Image</th>
                                 <th style='text-align: center;'>File Name</th>
								 <th style='text-align: center;'>Link</th>
                                 <th style='text-align: center;'>Type</th>
                                 <th style='text-align: center;'>AD-CODE</th>
								 <th style='text-align: center;'>Date Added</th>
                                 <th style='text-align: center;'><i class="icon_cogs"></i> Action</th>
                              </tr>
							</thead>
							   <tbody>
							 <?php while($view = mysql_fetch_assoc($viewcopier)) { ?>
                              <tr>
								 <td><p><?php if($view["status"] == "recommended") { echo"<span class='label label-primary'>Recommended</span>"; } ?></p>
								 <?php echo"<img src='../$view[imageurl]' height='100' width='100' />"; ?></td>
                                 <td><?php echo ucwords(strtolower($view["itemname"])); ?></td>
								 <td><?php echo ucwords(strtolower($view["itemremark"])); ?></td>
								<td><?php echo ucwords(strtolower($view["itemtype"])); ?></td>
								
								<td><?php echo ucwords(strtolower($view["itemcode"])); ?></td>
								<td><?php echo $time = date('jS \of F, Y h:i:A', $view["time"]); ?></td>
                                <td>
                                  <div class="btn-group" >
										<?php if($view["status"] == "hide"){ ?>
									   <a class="btn btn-primary" href="viewads.php?show=<?php echo"$view[id]"; ?>" data-toggle='tooltip' title='Show Ad'> Display <i class="icon_plus_alt2"></i></a><br /><br>
										<?php } else { ?>
										 <a class="btn btn-primary" href="viewads.php?hide=<?php echo"$view[id]"; ?>" data-toggle='tooltip' title='Hide Ad'> Hide <i class="icon_plus_alt2"></i></a><br /><br>
										<?php } ?>
                                      <a class="btn btn-primary" href="viewads.php?viewproduct=<?php echo"$view[id]"; ?>" data-toggle='tooltip' title='View Product'> View <i class="icon_plus_alt2"></i></a><br /><br>
                                      
                                      <a class="btn btn-danger" href="viewads.php?deleteitem=<?php echo"$view[id]"; ?>" data-toggle='tooltip' title='Delete Item'>Delete <i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                              </tr>
							 <?php } ?>
                                                    
                             </tbody>
                        </table>
                          
					</div>
				<?php } ?>
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
<script src="datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>	
 <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>

  </body>
</html>
