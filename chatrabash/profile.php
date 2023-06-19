
<?php
require('include/config.php');

session_start();

$and = "oye";
if (isset($_SESSION['USER_ID'])) {
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Profile - Chatrabash</title>
        <meta name="description" content="Online accommodation system for university students. Design by @Sazib.Gub">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dokdo&amp;display=swap">
        <link rel="stylesheet" href="assets/css/main.css">
    </head>

    <body>
        <?php
        include('include/navbar.php');
        ?>

        <section></section>
        <section>
            <div class="container">
                <div style="margin-top: 10px;" >
                    <ul class="nav nav-tabs nav-fill"  role="tablist">
                        <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1">User information</a></li>

<?php
    $conn = mysqli_connect("localhost", "root", "", "chatrabash");
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $uid = $_SESSION['USER_ID'];
    $sql = "SELECT * FROM users WHERE id=$uid";
    $query = mysqli_query($conn,$sql);
        $datauser = mysqli_fetch_assoc($query);
        $user_type = $datauser['type'];
if ($user_type == "owner"){
        ?>
                                <li class="nav-item" role="presentation">
                            <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-2">Listing Posted</a>
                        </li>
        <?php
    }
?>



                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" role="tabpanel" id="tab-1">
                            <h3 class="text-dark mb-4">Profile</h3>
                            <div class="row mb-3">
                                <div class="col-lg-4">



                                    <!------------------------------------->
                                    <!--./* Update profile photo Starts */.-->
                                    <!------------------------------------->


                                    <div class="card border-0 mb-3">
                                        <?php
                                        $conn = mysqli_connect("localhost", "root", "", "chatrabash");
                                        if ($conn === false) {
                                            die("ERROR: Could not connect. " . mysqli_connect_error());
                                        }
                                        $id           = $_SESSION['USER_ID'];
                                        $q = "SELECT * FROM users WHERE id=$id";
                                        $query = mysqli_query($conn, $q);
                                        $data = mysqli_fetch_assoc($query);
                                        if ($data['photo']) {
                                            $profileName = $data['photo'];
                                        } else {
                                            $profileName = "ss.png";
                                        }
                                        ?>


                                        <div class="card-body text-center"><img class="rounded-circle mb-3 mt-4" src="imag/profiles/<?= $profileName ?>" width="160" height="160">

                                            <form method="post" action="profile.php" enctype="multipart/form-data">
                                                <input class="form-control" type="file" id="image" name="image" accept=".jpg, .jpeg, .png"><br />
                                                <div class="mb-3"><input class="btn btn-primary btn-sm" type="submit" name="pchange" value="Change Photo&nbsp;">
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <?php

                                if (isset($_POST['pchange'])) {

                                    $imageName = $_FILES['image']['name'];
                                    $imageTmpName = $_FILES['image']['tmp_name'];
                                    $upLocation = "imag/profiles/" . $imageName;
                                    move_uploaded_file($imageTmpName, $upLocation);
                                    $sql = "UPDATE users SET photo=? WHERE id=?";
                                    $stmtinsert = $conn->prepare($sql);
                                    $result = $stmtinsert->execute([$imageName, $id]);
                                }

                                ?>

                                <!------------------------------------->
                                <!--./* Update profile photo ends */.-->
                                <!------------------------------------->


                                <!---------------------------------->
                                <!--./* Update Password starts */.-->
                                <!---------------------------------->


                                <div class="text-center"><a class="btn btn-outline-primary btn-sm" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#collapse-1" role="button">Change Password<br></a>
                                    <div class="collapse" id="collapse-1">
                                        <div class="card" style="margin-top: 10px;">
                                            <div class="card-header py-3">
                                                <p class="text-primary m-0 fw-bold">Update Password</p>

                                            </div>
                                            <div class="card-body">
                                                <form method="post" action="profile.php" enctype="application/x-www-form-urlencoded">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="p1"><strong>New Password&nbsp;</strong></label><input class="form-control" type="text" id="p1" placeholder="#45pass" name="npass"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="p2"><strong>Old Password&nbsp;</strong></label><input class="form-control" type="text" id="p-2" placeholder="#45pass" name="opass"></div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3"><input class="btn btn-primary btn-sm" type="submit" name="change" value="Confirmation&nbsp;"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if (isset($_POST['change'])) {
                                    $newPass      = sha1($_POST['npass']);
                                    $oldPass      = sha1($_POST['opass']);
                                    $savedPass    = $_SESSION['PASSWORD'];
                                    $id           = $_SESSION['USER_ID'];

                                    if ($oldPass == $savedPass) {
                                ?>
                                        <br />
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Password Changed Successfully</p>
                                        </div>
                                <?php
                                        $conn = mysqli_connect("localhost", "root", "", "chatrabash");
                                        if ($conn === false) {
                                            die("ERROR: Could not connect. " . mysqli_connect_error());
                                        }
                                        $sql = "UPDATE users SET password=? WHERE id=?";
                                        $stmtinsert = $conn->prepare($sql);
                                        $result = $stmtinsert->execute([$newPass, $id]);
                                    } else {
                                        echo "not matched";
                                    }
                                } else {
                                }
                                ?>

                                <!---------------------------------->
                                <!--./* Update Password Ends */.-->
                                <!---------------------------------->
                            </div>
                            <div class="col-lg-8">
                                <div class="row mb-3 d-none">
                                    <div class="col">
                                        <div class="card text-white bg-primary shadow">
                                            <div class="card-body">
                                                <div class="row mb-2">
                                                    <div class="col">
                                                        <p class="m-0">Peformance</p>
                                                        <p class="m-0"><strong>65.2%</strong></p>
                                                    </div>
                                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                                </div>
                                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card text-white bg-success shadow">
                                            <div class="card-body">
                                                <div class="row mb-2">
                                                    <div class="col">
                                                        <p class="m-0">Peformance</p>
                                                        <p class="m-0"><strong>65.2%</strong></p>
                                                    </div>
                                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                                </div>
                                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h5 class="mb-4 text-info" id="nameeos" >User type: &nbsp;<?php echo $datauser['type']; ?></h5>
                                    <div class="col">
                                        <div class="card shadow mb-3">
                                            <div class="card-header py-3">
                                                <p class="text-primary m-0 fw-bold">User Settings</p>
                                            </div>
                                            <div class="card-body">
                                                <form method="get" enctype="application/x-www-form-urlencoded">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="first_name"><strong>First Name</strong></label><br /><?php echo $_SESSION['USER_F_NAME']; ?></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="last_name"><strong>Last Name</strong></label><br /><?php echo $_SESSION['USER_NAME']; ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label><br /><?php echo $_SESSION['EMAIL']; ?></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="username"><strong>Phone number</strong><br></label><br /><?php echo $_SESSION['PHONE']; ?></div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card shadow">
                                            <div class="card-header py-3">
                                                <p class="text-primary m-0 fw-bold">PERSONAL INFO</p>
                                            </div>

                                            <!---------------------------------->
                                            <!--./* Additional Data starts */.-->
                                            <!---------------------------------->
