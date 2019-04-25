<?php
session_start();
include_once './headUI.php';
?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <title>Districts'-Stats</title>
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
                            <h2>Districts' Statistics</h2>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-hover col-xs-12" id="table">
                        <thead>
                            <tr>
                                <th>Number Of Requested Operations</th>
                                <th>District</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $q = "SELECT COUNT(*) AS 'count', technician.district FROM operation JOIN technician ON operation.technicianId = technician.id GROUP BY technician.district ";
                            
                            require_once './Artifex.php';
                            $con = Artifex::getInstance();
                            $result = $con->execute($q);
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>'.$row['count'].'</td>';
                                echo '<td>'.$row['district'].'</td>';
                                echo '</tr>';  
                            }
                            ?>

                        </tbody>
                    </table>
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

