<!DOCTYPE html>
<html>
    <head>
        <?php
        session_start();
        include_once './headUI.php';
        ?>
        <title>OperationRequest</title>
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
        <header class="intro-header" style="background-image: url('img/6.jpg')">
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
                        <div class="jumbotron">


                            <?php
                            //CName?
                            if (!isset($_POST['CName'])) {
                                require_once './Artifex.php';
                                $connection = Artifex::getInstance();
                                $technician = $connection->find_one("technician", "id", $_GET['Id']);

                                echo '<form method="POST" action="">';
                                echo '<div class="form-group">';
                                echo '<label for="Cname">Customer Name</label>';
                                echo '<input  type="text" value="' . $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] . '" class="form-control" id="CName"  name="CName" readonly>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="TName">Technician Name</label>';
                                echo '<input type="text" value="' . $technician['firstName'] . ' ' . $technician['lastName'] . '" class="form-control" id="TName"  name="TName" readonly>';
                                echo '</div>';
                                echo '<input type="hidden" value="' . $technician['id'] . '" class="form-control" id="tid"  name="tid" >';
                                echo '<input type="hidden" value="' . $technician['phone'] . '" class="form-control" id="tphone"  name="tphone" >';
                                echo '<div class="form-group">';
                                echo '<label for="date">Preferred Visit Date</label>';
                                echo '<input type="date" value="" class="form-control" id="date"  name="date">';

                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="notes">Notes</label>';
                                echo '<textarea type="text" value="" class="form-control" id="note"  name="note" ></textarea>';
                                echo '</div>';
                                echo '<button type="submit" class="btn btn-default">Confirm</button>';
                                echo '</form>';
                            } else {
                                require_once './Artifex.php';
                                $connection = Artifex::getInstance();
                                $customerId = $_SESSION['id'];
                                $techId = $_POST['tid'];
                                $date = $_POST['date'];
                                $note = $_POST['note'];
                                require_once './Operation.php';
                                $op = new Operation('', $customerId, $techId, $note, $date);
                                //print_r($op);
                                $op->add();
                                $techPhone = $_POST['tphone'];
                                echo "Your Operation was requested";
                                echo ", Please call The Technician for more details on: <a href='tel:+2" . $techPhone . "'>" . $_POST['tphone'] . "</a>";
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST['email'])) {
            
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
