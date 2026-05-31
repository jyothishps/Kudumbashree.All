<?php
include("Head.php");

// session_start();
include("../Assets/Connection/Connection.php");
if (isset($_GET["aid"])) {
  $upQry = "update tbl_member set member_status=1 where member_id='" . $_GET['aid'] . "'";
  if ($con->query($upQry)) {
    echo "<script>alert('Accepted');</script>";
  }

}
if (isset($_GET["rid"])) {
  $upQry = "update tbl_member set member_status=2 where member_id='" . $_GET['rid'] . "'";
  if ($con->query($upQry)) {
    echo "<script>alert('Rejected');</script>";
  }

}
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>View Members</title>
</head>

<body>
<div class="pagetitle">
    <h1>Members Approval</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="AdminHomepage.php">Home</a></li>
        <li class="breadcrumb-item active">Members Approval</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Pending</h5>

      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Sl No.</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Contact</th>
            <th scope="col">Photo</th>
            <th scope="col">Proof</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <?php
        $selQry = "select * from tbl_member where member_status=0";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
          $i++;
          ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data["member_name"]; ?></td>
            <td><?php echo $data["member_address"]; ?></td>
            <td><?php echo $data["member_contact"]; ?></td>
            <td><img src="../Assets/Files/Members/Photo/<?php echo $data["member_photo"]; ?>" width="100" height="100" />
            </td>
            <td><img src="../Assets/Files/Members/Proof/<?php echo $data["member_proof"]; ?>" width="100" height="75" />
            </td>
            <td><?php echo $data["member_email"]; ?></td>
            <td><?php echo $data["member_password"]; ?></td>
            <td>
              <button class="btn btn-success rounded-pill"><a style="color:white;"
                  href="ViewMembers.php?aid=<?php echo $data["member_id"]; ?>">Accept</a></button>
          
              <button class="btn btn-danger rounded-pill"><a style="color:white;"
                  href="ViewMembers.php?rid=<?php echo $data["member_id"]; ?>">Reject</a></button>

            </td>
          </tr>
          <?php
        }
        ?>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Accepted</h5>

      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Sl No.</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Contact</th>
            <th scope="col">Photo</th>
            <th scope="col">Proof</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <?php
        $selQry = "select * from tbl_member where member_status=1";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
          $i++;
          ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data["member_name"]; ?></td>
            <td><?php echo $data["member_address"]; ?></td>
            <td><?php echo $data["member_contact"]; ?></td>
            <td><img src="../Assets/Files/Members/Photo/<?php echo $data["member_photo"]; ?>" width="100" height="100" />
            </td>
            <td><img src="../Assets/Files/Members/Proof/<?php echo $data["member_proof"]; ?>" width="100" height="75" />
            </td>
            <td><?php echo $data["member_email"]; ?></td>
            <td><?php echo $data["member_password"]; ?></td>
            <td>
              <span class="badge border-success border-1 text-success">Accepted</span>
            </td>
            <td>
              <button class="btn btn-danger rounded-pill"><a style="color:white;"
                  href="ViewMembers.php?rid=<?php echo $data["member_id"]; ?>">Reject</a></button>

            </td>
          </tr>
          <?php
        }
        ?>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Rejected</h5>

      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Sl No.</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Contact</th>
            <th scope="col">Photo</th>
            <th scope="col">Proof</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <?php
        $selQry = "select * from tbl_member where member_status=2";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
          $i++;
          ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data["member_name"]; ?></td>
            <td><?php echo $data["member_address"]; ?></td>
            <td><?php echo $data["member_contact"]; ?></td>
            <td><img src="../Assets/Files/Members/Photo/<?php echo $data["member_photo"]; ?>" width="100" height="100" />
            </td>
            <td><img src="../Assets/Files/Members/Proof/<?php echo $data["member_proof"]; ?>" width="100" height="75" />
            </td>
            <td><?php echo $data["member_email"]; ?></td>
            <td><?php echo $data["member_password"]; ?></td>
            <td>
              <span class="badge border-danger border-1 text-danger">Rejected</span>
            </td>
            <td>
              <button class="btn btn-success rounded-pill"><a style="color:white;"
                  href="ViewMembers.php?aid=<?php echo $data["member_id"]; ?>">Accept</a></button>

            </td>
          </tr>
          <?php
        }
        ?>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>
  </form>
</body>

</html>

<?php
include("Foot.php");
?>