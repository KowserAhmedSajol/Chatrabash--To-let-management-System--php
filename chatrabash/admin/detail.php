<?php 
session_start();

if (isset($_SESSION['ADMIN_ID'])) {
    $conn=mysqli_connect("localhost","root","", "chatrabash");
    $post_id = $_GET['id'];
    $sqlv = "SELECT * FROM property_list WHERE list_id=$post_id";
    
    $query = mysqli_query($conn,$sqlv);
    $data = mysqli_fetch_assoc($query);
    
    
        
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
    
    
    
    
    
    
    if(isset($_GET['set'])){
        $delete = $_GET['set'];
        $dltsql = "DELETE FROM property_list WHERE list_id=$post_id;";
        mysqli_query($conn,$dltsql);
        header('Location:p_item.php');
    }
    if(isset($_GET['user'])){
        $delete = $_GET['user'];
        $user_id = $_GET['id'];
        $dltsql = "UPDATE users SET type='tennant' WHERE id=$user_id;";
        mysqli_query($conn,$dltsql);
        header('Location:member_s.php');
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
                    <p class="text-primary m-0 fw-bold">Property Details</p>
                </div>



                <div class="container">


                <div class="row" style="margin-top: 10px;">
                <div class="col-lg-12">
                    <div class="simple-slider">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
<?php

$postId = $_GET['id'];
$sql = "SELECT * FROM property_images WHERE property_id= $post_id";
$query2 = mysqli_query($conn,$sql);


while ($dataImg = mysqli_fetch_assoc($query2)) {
?>
                                <div class="swiper-slide" style="background: url(../imag/listingImg/<?php echo $dataImg['photo'];?>) center center / cover no-repeat;"></div>
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








                <div class="card-body">
                    <form action="listing_insert.php?id=<?php echo $data['list_id']; ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3"><label class="form-label" for="address" ><strong>Property Name</strong><br></label>
                        <input class="form-control" type="text" id="address" placeholder="Mention house name" value="<?php echo $data['property_name']; ?>" name="propertyName"></div>
                        <div class="mb-3"><label class="form-label" for="address"><strong>Property Monthly Rate</strong><br></label>
                        <input class="form-control" type="text" id="rent" placeholder="Monthly Rent" value="<?php echo $data['rent_rate'];?>" name="rent"></div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="city"><strong>Property Type</strong><br></label><select name="propertyType" class="form-select">
                                        <optgroup label="Select Property">
                                            <option value="Single Bed" selected=""><?php echo $data['property_type'];?></option>
                                            <option value="Single Bed" >Single Bed</option>
                                            <option value="Single Bedroom">Single Bedroom</option>
                                            <option value="Flat">Flat </option>
                                        </optgroup>
                                    </select></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="city"><strong>Gender</strong><br></label><select name="gender" class="form-select">
                                        <optgroup label="Select Property">
                                            <option value="Male" selected=""><?php echo $data['gender'];?></option>
                                            <option value="Male" >Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </optgroup>
                                    </select></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="country"><strong>Proximity to school</strong><br></label><select name="proximity" class="form-select">
                                        <optgroup label="Close to University ">
                                            <option value="Fairly Close to" selected=""><?php echo $data['proximity'];?></option>
                                            <option value="Fairly Close to">Fairly Close to</option>
                                            <option value="About 2km walk">About 2km walk</option>
                                            <option value="More than 2km">More than 2km</option>
                                            <option value="Far from university">Far from university</option>
                                        </optgroup>
                                    </select></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="city"><strong>University Name</strong><br></label><select name="uniName" class="form-select">
                                        <optgroup label="Select Property">
                                            <option value="North South University" selected=""><?php echo $data['university_name'];?></option>
                                            <option value="Green University of Bangladesh">Green University of Bangladesh</option>
                                            <option value="North South University">North South University</option>
                                            <option value="Independent University, Bangladesh">Independent University, Bangladesh</option>
                                            <option value="University of Liberal Arts Bangladesh">University of Liberal Arts Bangladesh</option>
                                            <option value="University of Asia Pacific">University of Asia Pacific</option>
                                        </optgroup>
                                    </select></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="country"><strong>Choose Location</strong><br></label><select name="uniLocation" class="form-select">
                                        <optgroup label="Area ">
                                            <option value="Mirpur" selected=""><?php echo $data['uni_location'];?></option>
                                            <option value="Mirpur">Mirpur</option>
                                            <option value="Bashundhara">Bashundhara</option>
                                            <option value="Farmgate">Farmgate</option>
                                            <option value="Mohammadpur">Mohammadpur</option>
                                            <option value="Begum Rokeya Sarani">Begum Rokeya Sarani</option>
                                        </optgroup>
                                    </select></div>
                            </div>
                        </div>
                        <div class="mb-3"><label class="form-label" for="address"><strong>Full Address (road- house number- near by&nbsp;area)</strong><br></label>
                        <input class="form-control" type="textarea" value="<?php echo $data['full_address'];?>" id="address-1" placeholder="Road number: 11, house: 34/B Mirpur-10 Near by: Shaali Market" name="address">
                        </div>
                        <div style="margin-top: 20px;"><label class="form-label" for="tra"><strong> Description</strong><br></label><textarea name="description" value="<?php echo $data['description'];?>" placeholder="new" class="form-control form-control" id="tra" rows="8"><?php echo $data['description'];?></textarea></div>


                        <div class="row" style="margin-top: 10px;">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><strong><span style="color: rgb(51, 51, 51);">Available Services/Amenities:</span></strong><br></h4>
                            <p class="card-text"><span style="color: rgb(102, 102, 102);"><?php echo $waterSign;?>Water,&nbsp;&nbsp;<?php echo $electricitySign;?>Electricity&nbsp;&nbsp;, <?php echo $maintenanceSign;?>Maintenance, <?php echo $securitySign;?>Security Service, <?php echo $wifiSign;?>WIFI, <?php echo $furnitureSign;?>Furniture, <?php echo $acSign;?>AC, <?php echo $mealSign;?>Meal System, <?php echo $gurbageSign;?>Gurbage</span><br></p>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="mb-3"><label class="form-label" for="address"><strong>Rules</strong><br></label>
                        <input class="form-control" type="textarea" value="<?php echo $data['rules'];?>" id="address-1" placeholder="If any.." name="rules">
                        </div>
                        <div class="mb-3"><label class="form-label" for="address"><strong>Available time to visit</strong><br></label>
                        <input class="form-control" type="textarea" value="<?php echo $data['visit_time'];?>" id="address-1" placeholder="Monday to Thrusday 4:00PM to 6:00PM" name="time">
                        </div>
                        <strong style="font-size:30px;">payment Section</strong><br />
                        <div class="mb-3"><label class="form-label" for="address"><strong>Phone number</strong><br></label>
                            <input class="form-control" type="text" id="address" value="<?php echo $data['phoneNumber'];?>" placeholder="+880XXXXXXXXXX" name="phoneNumber" >
                        </div>




                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="city"><strong>Payment Method</strong><br></label><select name="paymentMethod" class="form-select">
                                        <optgroup label="Select Property">
                                            <option value="<?php echo $data['paymentMethod'];?>" selected=""><?php echo $data['paymentMethod'];?></option>
                                            <option value="Bkash" >Bkash</option>
                                            <option value="Rocket">Rocket</option>
                                            <option value="Nagad">Nagad </option>
                                            <option value="Upay">Upay </option>
                                        </optgroup>
                                    </select></div>
                            </div>


                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="address"><strong>Transaction ID</strong><br></label>
                                    <input class="form-control" value="<?php echo $data['transactionId'];?>" type="text" id="address" placeholder="#xxxxxxxxxxxx" name="transactionId">
                                </div>
                            </div>


                            <div class="col">

                                <div class="mb-3"><label class="form-label" for="address"><strong>Time</strong><br></label>
                                    <input class="form-control" type="text" id="address" value="<?php echo $data['time'];?>" placeholder="12:00 AM/PM, Date/Month/Year" name="time">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3"><label class="form-label" for="address"><strong>Reject Reason</strong><br></label>
                            <input class="form-control" type="text" id="address" placeholder="Put The reason behind Rejection" name="reason" >
                        </div>




                        <div class="mb-3" style="margin-top: 20px;">
                        <input class="btn btn-primary" type="submit" name="approve" value="Approve Request">
                        <input class="btn btn-danger" type="submit" name="reject" value="Reject Request">
                        </div>
             
                    </form>
                </div>
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



