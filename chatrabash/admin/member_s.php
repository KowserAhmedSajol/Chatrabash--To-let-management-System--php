<?php 

session_start();
if (isset($_SESSION['ADMIN_ID'])) {
    $conn=mysqli_connect("localhost","root","", "chatrabash");
    $sqlv = "SELECT * FROM users";
    
    $query = mysqli_query($conn,$sqlv);
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/style-s.css">
</head>

<body id="page-top">
    <div id="wrapper">
    <?php
    require_once('sidebar.php');
    ?>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">User and Home owners</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="m-0 fw-bold" style="color: #f6c23e;">Members Information ℹ</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                                <option value="10" selected="">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp;</label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table table-hover table-bordered my-0" id="dataTable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>NID</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php 
while($data = mysqli_fetch_assoc($query)){
?>
    <tbody>
        <tr>
            <td><?php echo $data['firstname'];?></td>
            <td><?php echo $data['lastname'];?><br></td>
            <td><?php echo $data['phonenumber'];?><br></td>
            <td><?php echo $data['email'];?><br></td>
            <td><?php echo $data['nid_number'];?><br></td>
            <td><?php echo $data['type'];?></td>
            <td>
            <?php 
            if ($data['type'] == "tennant"){
            ?>
            <a href="detail.php?user='delete'&id=<?php echo $data['id']; ?>" class="btn btn-outline-warning btn-sm disabled" type="submit" style="border-style: none;border-radius: 0px;">Demote</a>
            <?php
            } else {
                ?>
                <a href="detail.php?user='delete'&id=<?php echo $data['id']; ?>" class="btn btn-outline-warning btn-sm" type="submit" style="border-style: none;border-radius: 0px;">Demote</a>
                <?php
            }
            ?>



            </td>
        </tr>
    </tbody>
<?php
}
?>

                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script src="assets/js/chatrabaee.js"></script>
</body>

</html>






    <?php

}else{
    
    header("location:login.php");
}
?>

