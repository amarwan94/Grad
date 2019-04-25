<?php
session_start();
include_once './headUI.php';
?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <title>Suspend-Tech</title>
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
        <header class="intro-header" style="background-image: url('img/4.jpg')">
            <!--the container-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h3>Technician Suspension</h3>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 ">
                    <!--where the user chooses-->
                    <div class="row">
                        <div  class="col-md-12 col-sm-6 col-xs-12">
                            <label class="col-xs-12">Are You Sure You Want To Suspend This Technician?</label>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
                            <form method="POST" action="Suspend-Tech.php" >
                                <input type="hidden" value="<?php echo $_GET['Id']; ?>" name="tId" />
                                <button type="submit" class="btn btn-default col-md-6 col-xs-12" href="">Suspend</button>
                                <a class="btn btn-default col-md-6 col-xs-12" href="Low-Tech.php">Back</a>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php
        if (isset($_POST['tId'])) {
            require_once './Artifex.php';
            $con = Artifex::getInstance();
            $x = new stdClass();
            $x->password = "SUSPENDED";
            $x = (array) $x;
            var_dump($x);
            $con->edit("technician", "id", $_POST['tId'], $x);
            echo "<script> window.location.href = 'Low-Tech.php'</script>";
        }
        
        ?>
        <hr>

        <?php
        require_once './footer.php';
        ?>

        <!-- jQuery -->
        <script src="vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>

        <!-- Theme JavaScript -->
        <script src="js/clean-blog.min.js"></script>

    </body>

</html>

