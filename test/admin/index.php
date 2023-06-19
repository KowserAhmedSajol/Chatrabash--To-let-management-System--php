
<?php
require('../include/db.php');
require('../include/function.php');

if(!isset($_SESSION['isUserLoggedIn'])){
  
  header('Location:login.php');
}
$admin=getAdminInfo($db,$_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>My Blog - AdminPanel</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.php" class="logo">Nice <span class="lite">Admin</span></a>
      <!--logo end-->



      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">



          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <!--<img alt="" src="img/avatar1_small.jpg"> -->
                            </span>
                            <span class="username"><?=$admin['full_name']?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="#"><i class="icon_profile"></i> My Profile</a>
              </li>
              
              <li>
                <a href="../include/logout.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
              
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Add Post</span>
                      </a>
          </li>
          <li class="active">
            <a class="" href="index.php?managepost">
                          <i class="icon_house_alt"></i>
                          <span>Manage Post</span>
                      </a>
          </li><li class="active">
            <a class="" href="index.php?managemenu">
                          <i class="icon_house_alt"></i>
                          <span>Manage menu</span>
                      </a>
          </li><li class="active">
            <a class="" href="index.php?managecategory">
                          <i class="icon_house_alt"></i>
                          <span>Manage Category</span>
                      </a>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
  


        <!--/.row-->


        <div class="row">
          <div class="col-lg-12 col-md-12">
<?php
if(isset($_GET['managepost'])){
?>
          <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  Posts
                </header>
  
                <table class="table table-striped table-advance table-hover">
                  <tbody>
                    <tr>
                      <th>#</th>
                      <th>Post Title</th>
                      <th>Post Category</th>
                      <th>Post Date</th>
                      <th>Action</th>
                      
                    </tr>
  
  <?php
  $posts= getAllPost($db);
  $count=1;
  foreach($posts as $post){
    ?>
  <tr>
                      <td><?=$count?></td>
                      <td><?=$post['title']?></td>
                      <td><?=getCategory($db,$post['category_id'])?></td>
                      <td><?=date('F jS,Y',strtotime($post['created_at']))?></td>
                      
                      <td>
                        <div class="btn-group">
                          <a class="btn btn-danger" href="../include/removepost.php?id=<?=$post['id']?>">Remove <i class="icon_close_alt2"></i></a>
                        </div>
                      </td>
                    </tr>
    <?php 
    
  $count++;
}

?>
                  

                </tbody>
              </table>
            </section>
          </div>
        </div>
<?php
}else if(isset($_GET['managemenu'])){
  ?>
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                          <h4 class="modal-title">Add New Menu</h4>
                        </div>
                        <div class="modal-body">
  
                          <form role="form" action="../include/addmenu.php" method="post" >
                            <div class="form-group">
                              <label for="exampleInputEmail1">Menu Name</label>
                              <input type="text" name="menu-name" class="form-control" id="exampleInputEmail3" placeholder="Enter Menu Name">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Menu link</label>
                              <input type="text" name="menu-link" class="form-control" id="exampleInputEmail3" value="#" placeholder="Enter Menu link">
                            </div>
                           
                            
                            <button type="submit" name="addmenu" class="btn btn-primary">add</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
  
          <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  Menu - <a href="#myModal" data-toggle="modal" class="btn btn-sm">
                                    Add New Menu
                                </a>
                </header>
  
                <table class="table table-striped table-advance table-hover">
                  <tbody>
                    <tr>
                      <th>#</th>
                      <th>Menu</th>
                      <th>Link</th>
                      <th>Action</th>
                      
                    </tr>
  
  <?php
  $menus= getMenu($db);
  $count=1;
  foreach($menus as $menu){
    ?>
  <tr>
                      <td><?=$count?></td>
                      <td><?=$menu['name']?></td>
                      <td><?=$menu['action']?></td>
                      
                      <td>
                        <div class="btn-group">
                          <a class="btn btn-danger" href="../include/removemenu.php?id=<?=$menu['id']?>">Remove <i class="icon_close_alt2"></i></a>
                        </div>
                      </td>
                    </tr>
    <?php 
    
  $count++;
}

?>
                  

                </tbody>
              </table>
            </section>
          </div>
        </div>






        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal1" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                          <h4 class="modal-title">Add New SubMenu</h4>
                        </div>
                        <div class="modal-body">
  
                          <form role="form" action="../include/addmenu.php" method="post" >
                            <div class="form-group">
                              <label for="exampleInputEmail1">SubMenu Name</label>
                              <input type="text" name="submenu-name" class="form-control" id="exampleInputEmail3" placeholder="Enter SubMenu Name">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Select Parent Mneu</label>
                              <select name="parent-id" class="form-control" id="exampleInputEmail3" >


<?php
$mlist= getAllMenu($db);
foreach($mlist as $m){
  ?>
    <option value="<?=$m['id']?>"><?=$m['name']?></option>
  <?Php
}
?>
                                

                              </select>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">SubMenu link</label>
                              <input type="text" name="submenu-link" class="form-control" id="exampleInputEmail3" value="#" placeholder="Enter SubMenu link">
                            </div>
                           
                            
                            <button type="submit" name="addsubmenu" class="btn btn-primary">add</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
  
          <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                SubMenu - <a href="#myModal1" data-toggle="modal" class="btn btn-sm">
                                    Add New SubMenu
                                </a>
                </header>
  
                <table class="table table-striped table-advance table-hover">
                  <tbody>
                    <tr>
                      <th>#</th>
                      <th>SubMenu</th>
                      <th>Parent Menu Id</th>
                      <th>Link</th>
                      <th>Action</th>
                      
                    </tr>
  
  <?php
  $submenus= getAllSubMenu($db);
  $count=1;
  foreach($submenus as $menu){
    ?>
  <tr>
                      <td><?=$count?></td>
                      <td><?=$menu['name']?></td>
                      <td><?=getMenuName($db,$menu['parent_menu_id'])?></td>
                      <td><?=$menu['action']?></td>
                      
                      <td>
                        <div class="btn-group">
                          <a class="btn btn-danger" href="../include/removesubmenu.php?id=<?=$menu['id']?>">Remove <i class="icon_close_alt2"></i></a>
                        </div>
                      </td>
                    </tr>
    <?php 
    
  $count++;
}

?>
                  

                </tbody>
              </table>
            </section>
          </div>
        </div>
  <?php
}else if(isset($_GET['managecategory'])){
  ?>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">Add New Category</h4>
                      </div>
                      <div class="modal-body">

                        <form role="form" action="../include/addct.php" method="post" >
                          <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" name="category-name" class="form-control" id="exampleInputEmail3" placeholder="Enter Category">
                          </div>
                         
                          
                          <button type="submit" name="addct" class="btn btn-primary">add</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>









        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Category - <a href="#myModal" data-toggle="modal" class="btn btn-sm">
                                  Add New Category
                              </a>
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Action</th>
                    
                  </tr>

<?php
$categories= getAllCategory($db);
$count=1;
foreach($categories as $ct){
  ?>
<tr>
                    <td><?=$count?></td>
                    <td><?=$ct['name']?></td>
                    
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-danger" href="../include/removect.php?id=<?=$ct['id']?>">Remove <i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
  <?php
  $count++;
}

?>
                  

                </tbody>
              </table>
            </section>
          </div>
        </div>
  <?php
}else{
  ?>
              <!-- CKEditor -->
              <div class="col-lg-12">
                <section class="panel">
                  <header class="panel-heading">
                   Add Post
                  </header>
                  <div class="panel-body">
                    <div class="form">
                      <form action="../include/addpost.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                      <div class="form-group">
                      <div class="col-sm-12">
                        <label>Post Title</label>
                            <input type="text" class="form-control" name="post_title">
                          </div>
                          </div>
                          <div class="row">
                          <div class="form-group col-sm-6">
                      <div class="col-sm-12">
                        <label>Upload Photo </label>
                        <input type="file" name="post_image[]" class="from-control" multiple accept="image/*">

                          </div>
                          </div>



                          <div class="form-group col-sm-6">
                      <div class="col-sm-12">
                        <label>Select Post Category</label>
                        <select name="post_category" class="form-control" id="" >
<?php
$categories= getAllCategory($db);
foreach($categories as $ct){
  ?>
<option style="color:black;" value="<?=$ct['id']?>"><?=$ct['name']?></option>
  <?php
}
?>
                        
                        </select>
                          </div>
                          </div>
                          
                          </div>
                        <div class="form-group">
                        
                         
                          <div class="col-sm-12">
                        <label>Post Content</label>
                            <textarea class="form-control " name="post_content" rows="6"></textarea>
                          </div>
                        </div>
                       <input type="submit" name="addpost" class="btn btn-primary" value="Add Post">
                      </form>
                    </div>
                  </div>
                </section>
              </div>

          </div>
        </div>
  <?php
}
?>


        



        <!-- Today status end -->



      </section>

    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
      <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  
  <script src="js/scripts.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>

</html>
