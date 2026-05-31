<?php
include("Head.php");
?>

<?php
// session_start();
include("../Assets/Connection/Connection.php");

?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Attendance</title>
</head>

<body>
	<div class="pagetitle">
		<h1>Attendance</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="MemberHomepage.php">Home</a></li>
				<li class="breadcrumb-item active">Attendance</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->
	<div class="card">
		<div class="card-body">
			<h5 class="card-title"></h5>

			<!-- Default Table -->
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Date</th>
						<th scope="col">Status</th>

					</tr>
				</thead>
				<?php
				$selQry = "SELECT * FROM tbl_meeting m inner JOIN tbl_meetingattendance a ON m.meeting_id = a.meeting_id where member_id=" . $_SESSION["mid"];
				$result = $con->query($selQry);
				$i = 0;
				while ($data = $result->fetch_assoc()) {
					$i++;
					?>
					<tr>
						<td><?php echo $data["meeting_date"]; ?></td>
						<td><?php
						$status = $data["meetingattendance_status"];
						if ($status == 1) {
							?>
								<span class="btn btn-success rounded-pill">Present</span>
								<?php
						} else if ($status == 2) {
							?>
									<button class="btn btn-danger rounded-pill">Absent</button>
							<?php }
						?>
						</td>
					</tr>
					<?php
				}
				?>
			</table>
			<!-- End Default Table Example -->
		</div>
	</div>
</body>

</html>

<?php
include("Foot.php");
?>