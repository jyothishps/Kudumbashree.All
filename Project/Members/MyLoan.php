<?php
include("Head.php");
?>

<?php
// session_start();
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Loan</title>
</head>

<body>
<div class="pagetitle">
    <h1>My Loan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="MemberHomepage.php">Home</a></li>
        <li class="breadcrumb-item active">My Loan</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Your Loan Status</h5>

      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Loan Name</th>
            <th scope="col">Description</th>
            <th scope="col">Content</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>

          </tr>
        </thead>
		<?php
	    $selQry="SELECT * FROM tbl_loan l inner JOIN tbl_loanapply a ON l.loan_id = a.loan_id where member_id=".$_SESSION["mid"];
		$result=$con->query($selQry);
		$i=0;
		while($data=$result->fetch_assoc())
		{
		$i++;	
	  ?>
      <tr>
        <td><?php echo $data["loan_name"]; ?></td> 
        <td><?php echo $data["loan_desc"]; ?></td>      
        <td><?php echo $data["loanapply_content"]; ?></td>      
        <td><?php echo $data["loanapply_date"]; ?></td>      
		<td>
		<?php
		$status=$data["loanapply_status"];
		if($status==0)
		{
			?>
			<span class="badge border-success border-1 text-warning">Pending</span>
			<?php
		}
		else if($status==1)
		{
			?>
			<span class="badge border-success border-1 text-success">Approved</span>
			<?php
		}
		else if($status==2)
		{
			?>
			<span class="badge border-success border-1 text-danger">Rejected</span>
			<?php
		}
		?>
        </td>
      </tr>
      <?php
		}
	?>
        

</body>
</html>

<?php
include("Foot.php");
?>