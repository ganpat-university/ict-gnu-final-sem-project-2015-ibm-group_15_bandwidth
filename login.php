<?php
session_start();
include "includes/dbconnection.php";
// if (isset($_SESSION['login_attempts'])) {
//     $_SESSION['login_attempts']++;
// } else {
//     $_SESSION['login_attempts'] = 1;
// }

// if ($_SESSION['login_attempts'] >= 3) {
//     $_SESSION['login_time'] = time() + 600; // 10 minutes lockout
//     header("Location: index.php?error=You have exceeded the maximum number of login attempts. Please try again in 10 minutes.");
//     exit();
//}
if (isset($_POST['uname']) && isset($_POST['uname'])){
    function validate($data){
        $data = trim($data);
        $data= stripslashes($data);
        $data= htmlspecialchars($data);
        return $data;
    }
$uname=validate($_POST['uname']);
$pass=validate($_POST['passwd']);
     if(empty($uname)){
header("Location: index.php?error= Username is required");
exit();
     }else if (empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();
     }else{
        $sql = "SELECT * FROM tbladmin WHERE AdminuserName = ? AND Password = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "ss", $uname, $pass);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    if ($row['AdminuserName'] === $uname && $row['Password'] === $pass){
        $_SESSION['AdminuserName'] = $row['AdminuserName'];
        $_SESSION['aid'] = $row['ID'];
        header("Location:welcome.php");

                exit();
                // $sql="select * from users where AdminuserName='$uname' AND Password='$pass'";
        // $result= mysqli_query($con, $sql);

            }
        }else{
            
            header("Location: index.php?error= Username Or Password Incorrect!");
            exit();
        }
    }
}
else{
    header("location:index.php");
    exit();
}


?>