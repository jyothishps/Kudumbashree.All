<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
    $name = $_POST["txt_name"];    
    $email = $_POST["txt_email"];    
    $contact = $_POST["txt_contact"];    
    $photo = $_FILES["file_photo"]["name"];
    $temp = $_FILES["file_photo"]["tmp_name"];
    move_uploaded_file($temp, "../Assets/Files/Members/Photo/" . $photo);
    
    $proof = $_FILES["file_proof"]["name"];
    $temp = $_FILES["file_proof"]["tmp_name"];
    move_uploaded_file($temp, "../Assets/Files/Members/Proof/" . $proof);
    
    $address = $_POST["txt_address"];
    $password = $_POST["txt_pass"];
    
   
    $checkQry = "SELECT * FROM tbl_member WHERE member_email = '$email' OR member_contact = '$contact'";
    $result = $con->query($checkQry);

    if($result->num_rows > 0) {
        echo "<script>alert('Email or Contact Number already exists. Please use a different one.');</script>";
    } else {
        $insQry = "INSERT INTO tbl_member (member_name, member_email, member_contact, member_photo, member_proof, member_address, member_password) 
                   VALUES ('$name', '$email', '$contact', '$photo', '$proof', '$address', '$password')";
        
        if ($con->query($insQry)) {
          echo "<script>alert('Registration Successful...Wait for the approval');</script>";
          echo "<script>window.location.href = '../index.php';</script>";
          exit; 
      } else {
          echo "<script>alert('Error in Registration. Please try again.');</script>";
      }
      
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sign Up</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <!-- <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="../Assets/Templates/Admin/assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a>
              </div>End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Sign Up</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3" method="post" enctype="multipart/form-data">
                  <div class="col-md-6">
                      <label for="inputName5" class="form-label">Name:</label>
                      <input type="text" class="form-control" id="inputName5" name="txt_name"
                      title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter"
              pattern="^[A-Z]+[a-zA-Z ]*$" required>
                    </div>
                    <div class="col-md-6">
                      <label for="inputName5" class="form-label">Contact:</label>
                      <input type="text" class="form-control" id="inputName5" name="txt_contact"
                      required pattern="[7-9]{1}[0-9]{9}">
                    </div>
                    <div class="col-md-12">
                      <label for="inputAddress5" class="form-label">Address:</label>
                      <textarea class="form-control" style="height: 100px" value="<?php echo $address; ?>"
                        name="txt_address" id="inputAddress5" required></textarea>
                    </div>
                    
                    <div class="col-md-12">
                      <label for="inputName5" class="form-label">Photo:</label>
                        <input class="form-control" id="inputName5" type="file"
                          name="file_photo" required>
                    </div>
                    <div class="col-md-12">
                      <label for="inputName5" class="form-label">Proof:</label>
                        <input class="form-control" id="inputName5" type="file"
                          name="file_proof" required>
                    </div>
                    <div class="col-md-6">
                      <label for="inputEmail5" class="form-label">Email</label>
                      <input type="email" class="form-control" id="inputEmail5" name="txt_email">
                    </div>
                    <div class="col-md-6">
                      <label for="inputPassword5" class="form-label">Password</label>
                      <input type="password" class="form-control" id="inputPassword5" name="txt_pass"
                      required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                      title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                    </div>



                    <div class="text-center">
                      <input type="submit" class="btn btn-primary" value="Submit" name="btn_submit">
                      <input type="reset" class="btn btn-danger" value="Reset" name="btn_reset">
                    </div>
                    <div class="col-12">
                      <p class="small mb-0"><a href="Login.php">Back to Login</a></p>
                    </div>
                  </form>
                </div>
              </div>

              <!-- <div class="credits"> -->
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
              <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div> -->

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

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