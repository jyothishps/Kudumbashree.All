<?php
include("Head.php");
?>
<?php
$name = "";
$email = "";
$contact = "";
$photo = "";
$proof = "";
$password = "";
$address = "";
$eid = 0;

include("../Assets/Connection/Connection.php");
if (isset($_POST["btn_submit"])) {
  $eid = $_POST["txt_eid"];
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
  if ($eid == 0) {
    $insQry = "insert into tbl_secretary (secretary_name, secretary_email,secretary_contact, secretary_photo,secretary_proof,secretary_address,secretary_password) values ('" . $name . "', '" . $email . "', '" . $contact . "', '" . $photo . "', '" . $proof . "','" . $address . "','" . $password . "')";
  } else {
    $upQry = "update tbl_secretary set secretary_name='" . $name . "',secretary_email='" . $email . "',secretary_contact='" . $contact . "', secretary_photo='" . $photo . "', secretary_proof='" . $proof . "',secretary_address='" . $address . "',secretary_password='" . $password . "' where secretary_id=" . $eid;
    if ($con->query($upQry)) {
      echo "<script>alert('Updated');</script>";
      ?>
      <script>
	 		window.location="Secretary.php";
		 	</script>
      <?php
    }
  }
  if ($con->query($insQry)) {
    echo "<script>alert('Registration Successfull');</script>";
    ?>
      <script>
	 		window.location="Secretary.php";
		 	</script>
      <?php
  }
}

if (isset($_GET["did"])) {
  $did = $_GET["did"];
  $delQry = "delete from tbl_secretary where secretary_id=" . $did;
  if ($con->query($delQry)) {
    echo "<script>alert('Removed');</script>";
    ?>

    <script>
      window.location="Secretary.php";
    </script>

    <?php

  }
}
if (isset($_GET["eid"])) {
  $eid = $_GET["eid"];
  $selsecretary = "select * from tbl_secretary where secretary_id=" . $eid;
  $selresult = $con->query($selsecretary);
  $seldata = $selresult->fetch_assoc();
  $name = $seldata["secretary_name"];
  $email = $seldata["secretary_email"];
  $contact = $seldata["secretary_contact"];
  $photo = $seldata["secretary_photo"];
  $proof = $seldata["secretary_proof"];
  $address = $seldata["secretary_address"];
  $password = $seldata["secretary_password"];

}
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Secretary</title>
</head>

<body>
  <div class="pagetitle">
    <h1>Add Secretary</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="AdminHomepage.php">Home</a></li>
        <li class="breadcrumb-item active">Add Secretary</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Enter Details:</h5>

      <!-- General Form Elements -->
      <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label">Name:</label>
          <div class="col-sm-10">
            <input class="form-control" value="<?php echo $name; ?>" type="text" name="txt_name" id="txt_name" required
              title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter"
              pattern="^[A-Z]+[a-zA-Z ]*$">
          </div>
        </div>

        <div class="row mb-3">
          <label for="inputPassword" class="col-sm-2 col-form-label">Address:</label>
          <div class="col-sm-10">
            <textarea class="form-control" style="height: 100px" name="txt_address"
              id="txt_address" required><?php echo $address; ?></textarea>
          </div>
        </div>

        <div class="row mb-3">
          <label for="inputNumber" class="col-sm-2 col-form-label">Contact:</label>
          <div class="col-sm-10">
            <input class="form-control" value="<?php echo $contact; ?>" type="number" name="txt_contact"
              id="txt_contact" required pattern="[7-9]{1}[0-9]{9}">
          </div>
        </div>

        <div class="row mb-3">
          <label for="inputNumber" class="col-sm-2 col-form-label">Photo:</label>
          <div class="col-sm-10">
            <input class="form-control" id="formFile" value="<?php echo $photo; ?>" type="file" name="file_photo"
              required>
          </div>
        </div>

        <div class="row mb-3">
          <label for="inputNumber" class="col-sm-2 col-form-label">Proof:</label>
          <div class="col-sm-10">
            <input class="form-control" id="formFile" value="<?php echo $proof; ?>" type="file" name="file_proof"
              required>
          </div>
        </div>

        <div class="row mb-3">
          <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
          <div class="col-sm-10">
            <input class="form-control" value="<?php echo $email; ?>" type="email" name="txt_email" id="txt_email"
              required>
          </div>
        </div>

        <div class="row mb-3">
          <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input class="form-control" value="<?php echo $password; ?>" type="password" name="txt_pass" id="txt_pass"
              required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
              title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
            <input type="hidden" value="<?php echo $eid; ?>" name="txt_eid" id="txt_eid" />
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label"></label>
          <div class="col-sm-10">
            <input type="submit" class="btn btn-primary rounded-pill" name="btn_submit" id="btn_submit" value="Submit">
            <input type="reset" class="btn btn-danger rounded-pill" name="btn_reset" id="btn_reset" value="Reset">
          </div>
        </div>

      </form><!-- End Secretary Registration -->

    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Current Secretary</h5>

      
      <div class="container">
    <div class="row">
        <?php
        $selQry = "select * from tbl_secretary";
        $result = $con->query($selQry);

        while ($data = $result->fetch_assoc()) {
        ?>
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="../Assets/Files/Members/Photo/<?php echo $data["secretary_photo"]; ?>" class="card-img-top" alt="Secretary Photo" style="height: 300px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data["secretary_name"]; ?></h5>
                    <p class="card-text"><strong>Address:</strong> <?php echo $data["secretary_address"]; ?></p>
                    <p class="card-text"><strong>Contact:</strong> <?php echo $data["secretary_contact"]; ?></p>
                    <p class="card-text"><strong>Email:</strong> <?php echo $data["secretary_email"]; ?></p>
                    <p class="card-text"><strong>Password:</strong> <?php echo $data["secretary_password"]; ?></p>
                </div>
                <img src="../Assets/Files/Members/Proof/<?php echo $data["secretary_proof"]; ?>" class="card-img-bottom" alt="Proof Document" style="height: 200px; object-fit: cover; margin: 0 16px 16px 0;">
                <div class="card-footer text-center">
                    <a href="Secretary.php?eid=<?php echo $data["secretary_id"]; ?>" class="btn btn-warning btn-sm rounded-pill">Edit</a>
                    <a href="Secretary.php?did=<?php echo $data["secretary_id"]; ?>" class="btn btn-danger btn-sm rounded-pill">Delete</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>

      

    </div>
  </div>

</body>

</html>

<?php
include("Foot.php");
?>