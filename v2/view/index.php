<?php include '../dbconfig.php';
include '../sessionIdx.php';
if (isset($_GET['article'])) { $articleID= $_GET['article'];}


$sql = "SELECT * FROM posts WHERE URL='$articleID' "; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$flag=1;
while($row = $result->fetch_assoc()){
$Heading=$row["Heading"];
$CoverImage=$row["CoverImage"];
$primg1=$row["primg1"];
$primg2=$row["primg2"];
$primg3=$row["primg3"];
$primg4=$row["primg4"];
$primg5=$row["primg5"];
$audio=$row["Audio"];
$price=$row["price"];
$Description=$row["Description"];
$files=$row["files"];
$thiscat=$row["Category"];
$thissub=$row["SubCategory"];
$ThisPost=$row["PostID"];
$Hits=$row["Hits"];
$MetaDescription=$row["MetaDescription"];
$MetaKeywords=$row["MetaKeywords"];
$PublishDate=$row["PublishDate"];

 $ip = $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
mysqli_query($conn, "INSERT INTO hits(Hitter,PostID,ip)VALUES ('$myID','$ThisPost','$ip' )");

$sqlc = "SELECT * FROM hits WHERE PostID ='$ThisPost' "; 
$resultc = $conn->query($sqlc);
$rowcount=mysqli_num_rows($resultc);
mysqli_query($conn, "UPDATE posts SET Hits='$rowcount' WHERE PostID='$ThisPost'");

}
}











?>
<!doctype html>
<html>
<head>

  <link rel="shortcut icon" href="../logo/sbLogo.ico" />
  <meta charset="utf-8">
  <title><?php echo $Heading ?></title>
  <link rel="stylesheet" type="text/css" href="../style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#f00">
  <meta name="description" content="<?php echo $MetaDescription; ?>">
<meta name="keywords" content="<?php echo $MetaKeywords; ?>">




</head>

<body>


<div id="myModal" class="modal" style=" background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.1); ">
  <div class="modal-content2" style="-webkit-animation-name: animateright;animation-name: animateright;">
    <div class="modal-body">
       <br>
       <span class="close cursor" >CLOSE</span>
<?php include 'search.php'; ?>
    </div>
   </div>
</div>

<div id="myModal2" class="modal">
  <div class="modal-content" style="-webkit-animation-name: animateright;animation-name: animateright;">
    <div class="modal-body">
      <br>
       <span class="close2 cursor" >CLOSE</span>
 <?php include 'search2.php'; ?>
    </div>
   </div>
</div>

<div id="myModal3" class="modal" >
  <div class="modal-content" style="-webkit-animation-name: animateleft;animation-name: animateleft;">
    <div class="modal-body">
       <br>
       <span class="close3 cursor" >CLOSE</span>
<?php include 'menu.php'; ?>
    </div>
   </div>
</div>




















<header>
<table width="100%" >
  <td align="left" valign="top" width="10%">
<img class="mobile cursor" id="menuBtn" src="../logo/menu.png" width="25px" height="25px" >
<a href="index.php"><img src="../logo/icon.png" width="140px" class="cursor pc" height="40px"></a> 
  </td>
  <td align="center" width="45%">
    <a href="../index.php"><img src="../logo/icon.png" width="160px" style="margin-left: 40px;" class="cursor mobile" height="40px"></a> 
  <div class="tab"><table width="100%" class="pc">
   <td align="center" ><button class="tablinks" class="dropdown0"><a href="../index.php">HOME</a></button></td> 


  <td align="center" class="dropdown0">
  <span class="hoverRed">2D </span>
  <div class="dropdown-content0">
