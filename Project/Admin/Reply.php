<?php
include("Head.php");
?>
<?php
// session_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$reply=$_POST["txt_reply"];
	$insQry="update tbl_complaint set complaint_reply='".$reply."', complaint_status=1 where complaint_id=".$_GET["eid"];
	if($con->query($insQry))
	{
		echo "<script>alert('Replied');</script>";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reply</title>
</head>

<body>
<div class="pagetitle">
    <h1>Reply</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="AdminHomepage.php">Home</a></li>
        <li class="breadcrumb-item"><a href="ViewComplaint.php">Complaints</a></li>
        <li class="breadcrumb-item active">Reply</li>

      </ol>
    </nav>
  </div><!-- End Page Title -->
  <form id="form1" name="form1" method="post" action="">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Enter a reply</h5>
        <div class="row mb-3">
          <label for="inputPassword" class="col-sm-2 col-form-label">Content</label>
          <div class="col-sm-10">
            <textarea class="form-control" style="height: 100px" name="txt_reply"></textarea>
          </div>
        </div>
        <div align="center">
          <input class="btn btn-primary rounded-pill" type="submit" name="btn_submit" id="btn_submit" value="Submit" />
          <input class="btn btn-danger rounded-pill" type="reset" name="btn_reset" id="btn_reset" value="Reset" />
        </div>
      </div>

    </div>
  </form>
</body>
</html>
<?php
include("Foot.php");
?>