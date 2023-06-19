<?php 
session_start();
$conn=mysqli_connect("localhost","root","", "chatrabash");
if(isset($_GET['id'])){
        $id = $_GET['id'];
    if(isset($_GET['set'])){
        $set = $_GET['set'];
        $sql = "UPDATE special_requests SET status='$set' WHERE id=$id;";
        mysqli_query($conn,$sql);
        header('Location:s_request.php');
    }
}
?>