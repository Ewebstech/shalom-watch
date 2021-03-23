<?php 
if(isset($_REQUEST["joseph"]))
{
	$name = "OSUNBOR, Joseph Ubiazede";
	
}
elseif(isset($_REQUEST["anthonia"]))
{
	$name = "Mrs. Osunbor Anthonia Etuneonuwa";
	
}
elseif(isset($_REQUEST["oyeyemi"])){
	$name = "Oyeyemi Akibu";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $name; ?></title>
    <!-- web-fonts -->
    <?php include("header.php"); ?>


<section class="single-page-title">
    <div class="container text-center">
        <h2>Team Profile</h2>
    </div>
</section>
<!-- .page-title -->
<?php if(isset($_REQUEST["anthonia"])) {  ?>
<section class="about-text ptb-100">
    <section class="section-title">
        <div class="container text-center">
            <h2><?php echo $name; ?></h2>
            <span class="bordered-icon" style='color: #000;'><i class="fa fa-circle-thin"></i></span>
        </div>
    </section>

    <div class="container">
        <div class="row">
			<div class="col-md-3">
			<figure class="thumbnail imageblink">
                    <a href="teaminfo.php?anthonia"><img src="img/img2.jpg" class="img-responsive" alt="Image"></a>
                    <figcaption class="caption text-center">
                         <h3>Mrs. Osunbor Anthonia Etuneonuwa<br>
                            <small style='color: #000;' >Executive Director, Administration</small>
                        </h3>
                    </figcaption>
                </figure>
			</div>
            <div class="col-md-9">
				
				<p style='color: #000;'><b>Mrs. Anthonia E. Osunbor</b> holds both first and second degree certificates from the notable University of Lagos. She served in the Lagos State Teaching Services Commission as a teacher and administrator for many years.</p>
				
				<p style='color: #000;'>She has attended many courses/seminars on management and administration and has earned to herself various levels of diploma and certificates in different fields.</p>
			
            </div>
            
        </div>
    </div>

</section>
<?php } ?>
<?php if(isset($_REQUEST["joseph"])) {  ?>
<section class="about-text ptb-100">
    <section class="section-title">
        <div class="container text-center">
            <h2><?php echo $name; ?></h2>
            <span class="bordered-icon" style='color: #000;'><i class="fa fa-circle-thin"></i></span>
        </div>
    </section>

    <div class="container">
        <div class="row">
			<div class="col-md-3">
		<figure class="thumbnail imageblink">
                    <a href="teaminfo.php?joseph"><img src="img/img1.jpg" class="img-responsive" alt="Image"></a>
                    <figcaption class="caption text-center">
                        <h3>OSUNBOR, Joseph Ubiazede<br>
                            <small style='color: #000;' >Executive Chairman & Managing Director</small>
                        </h3>
                    </figcaption>
                </figure>
			</div>
            <div class="col-md-9">
				
				<p style='color: #000;'><b>Joseph Osunbor</b>,  graduated in Accounting  from Olabisi Onabanjo University, Ago Iwoye, Ogun State.  He is also a member of Chartered Institute of Bankers of Nigeria, and worked in the bank for over 15 years where he acquired a lot of management skill.
				</p>
				
				<p style='color: #000;'>The managing Director is a man equipped with unparalleled understanding of the guard business and manpower development.  His understanding of guards/security business and foresight led to the establishment of this company. </p>
				
				<p style='color: #000;'> He served in the United States Embassy, Lagos as Security Supervisor where he received training from the American Detachment (American Army) on various areas of security skill.</p>
			
            </div>
            
        </div>
    </div>

</section>
<?php } ?>
<?php if(isset($_REQUEST["oyeyemi"])) {  ?>
<section class="about-text ptb-100">
    <section class="section-title">
        <div class="container text-center">
            <h2><?php echo $name; ?></h2>
            <span class="bordered-icon" style='color: #000;'><i class="fa fa-circle-thin"></i></span>
        </div>
    </section>

    <div class="container">
        <div class="row">
			<div class="col-md-3">
				<figure class="thumbnail imageblink">
                    <a href="teaminfo.php?oyeyemi"><img src="img/empty.jpg" class="img-responsive" alt="Image"></a>
                    <figcaption class="caption text-center">
                        <h3>Oyeyemi Akibu<br>
                            <small style='color: #000;' >Executive Director, Operations</small>
                        </h3>
                    </figcaption>
                </figure>
			</div>
            <div class="col-md-9">
				
				<p style='color: #000;'>Oyeyemi Akibu (Executive Director, Operations) is a security and safety management and general administration practitioner with over a decade cognate experience garnered in a financial institution and a tertiary institution in Nigeria. He holds a B.Sc. and M.Sc. degrees in Psychology (Second Class Upper, Ibadan, 1991) and Industrial Psychology (Unilag, 1997) respectively. </p>
				<p style='color: #000;'>He is currently employed as the Executive Director of Operations in Shalom Watch Alert Limited. He has served as the Chief Security Officer of Caleb University, a Private University located at Imota, Lagos, Nigeria where he performed the functions of General Security Administration and Operations Management. He was appointed as the General Secretary of Association of Heads of Security of Tertiary Institutions in Nigeria ASHOTI in June 2013. He is a facilitator in the Associations Conference/Workshop sessions.</p>
				<p style='color: #000;'>While in Skye Bank as Chief Security Officer, he was conferred with the Best Security Manager-Banking Award of International Institute of Professional Security in Abuja in May 2010. He is a past Chairman (year 2010) of the Chattered Institute of Bankers’ (CIBN) Committee of Heads of Security of Banks and Other Financial Institutions in Nigeria having served as the Vice Chairman for 2 consecutive sessions (2008 and 2009). He is a Supernumerary Police Officer of the Nigerian Police Force. he was in 2008-2009, a member of the Inspector General of Police Special Committee of Banks and Cash In Transit Operators in Nigeria where policies relating to safety of Financial Institutions in Nigeria are formulated and fine-tuned before adoption.</p>
				<p style='color: #000;'>While in Skye Bank Plc, he pioneered and coordinated a number of Process Improvement and Automation initiatives for his department (General Services).  In 2009, he successfully pioneered the production of Security Handbook and Driver’s Handbook. He also worked with relevant departments to design and implement process flow documentation for General Services Department of Skye Bank. </p>
				<p style='color: #000;'>He raised a group of security guards which later became subordinates out of which one rose to succeed him as Chief Security Officer when he left the bank in December, 2010. He coordinated the security operations of the bank with over 200 locations/branches spread across Nigeria. While in Skye Bank, he won the Best Cost Saving Idea Generation competition organized by Customer Experience Management Unit in November 2010.</p>
				<p style='color: #000;'>He has a KPMG Certification in Training Presentation. He was a faculty head of the Skye Bank Management School where he delivered lectures on security/safety awareness issues to graduate trainees (fresh intakes) and experienced staff. He participated in the planning of, and facilitated in, the CIBN Annual National Workshops on Security for Banks CSOs in Nigeria from year 2007 till 2010 when I left Skye Bank PLC. </p>
				<p style='color: #000;'>While in Caleb University, aside the implementation of security and safety improvement and transformation strategy, he serve on the following committees: the Students Welfare Committee; the Students Disciplinary Committee; the Ceremonies and Awards (Convocation) Committee; and Examinations Malpractices Investigations Panel. He likes traveling, mentoring and motivating people for peak performance in life. He also like to generate game changing ideas and implement processes that remove bottlenecks at work. He is an adaptive minded person who loves continuous learning.  
				</p>
				
			
            </div>
            
        </div>
    </div>

</section>
<?php } ?>
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