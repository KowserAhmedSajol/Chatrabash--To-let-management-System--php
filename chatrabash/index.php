<?php
require('include/config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Chatrabash</title>
    <meta name="description" content="Online accommodation system for university students.Design by @Sazib.Gub">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dokdo&amp;display=swap">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">


</head>

<body>
    <?php
    require_once('include/navbar.php');
    ?>

    <header data-bss-parallax-bg="true" class="pt-5" style="background-image: url(&quot;assets/img/all/1.jpg&quot;);background-position: center;background-size: cover;">
        <div class="container pt-4 pt-xl-5" style="backdrop-filter: blur(20px);background: rgba(233,236,239,0.26);">
            <div class="row pt-5" style="backdrop-filter: blur(0px);padding-bottom: 100px;">
                <div class="col-md-8 text-center text-md-start mx-auto">
                    <div class="text-center">
                        <h1 class="display-4 fw-bold mb-5" style="color: var(--bs-secondary);"><strong>
                                <span style="color: rgba(var(--bs-primary-rgb), var(--bs-text-opacity)) ;">Find your next home</span></strong><br></h1>
                        <p class="mb-5 text-light">
                            <strong>The best accommodation finder <span class="badge bg-primary mb-3"> Selected #1 Countrywide</span> for university students</strong><br></p>
                        <form class="d-flex justify-content-center flex-wrap" method="post">
                            <div class="input-group"><input class="form-control" type="search" placeholder="Search for " style="background: rgba(255,255,255,0.5);border-style: none;">
                                <button class="btn btn-warning" type="submit" style="background: rgb(246,194,62);">
                                    <span >Search&nbsp;</span>
                                    <i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </form>
                        <div id="schedule_link_pc">
                            <p>
                                &nbsp;
                            </p>
                            <p>
                                &nbsp;
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="text-center" style="padding-top: 20px;padding-bottom: 20px;"><button class="btn btn-danger fs-4 shadow-lg" type="submit" data-bs-toggle="modal" data-bs-target="#modal-1"><img class="img-fluid" id="im-1" src="assets/img/all/arrowwhite.gif" style="width: 32px;" width="32" height="29">&nbsp;Request for a Room&nbsp;<img class="img-fluid" id="im4" src="assets/img/all/arrowwhite.gif" style="width: 32px;" width="32" height="29"></button>
        <div class="modal fade" role="dialog" tabindex="-1" id="modal-1" aria-labelledby="modal-1" aria-hidden="true" style="filter: blur(0px);">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header text-primary shadow-lg" style="border-top-left-radius: 0px;border-top-right-radius: 0px;border-width: 4px;color: var(--bs-blue);">
                        <h4 class="modal-title">Submit a&nbsp; request to us !</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="filter: blur(0px);">
                        <section class="position-relative py-4 py-xl-5" style="color: var(--bs-blue);filter: blur(0px);padding-bottom: 0px;">
                            <div class="container position-relative">
                                <div class="row d-flex">
                                    <div class="col-lg-12">
                                        <div class="card mb-5">
                                            <div class="card-body p-sm-5" style="border-style: none;">
                                                <form action="include/spetial_request.php" method="post">
                                                    <div class="mb-3"><small class="form-text">100TK</small>
                                                        <input class="form-control form-control-sm" type="text" placeholder="Phone Number" name="sender_phone_number">
                                                    </div>
                                                    <div class="mb-3">
                                                        <input name="transaction_id" class="form-control form-control-sm" type="text" placeholder="Transaction ID">
                                                    </div>
                                                    <div class="mb-3">
                                                        <select name="method" class="form-select form-select-sm" style="border-width: 1px;" required="" name="Gender ">
                                                            <option value="Bkash">Bkash</option>
                                                            <option value="Rocket">Rocket</option>
                                                            <option value="Upay">Upay</option>
                                                            <option value="Nagad">Nagad</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input name="sending_time" class="form-control form-control-sm" type="text" placeholder="Time">
                                                    </div>
                                                    <div class="mb-3"><small class="form-text">Gender</small>
                                                        <select name="gender" class="form-select form-select-sm" style="border-width: 1px;" required=""">
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3"><small class="form-text">Pick a sittable time&nbsp;</small>
                                                        <input name="date_time" class="form-control form-control-sm" type="datetime-local" required="">
                                                        <div class="mb-3"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input name="rent_range" class="form-control form-control-sm" type="number" required="" placeholder="Rent Range EX: (2500-3000)">
                                                    </div>
                                                    <div class="mb-3">
                                                        <select class="form-select form-select-sm" style="border-width: 1px;" required="" name="university_name">
                                                            <option value="GUB">Green University of Bangladesh</option>
                                                            <option value="NSU">North South University of Bangladesh</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <select class="form-select form-select-sm" style="border-width: 1px;" required="" name="area">
                                                            <option value="Mirpur">Mirpur</option>
                                                            <option value="Uttara">Uttara</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input class="form-control form-control-sm" type="text" id="name-3" name="name" placeholder="Name" required="">
                                                    </div>
                                                    <div class="mb-3">
                                                        <input class="form-control form-control-sm" type="email" id="email-2" name="email" placeholder="Email ">
                                                    </div>
                                                    <div class="mb-3">
                                                        <input class="form-control form-control-sm" type="tel" placeholder="Number" name="number" required="" maxlength="12" minlength="8">
                                                    </div>
                                                    <div class="mb-3"><label for="message-2"></label>
                                                        <textarea class="form-control form-control-sm" id="message-2" name="address" rows="4" placeholder="Full Address"></textarea>
                                                    </div>
                                                    <div class="mb-3"><label for="message-1"></label>
                                                        <textarea class="form-control form-control-sm" id="message-1" name="requrst_disc" rows="4" placeholder="If any request for room quality"></textarea>
                                                    </div>
                                                    <div>
                                                        <input class="btn btn-primary btn-sm shadow-lg d-block w-100" name="submit" value="Send" type="submit">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-4 py-xl-5">
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-lg-3">
                <div class="col">
                    <div class="card border-light border-1 shadow-sm d-flex justify-content-center p-4">
                        <div class="card-body">
                            <div class="bs-icon-lg d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-4 bs-icon">
                                <img class="img-fluid" src="assets/img/all/ugc.png" style="height: 64px;width: 64px;">
                            </div>
                            <div>
                                <h4 class="fw-bold"><span style="border-bottom: 4px solid var(--bs-yellow) ;">UGC</span>
                                </h4>
                                <p class="text-muted">University Grants Commission of Bangladesh was established on 16
                                    December 1972. It was created according to the Presidential Order of the Government
                                    of People's Republic of Bangladesh.&nbsp;Under the Ministry of Human Resources
                                    Development &amp; affiliated with the ministry of higher education.<br></p><a
                                        class="btn btn-sm px-0" role="button" href="http://www.ugc.gov.bd/" target="_blank"
                                        rel="external">Learn More&nbsp;<i class="fa-solid fa-arrow-right-long"></i><br></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-light border-1 shadow-sm d-flex justify-content-center p-4">
                        <div class="card-body">
                            <div class="bs-icon-lg bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-4 bs-icon">
                                <img class="img-fluid" src="assets/img/all/iee.png"></div>
                            <div>
                                <h4 class="fw-bold"><span style="border-bottom: 4px solid var(--bs-yellow) ;">IEEE</span></h4>
                                <p class="text-muted">The Institute of Electrical and Electronics Engineers is a 501
                                    professional association for electronic engineering and electrical engineering with
                                    its corporate office in New York City and its operations center in Piscataway, New
                                    Jersey. The main scope of the IEEE is dedicated to advancing technology for the
                                    benefit of humanity.<br></p>
                                <a class="btn btn-sm px-0" role="button" href="https://www.ieee.org/" target="_blank" rel="external">Learn More&nbsp;<i class="fa-solid fa-arrow-right-long"></i><br></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-light border-1 shadow-sm d-flex justify-content-center p-4">
                        <div class="card-body">
                            <div class="bs-icon-lg d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-4 bs-icon">
                                <img class="img-fluid" src="assets/img/all/qsa.png">
                            </div>
                            <div>
                                <h4 class="fw-bold"><span style="border-bottom: 4px solid var(--bs-yellow) ;">QS</span>
                                </h4>
                                <p class="text-muted">QS World University Rankings is an annual publication of
                                    university rankings by Quacquarelli Symonds. The QS system comprises three parts:
                                    the global overall ranking, the subject rankings, and five independent regional
                                    tables—namely Asia, Latin America, Emerging Europe and Central Asia, the Arab
                                    Region, and BRICS.<br></p><a class="btn btn-sm px-0" role="button" href="https://www.topuniversities.com/" target="_blank" rel="external">Learn More&nbsp;<i class="fa-solid fa-arrow-right-long"></i><br></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section style="background: #eeece4;">
        <div class="container py-4 py-xl-5">
            <div class="row">
                <div class="col-md-6">
                    <span style="font-weight: bold;font-style: italic;font-size: 35px;border-bottom: 6px solid var(--bs-yellow) ;">Our Service</span>
                </div>
            </div>
            <div class="row gy-4 gy-md-0">
                <div class="col-md-6 d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                    <div data-aos="zoom-in-right">
                        <div class="row gy-2 row-cols-1 row-cols-sm-2">
                            <div class="col text-center text-md-start order-1">
                                <div class="d-flex justify-content-center align-items-center justify-content-md-start"> <i class="fa-solid fa-shield fs-3 text-primary"></i>

                                    <h5 class="fw-bold mb-0 ms-2"><strong>Verified Rent post</strong><br></h5>
                                </div>
                                <p class="text-muted my-3">Auctor nisi et, habitant gravida ad lectus posuere.</p>
                            </div>
                            <div class="col text-center text-md-start order-2">
                                <div class="d-flex justify-content-center align-items-center justify-content-md-start">  <i class="fa-solid fa-star fs-3 text-primary"></i>

                                    <h5 class="fw-bold mb-0 ms-2"><strong>Spatial Request</strong><br></h5>
                                </div>
                                <p class="text-muted my-3">Auctor nisi et, habitant gravida ad lectus posuere.</p>
                            </div>
                            <div class="col text-center text-md-start order-4">
                                <div class="d-flex justify-content-center align-items-center justify-content-md-start"> <i class="fa-solid fa-people-roof fs-3 text-primary"></i>

                                    <h5 class="fw-bold mb-0 ms-2"><strong>Owner and Tenant&nbsp;</strong><br></h5>
                                </div>
                                <p class="text-muted my-3">Auctor nisi et, habitant gravida ad lectus posuere.</p>
                            </div>
                            <div class="col text-center text-md-start order-3">
                                <div class="d-flex justify-content-center align-items-center justify-content-md-start"> <i class="fa-solid fa-file-contract fs-3 text-primary"></i>

                                    <h5 class="fw-bold mb-0 ms-2"><strong>Rental Agreement</strong><br></h5>
                                </div>
                                <p class="text-muted my-3">Auctor nisi et, habitant gravida ad lectus posuere.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 order-first order-md-last">
                    <div data-aos="fade-left" >
                        <img class="rounded img-fluid w-100 fit-cover" src="assets/img/svg/Desert%20Island.svg">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-4 py-xl-5">
            <div class="row">
                <div class="col"><span style="font-weight: bold;font-size: 30px;font-style: italic;border-bottom: 4px solid var(--bs-yellow);">
                        Total Service Provides</span>
                </div>
            </div>
            <div class="row gy-4 gy-md-0">
                <div class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center order-first justify-content-md-start align-items-md-center justify-content-xl-center">
                    <div data-aos="fade-right">
                        <img class="rounded img-fluid fit-cover"src="assets/img/svg/Sea%20sunset.svg" width="800">
                    </div>
                </div>
                <div class="col d-sm-flex align-items-md-center justify-content-lg-center">
                    <div data-aos="zoom-out-up">
                        <div class="row gy-4 row-cols-2 row-cols-md-2">
                            <div class="col order-1">
                                <div><span class="fs-2 fw-bold text-white bg-primary">&nbsp;40+&nbsp;</span>
                                    <p class="fw-normal text-muted">Agreement</p>
                                </div>
                            </div>
                            <div class="col order-3">
                                <div><span class="fs-2 fw-bold text-white bg-primary">&nbsp;100+&nbsp;</span>
                                    <p class="fw-normal text-muted">Accommodation Post</p>
                                </div>
                            </div>
                            <div class="col order-4">
                                <div><span class="fs-2 fw-bold text-white bg-primary">&nbsp;5+&nbsp;</span>
                                    <p class="fw-normal text-muted">University Add</p>
                                </div>
                            </div>
                            <div class="col order-2">
                                <div><span class="fs-2 fw-bold text-white bg-primary">&nbsp;20+&nbsp;</span>
                                    <p class="fw-normal text-muted">Area Coverage</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 mt-5" style="background: #eeece4;">
        <div class="container py-5" style="background: #e3dfd1;">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold">What people say<br><span style="border-bottom: 4px solid #f6c23e ;">about us</span></h2>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 d-sm-flex justify-content-sm-center">
                <div class="col mb-4" style="background: #eeece4;">
                    <div class="d-flex align-items-center align-items-sm-start">
                        <div>
                            <p class="fs-6 mb-3 ms-2">Nisi sit justo faucibus nec ornare amet, tortor torquent. Blandit class dapibus, aliquet morbi.</p>
                            <div class="d-flex ms-2">
                                <div class="d-flex">
                                    <p class="fw-bold me-2"><i class="fa-solid fa-message fs-3 text-primary"></i>&nbsp;Real Khan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-4" style="background: #eeece4;">
                    <div class="d-flex align-items-center align-items-sm-start">
                        <div>
                            <p class="fs-6 mb-3 ms-2">Nisi sit justo faucibus nec ornare amet, tortor torquent. Blandit class dapibus, aliquet morbi.</p>
                            <div class="d-flex ms-2">
                                <div class="d-flex">
                                    <p class="fw-bold me-2"><i class="fa-solid fa-message fs-3 text-primary"></i> &nbsp;Sumon 55</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4" style="background: #eeece4;">
                    <div class="d-flex align-items-center align-items-sm-start">
                        <div>
                            <p class="fs-6 mb-3 ms-2"> Nisi sit justo faucibus nec ornare amet, tortor torquent. Blandit class dapibus, aliquet morbi.</p>
                            <div class="d-flex ms-2">
                                <div class="d-flex">
                                    <p class="fw-bold me-2"><i class="fa-solid fa-message fs-3 text-primary"></i> &nbsp;Nion King</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    require_once ('include/faq.php');
    ?>

    <?php
    require_once('include/footer.php');
    ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/ssmodern.js"></script>
    <script src="assets/js/all.js"></script>
    <script src="assets/js/aos.min.js"></script>
    <script src="assets/js/aos.js"></script>

    <script src="assets/js/rents.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php 
    $fullname = $_SESSION['USER_F_NAME']." ".$_SESSION['USER_NAME'];
    if(isset($_SESSION['WELCOME'])){
        ?>
        <script>
                Swal.fire({
                icon: 'success',
                title: 'Welcome <?PHP echo $fullname; ?>',
                text: 'Your are successfully logged in to our site!',
                footer: '<a href="rents.php">Go to Rents page?</a>'
                })
        </script>
        <?php
        unset($_SESSION['WELCOME']);
    }

    
    if(isset($_SESSION['SP_R'])){
        ?>
        <script>
            
            Swal.fire({
                icon: 'success',
                title: 'REQUEST RECEIVED',
                text: 'We will reach out to you soon!',
                })
        </script>
        <?php
        unset($_SESSION['SP_R']);
    }
    
    ?>


</body>

</html>