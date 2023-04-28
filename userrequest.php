<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else {
if(isset($_POST['submit']))
{
  $FName=$_POST['uname'];
  $Email=$_POST['email'];
  $contact=$_POST['contact'];
  $comname=$_POST['comname'];
  $comwork=$_POST['comwork'];
  $address=$_POST['address'];
  $desg=$_POST['desg'];
  $usg=$_POST['usg'];
  $net=$_POST['net'];
  $band=$_POST['band'];
  $dep=$_POST['dep'];
  $device=$_POST['device'];
  $en=$_POST['en'];
  $us=$_POST['us'];
  if (!preg_match('/^\d{10}$/', $contact)) {
    // Handle error
    echo "Contact number should be a 10-digit number.";
    exit;
  }
  $contact = filter_var($contact, FILTER_SANITIZE_NUMBER_INT);
  $comname = filter_var($_POST['comname'], FILTER_SANITIZE_STRING);

  
$query=mysqli_query($con, "insert into requestinfo(name, email, contact, comname, hours, address, designation, banusage, nettype, inuse, department, device, env, users) value('$FName', '$Email', $contact, '$comname', $comwork, '$address', '$desg', '$usg', '$net', '$band', '$dep','$device', '$en', '$us')");

}
   if($query) {
  $msg="You request is recorded!";
}

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

  <title>Request Form</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script type="text/javascript">
function checkpass()
{
if(document.request.uname.value == 0)
{
alert('New Password and Confirm Password field does not match');
document.register.RepeatPassword();
return false;
}
return true;
} 

</script>

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
          <h1 class="h3 mb-4 text-gray-800">Request Form</h1>

<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

<form class="user" name="request" method="post" action=" ">
   
 
               <div class="row">
                <div class="col-4 mb-3">User Name</div>
                   <div class="col-8 mb-3">   <input type="text" class="form-control form-control-user" required ="true" id="coursepg" name="uname" aria-describedby="emailHelp" ></div>
                    </div>  
                    <div class="row">
                      <div class="col-4 mb-3">Email </div>
                     <div class="col-8 mb-3">  <input type="email" class="form-control form-control-user" id="schoolclgpg"  required ="true" name="email" aria-describedby="emailHelp" ></div>  
                     </div>



                    <div class="row">
                    <div class="col-4 mb-3">Contact Number </div>
                    <div class="col-8 mb-3">
                      <input type="number" class="form-control form-control-user" id="yoppg" name="contact"  required ="true" aria-describedby="emailHelp" ></div>
                    </div>

                    <div class="row">
                      <div class="col-4 mb-3">Company Name</div>
                     <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="pipg" name="comname"  required ="true" aria-describedby="emailHelp" ">
                    </div></div>

                    <div class="row">
                      <div class="col-4 mb-3">Company Working Hours</div>
                     <div class="col-8 mb-3">
                      <input type="number" class="form-control form-control-user" id="pipg" name="comwork"  required ="true" aria-describedby="emailHelp" ">
                    </div></div>

                    <div class="row">
                      <div class="col-4 mb-3">Company Address</div>
                     <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="pipg" name="address" aria-describedby="emailHelp" ">
                    </div></div>

                    <div class="row">
                      <div class="col-4 mb-3">Designation</div>
                     <div class="col-8 mb-3">
                   <input type="radio" id="css" name="desg" value="Manager"  required>
                   <label for="css">Technical Manager</label><br>
                   <input type="radio" id="javascript" name="desg" value="HR">
                   <label for="javascript">HR</label></div></div>



                    <div class="row">
                      <div class="col-4 mb-3">Bandwidth Usage (per hr.)</div>
                     <div class="col-8 mb-3">
                   <input type="radio" id="css" name="usg" value="Mbps"  required>
                   <label for="css">Mbps</label><br>
                   <input type="radio" id="javascript" name="usg" value="Gbps">
                   <label for="javascript">Gbps</label></div></div>


                    <div class="row">
                      <div class="col-4 mb-3">Network Type</div>
                     <div class="col-8 mb-3">
                   <input type="radio" id="css" name="net" value="Wifi"  required>
                   <label for="css">Wifi</label><br>
                   <input type="radio" id="javascript" name="net" value="Ethernet">
                   <label for="javascript">Ethernet</label></div></div>
                   <div class="row">


                      <div class="col-4 mb-3">Applications In use</div>
                     <div class="col-8 mb-3">
                   <input type="radio" id="css" name="band" value="Applications uses more bandwidth"  required>
                   <label for="css">Applications uses more bandwidth</label><br>
                   <input type="radio" id="javascript" name="band" value="Applications uses normal bandwidth"  required>
                   <label for="javascript">Applications uses normal bandwidth</label></div></div>
<div class="row">
  <div class="col-4 mb-3">Environment</div>
  <div class="col-8 mb-3">
  <input type="radio" name="environment" value="technical" id="technical"> <label for="technical">Technical Department</label><br>
  <input type="radio" name="environment" value="nontechnical" id="nontechnical"> <label for="nontechnical">Non Technical Department</label><br>
  </div>
</div>

<div class="row">
  <div class="col-4 mb-3">Department</div>
  <div class="col-8 mb-3">
  <input type="radio" name="department" value="1" class="nontechnical technical" required> <label>1</label><br>
    <input type="radio" name="department" value="2" class="nontechnical technical" required> <label>2</label><br>
    <input type="radio" name="department" value="5" class="technical" required> <label>5</label><br>
    <input type="radio" name="department" value="10" class="technical" required> <label>10</label><br>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // Hide all department options by default
  let departmentOptions = document.querySelectorAll('input[name="department"]');
  for (let i = 0; i < departmentOptions.length; i++) {
    departmentOptions[i].style.display = "none";
  }

  // Show/hide department options based on environment selection
  $('input[name="environment"]').on("change", function() {
    if (this.value === "technical") {
      for (let i = 0; i < departmentOptions.length; i++) {
        if (departmentOptions[i].classList.contains("technical")) {
          departmentOptions[i].style.display = "block";
        } else {
          departmentOptions[i].style.display = "none";
        }
      }
    } else if (this.value === "nontechnical") {
      for (let i = 0; i < departmentOptions.length; i++) {
        if (departmentOptions[i].classList.contains("nontechnical")) {
          departmentOptions[i].style.display = "block";
        } else {
          departmentOptions[i].style.display = "none";
        }
      }
    }
  });
</script>

                    <div class="row">
                      <div class="col-4 mb-3">Total Users</div>
                     <div class="col-8 mb-3">
                   <input type="radio" id="css" name="us" value="30" required>
                   <label for="css">30</label><br>
                   <input type="radio" id="javascript" name="us" value="50">
                   <label for="javascript">50 or more..</label><br>
                    </div></div>


                    <div class="row">
                      <div class="col-4 mb-3">Device Type </div>
                     <div class="col-8 mb-3">                    
                    <input type="checkbox" id="vehicle1" name="device" value="Desktop"  >
                   <label for="vehicle1"> Desktop</label><br>
                    <input type="checkbox" id="vehicle2" name="device" value="Laptop">
                    <label for="vehicle2"> Laptops</label><br>
                    <input type="checkbox" id="vehicle3" name="device" value="Tablet">
                    <label for="vehicle3"> Tablet</label><br>
                    <input type="checkbox" id="vehicle3" name="device" value="Smart TV and Streaming Devices">
                    <label for="vehicle3"> Smart TV and Streaming Devices</label></br>
                    <input type="checkbox" id="vehicle3" name="device" value="All of the Above">
                    <label for="vehicle3"> All of the above</label><br></div></div>




                   
                   
                    <div class="row" style="margin-top:4%">
                      <div class="col-4"></div>
                      <div class="col-4">
                      <input type="submit" name="submit"  value="submit" class="btn btn-primary btn-user btn-block">
                    </div>
                    </div>
                  
                  </form>



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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script type="text/javascript">
    $(".jDate").datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
}).datepicker("update", "10/10/2016"); 
  </script>

</body>

</html>