<?php
    $uid = $_SESSION['USER_ID'];
$sql = "SELECT * FROM users WHERE id=$uid";
$query = mysqli_query($conn,$sql);
    $datauser = mysqli_fetch_assoc($query);
    $user_type = $datauser['type'];
    if($user_type == "owner"){
        ?>

                                            <div class="card-body">
                                                <form method="get" enctype="application/x-www-form-urlencoded">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="first_name"><strong>NID NUMBER</strong></label><br /><?php echo $datauser['nid_number']; ?></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="last_name"><strong>ISSUE DATE</strong></label><br /><?php echo $datauser['issue_date']; ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="email"><strong>POSTAL CODE</strong></label><br /><?php echo $datauser['postal_code']; ?></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="username"><strong>USER STATUS</strong><br></label><br /><?php echo $datauser['type']; ?></div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
        <?php
        
    } else if ($user_type == "tennant"){
        ?>
        <div class="card-body">
        <form method="post" action="profile.php" enctype="application/x-www-form-urlencoded">
            <div class="mb-3"><label class="form-label" for="address"><strong>NID Number</strong></label><textarea class="form-control" type="text" id="address" rows="1" placeholder="XXX XXX XXXX" name="nid_number"></textarea></div>
            <div class="row">
                <div class="col">
                    <div class="mb-3"><label class="form-label" for="city"><strong>Issue Date</strong></label><input class="form-control" type="text" id="city" placeholder="EX : 10 jul 2020" name="issue_date"></div>
                </div>
                <div class="col">
                    <div class="mb-3"><label class="form-label" for="country"><strong>Postal Code</strong></label><input class="form-control" type="text" id="country" placeholder="EX : 1411" name="postal_code"></div>
                </div>
            </div>
            <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit" name="extraSubmit">Save&nbsp;Settings</button></div>
        </form>
    </div>
    
    <?php


    if (isset($_POST['extraSubmit'])) {
        $nid_number = $_POST['nid_number'];
        $issue_date = $_POST['issue_date'];
        $postal_code = $_POST['postal_code'];
        $id = $_SESSION['USER_ID'];
        $type = "owner";
        $conn = mysqli_connect("localhost", "root", "", "chatrabash");
        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        $sql = "UPDATE users SET nid_number=?, issue_date=?, postal_code=?, type=? WHERE id=?";
        $stmtinsert = $conn->prepare($sql);
        $result = $stmtinsert->execute([$nid_number, $issue_date, $postal_code, $type, $id]);
        
    }

    
    }

