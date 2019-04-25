<?php
session_start();
//why is that?
if (!(isset($_POST['type']) && isset($_POST['city']) && isset($_POST['district']))) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        require_once './headUI.php';
        ?>
        <title>Tech-List</title>
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
<!--                            type?-->
                            <h4> <?php echo $_POST['type']; ?> Experts In <?php echo $_POST['district']; ?>, <?php echo $_POST['city'];?>:</h4><br>
                            <ul>
                                <?php
                                require_once './Artifex.php';
                                $connection = Artifex::getInstance();
                                $list = $connection->find_and("technician", "workingField", $_POST['type'], "district", $_POST['district']);
                                while ($row = $list->fetch_assoc()) {
                                    echo '<li><img src="img/user.png" class="profile"></li>';
                                    echo ' <label>Name:</label> ' . $row['firstName'] . ' ' . $row['lastName'] . '<br/>';
                                    echo ' <label>Specific Area:</label> ' . $row['street'] . '<br/>';
                                    $id = $row['id'];
                                    $count = $connection->execute("SELECT count(*) as 'count' from operation join rate on operation.id = rate.operationId where operation.technicianId = '" . $id . "'");
                                    $rateCount = $count->fetch_assoc()['count'];
                                    $ratePriceSum = $connection->execute("SELECT sum(rate.price) as 'price' from rate join operation on rate.operationId = operation.id where operation.technicianId = '" . $id . "'")->fetch_assoc()['price'];
                                    $rateServiceSum = $connection->execute("SELECT sum(rate.service) as 'service' from rate join operation on rate.operationId = operation.id where operation.technicianId = '" . $id . "'")->fetch_assoc()['service'];
                                    $totalRateValue = "";
                                    if ($rateCount == 0) {
                                        $a = "None";
                                        $b = "None";
                                        $c = "None";
                                    } else {


                                        $a = round(($ratePriceSum / $rateCount), 2);
                                        $b = round(($rateServiceSum / $rateCount), 2);
                                        $c = round((($ratePriceSum / $rateCount + $rateServiceSum / $rateCount) / 2), 2);
                                    }
                                    echo '<label>Price Rate:</label> ' . $a . ' out of 5.0<br/>';
                                    echo '<label>Service Rate:</label>  ' . $b . ' out of 5.0 <br/>';
                                    echo '<label>Overall Rate:</label> ' . $c . ' <br/>';
                                    echo '<label>For Feedbacks About This Technician</label> <a href="Tech-Reviews.php?Id='.$row['id'].'">Click Here</a>';
                                    echo '<div class="col-xs-12"><a href="OperationRequest.php?Id=' . $row['id'] . '" class="btn btn-default col-sm-12" type=button>Request</a></div><br><br>';
                                }
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