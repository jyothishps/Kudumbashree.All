<?php
include("Head.php");
?>

<?php
// session_start();
include("../Assets/Connection/Connection.php");

?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Programs</title>
</head>

<body>
<div class="pagetitle">
    <h1>Programs</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="AdminHomepage.php">Home</a></li>
        <li class="breadcrumb-item active">Programs</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <?php
  $selQry = "SELECT * FROM tbl_program p inner JOIN tbl_gallery g ON p.program_id = g.program_id";
  $result = $con->query($selQry);
  ?>
  <?php
  while ($data = $result->fetch_assoc()) {
    ?>
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4">
        <img src="../Assets/Files/Programs/<?php echo $data["gallery_file"]; ?>" class="img-fluid rounded-start" alt="...">

        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?php echo $data["program_name"]; ?></h5>
            <p class="card-text"><?php echo $data["program_details"]; ?></p>
          </div>
        </div>
      </div>
    </div><!-- End Card with an image on left -->
    
    <?php
  }
  ?>
</body>

</html>

<?php
include("Foot.php");
?>