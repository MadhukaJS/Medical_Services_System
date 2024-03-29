<?php

    /* database connection page include */
    require_once('../../connection/connection.php');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Categories - CareHome</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--title icon-->
        <link rel="icon" type="image/ico" href="../../images/logoc.png" />
        
        <!-- bootstrap jquary -->
        <script src="../../js/bootstrap.min.js"></script>
        
        <!-- bootstrap css -->
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
    
        <!-- font awesome icon -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.css" rel="stylesheet">
        
        <!-- popper for tooltip -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        
        
        <!-- jquary -->        
        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/script.js"></script>
        
        <!-- css -->
        <link href="../../css/index.css" rel="stylesheet">

    </head>
    
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../../index_en.php"><img id="logo" src="../../images/logoc.png"> CareHome Consulting Service</a>
                </div>
                <ul class="nav navbar-nav navbar-right lead">
                    <li class="nav-item"><a class="nav-link" href="../../index_en.php">HOME</a></li>
                    <li class="nav-item active"><a class="nav-link" href="department_en.php">CATERGORIES</a></li>
                    <li class="nav-item"><a class="nav-link" href="doctor_en.php">DOCTORS</a></li>
                    <li class="nav-item"><a class="nav-link" href="about_en.php">ABOUT</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact_en.php">CONTACT</a></li>
                    <li class="nav-item"><a class="nav-link" href="../login.php" target="_blank">LOGIN</a></li>
                    <li>
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-outline-primary"  onclick="window.location.href = 'department_en.php';">En</button>
                            <button type="button" class="btn btn-outline-primary"  onclick="window.location.href = 'department_si.php';">සිං</button>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        
        <section class="col-12 departmentImg container-fluid">
                
        </section>
        
        <section>        
            <div class="container">
                <div class="row">
                    <div class="depList col-lg-3 col-md-3 col-sm-12 col-12 mt-5 mb-5">
                        <div class="py-5 px-2">                                
                                <?php

                                    $query = "SELECT * FROM `department` ORDER BY `name`";

                                    $result_set = mysqli_query($con,$query);

                                    if (mysqli_num_rows($result_set) >= 1) {

                                        while($deptName = mysqli_fetch_assoc($result_set)){
                                            echo "<p><a href='department_en.php?id={$deptName['id']}'><hr><i class='fas fa-angle-double-right'></i> ".$deptName['name']."<hr></a></p>";
                                        }

                                    } else {
                                        echo "<p><hr><i class='fas fa-angle-double-right'></i> List Empty<hr></p>";
                                    }

                                ?>
                        </div>
                    </div>

                    <div class="deptList col-lg-9 col-md-9 col-sm-12 col-12">
                        <div class="deptDesc py-5 ml-3" name="deptDesc" id="deptDesc">
                            <?php

                                if(isset($_GET['id'])){
                                    $deId = $_GET['id'];

                                    $query = "SELECT d.`id`, d.`name`, d.`description`, a.firstName AS fName, a.lastName AS lName FROM `department` d, `doctor` a WHERE a.id = d.`department_head` AND d.`id` = '{$deId}' LIMIT 1";

                                    $result_set = mysqli_query($con,$query);

                                    $deptDe = mysqli_fetch_assoc($result_set);

                                    echo "<h1 id='depTopic'>".$deptDe['name']."</h1>";

                                    echo "<hr>";

                                    echo "<p class='lead text-justify' id='depDescription'>".$deptDe['description']."</p>";

                                    echo "<hr><h5>Department Head: Dr. <font class='lead' id='depHeadDr'>".$deptDe['fName']." ".$deptDe['lName']."</font></h5>";
                                } else {
                                    echo "<h1 id='depTopic'>Departments</h1>";
                                }
                            ?>








                            <h1></h1>

                        </div>
                    </div>
                </div>                
            </div>
        </section>
        
        
            <section>        
                <div class="footer position-relative">
                    <div class="container">
                        <div class="row">
                            <div class="footerLogo col-lg-4 col-md-4 col-sm-12 col-12 py-5">
                                <img src="../../images/logoc.png">
                                <p class="mt-3">CareHome online consulting service</p>
                            </div> 
                            <div class="footerLink  col-lg-4 col-md-4 col-sm-12 col-12 py-5">
                                <h6>MAIN MENU</h6>
                                <ul>
                                    <a href="../../index_en.php"><li>Home</li></a>
                                    <a href="department_en.php"><li>Department</li></a>
                                    <a href="doctor_en.php"><li>Doctor</li></a>
                                    <a href="../login.php" target="_blank"><li>Login</li></a>
                                </ul>
                            </div>
                            <div class="footerLink  col-lg-4 col-md-4 col-sm-12 col-12 py-5">
                                <h6>HELP &amp; SUPPORT</h6>
                                <ul>
                                    <a href="contact_en.php"><li>Contact Us</li></a>
                                    <a href="about_en.php"><li>About Us</li></a>
                                </ul>
                            </div>
                        </div>
                        <div class="row border-top">
                            <div class="footerBottom col-lg-6 col-md-6 col-sm-6 col-6 py-3">
                                <p>carehome</p>
                            </div>
                            <div class="sociaMedia col-lg-6 col-md-62 col-sm-6 col-12 py-3 text-right">
                                    <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-square fa-2x ml-3"></i></a>
                                    <a href="https://twitter.com/login?lang=en" target="_blank"><i class="fab fa-twitter-square fa-2x ml-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </body>
    
</html>