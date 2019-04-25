<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <?php
        include_once './headUI.php';
        ?>


        <title>Mateعrafsh?-Editing Account</title>


    </head>

    <body>

        <!-- Navigation -->
        <?php
        if (isset($_SESSION['email'])) {
            require_once './navUI.php';
        }
        ?>
        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('img/labor.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="page-heading">
                            <h1>LOGO</h1>
                            <hr class="small">
                            <span class="subheading">This is what We Do.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="jumbotron">
                        <form method="POST" action="Edit-Admin.php" id="editForm">
                            <div class="form-group">
                                <?php
                                if (isset($_SESSION['email'])) {
                                    require_once './Artifex.php';
                                    $connection = Artifex::getInstance();
                                    //email not id?
                                    $result = $connection->find_one('admin', 'email', $_SESSION['email']);
                                }
                                ?>
                                <label for="FirstName">First Name:</label>
                                <input value="<?php echo $result['firstName'] ?>" type="text" class="form-control" id="firstName" name="firstname" required="">
                            </div>
                            <div class="form-group">
                                <label for="LastName">Last Name</label>
                                <input value="<?php echo $result['lastName'] ?>" type="text" class="form-control" id="lastName" name="lastname" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input value="<?php echo $result['password'] ?>" type="password" class="form-control" id="exampleInputPassword1" name="password" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">E-Mail</label>
                                <input value="<?php echo $result['email'] ?>" type="email" class="form-control" id="email" name="email" required="">
                            </div>
                            <input class="btn btn-default" type="submit" value="Submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <?php
        if(isset($_POST['firstname'])) {
            require_once './Admin.php';
            $a = new Admin('', $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], '');
            $a->edit($result['id']);
            echo '<script>document.getElementById("editForm").innerHTML="Your Account Has Been Edited Succefully."</script>';
        }
        ?>

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

