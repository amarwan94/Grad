<?php
session_start();
if($_SESSION['userType'] != 'Admin') {
    header("Location: Admin-Login.php");
}
include_once './headUI.php';
?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <title>Mateعrafsh?-AdminForm</title>
        <link rel="shortcut icon" href="img/logo2.png" />

        <style>
            body{
                background-color: #F5F4EE;
            }
           
            img {
                width: 100%;
                height: auto;
            }

            #subh{
                color: black;
                font-family: calibri;
            }
            
        </style>
    </head>

    <body>

        <!-- Navigation -->
        <?php
        include_once './navUI.php';
        ?>
        <header class="intro-header" style="background-image: url('img/4.jpg')">
            <!--the container-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h2>Admin Profile</h2>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content -->
        <div class="container">
            <div class="row">
                        <div  class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
                            <a class="btn btn-default col-xs-12" href="Add-Tech.php">Add A Technician</a>
                        </div>
            </div><br>
            <div class="row">
                        <div  class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
                            <a class="btn btn-default col-xs-12" href="Add-Admin.php">Add An Admin</a>
                        </div>
            </div><br>
            <div class="row">
                
                        <div class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
                            <a class="btn btn-default col-xs-12" href="Low-Tech.php">Low Rate Technicians</a><br><br> 
                        </div>
                
            </div><br>
            <div class="row">
                        <div  class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
                            <a class="btn btn-default col-xs-12" href="High-Tech.php">High Rate Technicians</a>
                        </div>
            </div><br>
            <div class="row">
                        <div  class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
                            <a class="btn btn-default col-xs-12" href="District-Stat.php">Districts' Statistics</a>
                        </div>
            </div>

        </div>

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

