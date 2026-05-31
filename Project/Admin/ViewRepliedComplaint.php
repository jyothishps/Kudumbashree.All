<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
?>

<?php // session_start();  ?>

  <!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Replied Complaints</title>
  </head>

  <body>
    <div class="pagetitle">
      <h1>Replied Complaints</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="ViewComplaint.php">Complaints</a></li>
          <li class="breadcrumb-item active">Replied Complaints</a></li>
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
              <th scope="col">Sl No.</th>
              <th scope="col">Member</th>
              <th scope="col">Title</th>
              <th scope="col">Content</th>
              <th scope="col">Date</th>
              <th scope="col">Reply</th>

            </tr>
          </thead>
          <?php
          $selQry = "SELECT * FROM tbl_complaint c inner JOIN tbl_member m ON c.member_id = m.member_id";
          $result = $con->query($selQry);
          $i = 0;
          while ($data = $result->fetch_assoc()) {
            $i++;
            ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $data["member_name"]; ?></td>
              <td><?php echo $data["complaint_title"]; ?></td>
              <td><?php echo $data["complaint_content"]; ?></td>
              <td><?php echo $data["complaint_date"]; ?></td>
              <td><?php echo $data["complaint_reply"]; ?></td>

            </tr>
            <?php
          }
          ?>

        </table>
        <!-- End Table with stripped rows -->

      </div>
    </div>
    </table>


  </body>

  </html>

  <?php
  include("Foot.php");
  ?>