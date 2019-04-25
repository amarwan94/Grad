

﻿<?php
session_start();
include_once './headUI.php';
?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <title>Mateعrafsh?-AdminForm</title>
        <style>
            body{
                background-color: #F5F4EE;
            }

            img {
                width: 100%;
                height: auto;
            }

            #subh{
                color: black;
                font-family: calibri;
            }
        </style>
    </head>

    <body>

        <!-- Navigation -->
        <?php
        include_once './navUI.php';
        ?>
        <header class="intro-header" style="background-image: url('img/4.jpg')">
            <!--the container-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h2>High Rate Technicians</h2>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-hover col-xs-12" id="table">
                        <thead>
                            <tr>
                                <th>Tech ID</th>
                                <th>Tech Name</th>
                                <th>Service Rate</th>
                                <th>Price Rate</th>
                                <th>Overall Rate</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT technician.id, technician.firstName, technician.lastName, sum(rate.price) AS 'pr', sum(rate.service) as 'sr', count(*) as 'cr' FROM technician JOIN operation on operation.technicianId = technician.id JOIN rate ON operation.id = rate.operationId GROUP BY technician.id ";
                            require_once './Artifex.php';
                            $con = Artifex::getInstance();
                            $result = $con->execute($query);
                            while ($row = $result->fetch_assoc()) {
                                try {
                                    if (($row['pr'] + $row['sr']) / ($row['cr'] * 2) > 4.0) {
                                        echo '<tr>';
                                        echo '<td>' . $row['id'] . '</td>';
                                        echo '<td>' . $row['firstName'] . ' ' . $row['lastName'] . '</td>';
                                        echo '<td>' . round($row['sr'] / $row['cr'], 2) . '</td>';
                                        echo '<td>' . round($row['pr'] / $row['cr'], 2) . '</td>';
                                        echo '<td>' . round(($row['pr'] + $row['sr']) / ($row['cr'] * 2), 2) . '</td>';
                                        echo '<td><a href="#.php?Id=' . $row['id'] . '"> Contact</a></td>';
                                        echo '</tr>';
                                    }
                                } catch (Exception $ex) {
                                    // do nothing
                                }
                            }
                            ?>

                        </tbody>
                    </table>
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