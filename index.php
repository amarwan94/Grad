<?php
session_start();
include_once './headUI.php';
?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <title>Mateعrafsh?-Home</title>
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

        <!-- Page Header -->
        <header class="intro-header" style="background-image: url('img/5.jpg')">
            <!--the container-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <img  id="logo" src="img/logo2.png">
                            <span class="subheading" id="subh">We Are Here To Let You Know</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 ">
                    <div id="middle" class="row">
                        <!--the small intro div-->
                        <div id="intro" class="col-sm-12 col-xs-12">
                            <p><label>"Mate’rafsh?"</label> helps different types of customers find the technicians they need with just the click of a button,
                                whilst also helping technicians to find more work 
                                and use the set of skills they acquire.<br>
                                You can simply choose your location and the category of the technician then you’ll be able to get the suitable technician’s contact information
                                right away.

                            </p>
                        </div>
                    </div><br/>
                    <!--where the user chooses-->
                    <div class="row">
                        <div  class="col-md-6 col-sm-6 col-xs-12">
                            <label class="col-xs-12">A Customer?</label>
                            <a class="btn btn-default col-xs-12" href="Customer-Register.php">I Need Help</a>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="col-xs-12">A Technician?</label>
                            <a class="btn btn-default col-xs-12" href="Tech-Register.php">I Need Publicity</a><br><br> 
                        </div>
                    </div>
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
