<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contacts - Chatrabash</title>
    <meta name="description" content="Online accommodation system for university students. Design by @Sazib.Gub">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dokdo&amp;display=swap">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
<?php
    include('include/navbar.php');
?>

<section style="background: #eeece4;">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h6 class="display-6 fw-bold mb-4">Got any&nbsp;<span style="border-radius: 4px;border-bottom: 6px solid var(--bs-secondary) ;">questions</span> ?</h6>
                <p class="text-muted">Our team is always here to help. Send us a message and we'll get back to you shortly.</p>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col">
                <picture><img class="img-fluid" src="assets/img/svg/Welcome%20Autumn%20set.svg" loading="auto"></picture>
            </div>
            <div class="col">
                <div>
                    <form class="p-3 p-xl-4" method="post" enctype="application/x-www-form-urlencoded">
                        <div class="mb-3"><input class="shadow form-control" type="text" id="name-1" name="name" placeholder="Name"></div>
                        <div class="mb-3"><input class="shadow form-control" type="email" id="email-1" name="email" placeholder="Email"></div>
                        <div class="mb-3"><textarea class="shadow form-control" id="message-1" name="message" rows="6" placeholder="Message"></textarea></div>
                        <div><button class="btn btn-primary shadow d-block w-100" type="submit">Send </button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once ('include/faq.php');
?>
<?php
require_once ('include/footer.php');
?>

<script>
    var speed = 'slow';

    $('php, body').hide();

    $(document).ready(function() {
        $('html, body').fadeIn(speed, function() {
            $('a[href], button[href]').click(function(event) {
                var url = $(this).attr('href');
                if (url.indexOf('#') == 0 || url.indexOf('javascript:') == 0) return;
                event.preventDefault();
                $('html, body').fadeOut(speed, function() {
                    window.location = url;
                });
            });
        });
    });
</script>

<script src="assets/js/jquery.min.js"></script>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/ssmodern.js"></script>

<script src="https://smtpjs.com/v3/smtp.js"></script>
    <script>
        function sendEmail(){
            Email.send({
            Host : "smtp.gmail.com",
            Username : "kowsersojol@gmail.com",
            Password : "iqbtqpxlqkwokoxt",
            To : 'kowsersojol@gmail.com',
            From : document.getElementById("email").value,
            Subject : "New contact form enquiry",
            Body : "Name : " + document.getElementById("email").value
            + "<br> Email : " + document.getElementById("name").value
            + "<br> Message : " + document.getElementById("message").value
            }).then(
            message => alert("Message sent successfully")
            );
        }


    </script>

</body>
</html>