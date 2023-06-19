<?php
session_start();





if (isset($_GET['remove'])) {
    if($_GET['remove'] == "gender"){
        $_SESSION['genderFilter'] = "undefined";
        header('Location: rents.php');
    }
    if($_GET['remove'] == "roomTypeFilter"){
        $_SESSION['roomTypeFilter'] = "undefined";
        header('Location: rents.php');
    }
    if($_GET['remove'] == "universityFilter"){
        $_SESSION['universityFilter'] = "undefined";
        header('Location: rents.php');
    }
    if($_GET['remove'] == "hTolFilter"){
        $_SESSION['hTolFilter'] = "undefined";
        header('Location: rents.php');
    }
}





if(!isset($_SESSION['genderFilter'])){
    $_SESSION['genderFilter'] = "undefined";
}
if(isset($_GET['cmpId'])){
    if(!isset($_SESSION['CMP_ONE'])){
        $_SESSION['CMP_ONE'] = $_GET['cmpId'];
        header("location:rents.php?state=ok");
        ?>
    
        
        <?php
    } elseif(!isset($_SESSION['CMP_TWO'])){
        $_SESSION['CMP_TWO'] = $_GET['cmpId'];
        header("location:rents.php?state=ok");
    }else{
        header("location:rents.php?state=no");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Listing - Chatrabash</title>

    <meta name="description" content="Online accommodation system for university students.Design by @Sazib.Gub">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dokdo&amp;display=swap">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
<?php
include('include/navbar.php');
?>
<section>
    <div class="container">
        <form action="rents.php" method="post">
            <div class="row g-0">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold">Find Your Perfect Property</h2>
                    <p class="text-muted w-lg-50"></p>
                </div>
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-md-center align-items-md-center input-group" style="padding-top: 10px;padding-bottom: 10px;">
                        <div class="form-outline">
                            <div class="input-group">

                                <input class="form-control" list="list-example" type="search" placeholder="Search University " name="search_1" style="background: rgba(255,255,255,0.5);">
                                    <button class="btn btn-warning" type="submit" value="Search" name="search" style="background: rgb(246,194,62);">
                                        <span >Search&nbsp;</span>
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                <datalist id="list-example">
                                    <option>Green University of Bangladesh</option>
                                    <option>North South University</option>
                                    <option>Independent University, Bangladesh</option>
                                    <option>University of Liberal Arts Bangladesh</option>
                                    <option>University of Asia Pacific</option>
                                </datalist>

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>

        <form action="rents.php" method="post">
            <div class="col">
                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                        
                            <select name="genderFilter" class="form-select-lg select" id="gender1t" data-mdb-filter="true" style="border-radius: 0px;border-width: 0px;background: rgba(222,222,222,0.4);margin: 5px;">
                                <option value="undefined">Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        
                        <select name="roomTypeFilter" class="form-select-lg select" id="gender1t-1" data-mdb-filter="true" style="border-radius: 0px;border-width: 0px;background: rgba(222,222,222,0.4);margin: 5px;">
                            <option value="undefined">Room Type</option>
                            <option value="Single bed">Single bed</option>
                            <option value="Double Bed">Double Bed</option>
                            <option value="Triple Bed">Triple Bed</option>
                            <option value="Flat">Flat</option>
                        </select>
                        <select name="universityFilter" class="form-select-lg select" id="gender1t-2" data-mdb-filter="true" style="border-radius: 0px;border-width: 0px;background: rgba(222,222,222,0.4);margin: 5px;">
                            <option value="undefined">Select University</option>
                            <option value="Green University of Bangladesh">Gub</option>
                            <option value="North South University">Nsu</option>
                            <option value="University of Asia Pacific">Uap</option>
                        </select>
                        <select name="hTolFilter" class="form-select-lg select" id="gender1t-3" data-mdb-filter="true" style="border-radius: 0px;border-width: 0px;background: rgba(222,222,222,0.4);margin: 5px;">
                            <option value="undefined" >Cost</option>
                            <option value="ASC">High to low</option>
                            <option value="DSC">Low to High</option>
                        </select>
                        <button class="btn btn-warning" type="submit" value="filter" name="filter" style="background: rgb(246,194,62);">
                            <span >Filter&nbsp;</span>
                                <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
        </form>
        <?php
        //FOR FILTER--------------------------Start-----
        if(isset($_POST['filter'])){
                $_SESSION['genderFilter'] = $_POST['genderFilter'];
                $_SESSION['roomTypeFilter'] = $_POST['roomTypeFilter'];
                $_SESSION['universityFilter'] = $_POST['universityFilter'];
                $_SESSION['hTolFilter'] = $_POST['hTolFilter'];
        }
        if($_SESSION['genderFilter'] != "undefined"){
            //$gender = gender;
            ?> 
            <a class="btn btn-warning" href="rents.php?remove=gender" style="background: rgb(246,194,62);">
                <span ><?php echo $_SESSION['genderFilter']; ?>&nbsp;</span>
                <i class="fa-solid fa-xmark"></i>
            </a>
            <?php
        }
        if($_SESSION['roomTypeFilter'] != "undefined"){
            ?> 
            <a class="btn btn-warning" href="rents.php?remove=roomTypeFilter" style="background: rgb(246,194,62);">
                <span ><?php echo $_SESSION['roomTypeFilter']; ?>&nbsp;</span>
                <i class="fa-solid fa-xmark"></i>
            </a>
            <?php
        }
        if($_SESSION['universityFilter'] != "undefined"){
            ?> 
            <a class="btn btn-warning" href="rents.php?remove=universityFilter" style="background: rgb(246,194,62);">
                <span ><?php echo $_SESSION['universityFilter']; ?>&nbsp;</span>
                <i class="fa-solid fa-xmark"></i>
            </a>
            <?php
        }
        if($_SESSION['hTolFilter'] != "undefined"){
            ?> 
            <a class="btn btn-warning" href="rents.php?remove=hTolFilter" style="background: rgb(246,194,62);">
                <span ><?php echo $_SESSION['hTolFilter']; ?>&nbsp;</span>
                <i class="fa-solid fa-xmark"></i>
            </a>
            <?php
        }
        

        //FOR FILTER--------------------------End-----

        $conn=mysqli_connect("localhost","root","", "chatrabash");

        //FOR PAGINATION-------------------------------
        if( $_SESSION['genderFilter'] != "undefined" || 
            $_SESSION['roomTypeFilter'] != "undefined" || 
            $_SESSION['universityFilter'] != "undefined" 
            ){   
            $where = " WHERE";
        }else{
            $where = "";
        }


        if($_SESSION['genderFilter'] != "undefined"){
            $gand = " AND";
            $g = $_SESSION['genderFilter'];
            $sqlGender = " gender = '$g'";
        }else{
            $sqlGender = "";
            $gand = "";
        }
        if($_SESSION['roomTypeFilter'] != "undefined"){
            
            if($_SESSION['genderFilter'] != "undefined" || isset($_POST['search'])){
                $rand = " AND";
                }else{
                $rand = "";
                }
            $r = $_SESSION['roomTypeFilter'];
            $sqlRoom = " property_type = '$r'";
        }else{
            $sqlRoom = "";
            $rand = "";
        }

        if($_SESSION['universityFilter'] != "undefined"){ 
            if($_SESSION['genderFilter'] != "undefined" || $_SESSION['roomTypeFilter'] != "undefined" || isset($_POST['search'])){
            $uand = " AND";
            }else{
            $uand = "";
            }
            $u = $_SESSION['universityFilter'];
            $sqluni = " university_name = '$u'";
        }else{
            $sqluni = "";
            $uand = "";
        }
        if($_SESSION['hTolFilter'] != "undefined"){
            if ($_SESSION['hTolFilter'] == "ASC") {
                $sqlhtol = " ORDER BY rent_rate ASC";
            }elseif ($_SESSION['hTolFilter'] == "DSC") {
                $sqlhtol = " ORDER BY rent_rate DESC";
            }
            
            
        }else{
            $sqlhtol = "";
        }




        if(!isset($_GET['pageno'])){
          if(isset($_SESSION['keyword']))  {
                unset($_SESSION['keyword']);
          }
        }
        
        echo $where;
        echo $gand;
        echo $sqlGender;
        echo $rand;
        echo $sqlRoom;
        echo $uand;
        echo $sqluni;
        echo $sqlhtol;
        if(isset($_POST['search']) || isset($_SESSION['keyword'])){
            if(isset($_POST['search'])){
            $keyword= $_POST['search_1'];
            $_SESSION['keyword'] = $keyword;
            }
            $keyword = $_SESSION['keyword'];
            echo "SELECT * FROM property_list WHERE property_name LIKE '%$keyword%'$gand$sqlGender$rand$sqlRoom$uand$sqluni$sqlhtol";
            $sqlQ = "SELECT * FROM property_list WHERE property_name LIKE '%$keyword%'$gand$sqlGender$rand$sqlRoom$uand$sqluni$sqlhtol";
        }else{
            $sqlQ = "SELECT * FROM property_list$where$sqlGender$rand$sqlRoom$uand$sqluni$sqlhtol";

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
            $sql="SELECT * FROM property_list WHERE property_name LIKE '%$keyword%'$gand$sqlGender$rand$sqlRoom$uand$sqluni$sqlhtol$sqlhtol LIMIT 5 OFFSET $offset";
        }else{
            $sql = "SELECT * FROM property_list$where$sqlGender$rand$sqlRoom$uand$sqluni$sqlhtol LIMIT 5 OFFSET $offset";
        }







        $query = mysqli_query($conn,$sql);

        function getPostThumb($conn,$id){
            $query2="SELECT * FROM property_images WHERE property_id=$id";
            $run=mysqli_query($conn,$query2);
            $data= mysqli_fetch_assoc($run);
            return $data['photo'];
        }
        while($data = mysqli_fetch_assoc($query)){

            ?>



            <div class="row" style="margin-top: 12px;margin-bottom: 4px;">
                <div class="col-md-4">
                    <div>
                            <img class="rounded img-fluid shadow w-100 fit-cover" alt=" " src="imag/listingImg/<?=getPostThumb($conn,$data['list_id'])?>" style="height: 250px;">
                        
                    </div>
                </div>
                <div class="col">
                    <div class="py-4">
                        <span class="badge bg-primary mb-2" style="font-size: 14px;">
                            <strong> &nbsp; <i class="fa-solid fa-bangladeshi-taka-sign"></i> <?php echo $data['rent_rate'];?> /Monthly</strong>
                            <br>
                        </span>
                        <span class="badge text-primary" style="border-style: dotted; border-width: .5px">&nbsp;<?php echo $data['counter'];?>&nbsp;Views</span>

                        <br>
                        <h4 class="fw-bold" style="font-size: 16px;"><?php echo $data['property_name'];?></h4>
                        <p class="text-muted"><i class="fa-solid fa-magnifying-glass-location"></i><span style="color: rgb(0, 0, 0);">&nbsp;Location: <?php echo $data['uni_location'];?></span><br></p>
                        <p class="text-muted"><i class="fa-solid fa-user-graduate"></i><span style="color: rgb(0, 0, 0);">&nbsp;University :<?php echo $data['university_name'];?></span><br></p>
                        <p class="text-muted"><i class="fa-solid fa-person-shelter"></i><span style="color: rgb(0, 0, 0);">&nbsp;Room Type: <?php echo $data['property_type'];?></span></p>
                        <p class="text-muted"><i class="fa-solid fa-circle-user"></i><span style="color: rgb(0, 0, 0);">&nbsp;Gender: <?php echo $data['gender'];?></span><br></p>
<?php 
if(isset($_SESSION['USER_ID'])){
    ?> 
        <a class="btn btn-outline-primary btn-sm" href="single_property.php?id=<?= $data['list_id']?>"> <i class="fa-solid fa-binoculars"></i>&nbsp;View</a>
        <a class="btn btn-outline-primary btn-sm" href="rents.php?cmpId=<?= $data['list_id']?>">
            <i class="fa-solid fa-code-compare"></i>&nbsp;Compare
        </a>
    <?php
}else{
    ?> 
        <p style="color:red; font-size: 10px;">login to see full details.</p>
        <a class="btn btn-outline-primary btn-sm disabled" href="single_property.php?id=<?= $data['list_id']?>"> <i class="fa-solid fa-binoculars"></i>&nbsp;View</a>
        <a class="btn btn-outline-primary btn-sm disabled" href="rents.php?cmpId=<?= $data['list_id']?>">
            <i class="fa-solid fa-code-compare"></i>&nbsp;Compare
        </a>
    <?php
}
?>
        
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</section>



<nav class="d-flex d-sm-flex d-md-flex justify-content-center justify-content-sm-center justify-content-md-center">
        <ul class="pagination" >
        <li class='page-item'> 
            <a class='page-link' aria-label='Previous' name='backBtn' href='rents.php?pageno=<?php echo $get_page_no_decrement ?>'>
                <span>Previous</span>
            </a>
        </li>
        <?php
        for($x=1; $x<$divided_num; $x++):
            $is_active = $x == $get_page_no ? 'page-item active' : 'page-item';
            echo "<li class='$is_active'><a name='numberBtn' href='rents.php?pageno=$x' class='page-link'>$x</a></li>";
        endfor;
        ?>
        <li class='page-item'>
            <a name='frontBtn' href='rents.php?pageno=<?php echo $get_page_no_increment ?>' class='page-link'>
                <span>Next</span>
            </a>
        </li>
    </ul>

</nav>


<?php
include('include/footer.php');
?>
</section>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
<script src="assets/js/Simple-Slider.js"></script>
<script src="assets/js/all.js"></script>
<script src="assets/js/rents.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
<?php 
if(isset($_GET['state'])){
    if($_GET['state'] == "ok"){
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'ADDED',
                text: 'Post is added to the compare page!',
                footer: '<a href="cmp.php">Go to compare page?</a>'
                })
        </script>
        <?php
    }
    if($_GET['state'] == "no"){
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Post is not added to the compare page!  Remove one post first.',
                footer: '<a href="cmp.php">Go to compare page?</a>'
                })
        </script>
        <?php
    }
}

?>