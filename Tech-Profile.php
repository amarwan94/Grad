<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <?php
        include_once './headUI.php';
        ?>

        <title>Tech-Profile</title>
<link rel="shortcut icon" href="img/logo2.png" />

    </head>

    <body>

        <!-- Navigation -->
        <?php
        include_once './navUI.php';
        ?>

        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('img/tools2.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h1><img src="img/user.png"></h1>
                            <hr class="small">
                            <span class="subheading">We're Here To Let You Know</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <?php
                    require_once './Artifex.php';
                    $con = Artifex::getInstance();
                    error_reporting(1);
                    $result = $con->execute("SELECT count(*) as 'count' from operation join rate on operation.id = rate.operationId where operation.technicianId = '" . $_SESSION['id'] . "'");
                    $count = $result->fetch_assoc()['count'];
                    //echo $count;
                    $result = $con->execute("SELECT sum(rate.price) as 'price' from rate join operation on rate.operationId = operation.id where operation.technicianId = '" . $_SESSION['id'] . "'")->fetch_assoc()['price'];
                    //how come knowing which "result" var is needed this time?
                    if ($count == 0) {
                        $price = "No Reviews";
                        $service = "No Reviews";
                        $overall = "No Reviews";
                    } else {
                        $price = $result / $count;
                        //echo $result;
                        $result = $con->execute("SELECT sum(rate.service) as 'service' from rate join operation on rate.operationId = operation.id where operation.technicianId = '" . $_SESSION['id'] . "'")->fetch_assoc()['service'];
                        $service = $result / $count;
                       // echo $result;
                    }
                    ?>


                    <h4>Operations' Requests:</h4>
                    <ul>
                        <?php
                            $query = "SELECT operation.* FROM operation WHERE NOT EXISTS ( SELECT * FROM rate WHERE rate.operationId = operation.id ) AND operation.technicianId = ".$_SESSION['id'];
                            $result= $con->execute($query);
                            while($row = $result->fetch_assoc()) {
                                echo "<li>You're Requested By The Date (".$row['date'].")<br> Customer's Note: (".$row['note']."),"
                                        . " Please Wait For The Customer's Call.</li><br>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h4>Your Rate:</h4>
                    <ul>
                        <li>Your Price Rate:<?php echo $price; ?></li>
                        <li>Your Service Rate:<?php echo $service; ?></li>
                        <li>Your Overall Rate:<?php echo ($price + $service) / 2; ?></li>
                    </ul>

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

