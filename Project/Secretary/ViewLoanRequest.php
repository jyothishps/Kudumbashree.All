<?php
include("Head.php");
?>
<?php
// session_start();
include("../Assets/Connection/Connection.php");
if(isset($_GET["aid"]))
{
	$upQry="update tbl_loanapply set loanapply_status=1 where loanapply_id=".$_GET["aid"];
	if($con->query($upQry))
		{
			echo "<script>alert('Approved');</script>";
		}	
}
if(isset($_GET["rid"]))
{
	$upQry="update tbl_loanapply set loanapply_status=2 where loanapply_id=".$_GET["rid"];
	if($con->query($upQry))
		{
			echo "<script>alert('Rejected');</script>";
		}	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loan Requests</title>
</head>

<body>
<div class="pagetitle">
    <h1>Loan Requests</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="SecretaryHomepage.php">Home</a></li>
        <li class="breadcrumb-item active">Loan Requests</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"></h5>

      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Member Name</th>
            <th scope="col">Contact</th>
            <th scope="col">Loan</th>
            <th scope="col">Content</th>
            <th scope="col"></th>
            
          </tr>
        </thead>
        <?php
	    $selQry="SELECT *
FROM ((tbl_loanapply INNER JOIN tbl_member ON tbl_loanapply.member_id = tbl_member.member_id) INNER JOIN tbl_loan ON tbl_loanapply.loan_id = tbl_loan.loan_id) where loanapply_status=0";
		
		$result=$con->query($selQry);
		$i=0;
		while($data=$result->fetch_assoc())
		{
		$i++;	
	  ?>
      <tr>
        <td><?php echo $data["member_name"]; ?></td>
        <td><?php echo $data["member_contact"]; ?></td>
        <td><?php echo $data["loan_name"]; ?></td>
        <td><?php echo $data["loanapply_content"]; ?></td>
        <td>
			<button class="btn btn-success rounded-pill"><a style="color:white;" href="ViewLoanRequest.php?aid=<?php echo $data["loanapply_id"];?>">Approve</a></button><br />
      <button class="btn btn-danger rounded-pill"><a style="color:white;" href="ViewLoanRequest.php?rid=<?php echo $data["loanapply_id"];?>">Reject</a></button>
		</td>
		
  </tr>
      <?php
		}
	?>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>
</body>
</html>

<?php
include("Foot.php");
?>