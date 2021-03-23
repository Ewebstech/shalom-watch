<!--sidebar start-->
<?php $pagename = basename($_SERVER['PHP_SELF']); ?>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li <?php echo($pagename == "index.php") ? "class='active'" : ""; ?>>
                      <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  <?php if($row["status"] == "admin") { ?>
				  <li class="sub-menu" >
                      <a href="javascript:;" class="">
                          <i class="fa fa-cogs"></i>
                          <span>Admin Settings</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul <?php echo($pagename == "registerstaff.php" or $pagename == "removestaff.php") ? "class='active sub'" : "sub"; ?>  >
                          <li><a class="" href="registerstaff.php"><i class="fa fa-user"></i> Register Staff</a></li>                          
                          <li><a class="" href="removestaff.php"><i class="fa fa-times"></i> Remove Staff</a></li>
                      </ul>
                  </li>   
				  <?php } ?>
				<?php if($row["status"] != "dealer") { ?>
				<li <?php echo($pagename == "") ? "class='active'" : ""; ?>>
                      <a class="" target="_blank" href="https://server154.web-hosting.com:2096/">
                          <i class="fa fa-envelope-o"></i>
                          <span>Webmail</span>
                      </a>
                </li>
				<li <?php echo($pagename == "add.php") ? "class='active'" : ""; ?>>
                      <a class="" href="add.php">
                          <i class="fa fa-plus"></i>
                          <span>Add Item</span>
                      </a>
                </li>
				
				<li <?php echo($pagename == "viewgallery.php") ? "class='active'" : ""; ?>>
                      <a class="" href="viewgallery.php">
                          <i class="fa fa-picture-o"></i>
                          <span>Gallery Uploads</span>
                      </a>
                </li>
			
				<?php } ?>
				
				
				<li <?php echo($pagename == "allmembers.php") ? "class='active'" : ""; ?>>
                      <a class="" href="allmembers.php">
                          <i class="fa fa-user"></i>
                          <span>View Members</span>
                      </a>
                </li>
                 
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->