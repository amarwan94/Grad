<?php
session_start();
if (!isset($_GET['id'])) {
    header("Location: Customer-Profile.php");
}
$opId = $_GET['id'];
require_once './Artifex.php';
$conectionString = Artifex::getInstance();
if ($conectionString->find("rate", "operationId", $opId)->num_rows > 0) {
    header("Location: Customer-Profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include_once './headUI.php';
        ?>
        <title>Operation-Rating</title>
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
                        <form  name="rateForm" action="Rating.php?id=<?php echo $_GET['id']; ?>" method="POST">
                            <div class="jumbotron" id="mainForm">
                                <div class="form-group">
                                    <label for="Field">Price Rate</label>
                                    <select class="form-control"  name="PRate" required>
                                        <option value="" disabled selected>Select A Rate</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Field">Service Rate</label>
                                    <select class="form-control"  name="SRate" required>
                                        <option value="" disabled selected>Select A Rate</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
<!--                                wazzis?-->
                                <div class="radio-inline">
                                    <label><input type="radio" name="optradio">Report A Problem</label>
                                </div> 
                                <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id" />
                                <div class="radio-inline">
                                    <label><input type="radio" name="optradio">Say Thank You</label>
                                </div><br>
                                <label>Leave Your Comment Here:</label>
                                <textarea type="text" value="Your Comment" class="form-control" id="note"  name="note" ></textarea><br>
                                <input type="submit" class="btn btn-default"/>
                                <input type="button" class="btn btn-default" value="Couldnt Reach Him">
                            </div>
                           
                        </form>
                    </div>
                  
                    <?php
                   if (isset($_POST['PRate']) && isset($_POST['SRate'])) {
                        require_once './Rate.php';
                        $r = new Rate('', $_POST['id'], $_POST['PRate'], $_POST['SRate'], $_POST['report'], $_POST['note']);
                        $r->add();
                        echo "<script> document.getElementById('mainForm').innerHTML = 'Thank You For Your Feedback!<br> If you made a report, an admin will get in touch with you soon' </script>";
                        if ($_POST['report'] == 'problem') {
                            require_once './Artifex.php';
                            $con = Artifex::getInstance();
                            $OperationId  = $_POST['id'];
                            $TechnicianId = $con->find_one("operation", "id", $_POST['id'])['technicianId'];
                            $customerId   = $con->find_one("operation", "id", $_POST['id'])['customerId'];
                            $Text         = $_POST['note'];
                            require_once './MailService.php';
                            $m = new MailService();
                            $emailContent = "Operation Id : " .$OperationId . '<br/>' .
                                            "Customer Id  :" .$customerId . '<br/>' .
                                            "Technician Id:" .$TechnicianId . '<br/>' .
                                            "Note         :" .$Text . '<br/>';
                            $m->sendMail("A Customer Report Trial", $emailContent, "matearafsh@gmail.com");
                        }
                    }
                    ?>
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