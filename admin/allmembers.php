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

    <title>View Members</title>

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
		$delete = mysql_query("delete from members where id='$_REQUEST[deleteitem]'");
		if($delete) { 
		
		header("location: viewproducts.php"); 
		
		}
	}
	
	
	?>
      <!--main content start-->
      <section id="main-content">
	  <?php $viewcopier = mysql_query("select * from members order by time desc"); ?>
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-files-o"></i> View Members</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="icon_document_alt"></i>View Members</li>
						<?php if(!isset($_REQUEST["view"])) { ?>
						<li><span class="label label-success"><b><?php echo $r = mysql_num_rows($viewcopier); ?></b> Members are currently registered</span>
						<?php } ?>
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
          
              <div class="row">
                  
				
				  <?php if(isset($_REQUEST["view"])) { 
					$get = mysql_query("select * from members where id='$_REQUEST[view]' order by time desc"); 
					$success = mysql_fetch_assoc($get);
				  ?>
						 <section class="panel">
						
                          <div class="panel-body">
						  <center>
                            <table class="table" style="width: 400px;">
                            <tbody>
                              <tr>
							  <td style="font-weight: bold;">Name:</td>
							  <td><?php $name = "$success[firstname] $success[lastname]"; echo ucwords(strtolower($name)); ?></td>
								  
                              </tr>
                              <tr>
							  <td style="font-weight: bold;">Username</td>
                              <td><?php echo ucwords(strtolower($success["username"])); ?></td> 
							 </tr>
                              <tr>
							  <td style="font-weight: bold;">Password</td>
                              <td><?php echo ucwords(strtolower($success["password"])); ?></td> 
							 </tr>
							  <tr>
							  <td style="font-weight: bold;">Address</td>
                              <td><?php echo ucwords(strtolower($success["address"])); ?></td> 
							 </tr>
							  <tr>
							  <td style="font-weight: bold;">State of Origin</td>
                              <td><?php echo ucwords(strtolower($success["state"])); ?></td> 
							 </tr>
							  <tr>
							  <td style="font-weight: bold;">Account Number</td>
                              <td><?php echo ucwords(strtolower($success["accountnumber"])); ?></td> 
							 </tr>
							  <tr>
							  <td style="font-weight: bold;">Account Name</td>
                              <td><?php echo ucwords(strtolower($success["accountname"])); ?></td> 
							 </tr>
							  <tr>
							  <td style="font-weight: bold;">Bank</td>
                              <td><?php echo ucwords(strtolower($success["bankname"])); ?></td> 
							 </tr>
							  <tr>
							  <td style="font-weight: bold;">Next-of-Kin</td>
                              <td><?php echo ucwords(strtolower($success["nextofkin"])); ?></td> 
							 </tr>
							  <tr>
							  <td style="font-weight: bold;">Relationship</td>
                              <td><?php echo ucwords(strtolower($success["relationship"])); ?></td> 
							 </tr>
							  <tr>
							  <td style="font-weight: bold;">Time Registered:</td>
							  <td><?php echo $time = date('jS \of F, Y h:i:A', $success["time"]); ?></td> 
							  </tr>
                              </tbody>
                          </table>
						  </center>
                                                      
                          </div>
					
                      </section>
				  <?php } if(!isset($_REQUEST["view"])) { ?>
				<div class="col-md-12">	  
				 <table id="example1" class="table table-striped table-advance table-bordered table-hover" style='text-align: center;'>
                           <tbody>
                              <tr>
								<th style='text-align: center;'>Personal ID</th>
                                 <th style='text-align: center;'>Name</th>
                                 <th style='text-align: center;'>Mobile Number</th>
                                 <th style='text-align: center;'>Email Address</th>
								 <th style='text-align: center;'>Status</th>
								 <th style='text-align: center;'>Upliner ID</th>
								 <th style='text-align: center;'>Gender</th>
								 <th style='text-align: center;'>Account Balance</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
							 <?php while($view = mysql_fetch_assoc($viewcopier)) { 
								$t = strtotime(date("Y",$view["dateofbirth"]));
								
							 ?>
                              <tr>
								<td><?php echo ucwords(strtolower($view["uplineid"])); ?></td>
                                <td><?php $name = "$view[firstname] $view[lastname]"; echo ucwords(strtolower($name)); ?></td>
								<td><?php echo ucwords(strtolower($view["mobile"])); ?></td>
								<td><?php echo ucwords(strtolower($view["email"])); ?></td>
								<td><?php echo ucwords(strtolower($view["status"])); ?></td>
								<td><?php echo ucwords(strtolower($view["uplinernumber"])); ?></td>
								<td><?php echo ucwords(strtolower($view["gender"])); ?></td>
								<td><?php echo"N ".number_format($view['balance']).""; ?></td>
								
                                <td>
                                  <div class="btn-group" >
                                      <a class="btn btn-primary" href="allmembers.php?view=<?php echo"$view[id]"; ?>" data-toggle='tooltip' title='View Product'> View <i class="icon_plus_alt2"></i></a><br /><br />
                                      
                                      <a class="btn btn-danger" href="allmembers.php?delete=<?php echo"$view[id]"; ?>" data-toggle='tooltip' title='Delete Item'>Delete <i class="icon_close_alt2"></i></a>
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
