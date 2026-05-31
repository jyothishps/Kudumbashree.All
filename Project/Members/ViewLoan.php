<?php
include("Head.php");
?>

<?php
include("../Assets/Connection/Connection.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loans</title>
</head>

<body>
<div class="pagetitle">
    <h1>Loans</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="MemberHomepage.php">Home</a></li>
        <li class="breadcrumb-item active">Loans</li>
      </ol>
    </nav>
  </div>
  <?php
  $selQry = "select * from tbl_loan";
  $result = $con->query($selQry);
  ?>
  <?php
  while ($data = $result->fetch_assoc()) {
    ?>
    <div class="card mb-3">
      <div class="row g-0">
        <!-- <div class="col-md-4">
          <img src="../Assets/Files/Loans/<?php echo $data["loan_file"]; ?>" class="img-fluid rounded-start" alt="...">
        </div> -->
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?php echo $data["loan_name"]; ?></h5>
            <p class="card-text"><?php echo $data["loan_desc"]; ?></p>
            <button class="btn btn-primary rounded-pill"><a style="color:white;" href="LoanApply.php?lid=<?php echo $data["loan_id"];?>">Apply</a></button>
          </div>
        </div>
      </div>
    </div>
    
    <?php
  }
  ?>
</body>
</html>

<?php
include("Foot.php");
?>