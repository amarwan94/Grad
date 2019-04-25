<?php
session_start();
if(isset($_SESSION['id'])) {header("Location:index.php");}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <?php
        include_once './headUI.php';
        ?>

        <title>Admin-Sign In</title>
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

        <!-- Navigation -->
        <?php
        include_once './navUI.php';
        ?>

        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('img/9.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            ADMIN LOGIN

                        </div>

                    </div>
                </div>
            </div>
        </header>

        <!-- Post Content -->

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="jumbotron">
                        <form method="POST" action="Admin-Login.php">

                            <div class="form-group">
                                <label for="Email">Email Address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required="">
                            </div>

                            <input class="btn btn-default" type="submit" value="Sign In">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST['email'])) {
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            require_once './Admin.php';
            $result = Admin::login($email, $password);
            if ($result != false) {
                $_SESSION['firstName'] = $result['firstName'];
                $_SESSION['id'] = $result['id'];
                $_SESSION['lastName'] = $result['lastName'];
                $_SESSION['email'] = $email;
                $_SESSION['userType'] = 'Admin';
                echo "<script> window.location.href='Admin-Profile.php'; </script>";
            } else {
                echo "<script> alert('Invalid Username Or Password');</script>";
            }
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

