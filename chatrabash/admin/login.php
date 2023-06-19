<?php

$msg = "Something ";
session_start();
if (isset($_SESSION['ADMIN_ID'])) {
    header("location:index.php");
}else{


   if(isset($_POST['submitAdmin'])) {
        $con=mysqli_connect("localhost","root","", "chatrabash");
        $email= mysqli_real_escape_string($con,$_POST['email']);
        $password= mysqli_real_escape_string($con,$_POST['password']);

        $sql=mysqli_query($con,"select * from admin where email='$email' && password='$password'");
        $num=mysqli_num_rows($sql);
        if ($num>0) {
            session_start();
            $msg = "";
            $admin_data=mysqli_fetch_assoc($sql);
            $_SESSION['ADMIN_ID']=$admin_data['id'];
            $msg =  $_SESSION['ADMIN_ID'];
            $_SESSION['ADMIN_FIRST_NAME']=$admin_data['first_name'];
            $_SESSION['ADMIN_LAST_NAME']=$admin_data['last_name'];
            $_SESSION['ADMIN_EMAIL']=$admin_data['email'];
            $_SESSION['ADMIN_USERNAME']=$admin_data['username'];
            $_SESSION['ADMIN_PASSWORD']=$admin_data['password'];
            header("location:index.php");
        } else {
            $msg = "Something is Wrong ok?";
        }

    }




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Chatrabash Admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/css/style-s.css">
</head>

<body>
    <section class="position-relative py-4 py-xl-5" style="background: url(&quot;assets/img/dna.jpg&quot;) center / auto no-repeat;">
        <div class="container" style="backdrop-filter: blur(30px);">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto" style="backdrop-filter: blur(26px);">
                    <h2 style="color: rgb(255,255,255);">&nbsp;</h2>
                    <h2 style="color: rgb(255,255,255);">Admin Login</h2>
                    <p class="w-lg-50" style="color: rgb(255,255,255);">We monitoring the system activity log. Don't do anything unnecessary<br></p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4" style="filter: blur(0px);backdrop-filter: blur(14px);">
                    <div class="card border-0 mb-5" style="background: rgba(255,255,255,0);filter: blur(0px);">
                        <div class="card-body d-flex flex-column align-items-center">



                            <form class="text-center" method="post"  style="width: 300px;">
                                <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email" style="border-radius: 0px;border-width: 1px;"></div>
                                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password" style="border-radius: 0px;border-width: 1px;"></div>
                                <div class="mb-3"><input class="btn btn-warning w-100" type="submit" name="submitAdmin" style="border-radius: 0px;border-width: 0px;" value="Login"></div>
                                
                            </form>
                            <?php
                            echo $msg;
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/chatrabaee.js"></script>
</body>

</html>
<?php

}

 