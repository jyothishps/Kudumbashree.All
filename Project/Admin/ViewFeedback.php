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
<title>Feedbacks</title>
</head>

<body>
<div class="pagetitle">
    <h1>Feedbacks</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="AdminHomepage.php">Home</a></li>
        <li class="breadcrumb-item active">Feedbacks</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
<?php
	    $selQry="select * from tbl_feedback f inner join tbl_member m on f.member_id=m.member_id";
		$result=$con->query($selQry);
		$i=0;
		while($data=$result->fetch_assoc())
		{
      
	  ?>
    <!-- Default Card -->
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sender: <?php echo $data["member_name"];?> </h5>
            
              <p><?php echo $data["feedback_content"]; ?></p>
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