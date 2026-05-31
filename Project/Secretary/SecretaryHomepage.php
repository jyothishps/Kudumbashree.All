<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home-Secretary</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../Assets/Templates/Admin/assets/img/favicon.png" rel="icon">
  <link href="../Assets/Templates/Admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../Assets/Templates/Admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../Assets/Templates/Admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../Assets/Templates/Admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../Assets/Templates/Admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../Assets/Templates/Admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../Assets/Templates/Admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../Assets/Templates/Admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../Assets/Templates/Admin/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');

    body {
      background-image: url('dash4.jpeg');
      background-repeat: no-repeat;
      background-size: cover;
    }

    .main {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .main h1 {
      color: white;
      text-align: center;
      margin-top: 250px;
      font-size: 70px;
      font-family: "Pacifico", cursive;
      font-weight: 400;
      font-style: normal;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- <img src="../Assets/Templates/Admin/assets/img/logo.png" alt=""> -->
        <span class="d-none d-lg-block">Kudumbashree.All</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->





        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

            <!-- <img src="../Assets/Templates/Admin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <span class="d-none d-md-block dropdown-toggle ps-2">Welcome Back!, <?php echo $_SESSION["sname"]; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION["sname"]; ?></h6>
              <span>Secretary</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="SecretaryProfile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>




            <li>
              <a class="dropdown-item d-flex align-items-center" href="Logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link active" href="SecretaryHomepage.php">
          <i class="bi bi-house-fill"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->



      <!-- <li class="nav-heading">Pages</li> -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="Meeting.php">
          <i class="bi bi-book"></i>
          <span>Meetings</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="Program.php">
          <i class="bi bi-envelope"></i>
          <span>Programs</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="Loan.php">
          <i class="bi bi-layers"></i>
          <span>Loans</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="ViewLoanRequest.php">
          <i class="bi bi-layers-half"></i>
          <span>Loan Requests</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="ApprovedLoan.php">
          <i class="bi bi-layers-fill"></i>
          <span>Approved Loans</span>
        </a>
      </li>



    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <h1 align="center">Welcome! <br><?php echo $_SESSION["sname"]; ?></h1>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../Assets/Templates/Admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../Assets/Templates/Admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../Assets/Templates/Admin/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../Assets/Templates/Admin/assets/vendor/echarts/echarts.min.js"></script>
  <script src="../Assets/Templates/Admin/assets/vendor/quill/quill.js"></script>
  <script src="../Assets/Templates/Admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../Assets/Templates/Admin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../Assets/Templates/Admin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../Assets/Templates/Admin/assets/js/main.js"></script>

</body>

</html>