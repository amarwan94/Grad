<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include_once './headUI.php';
        ?>
        <title>Customer-Profile</title>
        <style>
            img{
                width: 100%;
                height: auto;
            }
            .site-heading{
                height: 450px;
            }
            .btn{
                
                background-color: #F9F9F9;
            }
            #pick{
                color: black;
                background-color: white;
            }
        </style>
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
                            <img src="img/logo5.png">

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
                        <!--the small intro div-->

                        <div class="col-sm-12 col-xs-12">
                            <h3>Your Operations' History:</h3><br>

                            <?php
                            require_once './Artifex.php';
                            $connection = Artifex::getInstance();
                            $r = $connection->find_order_desc("operation", "customerId", $_SESSION['id'], "date");
                            echo '<ul>';
                            while ($row = $r->fetch_assoc()) {
                                if ($connection->find("rate", "operationId", $row['id'])->num_rows == 1) {
                                    
                                } else {
                                if($row['note'] == "ERROR_NO_REACH") {
                                continue;}
                                
                                    echo "<li>On " . $row['date'] . ", You Requested For <a>" . $connection->find("technician", "id", $row['technicianId'])->fetch_assoc()['firstName'] .
                                    " " . $connection->find("technician", "id", $row['technicianId'])->fetch_assoc()['lastName'] . "'s</a> Contact, For " .
                                    $connection->find("technician", "id", $row['technicianId'])->fetch_assoc()['workingField'] . ". <br><label> Please Rate Now And Help Others Know About Your Experience </label></li>";
                                    echo '<div class="container-fluid">';
                                    echo '<div class="row">';
                                    echo ' <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">';

                                    echo '<div id="middle" class="row">';
                                    
                                    echo '<form name="rateForm" action="Rating.php?id=' . $row['id'] . '" method="POST">';
                                    echo '<div class="jumbotron" id="mainForm">';
                                    echo '<div class="form-group">';
                                    echo '<label for="Field">Price Rate</label>';
                                    echo '<select class="form-control"  name="PRate" required>';
                                    echo '<option value="" disabled selected>Select A Rate</option>';
                                    echo '<option value="0">0</option>';
                                    echo '<option value="1">1</option>';
                                    echo '<option value="2">2</option>';
                                    echo '<option value="3">3</option>';
                                    echo '<option value="4">4</option>';
                                    echo '<option value="5">5</option>';
                                    echo '</select>';
                                    echo '</div>';
                                    echo '<div class="form-group">';
                                    echo '<label for="Field">Service Rate</label>';
                                    echo '<select class="form-control"  name="SRate" required="">';
                                    echo '<option value="" disabled selected>Select A Rate</option>';
                                    echo '<option value="0">0</option>';
                                    echo '<option value="1">1</option>';
                                    echo '<option value="2">2</option>';
                                    echo '<option value="3">3</option>';
                                    echo '<option value="4">4</option>';
                                    echo '<option value="5">5</option>';
                                    echo '</select>';
                                    echo '</div>';
                                    echo '<div class="form-group">';
                                    echo '<label>';
                                    echo 'You Want To:';
                                    echo '<br>';
                                    echo '<select class="form-group col-xs-12" name="report" required="">';
                                    echo '<option value="" disabled selected>Take An Action</option>';
                                    echo '<option value="problem">Report A Problem</option>';
                                    echo '<option value="thanks">Say Thank You</option>';
                                    echo '</select>';
                                    echo '</label>';
                                    echo '</div>';
                                    echo '<input type="hidden" value="' . $row['id'] . '" name="id" />';
                                    echo'<br>';
                                    echo '<label>';
                                    echo 'Leave Your Comment Here:';
                                    echo '</label>';
                                    echo '<textarea type="text" value="Your Comment" class="form-control" id="note"  name="note" >';
                                    echo '</textarea>';
                                    echo '<br>';
                                    echo '<input type="submit" name="submit" class="btn btn-default col-xs-12" value="Submit Rate"/>';
                                    
                                    echo '</div>';
                                    echo '</form>';
                                    //sending email on choosing report a problem
                                    echo '</div>';
                                    // to </form> </div>
echo '<form action="Customer-Profile.php" method="POST"><input type="hidden" value="' . $row['id'] . '" name="id" /><input type="submit" onclick="" name="didnt" class="btn btn-default col-xs-12" value="Didnt Reach"></form>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            }
                            if (isset($_POST['didnt'])) {
                                $v = $_POST['id'];
                                $conn = Artifex::getInstance();
                                $t = new stdClass();
                                $t->note = "ERROR_NO_REACH"
;                               $conn->edit("operation", "id", $v, (array) $t);
                            }
                            echo '</ul>';
                            ?>


                        </div><br>
                        <div class="row  col-xs-12">
                            <p>Click On the button below To Get The Help You Need</p>
                        </div>
                        
                        <div class="row col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4  col-xs-6 col-xs-offset-3">
                            <a class="btn btn-default" role="button" href="PickingTech.php" id="pick">Pick A Tech</a>
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