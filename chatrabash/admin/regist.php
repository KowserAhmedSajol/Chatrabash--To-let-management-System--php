<?php 

session_start();
if (isset($_SESSION['ADMIN_ID'])) {
    ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Chatrabash Admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/style-s.css">
</head>

<body>
    <div id="wrapper">

    <?php
    require_once('sidebar.php');
    ?>
                <section style="background: radial-gradient(#000000 8%, #f6c23e85 100%);">
                    <div class="container" style="backdrop-filter: blur(30px);">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4"><span style="color: rgb(255, 255, 255);">Create an Administrator Account!</span></h4>
                                <p class="w-lg-50" style="color: rgb(255,255,255);">We monitoring the system activity log. Don't do anything unnecessary</p>
                            </div>
                            <form class="user" action="regist.php" method="post" enctype="application/x-www-form-urlencoded">
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="First Name" name="first_name" style="border-radius: 0px;"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="exampleLastName" placeholder="Last Name" name="last_name" style="border-radius: 0px;"></div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group"><span class="input-group-text" style="border-radius: 0px;font-size: 12px;">👤User name&nbsp;</span><input class="form-control form-control-lg" type="text" id="Inpu" style="border-radius: 0px;font-size: 12.8px;" placeholder="@users _name" name="user_name"></div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group" sty=""><span class="input-group-text" style="border-radius: 0px;font-size: 12px;">👤User email</span><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address" name="email" style="border-radius: 0px;"></div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group" sty=""><span class="input-group-text" style="border-radius: 0px;font-size: 12px;">👤User Password</span><input class="form-control form-control-user" type="password" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Password. . . ." name="password" style="border-radius: 0px;"></div>
                                </div>
                                <div class="row mb-3">
                                </div><button class="btn btn-warning d-block btn-user w-100" type="submit" style="border-radius: 0px;">Register Account</button>
                                <hr>
                            </form>
                            <div class="text-center" style="color: var(--bs-highlight-bg);"><a class="small" href="l_ogin.html" style="color: var(--bs-highlight-bg);">Already have an account? Login!</a></div>
                        </div>
                    </div>
                </section>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/chatrabaee.js"></script>
</body>

</html>
    <?php
}else{
    
    header("location:login.php");
}


?>

