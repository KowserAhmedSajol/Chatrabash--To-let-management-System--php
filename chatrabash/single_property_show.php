<?php
session_start();
$conn=mysqli_connect("localhost","root","", "chatrabash");
if($_GET['id']){
    $postId = $_GET['id'];
    $sql = "SELECT * FROM property_list WHERE list_id=$postId";
    $query = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($query);
    if($data['status'] == "pending"){
        $color = "red";
    }



    $waterSign = "&#10060;";
    $electricitySign = "&#10060;";
    $maintenanceSign = "&#10060;";
    $securitySign = "&#10060;";
    $wifiSign = "&#10060;";
    $furnitureSign = "&#10060;";
    $acSign = "&#10060;";
    $mealSign = "&#10060;";
    $gurbageSign = "&#10060;";


    if($data['water'] == "yes"){
        $waterSign = "&#10003;";
    }
    if($data['electricity'] == "yes"){
        $electricitySign = "&#10003;";
    }
    if($data['maintenance'] == "yes"){
        $maintenanceSign = "&#10003;";
    }
    if($data['security_service'] == "yes"){
        $securitySign = "&#10003;";
    }
    if($data['wifi'] == "yes"){
        $wifiSign = "&#10003;";
    }
    if($data['furniture'] == "yes"){
        $furnitureSign = "&#10003;";
    }
    if($data['ac'] == "yes"){
        $acSign = "&#10003;";
    }
    if($data['meal_system'] == "yes"){
        $mealSign = "&#10003;";
    }
    if($data['garbage'] == "yes"){
        $gurbageSign = "&#10003;";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Post - Chatrabash</title>
    <meta name="description" content="Online accommodation system for university students.
Design by @Sazib.Gub">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dokdo&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Raleway:400,700,800|Roboto:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/Slider.css">
</head>

<body style="background: #f6f7f9;">
<?php
require_once'include/navbar.php';
?>
<section>
    <div class="container">
        <div class="row" style="margin-top: 10px;">
            <div class="col-lg-12">
                <div class="simple-slider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php

                            $postId = $_GET['id'];
                            $sql = "SELECT * FROM property_images WHERE property_id= $postId";
                            $query2 = mysqli_query($conn,$sql);


                            while ($dataImg = mysqli_fetch_assoc($query2)) {
                                ?>
                                <div class="swiper-slide" style="background: url(imag/listingImg/<?php echo $dataImg['photo'];?>) center center / cover no-repeat;"></div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><strong>Property Status <span style="color:<?php echo $color?>;"><?php echo $data['status'];?></span></strong><br></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><strong><?php echo $data['property_name'];?></strong><br></h4>
                        <p class="card-text"><span style="color: rgb(102, 102, 102);"><?php echo $data['rent_rate'];?> TK</span><br></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><strong><span style="color: rgb(51, 51, 51);">Property Description</span></strong><br></h4>
                        <p class="card-text"><?php echo $data['description'];?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><strong><span style="color: rgb(51, 51, 51);">University Name</span></strong><br></h4>
                        <p class="card-text"><?php echo $data['university_name'];?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><strong><span style="color: rgb(51, 51, 51);">Approximate Distance From University</span></strong><br></h4>
                        <p class="card-text"><span style="color: rgb(102, 102, 102);"><?php echo $data['proximity'];?></span><br></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><strong><span style="color: rgb(51, 51, 51);">Property Details</span></strong><br></h4>
                        <p class="card-text">Location:<?php echo $data['full_address'];?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><strong><span style="color: rgb(51, 51, 51);">Gender</span></strong><br></h4>
                        <p class="card-text">Location:<?php echo $data['gender'];?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><strong><span style="color: rgb(51, 51, 51);">Property Type</span></strong><br></h4>
                        <p class="card-text"><span style="color: rgb(102, 102, 102);"><?php echo $data['property_type'];?></span><br></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <?php

            ?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><strong><span style="color: rgb(51, 51, 51);">Available Services/Amenities:</span></strong><br></h4>
                        <p class="card-text"><span style="color: rgb(102, 102, 102);"><?php echo $waterSign;?>Water,&nbsp;&nbsp;<?php echo $electricitySign;?>Electricity&nbsp;&nbsp;, <?php echo $maintenanceSign;?>Maintenance, <?php echo $securitySign;?>Security Service, <?php echo $wifiSign;?>WIFI, <?php echo $furnitureSign;?>Furniture, <?php echo $acSign;?>AC, <?php echo $mealSign;?>Meal System, <?php echo $gurbageSign;?>Gurbage</span><br></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><strong><span style="color: rgb(51, 51, 51);">Rules</span></strong><br></h4>
                        <p class="card-text"><?php echo $data['rules'];?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?php
require_once'include/footer.php';
?>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
<script src="assets/js/Slider.js"></script>
<script src="assets/js/ssmodern.js"></script>
</body>

</html>