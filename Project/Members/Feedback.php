<?php
include("Head.php");
?>

<?php
// session_start();
include("../Assets/Connection/Connection.php");
if (isset($_POST["btn_submit"])) {
  $content = $_POST["txt_content"];
  $insQry = "insert into tbl_feedback(feedback_content,member_id) values('" . $content . "','" . $_SESSION["mid"] . "')";
  if ($con->query($insQry)) {
    echo "<script>alert('Inserted');</script>";
  }
}
if (isset($_GET["did"])) {
  $did = $_GET["did"];
  $delQry = "delete from tbl_feedback where feedback_id=" . $did;
  if ($con->query($delQry)) {
    ?>
    <script>window.location("Feedback.php")</script>
    <?php
  }
}

?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Feedback form</title>
</head>

<body>
  <div class="pagetitle">
    <h1>Feedbacks</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="MemberHomepage.php">Home</a></li>
        <li class="breadcrumb-item active">Feedbacks</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Enter a feedback</h5>
        <div class="row mb-3">

          <label for="inputPassword" class="col-sm-2 col-form-label">Content</label>
          <div class="col-sm-10">
            <textarea class="form-control" style="height: 100px" name="txt_content" required></textarea>
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
      <h5 class="card-title">Your Feedbacks</h5>

      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Content</th>
            <th scope="col"></th>

          </tr>
        </thead>
        <?php
        $selQry = "select * from tbl_feedback where member_id=" . $_SESSION["mid"];
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
          $i++;
          ?>
          <tr>
            <td><?php echo $data["feedback_content"]; ?></td>
            <td><button class="btn btn-danger rounded-pill"><a style="color:white;" href="Feedback.php?did=<?php echo $data["feedback_id"]; ?>">Delete</a></button></td>
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