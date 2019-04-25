<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        require_once './headUI.php';
        ?>
        <title>Tech-Reviews</title>
        <style>
            body{
                background-color: #F5F4EE;
            }
            .profile{
                width: 100px;
                height: 100px;
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

        <!-- Navigation -->
        <?php
        require_once './navUI.php';
        ?>

        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('img/1.png')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <img src="img/logo5.png">
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content -->
        <div class="container">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div id="middle">
                    <!--the small intro div-->
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-xs-12">
                            <?php
                            require_once './Artifex.php';
                                $connection = Artifex::getInstance();
                                $technician = $connection->find_one("technician", "id",$_GET['Id'] );
                            
                                    echo $technician['firstName']." ". $technician['lastName']."'s "."Reviews:<br><br>";
                                    ?>
                            <ul>
                                <?php
                            echo '<ul class="list-group">';
                            $techId = $_GET['Id'];
                            $query = "SELECT rate.comment FROM technician JOIN operation on operation.technicianId = technician.id JOIN rate ON operation.id = rate.operationId WHERE technician.id = ".$techId;
                            require_once './Artifex.php';
                            $con = Artifex::getInstance();
                            $result = $con->execute($query);
                            while($row = $result->fetch_assoc()) {
                                echo '<li class="list-group-item">'.$row['comment'].'</li>';
                            }
                            echo '</ul>';
                            ?>
                               
                            </ul>
                        </div>


                    </div>
                    <br>





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