<button class="tablinks"><a href="../index.php?cat=2d&subcat=assets" class="white">2D ASSETS</a></button><br>
<button class="tablinks"><a href="../index.php?cat=2d&subcat=characters" class="white">CHARACTERS</a></button><br>
<button class="tablinks"><a href="../index.php?cat=2d&subcat=environment" class="white">ENVIRONEMNT</a></button><br>
<button class="tablinks"><a href="../index.php?cat=2d&subcat=gui" class="white">GUI</a></button><br>
<button class="tablinks"><a href="../index.php?cat=2d&subcat=particlesdecals" class="white">PARTICLES & DECALS</a></button><br>
<button class="tablinks"><a href="../index.php?cat=2d&subcat=textures" class="white">TEXTURES</a></button><br> 
 </div></td>



  <td align="center" class="dropdown2">
  <span class="hoverRed">3D </span>
  <div class="dropdown-content2">
<button class="tablinks"><a href="../index.php?cat=3d&subcat=assets" class="white">3D ASSETS</a></button><br>
<button class="tablinks"><a href="../index.php?cat=3d&subcat=characters" class="white">CHARACTERS</a></button><br>
<button class="tablinks"><a href="../index.php?cat=3d&subcat=environment" class="white">ENVIRONEMNT</a></button><br>
<button class="tablinks"><a href="../index.php?cat=3d&subcat=vehicles" class="white">VEHICLES</a></button><br>
<button class="tablinks"><a href="../index.php?cat=3d&subcat=items" class="white">ITEMS</a></button><br>
</div></td>
     


  <td align="center" class="dropdown3">
  <span class="hoverRed">SOUND FX</span>
  <div class="dropdown-content3">
<button class="tablinks"><a href="../index.php?cat=soundfx&subcat=assets" class="white">SOUND FX ASSETS</a></button><br>
<button class="tablinks"><a href="../index.php?cat=soundfx&subcat=footsteps" class="white">FOOTSTEPS</a></button><br>
<button class="tablinks"><a href="../index.php?cat=soundfx&subcat=weopans" class="white">WEOPANS</a></button><br>
<button class="tablinks"><a href="../index.php?cat=soundfx&subcat=hurtscreams" class="white">HURT/SCREAMS</a></button><br>
<button class="tablinks"><a href="../index.php?cat=soundfx&subcat=bloodsplatter" class="white">BLOOD SPLATTER</a></button><br>
<button class="tablinks"><a href="../index.php?cat=soundfx&subcat=explosion" class="white">EXPLOSION</a></button><br>
<button class="tablinks"><a href="../index.php?cat=soundfx&subcat=gui" class="white">GUI</a></button><br>
<button class="tablinks"><a href="../index.php?cat=soundfx&subcat=more" class="white">MORE</a></button><br>
</div></td>



   <td align="center" class="dropdown4">
  <span class="hoverRed">MUSIC</span>
  <div class="dropdown-content4">
<button class="tablinks"><a href="../index.php?cat=music&subcat=assets" class="white">MUSIC</a></button><br>
<button class="tablinks"><a href="../index.php?cat=music&subcat=action" class="white">ACTION</a></button><br>
<button class="tablinks"><a href="../index.php?cat=music&subcat=city" class="white">CITY</a></button><br>
<button class="tablinks"><a href="../index.php?cat=music&subcat=gui" class="white">GUI</a></button><br>
<button class="tablinks"><a href="../index.php?cat=music&subcat=dark" class="white">DARK</a></button><br>
<button class="tablinks"><a href="../index.php?cat=music&subcat=fantasy" class="white">FANTASY</a></button><br>
<button class="tablinks"><a href="../index.php?cat=music&subcat=horror" class="white">HORROR</a></button><br>
 </div></td>

 <td align="center" class="dropdown0"><button class="tablinks" ><a href="../index.php?cat=packages">PACKAGES</a></button></td> 
 <td align="center" class="dropdown0"><button class="tablinks"><a href="../index.php?cat=fonts">FONTS</a></button></td> 
  </table></div>

</td>
<td width="20%"></td>
  <td align="right" valign="top"  width="15%">
