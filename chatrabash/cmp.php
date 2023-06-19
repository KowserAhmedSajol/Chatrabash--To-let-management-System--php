<?php
session_start();
$conn=mysqli_connect("localhost","root","", "chatrabash");
if(isset($_GET['rmb'])){
    $postRemove = $_GET['rmb'];
    $_SESSION['POP'] = "ok";
    if($postRemove == "one"){
        unset($_SESSION['CMP_ONE']);
    }
    if($postRemove == "two"){
        unset($_SESSION['CMP_TWO']);

    }
}
if(isset($_SESSION['CMP_ONE'])){
    $postIdOne = $_SESSION['CMP_ONE'] ;
    $cmpOneSql = "SELECT * FROM property_list WHERE list_id=$postIdOne";
    $cmpOneQuery = mysqli_query($conn,$cmpOneSql);
    $cmpOneData = mysqli_fetch_assoc($cmpOneQuery); 
}
if(isset($_SESSION['CMP_TWO'])){
    $postIdTwo = $_SESSION['CMP_TWO'] ;
    $cmpTwoSql = "SELECT * FROM property_list WHERE list_id=$postIdTwo";
    $cmpTwoQuery = mysqli_query($conn,$cmpTwoSql);
    $cmpTwoData = mysqli_fetch_assoc($cmpTwoQuery); 
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Chatrabash3</title>
    <meta name="description" content="Online accommodation system for university students. Design by @Sazib.Gub">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dokdo&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/Slider.css">
</head>

<body style="background: #e6e6e6;">
<?php
include('include/navbar.php');
?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col" style="padding-bottom: 20px;">
                    <div class="table-responsive bg-light bg-gradient">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <?php 
                                        function getPostThumb($conn,$id){
                                            $query2="SELECT * FROM property_images WHERE property_id=$id";
                                            $run=mysqli_query($conn,$query2);
                                            $data= mysqli_fetch_assoc($run);
                                            return $data['photo'];
                                        }
                                        ?>
                                <tr>
                                <th>
                                    <?php 
                                            if (isset($cmpOneData['property_name'])) {
                                            ?>
                                            <img class="" style="height:400px; width:450px;" alt=" " src="imag/listingImg/<?=getPostThumb($conn,$_SESSION['CMP_ONE'] )?>" style="height: 250px;">

                                            <?php
                                            } else {
                                            echo "no Data";} 
                                        ?>
                                    </th>
                                    <th>
                                    <?php 
                                            if (isset($cmpTwoData['property_name'])) {
                                            ?>
                                            <img class="" style="height:400px; width:450px;" alt=" " src="imag/listingImg/<?=getPostThumb($conn,$_SESSION['CMP_TWO'] )?>" style="height: 250px;">

                                            <?php
                                            } else {
                                            echo "no Data";} 
                                        ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">


                                <tr>
                                    <td>
                                        Property Name :
                                        <?php 
                                            if (isset($cmpOneData['property_name'])) {
                                            echo $cmpOneData['property_name'];
                                            } else {
                                            echo "no Data";} 
                                        ?>
                                    <br>
                                    </td>
                                    <td>
                                        Property Name :
                                        <?php 
                                            if (isset($cmpTwoData['property_name'])) {
                                            echo $cmpTwoData['property_name'];
                                            } else {
                                            echo "no Data";} 
                                        ?>
                                    <br>
                                    </td>
                                </tr>

                            
                                <tr>
                                    <td>
                                        Rent Rate :
                                        <?php 
                                            if (isset($cmpOneData['rent_rate'])) {
                                            echo $cmpOneData['rent_rate'];
                                            } else {
                                            echo "no Data";} 
                                        ?>
                                       tk / Monthly
                                    <br>
                                    </td>
                                    <td>
                                        Rent Rate :
                                        <?php 
                                            if (isset($cmpTwoData['rent_rate'])) {
                                            echo $cmpTwoData['rent_rate'];
                                            } else {
                                            echo "no Data";} 
                                        ?>
                                        tk / Monthly
                                    <br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        University Name :
                                        <?php 
                                            if (isset($cmpOneData['university_name'])) {
                                            echo $cmpOneData['university_name'];
                                            } else {
                                            echo "no Data";} 
                                        ?>
                                    <br>
                                    </td>
                                    <td>
                                        University Name :
                                        <?php 
                                            if (isset($cmpTwoData['university_name'])) {
                                            echo $cmpTwoData['university_name'];
                                            } else {
                                            echo "no Data";} 
                                        ?>
                                    <br>
                                    </td>
                                </tr>
                            
                                <tr>
                                    <td>
                                        Proximity :
                                        <?php 
                                            if (isset($cmpOneData['proximity'])) {
                                            echo $cmpOneData['proximity'];
                                            } else {
                                            echo "no Data";} 
                                        ?>
                                    <br>
                                    </td>
                                    <td>
                                        Proximity :
                                        <?php 
                                            if (isset($cmpTwoData['proximity'])) {
                                            echo $cmpTwoData['proximity'];
                                            } else {
                                            echo "no Data";} 
                                        ?>
                                    <br>
                                    </td>
                                </tr>


                            
                                <tr>
                                    <td>
                                        Full Address :
                                        <?php 
                                            if (isset($cmpOneData['full_address'])) {
                                            echo $cmpOneData['full_address'];
                                            } else {
                                            echo "no Data";} 
                                        ?>
                                    <br>
                                    </td>
                                    <td>
                                        Full Address :
                                        <?php 
                                            if (isset($cmpTwoData['full_address'])) {
                                            echo $cmpTwoData['full_address'];
                                            } else {
                                            echo "no Data";} 
                                        ?>
                                    <br>
                                    </td>
                                </tr>


                            
                                <tr>
                                    <td>
                                        Gender :
                                        <?php 
                                            if (isset($cmpOneData['gender'])) {
                                            echo $cmpOneData['gender'];
                                            } else {
                                            echo "no Data";} 
                                        ?>
                                    <br>
                                    </td>
                                    <td>
                                        Gender :
                                        <?php 
                                            if (isset($cmpTwoData['gender'])) {
                                            echo $cmpTwoData['gender'];
                                            } else {
                                            echo "no Data";} 
                                        ?>
                                    <br>
                                    </td>
                                </tr>

                            
                                <tr>
                                    <td>
                                        Property Type :
                                        <?php 
                                            if (isset($cmpOneData['property_type'])) {
                                            echo $cmpOneData['property_type'];
                                            } else {
                                            echo "no Data";} 
                                        ?>
                                    <br>
                                    </td>
                                    <td>
                                        Property Type :
                                        <?php 
                                            if (isset($cmpTwoData['property_type'])) {
                                            echo $cmpTwoData['property_type'];
                                            } else {
                                            echo "no Data";} 
                                        ?>
                                    <br>
                                    </td>
                                </tr>

                            
                                <tr>
                                    <td>
                                        <?php 
                                            if (isset($cmpOneData['rules'])) {
                                            echo $cmpOneData['rules'];
                                            } else {
                                            echo "no Data";} 
                                        ?>
                                    <br>
                                    </td>
                                    <td>
                                        <?php 
                                            if (isset($cmpTwoData['rules'])) {
                                            echo $cmpTwoData['rules'];
                                            } else {
                                            echo "no Data";} 
                                        ?>
                                    <br>
                                    </td>
                                </tr>


                            
                           
                            
                              

                                <tr>
                                    <td>
                                        <?php 
                                            if (isset($cmpOneData['property_type'])) {
                                                ?>  
                                                    <a class="btn btn-primary" href="cmp.php?rmb=one" style="margin-bottom: 5px;margin-top: 5px;">&nbsp;Remove Compare</a>
                                                <?php
                                            } else {
                                                ?>  
                                                    <a class="btn btn-primary disabled" href="cmp.php?rmb=one" style="margin-bottom: 5px;margin-top: 5px;">&nbsp;Remove Compare</a>
                                                <?php
                                        } 
                                        ?>
                                    <br>
                                    </td>
                                    <td>
                                        <?php 
                                            if (isset($cmpTwoData['property_type'])) {
                                                ?>  
                                                    <a class="btn btn-primary" href="cmp.php?rmb=two" style="margin-bottom: 5px;margin-top: 5px;">&nbsp;Remove Compare</a>
                                                <?php
                                            } else {
                                                ?>  
                                                    <a class="btn btn-primary disabled" href="cmp.php?rmb=two" style="margin-bottom: 5px;margin-top: 5px;">&nbsp;Remove Compare</a>
                                                <?php
                                        } 
                                        ?>
                                    <br>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    include('include/footer.php');
    ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/Slider.js"></script>
    <script src="assets/js/ssmodern.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>


</html>

<?php 
if(isset($_GET['rmb'])){
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'REMOVED',
                text: 'Post is successfully removed.!',
                footer: '<a href="rents.php">Go to rents page?</a>'
                })
        </script>
        <?php
}
?>