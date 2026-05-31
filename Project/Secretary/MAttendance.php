<?php
include("Head.php");
?>

<?php
// session_start();
include("../Assets/Connection/Connection.php");
if (isset($_POST["btn_present"])) {
	$mid = $_POST["sel_members"];
	$insQry = "insert into tbl_meetingattendance (member_id,meeting_id,meetingattendance_status) values ('" . $mid . "','" . $_GET["meid"] . "',1)";
	if ($con->query($insQry)) {
		// echo "Added";
	}

}

if (isset($_POST["btn_absent"])) {
	$mid = $_POST["sel_members"];
	$insQry = "insert into tbl_meetingattendance (member_id,meeting_id,meetingattendance_status) values ('" . $mid . "','" . $_GET["meid"] . "',2)";
	if ($con->query($insQry)) {
		// echo "Added";
	}

}
?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Meeting Attendance</title>
</head>

<body>
<div class="pagetitle">
    <h1>Add Attendance</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="SecretaryHomepage.php">Home</a></li>
        <li class="breadcrumb-item"><a href="Meeting.php">Meetings</a></li>
		<li class="breadcrumb-item active">Add Attendance</li>

      </ol>
    </nav>
  </div><!-- End Page Title -->
	<!-- <a href="SecretaryHomepage.php">Back</a> -->
	<!-- <h1 align="center">Add Attendance</h1> -->

	<form id="form1" name="form1" method="post" action="">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Select Member</h5>
				<div class="row mb-3">
					<label class="col-sm-2 col-form-label">Member</label>
					<div class="col-sm-10">
						<select class="form-select" aria-label="Default select example" name="sel_members">
							<option selected>--SELECT--</option>
							<?php
							$seloptionQry = "select * from tbl_member where member_status=1";
							$optionResult = $con->query($seloptionQry);
							while ($optiondata = $optionResult->fetch_assoc()) {
								?>
								<option value="<?php echo $optiondata["member_id"]; ?>">
									<?php echo $optiondata["member_name"]; ?>
								</option>
								<?php
							}
							?>
						</select><br>
						<div>
						</div>
					</div>
					<div align="center">
						<input class="btn btn-success rounded-pill" type="submit" name="btn_present" id="btn_present" value="Present" />
						<input class="btn btn-danger rounded-pill" type="submit" name="btn_absent" id="btn_absent" value="Absent" />
					</div>
				</div>

			</div>
	</form>




</body>

</html>

<?php
include("Foot.php");
?>