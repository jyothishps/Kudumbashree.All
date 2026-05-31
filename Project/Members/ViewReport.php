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
<title>Minutes</title>
</head>

<body>

<div class="pagetitle">
    <h1>Minutes</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="MemberHomepage.php">Home</a></li>
        <li class="breadcrumb-item active">Minutes</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

	  <?php
	    $selQry="SELECT * FROM tbl_meeting m inner JOIN tbl_meetingreport r ON m.meeting_id = r.meeting_id";
		$result=$con->query($selQry);
		$i=0;
		while($data=$result->fetch_assoc())
		{
		$i++;	
	  ?>
      <!-- Default Card -->
      <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $data["meeting_date"]; ?></h5>
              <p><?php echo $data["meeting_details"]; ?></p>
              <p><?php echo $data["meetingreport_desc"]; ?></p>
            </div>
          </div><!-- End Default Card -->
      <?php
		}
	?>
  

</body>
</html>

<?php
include("Foot.php");
?>