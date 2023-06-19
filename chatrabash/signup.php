<?php
require('include/config.php');
$conn = mysqli_connect("localhost", "root", "", "chatrabash");
$msg = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sign up - Chatrabash</title>
    <meta name="description" content="Online accommodation system for university students.Design by @Sazib.Gub">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dokdo&amp;display=swap">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<?php
include('include/navbar.php');
?>
<div>
    <?php
    session_start();
    if (isset($_SESSION['USER_ID'])) {
        header("location:index.php");
    } else {
        if (isset($_POST['create'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $phonenumber = $_POST['phonenumber'];
            $password = sha1($_POST['password']);
            $type = "tennent";

            // Check if email is already registered
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
            $num = mysqli_num_rows($sql);
            if ($num > 0) {
                $msg = "This Email is already registered in our server. Try another one. :-)";
            } else {
                $sql = "INSERT INTO users (firstname, lastname, email, phonenumber, password, type) VALUES (?,?,?,?,?,?)";
                $stmtinsert = $db->prepare($sql);
                $result = $stmtinsert->execute([$firstname, $lastname, $email, $phonenumber, $password, $type]);
                if ($result) {
                    $_SESSION['NEW_U'] = "new";
                    header('Location: login.php');
                } else {
                    echo "Something went wrong";
                }
            }
        }
    }
    ?>

    <section class="py-4 py-md-5 my-5">
        <div class="container py-md-5">
            <div class="row">
                <div class="col-md-6 col-lg-6 text-center">
                    <img class="img-fluid w-100" src="assets/img/svg/Willow%20tree.svg" loading="auto">
                </div>
                <div class="col-md-6 col-lg-5 col-xl-4 text-center text-md-start"
                     style="box-shadow: 20px 20px 20px 5px rgba(255, 210, 0, 0.14);">
                    <h2 class="display-6 fw-bold mb-5">
                        <span style="border-radius: 0px;border-bottom: 3px solid var(--bs-indigo);"><strong>Sign up</strong></span>
                    </h2>
                    <form method="post" action="signup.php">
                        <div class="mb-3">
                            <input class="form-control form-control-sm" type="text" placeholder="First Name"
                                   name="firstname" required>
                        </div>
                        <div class="mb-3">
                            <input class="form-control form-control-sm" type="text" placeholder="Last Name"
                                   name="lastname" required>
                        </div>
                        <div class="mb-3">
                            <input class="shadow-sm form-control form-control-sm" type="email" name="email"
                                   placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <input class="shadow-lg form-control form-control-sm" type="tel" placeholder="Phone Number"
                                   required name="phonenumber">
                        </div>
                        <div class="mb-3">
                            <input class="shadow-sm form-control form-control-sm" type="password" name="password"  id="password"
                                   placeholder="Password" required>
                                   
                        <div style=" height: 10px;"> <p id="message" style="display: none;">
                                 <b>Password is <span id="strength"></span></b>  </p>
                            </div>
                        </div>
                        <div class="mb-5">
                            <button class="btn btn-primary btn-sm shadow" type="submit" name="create">Create account
                            </button>
                        </div>
                        <p class="text-muted">Have an account? <a href="login.php">Log in</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php
    include('include/footer.php');
    ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/ssmodern.js"></script>
    <script src="assets/js/all.js"></script>

</body>
<script>
        function password_show_hide() {
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }
            
            var pass = document.getElementById("password");
            var msg = document.getElementById("message");
            var str = document.getElementById("strength");

            let alphabet = /[a-z,A-Z]/,
                numbers = /[0-9]/,
                scharacter = /[!,@,#,$,%,^,&,*,?,_,(,),-,+,=,~]/;

            pass.addEventListener('input', () => {
                if(pass.value.length > 0 ) {
                    msg.style.display = "block";

                }else{
                    msg.style.display = "none";

                }
                if(pass.value.match(alphabet) || pass.value.match(numbers) || pass.value.match(scharacter ) ) {
                    str.innerHTML = "Weak";
                    msg.style.color = "#FC1200";
                }
                if(pass.value.match(alphabet) && pass.value.match(numbers) && pass.value.length >= 6){
                    str.innerHTML = "Medium";
                    msg.style.color = "#F2BF2F";
                }
                if(pass.value.match(alphabet) && pass.value.match(numbers) && pass.value.match(scharacter) && pass.value.length >= 8){
                    str.innerHTML = "Strong";
                    msg.style.color = "#078E63";
                }

            })



    
    </script>

</html>