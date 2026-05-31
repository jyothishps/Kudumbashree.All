<?php
include("Head.php");
?>

<?php
include("../Assets/Connection/Connection.php");
if (isset($_POST["btn_submit"])) {
  $meeting = $_GET["meid"];
  $details = $_POST["txt_desc"];
  // $file = $_FILES["file_report"]["name"];
  // $temp = $_FILES["file_report"]["tmp_name"];
  // move_uploaded_file($temp, "../Assets/Files/Photos/" . $file); // Corrected path

  // Corrected SQL query
  $insQry = "INSERT INTO tbl_meetingreport(meetingreport_desc, meeting_id) VALUES ('" . $details . "', '" . $meeting . "')";

  if ($con->query($insQry)) {
    echo "<script>alert('Inserted');</script>";
  }
}
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Minutes</title>
</head>

<body>
  <!-- <a href="SecretaryHomepage.php">Back</a> -->
  <div class="pagetitle">
    <h1>Minutes</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="SecretaryHomepage.php">Home</a></li>
        <li class="breadcrumb-item"><a href="Meeting.php">Meetings</a></li>
        <li class="breadcrumb-item active">Minutes</li>

      </ol>
    </nav>
  </div><!-- End Page Title -->
  <form id="form1" name="form1" method="post" action="">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Enter Minutes Report</h5>
        <div class="row mb-3">
          <label for="inputPassword" class="col-sm-2 col-form-label">Details</label>
          <div class="col-sm-10">
            <textarea class="form-control" style="height: 100px" name="txt_desc"></textarea>
          </div>
        </div>
        <div align="center">
          <input class="btn btn-primary rounded-pill" type="submit" name="btn_submit" id="btn_submit" value="Submit" />
          <input class="btn btn-danger rounded-pill" type="reset" name="btn_reset" id="btn_reset" value="Reset" />
        </div>
      </div>

    </div>
  </form>

  
</body>

</html>

<?php
include("Foot.php");
?>