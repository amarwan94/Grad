<?php
session_start();
if($_SESSION['userType'] != 'Admin') {
    header("Location: Admin-Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include_once './headUI.php';
        ?>
        <title>Adding-Admin</title>
        <link rel="shortcut icon" href="img/logo2.png" />
        <style>
            body{
                background-color: #F5F4EE;
            }
            img{
                width: 100%;
                height: auto;
            }
            .site-heading{
                height: 450px;
            }
        </style>
    </head>


    <body>
        <?php
        include_once './navUI.php'
        ?>

        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('img/tools1.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            Adding Admin

                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div id="middle" class="row">
                        <div class="jumbotron">
                            <form name="myForm" id="replace" method="POST" action="Add-Admin.php">
                                <div class="form-group">
                                    <label for="Fname">First Name</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="First Name" name="firstName" required="">
                                </div>
                                <div class="form-group">
                                    <label for="Lname">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Last Name" name="lastName" required="">
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email Address</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required="">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required="">
                                </div>
                                <button type="submit" class="btn btn-default">Add Admin</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php
        if (isset($_POST['email'])) {
            $firstname = filter_input(INPUT_POST, 'firstName');
            $lastname = filter_input(INPUT_POST, 'lastName');
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            include_once './Admin.php';
            $admin = new Admin('', $firstname, $lastname, $email, $password);
            $admin->add();
            $a = Artifex::getInstance();

            require_once './MailService.php';
            $m = new MailService();
            $emailContent = "Your Account Has Been Added, Please <a href'ma.spera.systems'=>Click Here</a> To Log Into Your Account <br/>"
                    . "Email: Your Email<br/>"
                    . "Password:" . $password;


            $m->sendMail("An Admin's Account Request Trial", $emailContent, $email);
            echo "<script> window.location.href='Admin-Profile.php'  </script>";
            //echo $t->getLastError();
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