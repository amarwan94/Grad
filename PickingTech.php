<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <?php
        require_once './headUI.php';
        ?>

        <title>Picking-Tech</title>



        <style>
            #middle{
                text-align: center;
            }

            #gettech{
                color: white;
                background-color: black;
            }
            .site-heading{
                height: 450px;
            }
            img{
                width: 100%;
                height: auto;
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
        <header class="intro-header" style="background-image: url('img/10.jpg')">
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
                    <form action="TechList.php" method="POST">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Choose The Category You Need</h4>
                                <select class="form-control" id="type"  name="type" required="">
                                    <option class="" value="" disabled selected>Select Type</option>
                                    <option class="" value="Carpentry" >Carpentry</option>
                                    <option class="" value="Plumbing" >Plumbing</option>
                                    <option class="" value="Electricity" >Electricity</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4> Choose The Nearest Area To You</h4>                         
                                <div class="form-group">
                                    <label for="Location">City</label>
                                    <select class="form-control" id="city" required="" name="city" onchange="setDistrict()">
                                        <option value="" disabled selected>Select your City</option>
                                        <?php
                                        require_once './Artifex.php';
                                        /* @var $connection Artifex */
                                        $connection = Artifex::getInstance();
                                        $cityList = $connection->fetch_all('city');
                                        //city and city list?
                                        while ($city = $cityList->fetch_assoc()) {
                                            echo '<option value="' . $city['name'] . '">' . $city['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Location">District</label>
                                    <select class="form-control" required="" id="district" name="district">
                                        <option value="" disabled selected>Select your District</option>
                                    </select>
                                </div>
                                <script>
                                    
                                    function setDistrict() {
                                        var city = document.getElementById('city').value;
                                        var xhttp = new XMLHttpRequest();
                                        xhttp.onreadystatechange = function () {
                                            //wtf is that?
                                            if (this.readyState === 4 && this.status === 200) {
                                                document.getElementById("district").innerHTML = this.responseText;
                                            }
                                        };
                                        xhttp.open("GET", "ajax_get_district_list.php?city=" + city, true);
                                        xhttp.send();
                                    }
                                </script>
                            </div>

                        </div><br>
                        <div class="row">
                            <div class='col-sm-12'>
                                <button id="gettech" class="btn btn-default" role='button' type="submit">
                                    Get The Tech
                                </button>
                            </div>
                        </div>
                    </form>
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