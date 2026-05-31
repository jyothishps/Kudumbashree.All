<?php
include("Head.php");
?>
<!-- Profile Section -->
<?php
// session_start();
include("../Assets/Connection/Connection.php");

$member="select * from tbl_member where member_id=".$_SESSION['mid'];
$result=$con->query($member);
$data=$result->fetch_assoc();
?>
<!-- End of profile -->

<!-- Change Password -->
<?php
$message="";
if(isset($_POST["btn_change"]))
{
	
	$currentpwd=$_POST["txt_current"];
	$newpwd=$_POST["txt_new"];
	$confirmpwd=$_POST["txt_confirm"];

	$selMember="select * from tbl_member where member_password='".$currentpwd."' and member_id='".$_SESSION["mid"]."'";
	$resMember=$con->query($selMember);
	if($data=$resMember->fetch_assoc())
		{
			
			if($newpwd==$confirmpwd)
			{
				$upQry="update tbl_member set member_password='".$newpwd."' where member_id='".$_SESSION["mid"]."'";
				if($con->query($upQry))
				{
					echo "<script>alert('Password Updated');</script>";
				}
			}
			else
			{
        echo "<script>alert('Password not updated');</script>";
			}
		}
		else
		{
			echo "<script>alert('Current password entered is incorrect');</script>";
		}

}
?>
<!-- End of Change Password -->

<!-- Edit Profile -->
<?php
$selMember="select * from tbl_member where member_id='".$_SESSION["mid"]."'";
$resMember=$con->query($selMember);
$data=$resMember->fetch_assoc();
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$contact=$_POST["txt_contact"];
	$address=$_POST["txt_address"];

		$upQry="update tbl_member set member_name='".$name."',member_email='".$email."',member_contact='".$contact."',member_address='".$address."' where member_id='".$_SESSION["mid"]."'";
		if($con->query($upQry))
		{
		
			?>
     		<script>
	 		window.location="MemberProfile.php";
		 	</script>
     <?php
		}
			
}
?>
<!-- End of Edit Profile -->


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
</head>

<body>

<section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../Assets/Files/Members/Photo/<?php echo $data['member_photo'];?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $_SESSION["mname"]; ?></h2>
              <h3>Member</h3>
              
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $data['member_name'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $data['member_address'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Role</div>
                    <div class="col-lg-9 col-md-8">Member</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Contact</div>
                    <div class="col-lg-9 col-md-8"><?php echo $data['member_contact'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $data['member_email'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Password</div>
                    <div class="col-lg-9 col-md-8"><?php echo $data["member_password"]; ?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="../Assets/Files/Members/Photo/<?php echo $data['member_photo'];?>" alt="Profile" class="rounded-circle">
                        <div class="pt-2">
                          
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="txt_name" type="text" class="form-control" id="fullName" required value="<?php echo $data["member_name"]?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="txt_address" class="form-control" id="about" style="height: 100px" required><?php echo $data["member_address"]?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Contact</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="txt_contact" type="text" class="form-control" id="company" required value="<?php echo $data["member_contact"]?>" required pattern="[7-9]{1}[0-9]{9}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="txt_email" type="email" class="form-control" required id="Email" value="<?php echo $data["member_email"]?>">
                      </div>
                    </div>

                    

                    <div class="text-center">
                      <input type="submit" class="btn btn-primary" value="Save Changes" name="btn_submit">
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="post">

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="txt_current" required type="text" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                      <input name="txt_new" required type="text" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input  type="text" name="txt_confirm" required class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <input type="submit" class="btn btn-primary" value="Change" name="btn_change">
                    </div>
                    <?php echo $message;?>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
</body>
</html>

<?php
include("Foot.php");
?>