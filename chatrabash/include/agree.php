<?php
require('config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Pricing - Chatrabash</title>
    <meta name="description" content="Online accommodation system for university students.
Design by @Sazib.Gub">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dokdo&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/Slider.css">
</head>

<body>
<?php
include('navbar.php');
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col" style="margin-top: 30px;margin-bottom: 20px;">
                <h1 class="text-center">Different types of rental agreement</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div>
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="pill" href="#tab-1">Tenant agreement</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="pill" href="#tab-2">Home Owner</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="tab-1">
                            <div class="ratio ratio-16x9"><iframe src="https://docs.google.com/document/d/1n1Ki-cc37Smkj9RIACZafQ1gOR_-kwxP/edit?usp=share_link&amp;ouid=102808953363752005831&amp;rtpof=true&amp;sd=true"></iframe></div>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="tab-2">
                            <div class="ratio ratio-16x9"><iframe src="https://dmp.gov.bd/wp-content/uploads/2016/10/Tenant-Registration-Form.pdf"></iframe></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include('footer.php');
?>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/bs-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
<script src="../assets/js/Slider.js"></script>
<script src="../assets/js/ssmodern.js"></script>
</body>

</html>