<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Contact Us</title>
    <!-- web-fonts -->
    <?php include("header.php");  ?>


<section class="single-page-title">
    <div class="container text-center">
        <h2>Contact Us</h2>
    </div>
</section>
<!-- .page-title -->
<section class="contact-form ptb-100">
    <div class="container text-center">
	
        <h2>We are available 24/7 to respond to your questions/requests.<br>Send Us a Message and we will reply you ASAP.</h2>
		
	<?php error_reporting(0);
        $msg = '';
			if($_REQUEST["cid"])
			{
				switch($_REQUEST["cid"])
				{
					
					case "msg":
					{ $msg = "<div class='label label-success' style='padding: 10px;'>Your Message has been sent Successfully</div><br clear='all' />";
					break; 
					}
					case "empty":
					{ $msg = "<div class='label label-danger' style='margin-bottom: 5px;'>Some Fields were left empty, Please fill them and try again.</div>";
					break; 
					}
					
					
				}
			}
			echo $msg;
		?>
		
	<br>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method="post" action="contactprocess.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group user-name">
                                <label for="nameFive-first" class="sr-only">Name</label>
                                <input type="text" class="form-control" required="required" name="name" placeholder="Your Name">
                            </div>

                            <div class="form-group user-email">
                                <label for="emailFive" class="sr-only">Email</label>
                                <input type="email" class="form-control" required="required" name="email" placeholder="Email Address">
                            </div>


                            <div class="form-group user-phone">
                                <label for="websiteOne" class="sr-only">Phone</label>
                                <input type="text" class="form-control" required="required" name="mobile" placeholder="Phone Number">
                            </div>
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="form-group user-message">
                                <label for="messageOne" class="sr-only">Message</label>
                                <textarea class="form-control" required="required" name="message" placeholder="Write your Message"></textarea>
                            </div>
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row-->
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div><!-- /.col-md-8 -->
        </div>

    </div>
</section>
<!-- .contact-form-->

<section class="map-section">
 <div class="container text-center">
<h3>Head Office</h3>
<address>
Suite 203 Right Wing, Rotadet Plaza, Opposite Desholly Hotel, Along Ijede Road, Gbaga Bus Stop, Boge- Ikorodu, Lagos, Lagos State, Nigeria.
</address>
    <div>
	<iframe style='border-radius: 50%' src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3963.170818344664!2d3.4820380142438534!3d6.625693395208801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sng!4v1475708450086" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	</div>
</section>
<br />
<!-- .about-text-->

<!-- .skills -->

<!-- /.client-logo -->


<?php include("footer.php"); ?>
<!-- Script -->
<script src="js/jquery-2.1.4.min.js"></script>
<script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/mobile-menu.js"></script>
<script src="js/flexSlider/jquery.flexslider-min.js"></script>
<script src="js/scripts.js"></script>


</body>
</html>