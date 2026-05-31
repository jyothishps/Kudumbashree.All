<?php
include("Head.php");
?>

<?php
// session_start();
include("../Assets/Connection/Connection.php");
if (isset($_POST["btn_submit"])) {
  $date = date("Y-m-d");
  $details = $_POST["txt_details"];
  $insQry = "insert into tbl_meeting(meeting_date,meeting_details) values('" . $date . "','" . $details . "')";
  if ($con->query($insQry)) {
    echo "<script>alert('Inserted');</script>";

  }
}

if (isset($_GET["did"])) {
  $did = $_GET["did"];
  $delQry = "delete from tbl_meeting where meeting_id=" . $did;
  if ($con->query($delQry)) {

    ?>
    <script>
      window.location:"Meeting.php";
    </script>
    <?php  }
}

if (isset($_GET["ddid"])) {
  $did = $_GET["ddid"];
  $delQry = "delete from tbl_meetingreport where meetingreport_id=" . $did;
  if ($con->query($delQry)) {
?>
<script>
  window.location:"Meeting.php";
</script>
<?php
  }
}
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Meetings</title>
</head>

<body>
  <div class="pagetitle">
    <h1>Meetings</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="SecretaryHomepage.php">Home</a></li>
        <li class="breadcrumb-item active">Meetings</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <form id="form1" name="form1" method="post" action="">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Enter Meeting Details</h5>
        <div class="row mb-3">
          <label for="inputPassword" class="col-sm-2 col-form-label">Details</label>
          <div class="col-sm-10">
            <textarea class="form-control" style="height: 100px" name="txt_details" required></textarea>
          </div>
          
        </div>
        <div align="center">
        <input type="submit" value="Submit" class="btn btn-primary rounded-pill" name="btn_submit">
        </div>
      </div>
    </div>
  </form>
  <!-- <table align="center" width="369" border="1">
    <tr>
      <td width="53">SlNo.</td>
      <td width="92">Date</td>
      <td width="143">Details</td>
      <td width="53" colspan=3>Action</td>
    </tr> -->
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Meetings</h5>

      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Details</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <?php
        $selQry = "select * from tbl_meeting";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
          $i++;
          ?>
          <tr>
            <td><?php echo $data["meeting_date"]; ?></td>
            <td><?php echo $data["meeting_details"]; ?></td>
            <td><button class="btn btn-danger rounded-pill"><a style="color:white;" href="Meeting.php?did=<?php echo $data["meeting_id"]; ?>">Delete</a></button></td>
            <td><button class="btn btn-info rounded-pill"><a style="color:white;" href="MAttendance.php?meid=<?php echo $data["meeting_id"]; ?>">Add Attendance</a></button></td>
            <td><button class="btn btn-info rounded-pill"><a style="color:white;" href="Report.php?meid=<?php echo $data["meeting_id"]; ?>">Minutes</a></button></td>
          </tr>
          <?php
        }
        ?>
      </table>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Minutes Report</h5>

      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <?php
        $selQry = "select * from tbl_meetingreport r inner join tbl_meeting m on r.meeting_id=m.meeting_id";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
          $i++;
          ?>
          <tr>
            <td><?php echo $data["meeting_date"]; ?></td>

            <td><?php echo $data["meetingreport_desc"]; ?></td>


            <td>

              <button class="btn btn-danger rounded-pill"><a style="color:white;"
                  href="Meeting.php?ddid=<?php echo $data["meetingreport_id"]; ?>">Delete</a></button><br>

            </td>
          </tr>
          <?php
        }
        ?>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>

</body>

</html>

<?php
include("Foot.php");
?>