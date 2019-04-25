<style>
   
    #logo2{
        width: 110px;
        height: 40px;
        position: relative;
        margin-bottom: 20px;
    }
    
    </style>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        
         <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.php"><img src="img/logo4.png" id="logo2"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(isset($_SESSION['email'])){
                    if($_SESSION['userType'] === 'Customer'){
                        echo '<li><a href="Customer-Profile.php">Welcome, ' . $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] . '</a></li>';
                        echo '<li><a href="EditCustomer.php">Edit My Account</a></li>';
                        echo '<li><a href="Logout.php">Log Out</a></li>';
                        echo '<li><a href="about.php">About</a></li>';
                        echo '<li><a href="contact.php">Contact Us</a></li>';
                    }
                    else if($_SESSION['userType'] === 'Technician'){
                        echo '<li> <a href="Tech-Profile.php">Welcome, ' . $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] . '</a> </li>';
                        echo '<li><a href="EditTech.php">Edit My Account</a></li>';
                        echo '<li><a href="Logout.php">Log Out</a></li>';
                        echo '<li><a href="about.php">About</a></li>';
                        echo '<li><a href="contact.php">Contact Us</a></li>';
                        
                    }
                    else if($_SESSION['userType'] === 'Admin'){
                        echo '<li> <a href="Admin-Profile.php">Welcome, ' . $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] . '</a> </li>';
                        echo '<li><a href="Edit-Admin.php">Edit My Account</a></li>';
                        echo '<li><a href="Logout.php">Log Out</a></li>';
                    }
                    
                } else{
                    echo ' <li><a href="index.php">Home</a></li>
                        <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sign In <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    
                
                        <li><a href="Customer-SignIn.php">As A Customer</a></li>
                        <li><a href="Tech-SignIn.php">As A Technician</a></li>
                      </ul>
                </li>';
                    echo '<li><a href="about.php">About</a></li>';
                    echo '<li><a href="contact.php">Contact Us</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
    
</nav>