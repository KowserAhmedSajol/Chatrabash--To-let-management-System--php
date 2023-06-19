<?php
$conn=mysqli_connect("localhost","root","", "chatrabash");
$msg = "";
session_start();
if(isset($_SESSION['USER_ID'])){
    header("location:index.php");
} else {
    if(isset($_POST['submit'])) {
        $email= mysqli_real_escape_string($conn,$_POST['email']);
        $password= mysqli_real_escape_string($conn,sha1($_POST['password']));

        $sql=mysqli_query($conn,"select * from users where email='$email' && password='$password'");
        $num=mysqli_num_rows($sql);
        if ($num>0) {
            session_start();
            $msg = "";
            $row=mysqli_fetch_assoc($sql);
            $_SESSION['USER_ID']=$row['id'];
            $_SESSION['USER_F_NAME']=$row['firstname'];
            $_SESSION['USER_NAME']=$row['lastname'];
            $_SESSION['EMAIL']=$row['email'];
            $_SESSION['PHONE']=$row['phonenumber'];
            $_SESSION['PASSWORD']=$row['password'];
            $_SESSION['WELCOME']="welcome";
            header("location:index.php");
        } else {
            $msg = "Something is Wrong";
        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Log in - Chatrabash</title>
    <meta name="description" content="Online accommodation system for university students.Design by @Sazib.Gub">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dokdo&amp;display=swap">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
<?php
include('include/navbar.php');
?>
<section class="py-4 py-md-5 my-5">
    <div class="container py-md-5">
        <div class="row">
            <div class="col-md-6 text-center">
                <img class="img-fluid w-100" src="assets/img/svg/Wildflowers%20lineart.svg" loading="auto">
            </div>
        <div class="col-md-5 col-xl-4 text-center text-md-start" style="box-shadow: 20px 20px 20px 5px rgba(255,210,0,0.14);">
                    <div>
                        <div class="error">
                            <?php echo $msg; ?>
                        </div>
                        <h2 class="display-6 fw-bold mb-5"><span style="border-bottom: 6px solid var(--bs-secondary);">
                                <strong>Login</strong><br></span></h2>
                        <form method="post">
                            <div class="mb-3">
                                <input class="form-control shadow" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <input class="form-control shadow" type="password" name="password" placeholder="Password">
                    </div>
            <br>
                            <div class="mb-5">
                                <input class="btn btn-primary shadow" type="submit" name="submit" value="Login"/>
                            </div>
                        </form>
                        <p class="text-muted">Forgot your password?&nbsp;<a href="preset.php">Reset</a></p>
            </div>
        </div>
    </div>
</section>
<?php
include('include/footer.php');
?>
</script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/smart-forms.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src=".assets/js/ssmodern.js"></script>
<script src="assets/js/all.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>


</html>
<?php 
if(isset($_SESSION['NEW_U'])){
    ?>
    <script>
        
        Swal.fire({
            icon: 'success',
            title: 'Welcome ',
            text: 'Your are successfully Signed up to our site!',
            footer: '<a href="index.php">Go to home page now?</a>'
            })
    </script>
    <?php
    unset($_SESSION['NEW_U']);
}
?>