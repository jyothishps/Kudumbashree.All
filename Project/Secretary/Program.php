<?php
include("Head.php");
?>

<?php
// session_start();
include("../Assets/Connection/Connection.php");
if (isset($_POST["btn_submit"])) {
  $name = $_POST["txt_name"];
  $details = $_POST["txt_details"];
  $insQry = "insert into tbl_program (program_name,program_details) values ('" . $name . "','" . $details . "')";
  if ($con->query($insQry)) {
    echo "<script>alert('Inserted');</script>";
  }
}

if (isset($_GET["did"])) {
  $did = $_GET["did"];
  $delQry = "delete from tbl_program where program_id=" . $did;
  if ($con->query($delQry)) {
    ?>
    <script>
      window.location:"Program.php";
    </script>
    <?php  }
}
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
        <li class="breadcrumb-item"><a href="SecretaryHomepage.php">Home</a></li>
        <li class="breadcrumb-item active">Programs</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <!-- <form id="form1" name="form1" method="post" action="">
  <table align="center" width="200" border="1" >
    <tr>
      <td>Name:</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required/></td>
    </tr>
    <tr>
      <td>Details:</td>
      <td><label for="txt_details"></label>
      <textarea name="txt_details" id="txt_details" cols="45" rows="5" required></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
</form> -->
  <form id="form1" name="form1" method="post" action="">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Enter Program Details</h5>
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input type="text" name="txt_name" class="form-control" id="inputText" required>
          </div>
          <label for="inputPassword" class="col-sm-2 col-form-label">Details</label>
          <div class="col-sm-10">
            <textarea class="form-control" style="height: 100px" name="txt_details" required></textarea>
          </div>
        </div>
        <div align="center">
          <input class="btn btn-primary rounded-pill" type="submit" name="btn_submit" id="btn_submit" value="Submit" />
          <input class="btn btn-danger rounded-pill" type="reset" name="btn_reset" id="btn_reset" value="Reset" />
        </div>
      </div>

    </div>
  </form>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Programs</h5>

      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Details</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <?php
        $selQry = "select * from tbl_program";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
          $i++;
          ?>
          <tr>
            <td><?php echo $data["program_name"]; ?></td>
            <td><?php echo $data["program_details"]; ?></td>
            <td><button class="btn btn-danger rounded-pill"><a style="color:white;" href="Program.php?did=<?php echo $data["program_id"]; ?>">Delete</a></button></td>
            <td><button class="btn btn-info rounded-pill"><a style="color:white;" href="PAttendance.php?prid=<?php echo $data["program_id"]; ?>">Add Attendance</a></button></td>
            <td><button class="btn btn-info rounded-pill"><a style="color:white;" href="Gallery.php?pid=<?php echo $data["program_id"]; ?>">Add Photo</a></button></td>
          </tr>
          <?php
        }
        ?>
      </table>
    </div>
  </div>

</body>

</html>

<?php
include("Foot.php");
?>