<?php


require 'conn.php';
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

<style>
  html {
  scroll-behavior : smooth;
}
.navigation {
  width: 200px;
}

/* reset our lists to remove bullet points and padding */
.mainmenu, .submenu {
  list-style: none;
  padding: 0;
  margin: 0;
  font-size:12px;
}

/* make ALL links (main and submenu) have padding and background color */
.mainmenu a {
  display: block;
  background-color: #fff;
  text-decoration: none;
  padding: 10px;
  color: #000;
}

.mainmenu i {
  margin-right:10px;
}

/* add hover behaviour */
.mainmenu a:hover {
    background-color: #C5C5C5;
}


/* when hovering over a .mainmenu item,
  display the submenu inside it.
  we're changing the submenu's max-height from 0 to 200px;
*/

.mainmenu li:hover .submenu {
  display: block;
  max-height: 100%;
}

/*
  we now overwrite the background-color for .submenu links only.
  CSS reads down the page, so code at the bottom will overwrite the code at the top.
*/

.submenu a {
  background-color: #fff;
  margin-right:10px;
  font-size:12px;
}

/* hover behaviour for links inside .submenu */
.submenu a:hover {
  background-color: #666;
  color:#fff;
}

/* this is the initial state of all submenus.
  we set it to max-height: 0, and hide the overflowed content.
*/
.submenu {
  overflow: hidden;
  max-height: 0;
  -webkit-transition: all 0.5s ease-out;
}
  </style>


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
        <nav class="navigation">
  <ul class="mainmenu">
  <?php
          $sql = "select * from Menus";
          $r = $conn->prepare($sql);
          $r->execute();
          $rr = $r->get_result();
          while($row = $rr->fetch_assoc()){
          ?>
    <li><a href="#<?php echo $row['MenuName'] ?>"><i class="ni ni-tag text-success"></i>  <?php echo $row['MenuName'] ?></a>
    <ul class="submenu">
    <?php
          $InnerSQL = "select * from SubMenus where MenuID=?";
          $INr = $conn->prepare($InnerSQL);
          $INr->bind_param("i",$row['MenuID']);
          $INr->execute();
          $INrr = $INr->get_result();
          while($InnerRow=$INrr->fetch_assoc()){
          ?>
        <li><a href="#<?php echo $InnerRow['SubMenuName']; ?>"><i class="ni ni-bold-left text-warning"></i> <?php echo $InnerRow['SubMenuName']; ?></a></li>
      <?php
      }
      ?>
      </ul>
    </li>
    <?php
          }
    ?>
  </ul>
</nav>
       
        <!-- Divider -->
        <hr class="my-3">
        <!-- Navigation -->

      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./">المنصة الالكترونية</a>
        <!-- Form -->

        <!-- User -->

      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-success pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body" id="R1">
          <!-- Card stats -->
          <div class="row">

  

   

    

    
    </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7" >
<?php
   $sql = "select * from submenus";
   $r = $conn->prepare($sql);
   $r->execute();
   $rr = $r->get_result();
   while($row=$rr->fetch_assoc()){
?>
   
      <div class="row" >
        <div class="col">
          <div class="card shadow" id="<?php echo $row['SubMenuName']; ?>">
            <div class="card-header bg-transparent">
              <h3 class="mb-0"><?php echo $row['SubMenuName']; ?></h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
                <div class="col-lg-12 col-md-12">
                <?php echo $row['SubMenuContent']; ?>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div><br>
    <?php
}
    ?>

        
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-right text-muted">
              <a href="#" class="font-weight-bold ml-1" target="_blank">مركز كفاءات للتدريب</a> &copy; <?php echo date('Y'); ?>
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

  <script src="./assets/js/site.js"></script>

 

</body>

</html>
