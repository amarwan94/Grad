<!DOCTYPE html>
<html lang="en">

    <head>

        <?php
        include_once './headUI.php';
        ?>

        <title>Customer-Register</title>


        <style>
            body{
                background-color: #F5F4EE;
            }

            img{
                width: 100%;
                length: auto;
            }
            .site-heading{
                height: 450px;
            }


        </style>
    </head>

    <body>

        <!-- Navigation -->
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
                        <div class="jumbotron">
                            <form method="POST" action="Customer-Register.php">
                                <div class="form-group">
                                    <label for="Fname">First Name</label>
                                    <input type="text" class="form-control" id="firstname" placeholder="Letters Only" name="firstName" required="">
                                    <div class="alert-danger" id="fNameError"></div>
                                </div>
                                <div class="form-group">
                                    <label for="Lname">Last Name</label>
                                    <input type="text" class="form-control" id="lastname" placeholder="Letters Only" name="lastName" required="">
                                    <div class="alert-danger" id="lNameError"></div>
                                </div>

                                <div class="form-group">
                                    <label for="Phone">Phone</label>
                                    <input type="number" class="form-control" id="phone" placeholder="Phone" name="phone" required="">
                                    <div class="alert-danger" id="phoneError"></div>
                                </div>

                                <div class="form-group" id="dob">
                                    <label for="DoB">Date Of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob" required="">
                                    <div class="alert-danger" id="dateError"></div>
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email Address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" required="">
                                    <div class="alert-danger" id="emailError"></div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Not Less Than 6 Characters" name="password" required="">
                                    <div class="alert-danger" id="passwordError"></div>
                                </div>
                                <input type="submit" class="btn btn-default" />
                            </form>      
                        </div>


                    </div>


                </div>
            </div>
        </div>
        <?php

        function safe($str) {
            return htmlspecialchars(addslashes(trim($str)));
        }

        function digits($num) {
            return (int) (log($num, 10) + 1);
        }

        if (isset($_POST['firstName'])) {
            $firstname = filter_input(INPUT_POST, 'firstName');
            $lastname = filter_input(INPUT_POST, 'lastName');
            $phone = filter_input(INPUT_POST, 'phone');
            $dob = filter_input(INPUT_POST, 'dob');
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            //FORM VALIDATION
            //first name 
            if (empty($firstname)) {
                //$err .= '<br>firstname field is required';
                echo '<script> document.getElementById("fNameError").innerHTML = "First Name Field Is Required" </script>';
                
                $check_0 = false;
            } else {
                if (!preg_match("/^[a-zA-Z]+$/", $firstname)) {
                    // $err .= '<br>First Name Must Be Letters Only! ';
                    echo '<script> document.getElementById("fNameError").innerHTML = "Only Letters Are Allowed." </script>';
                    echo '<script> document.getElementById("firstname").value = "'.$firstname.'" </script>';
                    $check_0 = false;
                } else {
                    $check_0 = true;
                    echo '<script> document.getElementById("firstname").value = "'.$firstname.'" </script>';
                }
            }
            //last name
            if (empty($lastname)) {
                //$err .= '<br>lastname field is required ';
                echo '<script> document.getElementById("lNameError").innerHTML = "Last Name Field Is Required." </script>';
                $check_1 = false;
            } else {
                if (!preg_match("/^[a-zA-Z]+$/", $lastname)) {
                    //$err .= '<br>Last Name Must Be Letters Only! ';
                    echo '<script> document.getElementById("lNameError").innerHTML = "Only Letters Are Allowed." </script>';
                    echo '<script> document.getElementById("lastname").value = "'.$lastname.'" </script>';
                    $check_1 = false;
                } else {
                    $check_1 = true;
                    echo '<script> document.getElementById("lastname").value = "'.$lastname.'" </script>';
                }
            }
            //phone
            if (empty($phone)) {
                //$err .= '<br>phone field is required ';
                echo '<script> document.getElementById("phoneError").innerHTML = "Phone Field Is Required." </script>';
                $check_2 = false;
            } else {
                if (!is_numeric($phone)) {
                    //$err .= '<br>phone must be only numbers and not less than 11 and not more than 13 ';
                    echo '<script> document.getElementById("phoneError").innerHTML = "Phone must be only numbers." </script>';
                    echo '<script> document.getElementById("phone").value = "'.$phone.'" </script>';
                    $check_2 = false;
                } else {
                    if (digits($phone) < 10 || digits($phone) > 12) {
                        //$err .= '<br>phone must be only numbers and not less than 11 and not more than 13 ';
                        echo '<script> document.getElementById("phoneError").innerHTML="Phone Must Be 11 Digits"</script>';
                        echo '<script> document.getElementById("phone").value = "'.$phone.'" </script>';
                        $check_2 = false;
                    } else {
                        $check_2 = true;
                        echo '<script> document.getElementById("phone").value = "'.$phone.'" </script>';
                    }
                }
            }
            //date
            if (empty($dob)) {
                //$err .= '<br>This is not a valid date';
                echo '<script>document.getElementById("dateError").innerHTML="This is not a valid date"</script>';
                echo '<script> document.getElementById("dob").value = "'.$dob.'" </script>';
                $check_3 = false;
            } else {
                $check_3 = true;
                echo '<script> document.getElementById("dob").value = "'.$dob.'" </script>';
            }
            echo '<script> document.getElementById("dob").value = "'.$dob.'" </script>';
            //email
            if (empty($email)) {
                $check_4 = false;
                //$err .= '<br>email field is required ';
                echo '<script>document.getElementById("emailError").innerHTML="Email Is Required"</script>';
                
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    // $err .= '<br>This is not a valid email address';
                    echo '<script>document.getElementById("emailError").innerHTML="This Is Not A Valid Email"</script>';
                    echo '<script> document.getElementById("exampleInputEmail1").value = "'.$email.'" </script>';
                    $check_4 = false;
                } else {
                    $check_4 = true;
                    echo '<script> document.getElementById("exampleInputEmail1").value = "'.$email.'" </script>';
                }
            }
            //password
            if (empty($password)) {
                //$err .= '<br>password field is required ';
                echo '<script>document.getElementById("passwordError").innerHTML="Password Field Is Required."</script>';
                $check_5 = false;
            } else {
                if (!preg_match("/^[a-zA-Z0-9]+$/", $password) || strlen($password) < 6) {
                    //$err .= '<br>password must be numbers and letters only + not less than 6 characters';
                    echo '<script>document.getElementById("passwordError").innerHTML="password must be numbers and letters only + not less than 6 characters"</script>';
                    $check_5 = false;
                } else {
                    $check_5 = true;
                }
            }
            //check all
            if ($check_0 && $check_1 && $check_2 && $check_3 && $check_4 && $check_5) {
                include_once './Customer.php';
                $customer = new Customer('', $firstname, $lastname, $email, $password, $phone, $dob);
                $customer->add();
                $c = Artifex::getInstance();
                echo '<script> window.location.href= "Customer-SignIn.php"; </script>';
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