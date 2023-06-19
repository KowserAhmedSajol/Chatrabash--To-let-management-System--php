<?php 
session_start();
if (isset($_SESSION['ADMIN_ID'])) {
    $conn=mysqli_connect("localhost","root","", "chatrabash");
$status = "'pending'";
$status1 = "'approved'";
$sqlv = "SELECT * FROM property_list WHERE status=$status";
$sqlb = "SELECT * FROM property_list WHERE status=$status1";

$query = mysqli_query($conn,$sqlv);
$query1 = mysqli_query($conn,$sqlb);
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
</head>

<body>
    <div id="wrapper">
    <?php
    require_once('sidebar.php');
    ?>
                <div class="container-fluid">
                    <header>
                        <h1>All Submitted Property</h1>
                    </header>
                    <div>
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item" role="presentation"><a class="nav-link " role="tab" data-bs-toggle="pill" href="#tab-1" style="border-radius: 0px;">Pending</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="pill" href="#tab-2" style="border-radius: 0px;">Approved</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade" role="tabpanel" id="tab-1">
                                <div class="card border-0" style="border-style: none;border-radius: 0px;">
                                    <div class="card-header py-3"></div>
                                    <div class="card-body border-0" style="border-style: none;">
                                        <div class="row">
                                            <div class="col-md-6 text-nowrap">
                                                <div id="dataTable_length-1" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                                            <option value="10" selected="">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select>&nbsp;</label></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-md-end dataTables_filter" id="dataTable_filter-1"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                            </div>
                                        </div>
                                        <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                            <table class="table table-hover table-bordered my-0" id="dataTable">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Sl No</th>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Property Detail</th>
                                                        <th>Property Rent</th>
                                                        <th>Date Uploaded</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
<?php
    $sl = 1;
while($data = mysqli_fetch_assoc($query)){
?>
    <tbody>
        <tr>
            <td><?php echo $sl;?></td>
            <td><?php echo $data['list_id'];?></td>
            <td><?php echo $data['property_name'];?><br></td>
            <td><?php echo $data['university_name'];?><br></td>
            <td><?php echo $data['rent_rate'];?></td>
            <td><?php echo $data['submit_date'];?></td>
            <td>
                <a href="detail.php?id=<?php echo $data['list_id']; ?>" class="btn btn-outline-warning" type="submit" style="border-style: none;border-radius: 0px;">Show Full Detail</a>
            </td>
        </tr>
    </tbody>
<?php
        $sl = $sl + 1;
}
?>






                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 align-self-center">
                                                <p id="dataTable_info-1" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                                            </div>
                                            <div class="col-md-6">
                                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                                    <ul class="pagination">
                                                        <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
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
                            <div class="tab-pane fade show active" role="tabpanel" id="tab-2">
                                <div class="card border-0" style="border-style: none;border-radius: 0px;">
                                    <div class="card-header py-3"></div>
                                    <div class="card-body border-0" style="border-style: none;">
                                        <div class="row">
                                            <div class="col-md-6 text-nowrap">
                                                <div id="dataTable_length-2" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                                            <option value="10" selected="">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select>&nbsp;</label></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-md-end dataTables_filter" id="dataTable_filter-2"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                            </div>
                                        </div>
                                        <div class="table-responsive table mt-2" id="dataTable-2" role="grid" aria-describedby="dataTable_info">
                                            <table class="table table-hover table-bordered my-0" id="dataTable">
                                            <thead class="table-dark">
                                                    <tr>
                                                        <th>SL No</th>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Property Detail</th>
                                                        <th>Property Rent</th>
                                                        <th>Date Uploaded</th>
                                                        <th>Visitor</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
<?php 
$sl= 1;
while($data1 = mysqli_fetch_assoc($query1)){
?>
    <tbody>
        <tr>
            <td><?php echo $sl;?></td>
            <td><?php echo $data1['list_id'];?></td>
            <td><?php echo $data1['property_name'];?><br></td>
            <td><?php echo $data1['university_name'];?><br></td>
            <td><?php echo $data1['rent_rate'];?></td>
            <td><?php echo $data1['submit_date'];?></td>
            <td><?php echo $data1['counter'];?></td>
            <td>
                <a href="detail.php?id=<?php echo $data1['list_id']; ?>" class="btn btn-outline-warning" type="submit" style="border-style: none;border-radius: 0px;">Show</a>
                <a href="detail.php?id=<?php echo $data1['list_id'];?>&set=delete" class="btn btn-outline-danger" type="submit" style="border-style: none;border-radius: 0px;">Delete</a>
            </td>
        </tr>
    </tbody>
    
<?php
    $sl = $sl + 1;
}
?>


                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 align-self-center">
                                                <p id="dataTable_info-2" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                                            </div>
                                            <div class="col-md-6">
                                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                                    <ul class="pagination">
                                                        <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
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


