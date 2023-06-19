<?php

session_start();
require('config.php');
$conn=mysqli_connect("localhost","root","", "chatrabash");
$id           = $_SESSION['USER_ID']; 
if(isset($_POST['submit'])){
    $property_Name = $_POST['propertyName'];
    $property_rent = $_POST['rent'];
    $propertyType = $_POST['propertyType'];
    $gender = $_POST['gender'];
    $proximity = $_POST['proximity'];
    $uniName = $_POST['uniName'];
    $uniLocation = $_POST['uniLocation'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $facilities = $_POST['facilities'];
    $phoneNumber = $_POST['phoneNumber'];
    $paymentMethod = $_POST['paymentMethod'];
    $transactionId = $_POST['transactionId'];
    $time = $_POST['time'];
    $rules = $_POST['rules'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $status = "pending";

    $waterFacility = "no";
    $electricityFacility = "no";
    $maintenaceFacility = "no";
    $securityFacility = "no";
    $acFacility = "no";
    $foodsFacility = "no";
    $wifiFacility = "no";
    $garbageFacility = "no";
    $furnitureFacility = "no";


    foreach($facilities as $facility){
        if($facility == 'water'){
            $waterFacility = "yes";
        }
        if($facility == 'electricity'){
            $electricityFacility = "yes";
        }
        if($facility == 'maintenace'){
            $maintenaceFacility = "yes";
        }
        if($facility == 'security services'){
            $securityFacility = "yes";
        }
        if($facility == 'furniture'){
            $furnitureFacility = "yes";
        }
        if($facility == 'ac installed'){
            $acFacility = "yes";
        }
        if($facility == 'foods'){
            $foodsFacility = "yes";
        }
        if($facility == 'garbage'){
            $garbageFacility = "yes";
        }
        if($facility == 'wifi'){
            $wifiFacility = "yes";
        }

    }

    $query = "INSERT INTO property_list (user_id, status, property_name, rent_rate, property_type, gender, proximity, university_name, uni_location, full_address, description, water, electricity, maintenance, security_service, wifi, furniture, ac, meal_system, garbage, rules, phoneNumber, paymentMethod, transactionId, time, latitude, longitude) VALUES ('$id','$status','$property_Name','$property_rent', '$propertyType','$gender','$proximity','$uniName','$uniLocation','$address','$description','$waterFacility','$electricityFacility','$maintenaceFacility','$securityFacility','$wifiFacility','$furnitureFacility','$acFacility','$foodsFacility','$garbageFacility','$rules','$phoneNumber','$paymentMethod','$transactionId','$time', $latitude, $longitude)";
    $queryRun = mysqli_query($conn, $query);
    
    $post_id=mysqli_insert_id($conn);

    $total = count($_FILES['images']['name']);
    for($x=0; $x<$total; $x++) {
        $image_name=$_FILES['images']['name'][$x];
        $img_tmp=$_FILES['images']['tmp_name'][$x];
        $upLocation = '../imag/listingImg/'.$image_name;
        move_uploaded_file($img_tmp, $upLocation);
        $query = "INSERT INTO property_images (property_id,photo) VALUES ('$post_id','$image_name')";
        $queryRun = mysqli_query($conn, $query);


    }





    if($queryRun){
        header('Location:../listing.php');
    }else{
        header('Location:index.php');

    }
}
?>