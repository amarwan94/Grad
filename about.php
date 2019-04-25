<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php
include_once './headUI.php';
?>


    <title>Mateعrafsh?-About Us</title>
    <style>
         img{
                width: 100%;
                height: auto;
            }
            .page-heading{
                height: 550px;
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
    <header class="intro-header" style="background-image: url('img/labor.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <img src="img/logo5.png">
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
               
                <p>
                    <label>"Mateعrafsh?"</label> is a platform that provides with technicians' contacts information as guidance for those who need any.<br>
                    Easy to approach, saves time and effort, are some of the reasons why we chose to create it.<br>
                    The main reason was to be of help to those who suffer from not being able to find any technicians near them.<br>
                    In addition to one of our biggest focuses which were to help those fresh graduates find the work they need and be able to use the set of skills they have.<br>

                    <label>Who are we?</label>
                    We are a group of 4 Business Information System students.<br>
                    What drove us to this particular idea was the need to create a graduation project that is a fully functioning website as required.<br>
                    Once we’ve settled on the idea we’ve started working on it and began the development phase to provide the current outcome.<br>
 
                    <label>Our mission</label>
                    is to facilitate the process of finding the appropriate technicians with just a click of a button.<br>
                    Also helping the community with providing work and opportunities to those newly graduates. <br>  
                    So we provide the help you need while giving back to the community.<br>
                    What’s there not to love?
</p>
            
            </div>
        </div>
    </div>

    <hr>

   <?php
   require_once './footer.php';
    ?>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>