<input type="text" name="" class="textInputs search pc" placeholder="SEARCH HELP" style="background-color: #fff;margin: 0;height: 20px;font-size: 15px;background-size: 15px;">
<img class="cursor mobile" id="searchBtn2" src="../logo/search.png" width="25px" height="25px"> 
  </td>
  <td width="10%" align="right">
    <table>
      <td valign="top">
     <a href="../home.php" class="pc">SIGN IN</a>   
      </td>
      <td valign="top">
          <a href="../home.php"><img src="../logo/login.png" height="20px" width="20px"></a>
  
      </td>
    </table>
    
  </td>
</table>

 </header>



 </header>



<table width="100%" class="mainFrame" style="padding-top: 85px;">

<td width="20%" class="pc" valign="top" align="center" >

<div class="box" style="margin-left: 10px;width: 95%;">
<?php include 'menu.php'; ?>
</div>
</td>
<td  width="80%" valign="top" align="left">
<div class="box" style="margin-left: 4% !important;width: 92%;text-align: center;">

<h1 class="red"><?php echo strtoupper($Heading);  ?></h1>



<table width="100%;">


<td width="50%">


<?php
if ($flag==1) {
?>
<img class="coverTiles"  src="../<?php echo  $CoverImage; ?>" alt="<?php echo  $CoverImage ?>">
<?php
}
?>

<h2>PREVIEW IMAGES</h2>
<table width="100%"><tr>
<td width="50%"><img class="miniTiles"  src="../<?php echo  $primg1; ?>" alt="<?php echo  $primg5 ?>"></td>
<td width="50%"><img class="miniTiles"  src="../<?php echo  $primg2; ?>" alt="<?php echo  $primg5 ?>"></td></tr><tr>
<td width="50%"><img class="miniTiles"  src="../<?php echo  $primg3; ?>" alt="<?php echo  $primg5 ?>"></td>
<td width="50%"><img class="miniTiles"  src="../<?php echo  $primg4; ?>" alt="<?php echo  $primg5 ?>"></td></tr>
</table>

</td>
<td width="50%" valign="top" class="pc">
  

<h2 class="red">DESCRIPTION</h2>
<div style="font-size:21px; min-height: 100px;"><?php echo $Description ?></div>
<?php 

if  (strpos($audio, 'mp3') || strpos($audio, 'wav') || strpos($audio, 'ogg')!== false) {
?>
<audio controls style="width: 95.3%">
  <source src="../<?php echo $audio ?>" type="audio/ogg">
  <source src="../<?php echo $audio ?>" type="audio/mpeg">
</audio>
<?
}

?>
<h1 class="red"><?php echo $price; ?></h1>
<a href="../<?php  echo $files; ?>"><button class="ghostButtons">DOWNLOAD</button></a>

</a>

<?php
$sql = "SELECT * FROM comments WHERE PostID='$ThisPost' "; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$flag=1;
while($row = $result->fetch_assoc()){
$comment=$row["comment"];
$commentry=$row["name"];


?>
<div style="text-align: left; border-bottom: 1px solid #eee;padding: 5px ;width: 90%;padding-left: 5%;" class="pc">
<h1>COMMENTS</h1>
<c style="font-size:18px;"><?php echo $comment; ?> </c><br>
<c style="font-size:14px;" class="red"><?php echo $commentry; ?> </c><br>
</div>
<?

}
}
?>

</td>
  
</table>

<div class="mobile">
  
<h2 class="red">DESCRIPTION</h2>
<div style="font-size:21px; min-height: 100px;"><?php echo $Description ?></div>

<?php 

if(strpos($audio, 'mp3') || strpos($audio, 'wav') || strpos($audio, 'ogg')!== false) {
?>
<audio controls style="width: 96%;">
  <source src="../<?php echo $audio ?>" type="audio/ogg">
  <source src="../<?php echo $audio ?>" type="audio/mpeg">
</audio>
<?
}

?>



<a href="../<?php  echo $files; ?>"><button class="ghostButtons">DOWNLOAD</button></a>



