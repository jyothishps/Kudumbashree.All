<?php
include("Head.php");
?>

<?php
// session_start();
include("../Assets/Connection/Connection.php");

if ($_GET["pid"]) {
  if (isset($_POST["btn_submit"])) {
    $pid = $_GET["pid"];
    $file = $_FILES["file_photo"]["name"];
    $temp = $_FILES["file_photo"]["tmp_name"];
    move_uploaded_file($temp, to: "../Assets/Files/Programs/" . $file);
    $insQry = "insert into tbl_gallery(gallery_file,program_id) values('" . $file . "','" . $pid . "')";
    if ($con->query($insQry)) {
      echo "INSERTED";
    }
  }
}

?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Gallery</title>
</head>

<body>
  <div class="pagetitle">
    <h1>Add Photo</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="SecretaryHomepage.php">Home</a></li>
        <li class="breadcrumb-item"><a href="Program.php">Programs</a></li>

        <li class="breadcrumb-item active">Add Photo</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Add Program Photo</h5>
      <div class="row mb-3">
      <label for="inputNumber" class="col-sm-2 col-form-label">File</label>
      <div class="col-sm-10">
        <input class="form-control" name="file_photo" type="file" id="formFile">
      </div>
      </div>
      <div align="center">
          <input class="btn btn-primary rounded-pill" type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        </div>
    </div>
  </div>
  </form>
</body>

</html>

<?php
include("Foot.php");
?>