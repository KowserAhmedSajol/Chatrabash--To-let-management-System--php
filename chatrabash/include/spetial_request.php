<?php 

session_start();

$conn=mysqli_connect("localhost","root","", "chatrabash");
$id           = $_SESSION['USER_ID']; 

if(isset($_POST['submit'])){
    $sender_phone_number = $_POST['sender_phone_number'];
    $transaction_id = $_POST['transaction_id'];
    $method = $_POST['method'];
    $sending_time = $_POST['sending_time'];
    $gender = $_POST['gender'];
    $date_time = $_POST['date_time'];
    $rent_range = $_POST['rent_range'];
    $university_name = $_POST['university_name'];
    $area = $_POST['area'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $requrst_disc = $_POST['requrst_disc'];
    $status = "pending";
    $_SESSION['SP_R'] = "special";


    
    $query = "INSERT INTO special_requests 
    (user_id, 
    sender_phone_number, 
    transaction_id, 
    sending_method, 
    sending_time, 
    gender, 
    suitable_time, 
    rent_range, 
    university, 
    addrese, 
    name, 
    email, 
    phone_number, 
    full_address, 
    requests, 
    status
    ) VALUES (
    '$id',
    '$sender_phone_number',
    '$transaction_id',
    '$method', 
    '$sending_time',
    '$gender',
    '$date_time',
    '$rent_range',
    '$university_name',
    '$area',
    '$name',
    '$email',
    '$number',
    '$address',
    '$requrst_disc',
    '$status'
    )";
    $queryRun = mysqli_query($conn, $query);
    if($queryRun){
        header('Location:../index.php?action=success');
    }else{
        header('Location:../index.php?action=not_success');

    }
}

?>