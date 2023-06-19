<?php 
session_start();

if (isset($_SESSION['ADMIN_ID'])) {
    $conn=mysqli_connect("localhost","root","", "chatrabash");
    $post_id = $_GET['id'];
    $post_stat = $_GET['set'];
    $sqlv = "SELECT * FROM special_requests WHERE id=$post_id";
    
    $query = mysqli_query($conn,$sqlv);
    $data = mysqli_fetch_assoc($query);
    

    
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="../assets/css/Slider.css">
</head>

<body>
    <div id="wrapper">
    <?php
    require_once('sidebar.php');
    ?>




                <section class="py-5">
        <div class="container">
            <div class="card border-0" style="box-shadow: 20px 4px 20px 4px rgba(255,210,0,0.17);">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Special Request Details</p>
                </div>



                <div class="container">



                <div class="row" style="margin-top: 10px;">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <strong><span style="color: rgb(51, 51, 51);">Name</span></strong><br>
                                </h4>
                                <p class="card-text">
                                    <span style="color: rgb(102, 102, 102);">
                                        <?php echo $data['name'];?>
                                    </span><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <strong><span style="color: rgb(51, 51, 51);">Email</span></strong><br>
                                </h4>
                                <p class="card-text">
                                    <span style="color: rgb(102, 102, 102);">
                                        <?php echo $data['email'];?>
                                    </span><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <strong><span style="color: rgb(51, 51, 51);">Phone Number</span></strong><br>
                                </h4>
                                <p class="card-text">
                                    <span style="color: rgb(102, 102, 102);">
                                        <?php echo $data['phone_number'];?>
                                    </span><br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <strong><span style="color: rgb(51, 51, 51);">Finding Date</span></strong><br>
                                </h4>
                                <p class="card-text">
                                    <span style="color: rgb(102, 102, 102);">
                                        <?php echo $data['suitable_time'];?>
                                    </span><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <strong><span style="color: rgb(51, 51, 51);">ID</span></strong><br>
                                </h4>
                                <p class="card-text">
                                    <span style="color: rgb(102, 102, 102);">
                                        <?php echo $data['id'];?>
                                    </span><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <strong><span style="color: rgb(51, 51, 51);">USER ID</span></strong><br>
                                </h4>
                                <p class="card-text">
                                    <span style="color: rgb(102, 102, 102);">
                                        <?php echo $data['user_id'];?>
                                    </span><br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <strong><span style="color: rgb(51, 51, 51);">Expected Area</span></strong><br>
                                </h4>
                                <p class="card-text">
                                    <span style="color: rgb(102, 102, 102);">
                                        <?php echo $data['full_address'];?>
                                    </span><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <strong><span style="color: rgb(51, 51, 51);">Expected University</span></strong><br>
                                </h4>
                                <p class="card-text">
                                    <span style="color: rgb(102, 102, 102);">
                                        <?php echo $data['university'];?>
                                    </span><br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <strong><span style="color: rgb(51, 51, 51);">Spetial Instructions</span></strong><br>
                                </h4>
                                <p class="card-text">
                                    <span style="color: rgb(102, 102, 102);">
                                        <?php echo $data['requests'];?>
                                    </span><br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                
                <strong><span style="color: rgb(51, 51, 51);">Payment</span></strong><br>

                <div class="row" style="margin-top: 10px;">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <strong><span style="color: rgb(51, 51, 51);">Phone Number</span></strong><br>
                                </h4>
                                <p class="card-text">
                                    <span style="color: rgb(102, 102, 102);">
                                        <?php echo $data['sender_phone_number'];?>
                                    </span><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <strong><span style="color: rgb(51, 51, 51);">Method</span></strong><br>
                                </h4>
                                <p class="card-text">
                                    <span style="color: rgb(102, 102, 102);">
                                        <?php echo $data['sending_method'];?>
                                    </span><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <strong><span style="color: rgb(51, 51, 51);">Transaction ID</span></strong><br>
                                </h4>
                                <p class="card-text">
                                    <span style="color: rgb(102, 102, 102);">
                                        <?php echo $data['transaction_id'];?>
                                    </span><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <strong><span style="color: rgb(51, 51, 51);">Time</span></strong><br>
                                </h4>
                                <p class="card-text">
                                    <span style="color: rgb(102, 102, 102);">
                                        <?php echo $data['sending_time'];?>
                                    </span><br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div> <p></p>
                
                <a href="s_request_process.php?id=<?php echo $data['id']; ?>&set=<?php echo $post_stat; ?>" class="btn btn-outline-primary" type="submit" style="border-style: none;border-radius: 0px;">Set to <?php echo $post_stat; ?></a>
                <a href="s_request_process.php?id=<?php echo $data['id']; ?>&set=reject" class="btn btn-outline-danger" type="submit" style="border-style: none;border-radius: 0px;">Reject</a>
                </div><p></p>






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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="../assets/js/Slider.js"></script>
    <script src="assets/js/chatrabaee.js"></script>
</body>

</html>

<?php    
}else{
    
    header("location:login.php");
}



?>



