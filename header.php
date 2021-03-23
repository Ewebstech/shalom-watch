  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href="bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- off-canvas -->
    <link href="css/mobile-menu.css" rel="stylesheet">
    <!-- font-awesome -->
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
   
    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="main-wrapper">
<!-- Page Preloader -->
<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>

<div class="uc-mobile-menu-pusher">

<div class="content-wrapper">
<nav class="navbar m-menu navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="images/security-services.jpg"><img src="images/security-services.jpg" style="max-height: 70px; margin-top: -10px; border-radius: 10px;" alt=""></a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="#navbar-collapse-1">

            <ul class="nav-cta hidden-xs" style="background-color: rgba(0,0,0,0.4); padding: 10px; border-radius: 13px;">
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i
                        class="fa fa-search"></i></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="head-search">
                                <form role="form">
                                    <!-- Input Group -->
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Type Something">
			                                <span class="input-group-btn">
			                                  <button type="submit" class="btn btn-primary">Search</button>
			                                </span>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
			<?php $pagename = basename($_SERVER['PHP_SELF']); ?>
            <ul class="nav navbar-nav navbar-right main-nav"  style="background-color: rgba(0,0,0,0.4); padding: 8px; border-radius: 13px;">
                <li <?php echo($pagename == "index.php") ? "class='active'" : ""; ?>><a href="index.php">Home</a></li>
                <li <?php echo($pagename == "about.php") ? "class='active'" : ""; ?>><a href="about.php">About Us</a></li>
                  <li class="dropdown m-menu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Services
                    <span><i class="fa fa-angle-down"></i></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="m-menu-content">
                                <ul class="col-sm-3">
                                    <li class="dropdown-header">Security Technologies</li>
                                    <li><a href="#">Metal Detectors</a></li>
                                    <li><a href="#">Security Alarms</a></li>
                                    
                                </ul>
                                <ul class="col-sm-3">
                                    <li class="dropdown-header">Training</li>
									<li><a href="#">Corporate Training</a></li>
									<li><a href="#">Training of Dogs</a></li>
									
                                </ul>
                                <ul class="col-sm-3">
                                    <li class="dropdown-header">Guarding</li>
                                     <li><a href="#">Security Escorts</a></li>
                                    <li><a href="#">Man Guarding</a></li>
                                    
                                </ul>
                                <ul class="col-sm-3">
                                    <li class="dropdown-header">Consultancy</li>
                                    <li><a href="#">Security Consultancy</a></li>
                                    <li><a href="#">Reliable Guard Force</a></li>
                                    <li><a href="#">Crowd and Traffic Control</a></li>
                                  
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
				<li <?php echo($pagename == "team.php") ? "class='active'" : ""; ?>><a href="team.php">Our Team</a></li>
				<li <?php echo($pagename == "gallery.php") ? "class='active'" : ""; ?>><a href="gallery.php">Gallery</a></li>
                <li <?php echo($pagename == "contact.php") ? "class='active'" : ""; ?>><a href="contact.php">Contact Us</a></li>
                
                
            </ul>

        </div>
        <!-- .navbar-collapse -->
    </div>
    <!-- .container -->
</nav>
<?php include("database.php"); ?>