<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include_once './headUI.php';
        ?>
        <title>Technician Register</title>
        <link rel="shortcut icon" href="img/logo2.png" />
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
                        
                            <label>Please Consider That Your Contact Information Will Be Checked By The Admin.</label>
                        <div class="jumbotron">
                            <form name="myForm" id="replace" method="POST" action="Tech-Register.php" onsubmit="return validateForm()">
                                <div class="form-group">
                                    <label for="Fname">First Name</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="Letters Only" name="firstName">
                                    <div class="alert-danger" id="fNameError"></div>
                                </div>
                                <div class="form-group">
                                    <label for="Lname">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Letters Only" name="lastName">
                                    <div class="alert-danger" id="lNameError"></div>
                                </div>
                                <div class="form-group">
                                    <label for="SSN">National ID</label>
                                    <input  class="form-control" id="nationalId" placeholder="National ID" name="nationalId" required="">
                                    <div class="alert-danger" id="idError"></div>
                                </div>
                                <div class="form-group">
                                    <label for="Phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" required="">
                                    <div class="alert-danger" id="phoneError"></div>

                                </div>
                                <div class="form-group">
                                    <label for="Location">City</label>
                                    <select class="form-control" id="city"  name="city" onchange="setDistrict()" required="">
                                        <option value="" disabled selected>Select your City</option>
                                        <?php
                                        require_once './Artifex.php';
                                        /* @var $connection Artifex */
                                        $connection = Artifex::getInstance();
                                        $cityList = $connection->fetch_all('city');
                                        while ($city = $cityList->fetch_assoc()) {
                                            echo '<option value="' . $city['name'] . '">' . $city['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <div class="alert-danger" id="cityError"></div>
                                </div>



                                <div class="form-group">
                                    <label for="Location">District</label>
                                    <select class="form-control" id="district" name="district" required="">
                                        <option value="" disabled selected>Select your District</option>
                                    </select>
                                    <div class="alert-danger" id="districtError"></div>
                                </div>

                                <script>

                                    function setDistrict() {
                                        var city = document.getElementById('city').value;
                                        var xhttp = new XMLHttpRequest();
                                        xhttp.onreadystatechange = function () {
                                            if (this.readyState === 4 && this.status === 200) {
                                                document.getElementById("district").innerHTML = this.responseText;
                                            }
                                        };
                                        xhttp.open("GET", "ajax_get_district_list.php?city=" + city, true);
                                        xhttp.send();
                                    }
                                </script>
                                <div class="form-group">
                                    <label for="Location">Street</label>
                                    <input class="form-control" id="street" placeholder="Enter Your Street" name="street" required="">
                                    <div class="alert-danger" id="streetError"></div>

                                    </input>
                                </div>
                                <div class="form-group">
                                    <label for="Field">Working Field</label>
                                    <select class="form-control" id="field" placeholder="Working Field" name="workingField" required="">
                                        <option value="" disabled selected>Select your Working Field</option>
                                        <option value="Carpentry">Carpentry</option>
                                        <option value="Plumbing">Plumbing</option>
                                        <option value="Electricity">Electricity</option>
                                    </select>
                                    <div class="alert-danger" id="fieldError"></div>

                                </div>
                                <div class="form-group">
                                    <label for="Email">Email Address</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required="">
                                    <div class="alert-danger" id="emailError"></div>
                                </div>
                                <button type="submit" class="btn btn-default">Send Account Request</button>
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

        if (isset($_POST['email'])) {
            $firstname = filter_input(INPUT_POST, 'firstName');
            $lastname = filter_input(INPUT_POST, 'lastName');
            $nationalId = filter_input(INPUT_POST, 'nationalId');
            $phone = filter_input(INPUT_POST, 'phone');
            $city = filter_input(INPUT_POST, 'city');
            $district = filter_input(INPUT_POST, 'district');
            $street = filter_input(INPUT_POST, 'street');
            $workingfield = filter_input(INPUT_POST, 'workingField');
            $email = filter_input(INPUT_POST, 'email');
            $err = '';
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
                    echo '<script> document.getElementById("firstName").value = "'.$firstname.'" </script>';
                    $check_0 = false;
                } else {
                    echo '<script> document.getElementById("firstName").value = "'.$firstname.'" </script>';
                    $check_0 = true;
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
                    echo '<script> document.getElementById("lastName").value = "'.$lastname.'" </script>';
                    $check_1 = false;
                } else {
                    echo '<script> document.getElementById("lastName").value = "'.$lastname.'" </script>';
                    $check_1 = true;
                }
            }
            //national ID
            if (empty($nationalId)) {
                //$err .= '<br>phone field is required ';
                echo '<script> document.getElementById("idError").innerHTML = "National ID Field Is Required." </script>';
                $check_2 = false;
            } else {
                if (!is_numeric($nationalId)) {
                    //$err .= '<br>phone must be only numbers and not less than 11 and not more than 13 ';
                    echo '<script> document.getElementById("idError").innerHTML = "National ID must be only numbers." </script>';
                    echo '<script> document.getElementById("nationalId").value = "'.$nationalId.'" </script>';
                    $check_2 = false;
                } else {
                    if (digits($nationalId) < 12 || digits($nationalId) > 15) {
                        //$err .= '<br>phone must be only numbers and not less than 11 and not more than 13 ';
                        echo '<script> document.getElementById("idError").innerHTML="National ID Must Be 11 Digits"</script>';
                        echo '<script> document.getElementById("nationalId").value = "'.$nationalId.'" </script>';
                        $check_2 = false;
                    } else {
                        echo '<script> document.getElementById("nationalId").value = "'.$nationalId.'" </script>';
                        $check_2 = true;
                    }
                }
            }
            //phone
            if (empty($phone)) {
                //$err .= '<br>phone field is required ';
                echo '<script> document.getElementById("phoneError").innerHTML = "Phone Field Is Required." </script>';
                $check_3 = false;
            } else {
                if (!is_numeric($phone)) {
                    //$err .= '<br>phone must be only numbers and not less than 11 and not more than 13 ';
                    echo '<script> document.getElementById("phoneError").innerHTML = "Phone must be only numbers." </script>';
                    echo '<script> document.getElementById("phone").value = "'.$phone.'" </script>';
                    $check_3 = false;
                } else {
                    if (digits($phone) < 10 || digits($phone) > 12) {
                        //$err .= '<br>phone must be only numbers and not less than 11 and not more than 13 ';
                        echo '<script> document.getElementById("phoneError").innerHTML="Phone Must Be 11 Digits"</script>';
                        echo '<script> document.getElementById("phone").value = "'.$phone.'" </script>';
                        $check_3 = false;
                    } else {
                        echo '<script> document.getElementById("phone").value = "'.$phone.'" </script>';
                        $check_3 = true;
                    }
                }
            }

            //email
            if (empty($email)) {
                $check_4 = false;
                //$err .= '<br>email field is required ';
                echo '<script>document.getElementById("emailError").innerHTML="Email Is Required"</script>';
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    // $err .= '<br>This is not a valid email address';
                    echo '<script>document.getElementById("emailError").innerHTML="This Is Not A Valid Email"</script>';
                    echo '<script> document.getElementById("email").value = "'.$email.'" </script>';
                    $check_4 = false;
                } else {
                    echo '<script> document.getElementById("email").value = "'.$email.'" </script>';
                    $check_4 = true;
                }
            }
            if ($check_0 && $check_1 && $check_2 && $check_3 && $check_4) {
                require_once './MailService.php';
                $m = new MailService();
                $emailContent = "Technician's 1st Name : " . $firstname . '<br/>' .
                        "Last Name  :" . $lastname . '<br/>' .
                        "National ID:" . $nationalId . '<br/>' .
                        "Phone:" . $phone . '<br/>' .
                        "City: " . $city . '<br/>' .
                        "District:" . $district . '<br/>' .
                        "Street:" . $street . '<br/>' .
                        "Working Field:" . $workingfield . '<br/>' .
                        "Email:" . $email . '<br/>';

                $m->sendMail("A Technician's Account Request Trial", $emailContent, "matearafsh@gmail.com");
                echo "<script> document.getElementById('replace').innerHTML = 'Your Request Was Submitted Succefully, Please Wait For Our Call.' </script>";
            }

            //echo $t->getLastError();
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