<?php
session_start();
if($_SESSION['userType'] != 'Admin') {
    header("Location: Admin-Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include_once './headUI.php';
        ?>
        <title>AddingTech</title>
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
                        <div class="jumbotron">
                            <form name="myForm" id="replace" method="POST" action="Add-Tech.php">
                                <div class="form-group">
                                    <label for="Fname">First Name</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="First Name" name="firstName">
                                </div>
                                <div class="form-group">
                                    <label for="Lname">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Last Name" name="lastName" required="">
                                </div>
                                <div class="form-group">
                                    <label for="SSN">National ID</label>
                                    <input  class="form-control" id="nationalId" placeholder="National ID" name="nationalId" >
                                </div>
                                <div class="form-group">
                                    <label for="Phone">Phone</label>
                                    <input type="number" class="form-control" id="phone" placeholder="Phone" name="phone" required="">

                                </div>
                                <div class="form-group">
                                    <label for="Location">City</label>
                                    <select class="form-control" id="city"  name="city" onchange="setDistrict()">
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
                                </div>



                                <div class="form-group">
                                    <label for="Location">District</label>
                                    <select class="form-control" id="district" name="district" onchange="setStreet()">
                                        <option value="" disabled selected>Select your District</option>
                                    </select>
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
                                    <input class="form-control" id="street" placeholder="Enter Your Street" name="street">

                                </div>
                                <div class="form-group">
                                    <label for="Field">Working Field</label>
                                    <select class="form-control" id="field" placeholder="Working Field" name="workingField">
                                        <option value="" disabled selected>Select your Working Field</option>
                                        <option value="Carpentry">Carpentry</option>
                                        <option value="Plumbing">Plumbing</option>
                                        <option value="Electricity">Electricity</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="Email">Email Address</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required="">
                                </div>
                                <div class="form-group">
                                    <label for="password"></label>
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required="">
                                        
                                    
                                </div>
                                <button type="submit" class="btn btn-default">Add Technician</button>
                            </form>

                        </div>
                    </div>


                </div>
            </div>

        </div>

        <?php
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
            $password = filter_input(INPUT_POST, 'password');
            include_once './Technician.php';
            $technician = new Technician('', $firstname, $lastname, $email, $password, $nationalId, $phone, $city, $district, $street, $workingfield);
            $technician->add();
            $t = Artifex::getInstance();

            require_once './MailService.php';
            $m = new MailService();
            $emailContent = "Your Account Has Been Added, Please <a href'ma.spera.systems'=>Click Here</a> To Log Into Your Account <br/>"
                    . "Email: Your Email<br/>"
                    . "Password:".$password ;
            

            $m->sendMail("A Technician's Account Request Trial", $emailContent, $email);
            echo "<script> window.location.href='Admin-Profile.php'  </script>";
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


