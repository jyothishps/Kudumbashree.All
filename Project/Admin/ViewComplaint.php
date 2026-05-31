<?php
include("../Assets/Connection/Connection.php");

include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaints</title>
</head>

<body>
<div class="pagetitle">
    <h1>Complaints</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="AdminHomepage.php">Home</a></li>
        <li class="breadcrumb-item active">Complaints</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
<p align="right"><a href="ViewRepliedComplaint.php">Replied Complaints</a></p>

	  <?php
	    $selQry="select * from tbl_complaint c inner join tbl_member m ON c.member_id=m.member_id where complaint_status=0";
		$result=$con->query($selQry);
		$i=0;
		while($data=$result->fetch_assoc())
		{
      
	  ?>
    <!-- Default Card -->
    <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $data["complaint_title"]; ?></h5>
              <p>Sender: <?php echo $data["member_name"];?> <br>
                  Date: <?php echo $data["complaint_date"]; ?></p>
              <p><?php echo $data["complaint_content"]; ?></p>
              <button class="btn btn-primary"><a  style="color:white;" href="Reply.php?eid=<?php echo $data["complaint_id"];?>">Reply</a></button>
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