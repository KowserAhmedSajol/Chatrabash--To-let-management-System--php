<?php
$conn=mysqli_connect("localhost","root","", "chatrabash");

//FOR PAGINATION-------------------------------
if(isset($_POST['search']) || isset($_POST['backBtn']) || isset($_POST['frontBtn']) || isset($_POST['numberBtn'])){
    $keyword= $_POST['search_1'];
    $sqlQ = "SELECT * FROM property_list WHERE property_name LIKE '%$keyword%'";


}else{
    $sqlQ = "SELECT * FROM property_list";

}
$queryQ = mysqli_query($conn,$sqlQ);
$num_rows = mysqli_num_rows($queryQ);

$divided_num = ($num_rows/5)+1;

if(isset($_GET['pageno'])){
    $get_page_no = $_GET['pageno'];
    $offset = ($get_page_no - 1) * 5;
    $get_page_no_increment = $get_page_no + 1;
    $get_page_no_decrement = $get_page_no - 1;
}else{
    $offset = 0;
    $get_page_no = 1;
    $get_page_no_increment = 2;
    $get_page_no_decrement = 0;
}
$searchvalue = isset($_POST['search']);
if(isset($_POST['search'])){
    $keyword= $_POST['search_1'];
    $sql="SELECT * FROM property_list WHERE property_name LIKE '%$keyword%' LIMIT 5 OFFSET $offset";
}else{
    $sql = "SELECT * FROM property_list LIMIT 5 OFFSET $offset";

}







$query = mysqli_query($conn,$sql);

function getPostThumb($conn,$id){
    $query2="SELECT * FROM property_images WHERE property_id=$id";
    $run=mysqli_query($conn,$query2);
    $data= mysqli_fetch_assoc($run);
    return $data['photo'];
}
while($data = mysqli_fetch_assoc($query)){
}?>
