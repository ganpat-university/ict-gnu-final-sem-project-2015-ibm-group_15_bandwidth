<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{


if(isset($_GET['delid']))
  {
    $eid=$_GET['delid'];
    $query=mysqli_query($con,"delete from requestinfo where requestinfo.ID='$eid'");
    echo "<script>alert('Record Deleted successfully');</script>";
    echo "<script>window.location.href='view_request.php'</script>";
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>User Request Details</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
  <?php include_once('includes/sidebar.php')?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
         <?php include_once('includes/header.php')?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Request Details</h1>

<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

 <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<tr>
  <th>S no.</th>
  <th>UserName</th>
  <th>User Email</th>
  <th>Contact</th>
  <th>Company name</th>
  <th>Company Working Hours</th>
  <th>Company Address</th>
  <th>User Designation</th>
  <th>Company Bandwidth Usage</th>
  <th>Company Network Type</th>
  <th>Applications in use</th>
  <th>Department</th>
  <th>Device</th>
  <th>Environment</th>
  <th>Users</th>
  <th>Action</th>
  
</tr>

<?php
$ret=mysqli_query($con,"select * from requestinfo");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

<tr>
  <td><?php echo $cnt;?></td>
   <td><?php echo $row['name'];?></td>
    <td><?php echo $row['email'];?></td>
  <td><?php echo $row['contact'];?></td>
  <td><?php echo $row['comname'];?></td>
  <td><?php echo $row['hours'];?></td>
  <td><?php echo $row['address'];?></td>
  <td><?php echo $row['designation'];?></td>
  <td><?php echo $row['banusage'];?></td>
  <td><?php echo $row['nettype'];?></td>
  <td><?php echo $row['inuse'];?></td>
  <td><?php echo $row['department'];?></td>
  <td><?php echo $row['device'];?></td>
  <td><?php echo $row['env'];?></td>
  <td><?php echo $row['users'];?></td>
  <td>
  <a href="view_request.php?delid=<?php echo $row['ID'];?>" onclick="return confirm('Do you really want to delete');" style="color:red">Delete</a>
  </td>
  
</tr>

<?php 
$cnt=$cnt+1;
}?>

</table>

</div>






        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
   <?php include_once('includes/footer.php');?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>
  
  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>
<?php }  ?>