</div>



<?php
$sql = "SELECT * FROM comments WHERE PostID='$ThisPost' "; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$flag=1;
while($row = $result->fetch_assoc()){
$comment=$row["comment"];
$commentry=$row["name"];


?>
<div style="text-align: left; border-bottom: 1px solid #eee;padding: 5px " class="mobile">
<h1>COMMENTS</h1>
<c style="font-size:18px;"><?php echo $comment; ?> </c><br>
<c style="font-size:14px;" class="red"><?php echo $commentry; ?> </c><br>
</div>
<?

}
}
?>


<h2>LEAVE A COMMENT</h2>
<?php
if(isset($_POST["comsub"])){
$commenter = $_POST["commenter"];
$emails = $_POST["emails"];
$comment = nl2br(htmlentities($_POST["comment"], ENT_QUOTES, 'UTF-8'));


 $query = mysqli_query(
    $conn, "INSERT INTO comments(
name, email, comment, PostID)VALUES ( 
'$commenter','$emails','$comment','$ThisPost')");
    if ($query) {  header("Location: $URL"); }


}

  ?>



<form action="" method="post"  name="comments">
  <input type="text" class="textInputs" name="commenter" placeholder="Name">
  <input type="email" class="textInputs" name="emails" placeholder="Email">
  <textarea type="text" class="textInputs" style="height:200px;margin-bottom: 5px;" for="comments" name="comment" placeholder="Comment"></textarea>
  <input type="submit" name="comsub" class="ghostButtons" value="Comment">

</form>


<br>
<br>
If the asset feel offensive, or plagiarism to you, please report.<br><br>
<button class="ghostButtons" onclick="myFunction()" style="background: #fff;box-shadow: none;border: 1px solid #ddd;color:#000;">Report Abuse</button>

<div id="myDIV">





<?php
if(isset($_POST["reported"])){
$reporter = $_POST["reporter"];
$rmail = $_POST["rmail"];
$messages = nl2br(htmlentities($_POST["messages"], ENT_QUOTES, 'UTF-8'));


 $query = mysqli_query(
    $conn, "INSERT INTO report(
name, email, message, PostID)VALUES ( 
'$reporter','$rmail','$messages','$ThisPost')");
    if ($query) {  header("Location: $URL"); }


}

  ?>



<form action="" method="post"  name="report">
  <input type="text" class="textInputs" name="reporter" placeholder="Name">
  <input type="email" class="textInputs" name="rmail" placeholder="Email">
  <textarea type="text" class="textInputs" style="height:200px;margin-bottom: 5px;" for="report" name="messages" placeholder="Message"></textarea>
  <input type="submit" name="reported" class="ghostButtons" value="Report Abuse">

</form>



</div>


<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>

<style>
#myDIV{display:none;}

</style>

</div>
<br>
<br>
</td>
















</table>
 


<script>
var modal = document.getElementById("myModal");
var btn = document.getElementById("searchBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() { modal.style.display = "block"; }
span.onclick = function() { modal.style.display = "none"; }
window.onclick = function(event) {if (event.target == modal) { modal.style.display = "none"; } }
</script>


<script>
var modal2 = document.getElementById("myModal2");
var btn = document.getElementById("searchBtn2");
var span = document.getElementsByClassName("close2")[0];
btn.onclick = function() { modal2.style.display = "block"; }
span.onclick = function() { modal2.style.display = "none"; }
window.onclick = function(event) {if (event.target == modal2) { modal2.style.display = "none"; } }
</script>

<script>
var modal3 = document.getElementById("myModal3");
var btn = document.getElementById("menuBtn");
var span = document.getElementsByClassName("close3")[0];
btn.onclick = function() { modal3.style.display = "block"; }
span.onclick = function() { modal3.style.display = "none"; }
window.onclick = function(event) {if (event.target == modal3) { modal3.style.display = "none"; } }
</script>



</body>
</html>