?>


                                            <!---------------------------------->
                                            <!--./* Additional Data Ends */.-->
                                            <!---------------------------------->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" role="tabpanel" id="tab-2">
                        <div class="row g-0" style="margin-top: 10px;">
                            <div class="col">
                                <div>
                                    <ul class="nav nav-pills nav-fill" role="tablist">
                                        <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="pill" href="#tab-3">My Property</a></li>
                                        <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="pill" href="#tab-4">Submit New Property<br></a></li>
                                        <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="pill" href="#tab-5">My Packages</a></li>
                                    </ul>
                                    <div class="tab-content">

                                                            <!------------------------------>
                                            <!--./* My Property Starts */.-->
                                            <!------------------------------>

                                            <div class="tab-pane" role="tabpanel" id="tab-3">

                                            <section>

<div class="card">
    <div class="card-body">
    
<div class="row" style="margin-top: 12px;margin-bottom: 4px;">
<?php
$conn=mysqli_connect("localhost","root","", "chatrabash");
$uid = $_SESSION['USER_ID'];
$sqlQ = "SELECT * FROM property_list WHERE user_id=$uid";
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


$sql = "SELECT * FROM property_list WHERE user_id=$uid LIMIT 5 OFFSET $offset";
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
                    <div><a href="single_property_show.php?id=<?= $data['list_id']?>" ><img class="rounded img-fluid shadow w-100 fit-cover" alt=" " src="imag/listingImg/<?=getPostThumb($conn,$data['list_id'])?>" style="height: 250px;"></a></div>
                </div>
                <div class="col">
                    <div class="py-4"><span class="badge bg-primary mb-2" style="font-size: 14px;"><strong> &nbsp;&nbsp;  <?php echo $data['rent_rate'];?>/- TK  &nbsp;&nbsp; </strong><br></span>
                        <h4 class="fw-bold" style="font-size: 20px;"><?php echo $data['property_name'];?></h4>
                        <p class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-map">
                                <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"></path>
                            </svg><span style="color: rgb(0, 0, 0);">&nbsp;Status : <?php echo $data['status'];?></span><br></p>
                            <p class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-map">
                                <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"></path>
                            </svg><span style="color: rgb(0, 0, 0);">&nbsp;Location : <?php echo $data['full_address'];?></span><br></p>
                        <p class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-currency-dollar">
                                <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                            </svg><span style="color: rgb(0, 0, 0);">&nbsp;University :<?php echo $data['university_name'];?></span><br></p>
                        <p class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-square-dotted">
                                <path d="M2.5 0c-.166 0-.33.016-.487.048l.194.98A1.51 1.51 0 0 1 2.5 1h.458V0H2.5zm2.292 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zm1.833 0h-.916v1h.916V0zm1.834 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zM13.5 0h-.458v1h.458c.1 0 .199.01.293.029l.194-.981A2.51 2.51 0 0 0 13.5 0zm2.079 1.11a2.511 2.511 0 0 0-.69-.689l-.556.831c.164.11.305.251.415.415l.83-.556zM1.11.421a2.511 2.511 0 0 0-.689.69l.831.556c.11-.164.251-.305.415-.415L1.11.422zM16 2.5c0-.166-.016-.33-.048-.487l-.98.194c.018.094.028.192.028.293v.458h1V2.5zM.048 2.013A2.51 2.51 0 0 0 0 2.5v.458h1V2.5c0-.1.01-.199.029-.293l-.981-.194zM0 3.875v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 5.708v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 7.542v.916h1v-.916H0zm15 .916h1v-.916h-1v.916zM0 9.375v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .916v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .917v.458c0 .166.016.33.048.487l.98-.194A1.51 1.51 0 0 1 1 13.5v-.458H0zm16 .458v-.458h-1v.458c0 .1-.01.199-.029.293l.981.194c.032-.158.048-.32.048-.487zM.421 14.89c.183.272.417.506.69.689l.556-.831a1.51 1.51 0 0 1-.415-.415l-.83.556zm14.469.689c.272-.183.506-.417.689-.69l-.831-.556c-.11.164-.251.305-.415.415l.556.83zm-12.877.373c.158.032.32.048.487.048h.458v-1H2.5c-.1 0-.199-.01-.293-.029l-.194.981zM13.5 16c.166 0 .33-.016.487-.048l-.194-.98A1.51 1.51 0 0 1 13.5 15h-.458v1h.458zm-9.625 0h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zm1.834-1v1h.916v-1h-.916zm1.833 1h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                            </svg><span style="color: rgb(0, 0, 0);">&nbsp;Room Type: <?php echo $data['property_type'];?></span></p>
                        <p class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-gender-trans">
                                <path fill-rule="evenodd" d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1.707L3.5 2.793l.646-.647a.5.5 0 1 1 .708.708l-.647.646.822.822A3.99 3.99 0 0 1 8 3c1.18 0 2.239.51 2.971 1.322L14.293 1H11.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-3.45 3.45A4 4 0 0 1 8.5 10.97V13H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V14H6a.5.5 0 0 1 0-1h1.5v-2.03a4 4 0 0 1-3.05-5.814l-.95-.949-.646.647a.5.5 0 1 1-.708-.708l.647-.646L1 1.707V3.5a.5.5 0 0 1-1 0v-3zm5.49 4.856a3 3 0 1 0 5.02 3.288 3 3 0 0 0-5.02-3.288z"></path>
                            </svg><span style="color: rgb(0, 0, 0);">&nbsp;Gender: <?php echo $data['gender'];?></span><br></p><a class="btn btn-outline-primary btn-sm" role="button" style="margin-left: 10px;" href="single_property_show.php?id=<?= $data['list_id']?>"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person-circle">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"></path>
                            </svg>&nbsp;View<br></a>
                    </div>
                </div>
            </div>
