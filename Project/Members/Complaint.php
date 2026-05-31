<?php
include("Head.php");
?>

<?php
// session_start();
include("../Assets/Connection/Connection.php");
$id = "";
$title = "";
$content = "";
$eid = 0;
if (isset($_POST["btn_submit"])) {
	// $eid=$_POST["txt_eid"];
	$id = $_SESSION["mid"];
	$title = $_POST["txt_title"];
	$content = $_POST["txt_content"];
	$date = date("Y-m-d");
	// if($eid==0){
	$insQry = "insert into tbl_complaint(complaint_title,complaint_content,complaint_date,member_id) values('" . $title . "','" . $content . "','" . $date . "','" . $id . "')";
	// }
	// else {
	// $upQry="update tbl_complaint set complaint_title='".$title."',complaint_content='".$content."' where complaint_id=".$eid;

	// if($con->query($upQry))
	// {
	// 	header("location:Complaint.php");
	// 	echo "UPDATED";
	// }

	// }
	if ($con->query($insQry)) {
		echo "<script>alert('Inserted');</script>";
	}
}

if (isset($_GET["did"])) {
	$did = $_GET["did"];
	$delQry = "delete from tbl_complaint where complaint_id=" . $did;
	if ($con->query($delQry)) {
		?>
		<script>
			window.location:"Complaint.php";
		</script>
		<?php
	}
}
// if(isset($_GET["eid"]))
// {
// 	$eid=$_GET["eid"];
// 	$selcomplaint="select * from tbl_complaint where complaint_id=".$eid;
// 	$selresult=$con->query($selcomplaint); 
// 	$seldata=$selresult->fetch_assoc();
// 	$title=$seldata["complaint_title"];
// 	$content=$seldata["complaint_content"];
// }
?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Give Complaint</title>
</head>

<body>
	<div class="pagetitle">
		<h1>Complaints</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="MemberHomepage.php">Home</a></li>
				<li class="breadcrumb-item active">Complaints</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->
	<form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Enter a complaint</h5>
				<div class="row mb-3">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
					<div class="col-sm-10">
						<input type="text" name="txt_title" class="form-control" id="inputText" required>
					</div>
					<label for="inputPassword" class="col-sm-2 col-form-label">Content</label>
					<div class="col-sm-10">
						<textarea class="form-control" style="height: 100px" name="txt_content" required></textarea>
					</div>
				</div>
				<div align="center">
					<input class="btn btn-primary rounded-pill" type="submit" name="btn_submit" id="btn_submit"
						value="Submit" />
					<input class="btn btn-danger rounded-pill" type="reset" name="btn_reset" id="btn_reset"
						value="Reset" />
				</div>
			</div>

		</div>
	</form>
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Your Complaint</h5>

			<!-- Table with stripped rows -->
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">Title</th>
						<th scope="col">Content</th>
						<th scope="col">Date</th>
						<th scope="col">Reply</th>
						<th scope="col"></th>

					</tr>
				</thead>
				<?php
				$selQry = "select * from tbl_complaint where member_id=" . $_SESSION["mid"];
				$result = $con->query($selQry);
				$i = 0;
				while ($data = $result->fetch_assoc()) {
					$i++;
					?>
					<tr>
						<td><?php echo $data["complaint_title"]; ?></td>
						<td><?php echo $data["complaint_content"]; ?></td>
						<td><?php echo $data["complaint_date"]; ?></td>
						<td>

							<?php
							$status = $data["complaint_status"];
							if ($status == 0) {
								?>
								<span class="badge border-success border-1 text-danger">Not Replied</span>
								<?php
							} else {
								echo $data["complaint_reply"];
							}
							?>

						</td>

						<td><button class="btn btn-danger rounded-pill"><a style="color:white;" href="Complaint.php?did=<?php echo $data["complaint_id"]; ?>">Delete</a></button>
						</td>
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