<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <?php
        require_once './headUI.php';
        ?>

        <title>Mateعrafsh?-Contact Us</title>
        <style>
            img{
                width: 100%;
                height: auto;
            }
            .page-heading{
                height: 550px;
            }
        </style>


    </head>

    <body>

        <!-- Navigation -->
        <?php
        require_once './navUI.php';
        ?>

        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('img/HS.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="page-heading">
                            <img src="img/logo5.png">
                            <hr class="small">
                            <span class="subheading">Have questions? We have answers.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    
                    <form method="POST" id="replace" action="contact.php">
                        <p>Want to get in touch with us? Fill out the form below to send us a message and we will try to get back to you within 24 hours!</p>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Name" id="name" name="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Email Address" id="email" name="email" required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Phone Number</label>
                            <input type="tel" class="form-control" placeholder="Phone Number" id="phone" name="phone" required data-validation-required-message="Please enter your phone number.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Message</label>
                            <textarea rows="3" class="form-control" placeholder="Message" id="message" name="msg" required data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row form-group col-xs-12">
                        <button type="submit" class="btn btn-default">Send</button>
                            
                        </div>
                    
                </form>
                    </div>
                </div>
            </div>
        
        <?php
        if (isset($_POST['email'])) {
        $name = filter_input(INPUT_POST, 'name');
        $phone = filter_input(INPUT_POST, 'phone');
        $email = filter_input(INPUT_POST, 'email');
        $message = filter_input(INPUT_POST, 'msg');
        require_once './MailService.php';
        $m = new MailService();
        $emailContent = "Name : " . $name . '<br/>' .
                "Phone:" . $phone . '<br/>' .
                "Email:" . $email . '<br/>'.
                "Message:".$message.'<br>';

        $m->sendMail("A Contacting Message", $emailContent, "matearafsh@gmail.com");
        echo "<script> document.getElementById('replace').innerHTML = 'Your Message Was Sent To The Admin, Please Wait For Our Reply!' </script>";
        }
        ?>
        <hr>

        <?php
        require_once './footer.php';
        ?>

        <!-- jQuery -->
        <script src="library/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="library/bootstrap/js/bootstrap.min.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>

        <!-- Theme JavaScript -->
        <script src="js/clean-blog.min.js"></script>

    </body>
</html>