<?php
}
?>

</div>
    </div>
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









                                            <!------------------------------>
                                            <!--./* My Property Ends */.-->
                                            <!------------------------------>

                                        </div>

                                        <div class="tab-pane" role="tabpanel" id="tab-4">
                                            <section>
                                                <div class="card" style="border-style: hidden">
                                                    <?php
                                                    include('include/listing.php');
                                                    ?>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="tab-pane active" role="tabpanel" id="tab-5">
                                            <!-- package section by sazib -->
                                            <section>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <section class="py-5" style="border-width: 0px;">
                                                            <div class="container py-4 py-xl-5">
                                                                <div class="row mb-5">
                                                                    <div class="col-md-8 col-xl-6 text-center mx-auto">
                                                                        <h2 class="display-6 fw-bold mb-4">Check out<br>our <span class="underline">primum services</span></h2>
                                                                    </div>
                                                                </div>
                                                                <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-lg-3">
                                                                    <div class="col">
                                                                        <div class="card border-0 h-100">
                                                                            <div class="card-body d-flex flex-column justify-content-between p-4">
                                                                                <div>
                                                                                    <h6 class="fw-bold text-muted">Standard</h6>
                                                                                    <h4 class="display-5 fw-bold mb-4"><span style="text-decoration: line-through;">1500TK</span></h4>
                                                                                    <ul class="list-unstyled">
                                                                                        <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2">
                                                                                                <i class="fa-solid fa-check fs-6"></i></span><span>Package Duration&nbsp; 30 days</span></li>
                                                                                        <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2">
                                                                                                <i class="fa-solid fa-check fs-6"></i></span><span>Total Properties&nbsp; &nbsp; &nbsp; 02</span></li>
                                                                                        <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2">
                                                                                                <i class="fa-solid fa-check fs-6"></i></span><span>Basic Ads on our site</span></li>
                                                                                    </ul>
                                                                                </div><a class="btn btn-outline-primary border-0" role="button" href="include/comming.php" style="border-width: 0px;">Subscribe</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="card border-warning border-2 h-100" style="background: #eeece4;">
                                                                            <div class="card-body d-flex flex-column justify-content-between p-4"><span class="badge bg-warning position-absolute top-0 end-0 rounded-bottom-left text-uppercase text-primary">Most Popular</span>
                                                                                <div>
                                                                                    <h6 class="fw-bold text-muted">Pro</h6>
                                                                                    <h4 class="display-5 fw-bold mb-4">3500TK</h4>
                                                                                    <ul class="list-unstyled">
                                                                                        <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><i class="fa-solid fa-check fs-6"></i></span><span>Package Duration&nbsp; 35 days<br></span></li>
                                                                                        <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><i class="fa-solid fa-check fs-6"></i></span><span>Total Properties&nbsp; &nbsp; &nbsp; 08<br></span></li>
                                                                                        <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><i class="fa-solid fa-check fs-6"></i></span><span>Post Editorial Request<br></span></li>
                                                                                    </ul>
                                                                                </div><a class="btn btn-warning" role="button" href="https://buy.stripe.com/test_9AQ5o7c1h7gx7GE288">Subscribe</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="card border-0 h-100">
                                                                            <div class="card-body d-flex flex-column justify-content-between p-4">
                                                                                <div class="pb-4">
                                                                                    <h6 class="fw-bold text-muted">Enterprise</h6>
                                                                                    <h4 class="display-5 fw-bold mb-4">6999TK</h4>
                                                                                    <ul class="list-unstyled">
                                                                                        <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><i class="fa-solid fa-check fs-6"></i></span><span>Package Duration&nbsp; 55 days<br></span></li>
                                                                                        <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><i class="fa-solid fa-check fs-6"></i></span><span>Total Properties&nbsp; &nbsp; &nbsp; 20<br></span></li>
                                                                                        <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><i class="fa-solid fa-check fs-6"></i></span><span>Post Editorial Request<br></span></li>
                                                                                        <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><i class="fa-solid fa-check fs-6"></i></span><span>Spatial Recommendation Sent</span></li>
                                                                                    </ul>
                                                                                </div><a class="btn btn-outline-primary border-0" role="button" href="https://buy.stripe.com/test_14kg2Lc1h8kB3qo3cd">Subscribe</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
                        <script>
                $(document).ready(function(){
                    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                        localStorage.setItem('activeTab', $(e.target).attr('href'));
                    });
                    var activeTab = localStorage.getItem('activeTab');
                    if(activeTab){
                        $('#myTab a[href="' + activeTab + '"]').tab('show');
                    }
                });
                </script>
        <?php
        include('include/footer.php');
        ?>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/smart-forms.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="assets/js/ssmodern.js"></script>
        <script src="assets/js/all.js"></script>
    </body>

    </html>
<?php
} else {
    header("location:login.php");
}



?>