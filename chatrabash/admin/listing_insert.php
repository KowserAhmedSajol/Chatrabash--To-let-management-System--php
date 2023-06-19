<?php
$conn=mysqli_connect("localhost","root","", "chatrabash");
$post_id = $_GET['id'];
if(isset($_POST['approve'])){
    $property_Name = $_POST['propertyName'];
    $property_rent = $_POST['rent'];
    $propertyType = $_POST['propertyType'];
    $gender = $_POST['gender'];
    $proximity = $_POST['proximity'];
    $uniName = $_POST['uniName'];
    $uniLocation = $_POST['uniLocation'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $phoneNumber = $_POST['phoneNumber'];
    $paymentMethod = $_POST['paymentMethod'];
    $transactionId = $_POST['transactionId'];
    $visitTime = $_POST['visitTime'];
    $time = $_POST['time'];
    $rules = $_POST['rules'];
    $status = "pending";


    $sql = "UPDATE property_list
    SET status = 'approved'
    WHERE list_id = $post_id;";
    $queryRun = mysqli_query($conn, $sql);
    
    $post_id=mysqli_insert_id($conn);







    if($queryRun){
        header('Location:p_item.php');
    }else{
        header('Location:index.php');

    }
}if(isset($_POST['reject'])){
    $reason = $_POST['reason'];



    $sql = "UPDATE property_list
    SET status = 'rejected', reason = '$reason'
    WHERE list_id = $post_id;";
    $queryRun = mysqli_query($conn, $sql);
    
    $post_id=mysqli_insert_id($conn);







    if($queryRun){
        header('Location:p_item.php');
    }else{
        header('Location:index.php');

    }
}
?>