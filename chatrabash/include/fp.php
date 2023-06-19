<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Forgotten Password - Chatrabash</title>
    <meta name="description" content="Online accommodation system for university students. Design by @Sazib.Gub">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dokdo&amp;display=swap">
    <link rel="stylesheet" href="../assets/css/main.css">

</head>

<body>
<?php
include('navbar.php');
?>
<div class="container py-md-5">
    <div class="row d-flex align-items-center">
        <div class="col-md-6 text-center"><img class="img-fluid w-100" src="../assets/img/svg/hm.svg" loading="auto"></div>
        <div class="col-md-5 col-xl-4 text-center text-md-start">
            <h2 class="display-6 fw-bold mb-4">Forgot your <span style="border-radius: 4px;border-bottom: 6px solid var(--bs-secondary) ;">password</span>?</h2>
            <p class="text-muted">Enter the email associated with your account and we'll send you a reset link.</p>
            <form method="post">
                <div class="mb-3"><input class="shadow form-control" type="email" name="email" placeholder="Email"></div>
                <div class="mb-5"><button class="btn btn-primary shadow" type="submit">Reset password</button></div>
            </form>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>

<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/bs-init.js"></script>
<script src="../assets/js/ssmodern.js"></script>
</body>

</html>