<?php

session_start();
if (isset($_SESSION['ADMIN_ID'])) {

    $conn=mysqli_connect("localhost","root","", "chatrabash");
    
$status1 = "'pending'";
$status2 = "'active'";
$status3 = "'processing'";
$status4 = "'completed'";
$status5 = "'reject'";
$sql1 = "SELECT * FROM special_requests WHERE status=$status1";
$sql2 = "SELECT * FROM special_requests WHERE status=$status2";
$sql3 = "SELECT * FROM special_requests WHERE status=$status3";
$sql4 = "SELECT * FROM special_requests WHERE status=$status4";
$sql5 = "SELECT * FROM special_requests WHERE status=$status5";
$query1 = mysqli_query($conn,$sql1);
$query2 = mysqli_query($conn,$sql2);
$query3 = mysqli_query($conn,$sql3);
$query4 = mysqli_query($conn,$sql4);
$query5 = mysqli_query($conn,$sql5);


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
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">All Requests</h3>
                    </div>
                    <div>
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="pill" href="#tab-1" style="border-radius: 0px;">Pending</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="pill" href="#tab-2" style="border-radius: 0px;">Active</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="pill" href="#tab-3" style="border-radius: 0px;">Processing</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="pill" href="#tab-4" style="border-radius: 0px;">Completed</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="pill" href="#tab-5" style="border-radius: 0px;">Rejected</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" role="tabpanel" id="tab-1">
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
                                        <div class="table-responsive table mt-2" id="dataTable-2" role="grid" aria-describedby="dataTable_info">
                                        <table class="table table-hover table-bordered my-0" id="dataTable">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Sl No</th>
                                                        <th>User ID</th>
                                                        <th>Sender Phone Number</th>
                                                        <th>Transaction ID</th>
                                                        <th>Method</th>
                                                        <th>Time</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
<?php
    $sl = 1;
while($data = mysqli_fetch_assoc($query1)){
?>
    <tbody>
        <tr>
            <td><?php echo $sl;?></td>
            <td><?php echo $data['user_id'];?></td>
            <td><?php echo $data['sender_phone_number'];?><br></td>
            <td><?php echo $data['transaction_id'];?><br></td>
            <td><?php echo $data['sending_method'];?></td>
            <td><?php echo $data['sending_time'];?></td>
            <td>
                <a href="s_request_view.php?id=<?php echo $data['id']; ?>&set=active" class="btn btn-outline-primary" type="submit" style="border-style: none;border-radius: 0px;">View</a>
                <a href="s_request_process.php?id=<?php echo $data['id']; ?>&set=active" class="btn btn-outline-primary" type="submit" style="border-style: none;border-radius: 0px;">Active</a>
                <a href="s_request_process.php?id=<?php echo $data['id']; ?>&set=reject" class="btn btn-outline-danger" type="submit" style="border-style: none;border-radius: 0px;">Reject</a>
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
                            <div class="tab-pane fade" role="tabpanel" id="tab-2">
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
                                        <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                        <table class="table table-hover table-bordered my-0" id="dataTable">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Sl No</th>
                                                        <th>User ID</th>
                                                        <th>Gender</th>
                                                        <th>Suitable Time</th>
                                                        <th>Rent Range</th>
                                                        <th>University</th>
                                                        <th>Area</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
<?php
    $sl = 1;
while($data = mysqli_fetch_assoc($query2)){
?>
    <tbody>
        <tr>
            <td><?php echo $sl;?></td>
            <td><?php echo $data['user_id'];?></td>
            <td><?php echo $data['gender'];?><br></td>
            <td><?php echo $data['suitable_time'];?><br></td>
            <td><?php echo $data['rent_range'];?></td>
            <td><?php echo $data['university'];?></td>
            <td><?php echo $data['addrese'];?></td>
            <td>
                <a href="s_request_view.php?id=<?php echo $data['id']; ?>&set=processing" class="btn btn-outline-primary" type="submit" style="border-style: none;border-radius: 0px;">View</a>
                <a href="s_request_process.php?id=<?php echo $data['id']; ?>&set=processing" class="btn btn-outline-primary" type="submit" style="border-style: none;border-radius: 0px;">Process</a>
                <a href="s_request_process.php?id=<?php echo $data['id']; ?>&set=reject" class="btn btn-outline-danger" type="submit" style="border-style: none;border-radius: 0px;">Reject</a>
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
                            <div class="tab-pane fade" role="tabpanel" id="tab-3">
                                <div class="card border-0" style="border-style: none;border-radius: 0px;">
                                    <div class="card-header py-3"></div>
                                    <div class="card-body border-0" style="border-style: none;">
                                        <div class="row">
                                            <div class="col-md-6 text-nowrap">
                                                <div id="dataTable_length-3" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                                            <option value="10" selected="">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select>&nbsp;</label></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-md-end dataTables_filter" id="dataTable_filter-3"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                            </div>
                                        </div>
                                        <div class="table-responsive table mt-2" id="dataTable-3" role="grid" aria-describedby="dataTable_info">
                                        <table class="table table-hover table-bordered my-0" id="dataTable">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Sl No</th>
                                                        <th>User ID</th>
                                                        <th>Sender Phone Number</th>
                                                        <th>Transaction ID</th>
                                                        <th>Method</th>
                                                        <th>Time</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
<?php
    $sl = 1;
while($data = mysqli_fetch_assoc($query3)){
?>
    <tbody>
        <tr>
            <td><?php echo $sl;?></td>
            <td><?php echo $data['user_id'];?></td>
            <td><?php echo $data['sender_phone_number'];?><br></td>
            <td><?php echo $data['transaction_id'];?><br></td>
            <td><?php echo $data['sending_method'];?></td>
            <td><?php echo $data['sending_time'];?></td>
            <td>
                <a href="s_request_view.php?id=<?php echo $data['id']; ?>&set=completed" class="btn btn-outline-primary" type="submit" style="border-style: none;border-radius: 0px;">View</a>
                <a href="s_request_process.php?id=<?php echo $data['id']; ?>&set=completed" class="btn btn-outline-primary" type="submit" style="border-style: none;border-radius: 0px;">Complete</a>
                <a href="s_request_process.php?id=<?php echo $data['id']; ?>&set=reject" class="btn btn-outline-danger" type="submit" style="border-style: none;border-radius: 0px;">Reject</a>
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
                                                <p id="dataTable_info-3" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
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
                            <div class="tab-pane fade" role="tabpanel" id="tab-4">
                                <div class="card border-0" style="border-style: none;border-radius: 0px;">
                                    <div class="card-header py-3"></div>
                                    <div class="card-body border-0" style="border-style: none;">
                                        <div class="row">
                                            <div class="col-md-6 text-nowrap">
                                                <div id="dataTable_length-4" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                                            <option value="10" selected="">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select>&nbsp;</label></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-md-end dataTables_filter" id="dataTable_filter-4"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                            </div>
                                        </div>
                                        <div class="table-responsive table mt-2" id="dataTable-4" role="grid" aria-describedby="dataTable_info">
                                        <table class="table table-hover table-bordered my-0" id="dataTable">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Sl No</th>
                                                        <th>User ID</th>
                                                        <th>Sender Phone Number</th>
                                                        <th>Transaction ID</th>
                                                        <th>Method</th>
                                                        <th>Time</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
<?php
    $sl = 1;
while($data = mysqli_fetch_assoc($query4)){
?>
    <tbody>
        <tr>
            <td><?php echo $sl;?></td>
            <td><?php echo $data['user_id'];?></td>
            <td><?php echo $data['sender_phone_number'];?><br></td>
            <td><?php echo $data['transaction_id'];?><br></td>
            <td><?php echo $data['sending_method'];?></td>
            <td><?php echo $data['sending_time'];?></td>
            <td>
                <a href="s_request_view.php?id=<?php echo $data['id']; ?>&set=view" class="btn btn-outline-primary" type="submit" style="border-style: none;border-radius: 0px;">View</a>
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
                                                <p id="dataTable_info-4" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
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
                            <div class="tab-pane fade" role="tabpanel" id="tab-5">
                                <div class="card border-0" style="border-style: none;border-radius: 0px;">
                                    <div class="card-header py-3"></div>
                                    <div class="card-body border-0" style="border-style: none;">
                                        <div class="row">
                                            <div class="col-md-6 text-nowrap">
                                                <div id="dataTable_length-4" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                                            <option value="10" selected="">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select>&nbsp;</label></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-md-end dataTables_filter" id="dataTable_filter-4"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                            </div>
                                        </div>
                                        <div class="table-responsive table mt-2" id="dataTable-4" role="grid" aria-describedby="dataTable_info">
                                        <table class="table table-hover table-bordered my-0" id="dataTable">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Sl No</th>
                                                        <th>User ID</th>
                                                        <th>Sender Phone Number</th>
                                                        <th>Transaction ID</th>
                                                        <th>Method</th>
                                                        <th>Time</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
<?php
    $sl = 1;
while($data = mysqli_fetch_assoc($query5)){
?>
    <tbody>
        <tr>
            <td><?php echo $sl;?></td>
            <td><?php echo $data['user_id'];?></td>
            <td><?php echo $data['sender_phone_number'];?><br></td>
            <td><?php echo $data['transaction_id'];?><br></td>
            <td><?php echo $data['sending_method'];?></td>
            <td><?php echo $data['sending_time'];?></td>
            <td>
                <a href="s_request_view.php?id=<?php echo $data['id']; ?>&set=pending" class="btn btn-outline-primary" type="submit" style="border-style: none;border-radius: 0px;">View</a>
                <a href="s_request_process.php?id=<?php echo $data['id']; ?>&set=pending" class="btn btn-outline-primary" type="submit" style="border-style: none;border-radius: 0px;">Push to Pending</a>
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
                                                <p id="dataTable_info-4" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
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
