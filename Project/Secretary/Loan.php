<?php
include("Head.php");
?>

<?php
$name = "";
$desc = "";
$file = "";
$eid = 0;
include("../Assets/Connection/Connection.php");
if (isset($_POST["btn_submit"])) {
  // $eid = $_POST["txt_eid"];
  $name = $_POST["txt_name"];
  $desc = $_POST["txt_desc"];
  
  // if ($eid == 0) {
    $insQry = "insert into tbl_loan(loan_name,loan_desc) values('" . $name . "','" . $desc . "')";
  // } else {
  //   $upQry = "update tbl_loan set loan_name='" . $name . "',loan_desc='" . $desc . "',loan_file='" . $file . "' where loan_id=" . $eid;
  //   if ($con->query($upQry)) {
  //     header("location:Loan.php");
  //     echo "UPDATED";
  //   }

  // }
  if ($con->query($insQry)) {
    echo "<script>alert('Inserted')</script>";
  }
}

if (isset($_GET["did"])) {
  $did = $_GET["did"];
  $delQry = "delete from tbl_loan where loan_id=" . $did;
  if ($con->query($delQry)) {
    echo "<script>alert('Deleted')</script>";
    ?>
    
    <script>
      window.location:"Loan.php";
    </script>
    <?php
  }
}

// if (isset($_GET["eid"])) {
//   $eid = $_GET["eid"];
//   $selloan = "select * from tbl_loan where loan_id=" . $eid;
//   $selresult = $con->query($selloan);
//   $seldata = $selresult->fetch_assoc();
//   $name = $seldata["loan_name"];
//   $desc = $seldata["loan_desc"];
//   $file = $seldata["loan_file"];
// }

?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Loan</title>
</head>

<body>
  <div class="pagetitle">
    <h1>Loans</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="SecretaryHomepage.php">Home</a></li>
        <li class="breadcrumb-item active">Loans</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <!-- <a href="SecretaryHomepage.php">Back</a>
<h1 align="center">Add Loan</h1>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table align="center" width="200" border="1">
    <tr>
      <td>Name:</td>
      <td><label for="txt_name"></label>
      <input value="<?php ?>" type="text" name="txt_name" id="txt_name" required/></td>
    </tr>
    <tr>
      <td>Description:</td>
      <td><label for="txt_desc"></label>
      <textarea value="<?php ?>" name="txt_desc" id="txt_desc" cols="45" rows="5" required></textarea></td>
    </tr>
    <tr>
      <td>File:</td>
      <td><label for="file_file"></label>
      <input value="<?php  ?>" type="file" name="file_file" id="file_file" />
      <input type="hidden" value="<?php ?>" name="txt_eid" id="txt_eid" required/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
</form> -->

  <form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Enter Loan Details</h5>
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input type="text" name="txt_name" class="form-control" id="inputText" required>
          </div>
          <label for="inputPassword" class="col-sm-2 col-form-label">Details</label>
          <div class="col-sm-10">
            <textarea class="form-control" style="height: 100px" name="txt_desc" required></textarea>
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
      <h5 class="card-title">Loans</h5>

      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col"></th>

          </tr>
        </thead>
        <?php
        $selQry = "select * from tbl_loan";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
          $i++;
          ?>
          <tr>
            <td><?php echo $data["loan_name"]; ?></td>
            <td><?php echo $data["loan_desc"]; ?></td>

            <td><button class="btn btn-danger rounded-pill"><a style="color:white;" href="Loan.php?did=<?php echo $data["loan_id"]; ?>">Delete</a></button></td>
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