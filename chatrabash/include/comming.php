<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Chatrabash3</title>
    <meta name="description" content="Online accommodation system for university students. Design by @Sazib.Gub">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dokdo&amp;display=swap">
    <link rel="stylesheet" href="../assets/css/main.css">

</head>

<body>
<section>
    <div class="container">
        <div class="row g-0">
            <div class="col d-lg-flex justify-content-lg-center align-items-lg-center"><img class="img-fluid" src="../assets/img/svg/Campsite.svg" width="300px" height="600px"></div>
        </div>
        <div class="row">
            <div class="col" id="demo" style="font-family: Dokdo, serif;font-size: 60px;font-weight: bold;text-align: center;">

            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1 style="text-align: center;font-weight: bold;">Coming Soon</h1>
                <p style="text-align: center;font-family: Raleway, sans-serif;"><span style="color: rgb(33, 37, 41);">Service is not available&nbsp;at&nbsp;this&nbsp;moment we're working on it!</span><br></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="border rounded border-white d-flex flex-column justify-content-between align-items-center flex-lg-row p-4 p-lg-5">
                    <div class="text-center text-lg-start py-3 py-lg-1">
                        <h2 class="fw-bold mb-2"><span style="font-weight: normal !important;">Subscribe to get updates</span></h2>
                    </div>
                    <form class="d-flex justify-content-center flex-wrap flex-lg-nowrap" method="post">
                        <div class="my-2"><input class="shadow-sm form-control" type="email" name="email" placeholder="Your Email"></div>
                        <div class="my-2"><button class="btn btn-warning shadow" type="submit">Subscribe </button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

    // Set the date we're counting down to
    var countDownDate = new Date("Jan 29, 2023 15:37:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>

<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/bs-init.js"></script>
<script src="../assets/js/ssmodern.js"></script>
</body>

</html>


