<?php
session_start();
if($_SESSION['status']<>1){
	echo "<script>location.href='./login.php';</script>";
}

require 'conn.php';


if(!empty($_GET['MenuID'])){
$MenuID=$_GET['MenuID'];
$sql = "select * from Menus where MenuID=?";
$r = $conn->prepare($sql);
      $r->bind_param("i",$MenuID);
      $r->execute();
      $rr = $r->get_result();
      $MenuRow = $rr->fetch_assoc();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
  منصة كفاءات الالكترونية
  </title>
  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Icons -->
  <link href="./assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="./assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="./assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
  <link href="./assets/css/sweetalert.css" rel="stylesheet" />

  <script src="./ckeditor/ckeditor.js"></script>

  <script src="./assets/js/sweetalert.js"></script>


  


</head>

<body class="" >
  <nav class="navbar navbar-vertical fixed-right navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./">
        <img src="./assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->

      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./">
                <img src="./assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link  active " href="MenuAdd.php">
              <i class="ni ni-bullet-list-67 text-primary"></i> إضافة قائمة رئيسية
            </a>
          </li>
          <li class="nav-item   ">
            <a class="nav-link   " href="SubMenuAdd.php">
              <i class="ni ni-bullet-list-67 text-primary"></i> إضافة قائمة فرعية
            </a>
          </li>
          <li class="nav-item   ">
            <a class="nav-link " href="UserAdd.php">
              <i class="ni ni-circle-08 text-primary"></i> إضافة مستخدم
            </a>
          </li>

        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item active active-pro">
            <a class="nav-link" href="logout.php">
              <i class="ni ni-send text-dark"></i> تسجيل خروج
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">لوحة التحكم</a>
        <!-- Form -->

        <!-- User -->

      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body" id="R1">
          <!-- Card stats -->
          <div class="row">

  <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">المشتركين</h5>
                <span class="h2 font-weight-bold mb-0">1000</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-blue text-white rounded-circle shadow">
                <i class="fas fa-database"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-muted text-sm">
              <span class="text-nowrap">العدد الكلي للمشتركين</span>
            </p>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">المؤمن له</h5>
                <span class="h2 font-weight-bold mb-0">1000</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                  <i class="fas fa-user "></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-muted text-sm">
              <span class="text-nowrap">العدد الكلي للمؤمن له</span>
            </p>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6" >
        <div class="card card-stats mb-4 mb-xl-4">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">المؤمن عليه</h5>
                <span class="h2 font-weight-bold mb-0">1000</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-red text-white rounded-circle shadow">
                  <i class="fas fa-user"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-muted text-sm">
              <span class="text-nowrap">العدد الكلي للمؤمن عليه</span>
            </p>
          </div>
        </div>
      </div>

    
    </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7" >

      <div class="row" >
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">إضافة قائمة رئيسية</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
                <div class="col-lg-12 col-md-12">
                    <form method="post">
                <input type="hidden" name="MenuID" value="<?php echo $MenuRow['MenuID']; ?>">
                <input type="text"  name="MenuName" class="form-control " value="<?php echo $MenuRow['MenuName']; ?>" placeholder="إسم القائمة الرئيسية">
                <br>
                <?php
                if(!empty($_GET['MenuID'])){
                    ?>
                <input type="submit" class="btn btn-success" name="upd" value="تعديل">
                <input type="submit" class="btn btn-danger" name="del" value="حذف">
                <?php
                }else{
                ?>
                <input type="submit" class="btn btn-success" name="save" value="إضافة">
                <?php
                }


                if(isset($_POST['save'])){
                    $MenuName=$_POST['MenuName'];
                    
                    $sql = "insert into Menus(MenuName) values(?)";
                    $r = $conn->prepare($sql);
                    $r->bind_param("s",$MenuName);
                    $e = $r->execute();
                    if($e){
                        echo "<script>alert('تم الاضافة نجاح');</script>";
                        echo "<script>location.href='MenuAdd.php';</script>";
                   }else{
                      echo "<script>alert('حدث خظا لم يتم الاضافة');</script>";
                      echo "<script>location.href='MenuAdd.php';</script>";
                   }
                    
                    }

                    if(isset($_POST['upd'])){
                        $MenuID=$_POST['MenuID'];
                        $MenuName=$_POST['MenuName'];
                        
                        $sql = "update Menus set MenuName=? where MenuID=?";
                        $r = $conn->prepare($sql);
                        $r->bind_param("si",$MenuName,$MenuID);
                        $e = $r->execute();
                        if($e){
                            echo "<script>alert('تم التعديل نجاح');</script>";
                            echo "<script>location.href='MenuAdd.php';</script>";
                       }else{
                          echo "<script>alert('حدث خظا لم يتم التعديل');</script>";
                          echo "<script>location.href='MenuAdd.php';</script>";
                       }
                        
                        }
                    
                    
                    if(isset($_POST['del'])){
                        $MenuID=$_POST['MenuID'];
                        
                        $sql = "delete from Menus where MenuID=?";
                        $r = $conn->prepare($sql);
                        $r->bind_param("i",$MenuID);
                        $e = $r->execute();
                    if($r){
                         echo "<script>alert('تم الحذف نجاح');</script>";
                         echo "<script>location.href='MenuAdd.php';</script>";
                    }else{
                       echo "<script>alert('حدث خظا لم يتم الحذف');</script>";
                       echo "<script>location.href='MenuAdd.php';</script>";
                    }
                    
                        }
                    
                    
                    
                ?>
</form>
                <br>

        <table class="table" align="center">
        <tr>
        <th>#</th>
        <th>اسم القائمة</th>
        <th>تعديل</th>
        </tr>
        <?php
          $sql = "select * from Menus";
          $r = $conn->prepare($sql);
          $r->bind_param("ss",$Username,$Password);
          $r->execute();
          $rr = $r->get_result();
          $i=0;
          while($row = $rr->fetch_assoc()){
          ?>
        <tr>
        <td><?php echo ++$i;?></td>
        <td><?php echo $row['MenuName'];?></td>
        <td><a href="MenuAdd.php?MenuID=<?php echo $row['MenuID'];?>">تعديل</a></td>
        </tr>
        <?php
          }
          ?>
        </table>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div><br>
    <script data-sample="1">
				CKEDITOR.replace( 'editor1', {
					height: 260,
					width: 900,
				} );
			</script>


        
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              <a href="#" class="font-weight-bold ml-1" target="_blank">الصندوق القومي للتامين الصحي</a> &copy; <?php echo date('Y'); ?>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="http://etooplay.com" class="nav-link" target="_blank">ادارة نظم المعلومات</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core   -->
  <script src="./assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="./assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
        <script src="./assets/js/plugins/chart.js/dist/Chart.min.js"></script>
        <script src="./assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="./assets/js/argon-dashboard.min.js?v=1.1.2"></script>



 

</body>

</html>
