<?php
include 'dbconfig.php';
session_start();
if(isset($_SESSION['writer']))
{ $login_session=$_SESSION['writer'];
$sql = "SELECT * FROM user WHERE Username='$login_session'"; 
$result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
    $Fullname=$row["Fullname"];
    $Username=$row["Username"];
    $Email=$row["Email"];
    $UserType=$row["UserType"];
    $ProfilePic=$row["ProfilePic"];
    $myID=$row["UserID"];
if ($Bio!='') {
    $Bio='<b>ABOUT ME</b><br><i>'.$row["Bio"].'<i>';}else {
    $Bio=$row["Bio"];
    }

   
if ($ProfilePic=='') {
   $ProfileCard='<img src="icons/login.png" height="30px" width="30px">';
}else{
    $ProfileCard='<img src="'.$row["ProfilePic"].'" height="80px" width="65px" style="object-fit:cover;border-radius:5px">';
    
}


    }
  }
}else{header("Location:home.php");}
?>