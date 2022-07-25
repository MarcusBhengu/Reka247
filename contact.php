<?php
include('header.php');
include('connect.php');

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO Ticket(ticket_id, ticket_name, ticket_email, ticket_phone, ticket_subject, ticket_message) VALUES (NULL,'$name','$email','$phone','$subject','$message');";
    mysqli_query($conn,$sql);
    echo "<script>alert(\"Message Sent Successfuly\")</script>";
    echo "<script>window.location = 'contact.php'</script>";



}



?>

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Contact us</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact us 2</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div id="map" class="mb-5">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3588.3129323351127!2d28.18911641458443!3d-25.92494778356294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e956fb06c7aba43%3A0xe7198ac03292fb0a!2sCo-work%20at%20Midstream!5e0!3m2!1sen!2sza!4v1649893933883!5m2!1sen!2sza" width="1300" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div><!-- End #map -->
                <div class="container">
                	<div class="row">
                		<div class="col-md-4">
                			<div class="contact-box text-center">
        						<h3>Office</h3>

        						<address>No 26, Co-Work@Midstream,<br> Midlands Office Park West, <br>Mount Quray Road, Midstream<br> Midstream Estates, 1692 </address>
        					</div><!-- End .contact-box -->
                		</div><!-- End .col-md-4 -->

                		<div class="col-md-4">
                			<div class="contact-box text-center">
        						<h3>Start a Conversation</h3>

        						<div><a href="mailto:#">info@reka247.co.za</a></div>
        						<div><a href="tel:#">+27 10-003-1005</a><br>or <br> <a href="tel:#">+27 72-727-6922</a></div>
        					</div><!-- End .contact-box -->
                		</div><!-- End .col-md-4 -->

                		<div class="col-md-4">
                			<div class="contact-box text-center">
        						<h3>Social</h3>

        						<div class="social-icons social-icons-color justify-content-center">
			    					<a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
			    					<a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
			    					<a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
			    					<a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
			    					<a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
			    				</div><!-- End .soial-icons -->
        					</div><!-- End .contact-box -->
                		</div><!-- End .col-md-4 -->
                	</div><!-- End .row -->

                	<hr class="mt-3 mb-5 mt-md-1">
                	<div class="touch-container row justify-content-center">
                		<div class="col-md-9 col-lg-7">
                			<div class="text-center">
                			<h2 class="title mb-1">Get In Touch</h2><!-- End .title mb-2 -->
                			<p class="lead text-primary">
                				We collaborate with ambitious brands and people; we'd love to build something great together.
                			</p><!-- End .lead text-primary -->
                			</div><!-- End .text-center -->

                			<form action="contact.php" method="post"class="contact-form mb-2">
                				<div class="row">
                					<div class="col-sm-4">
                                        <label for="cname" class="sr-only">Name</label>
                						<input type="text" name="name" class="form-control" id="cname" placeholder="Name *" required>
                					</div><!-- End .col-sm-4 -->

                					<div class="col-sm-4">
                                        <label for="cemail" class="sr-only">Name</label>
                						<input type="email" name="email" class="form-control" id="cemail" placeholder="Email *" required>
                					</div><!-- End .col-sm-4 -->

                					<div class="col-sm-4">
                                        <label for="cphone" class="sr-only">Phone</label>
                						<input type="tel" name="phone" class="form-control" id="cphone" placeholder="Phone" required>
                					</div><!-- End .col-sm-4 -->
                				</div><!-- End .row -->

                                <label for="csubject" class="sr-only">Subject</label>
        						<input type="text"  name="subject" class="form-control" id="csubject" placeholder="Subject" required>

                                <label for="cmessage" class="sr-only">Message</label>
                				<textarea class="form-control" name="message" cols="30" rows="4" id="cmessage" required placeholder="Message *"></textarea>
								
								<div class="text-center">
	                				<button type="submit" name="send" class="btn btn-outline-primary-2 btn-minwidth-sm">
	                					<span>SUBMIT</span>
	            						<i class="icon-long-arrow-right"></i>
	                				</button>
                				</div><!-- End .text-center -->
                			</form><!-- End .contact-form -->
                		</div><!-- End .col-md-9 col-lg-7 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

<?php
include('footer.php');
?>