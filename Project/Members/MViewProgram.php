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
        <li class="breadcrumb-item"><a href="MemberHomepage.php">Home</a></li>
        <li class="breadcrumb-item active">Programs</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <?php
  $id=$_SESSION['mid'];
  $selQry="SELECT *
  FROM ((tbl_program p
  INNER JOIN tbl_gallery g ON p.program_id = g.program_id)
  INNER JOIN tbl_programattendance pr ON p.program_id = pr.program_id) where pr.member_id=$id";
  
  
  
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
            <p class="card-text">Your Status:<?php
            if($data["programattendance_status"]==1)
            {
              ?>
              <span class="badge border-success border-1 text-success">Present</span>
              <?php
            }
            else if($data["programattendance_status"]==2) 
            {
              ?>
              <span class="badge border-success border-1 text-danger">Absent</span>
              <?php
            }
            ?>
            </p>
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