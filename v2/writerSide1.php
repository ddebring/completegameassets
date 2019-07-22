<br>
<div class="box" style="margin-left: 5px;">
<table ><td align="left"><div class="ProfilePic"></div></td>
<td><h1><a href="settings.php" class="red"><?php echo strtoupper($Fullname); ?></a></h1></td></table><br>


<div style="height: auto;overflow-y: auto;text-align: left;padding-left: 15px;">
<a href="index.php"><img src="logo/home.png" height="25px" width="25px"></a>

<p class="red">DRAFTED ASSETS</p><br>
<?php 
$sql = "SELECT * FROM posts WHERE UserID='$myID' AND ViewMode='hidden' ORDER BY PostID DESC  "; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {while($row = $result->fetch_assoc()){
$LinkPost=$row["PostID"];
$URL=$row["URL"];
$Heading=substr($row["Heading"],0,40)."...";
$CoverImage=$row["CoverImage"];
?>
<table align="left">
<td width="30%"><img src="<?php echo  $CoverImage?>" height="65px" width="100%"></td>
<td width="70%" valign="top" align="left"><p ><a href="view/<?php echo $URL; ?>"><?php echo $Heading;?></a></p><table>
<td valign="top">
<a href="writer.php?delete=<?php echo $LinkPost; ?>"><img src="logo/delete.png" height="18px" width="18px"></a></td><td>
<a href="writer.php?publish=<?php echo $LinkPost; ?>"><img src="logo/publish.png" height="21px" width="20px"></a></td></table>
</td></table>
<?php
}

}else {
	echo "No Assets to Show";
}
?>
<br><br>
<p class="red">PUBLISHED ASSETS</p><br>
<?php
$sql = "SELECT * FROM posts WHERE UserID='$myID' AND ViewMode='Published' ORDER BY PostID DESC  "; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {while($row = $result->fetch_assoc()){
$SetLink=$row["PostID"];
$URLS=$row["URL"];
$SetHeading=substr($row["Heading"],0,40)."...";
$SetCover=$row["CoverImage"];
$cat=$row["Category"];
?>
<table align="left">
<td width="30%"><img src="<?php echo  $SetCover?>" height="65px" width="100%"></td>
<td width="70%" valign="top" align="left"><p><a href="view/<?php echo $URLS; ?>">

	<?php 

if ($cat=='Editorial') {
	echo '<c style="color:#51A0D5">' .$SetHeading.'</c>';
}else{
	echo $SetHeading;
}
	


	?></a></p><table>
<td valign="top">
<a href="writer.php?deleteSet=<?php echo $SetLink; ?>"><img src="logo/delete.png" height="18px" width="18px"></a>
<a href="add.php?plink=<?php echo $SetLink; ?>"><img src="logo/plus.png" height="18px" width="18px"></a>
</td>
</table></td></table>
<?php
}
}
else {
	echo "No Assets to Show";
}
?>

<p ><a href="logout.php" class="red">LOGOUT</a></p>
</div>
<?php
if (isset($_GET['delete'])) {$deleteID=$_GET['delete'];
$sql = "SELECT CoverImage FROM posts WHERE UserID='$myID' AND PostID='$deleteID' "; 
$result = $conn->query($sql);if ($result->num_rows > 0) {while($row = $result->fetch_assoc()){$CoverImageDelete=$row["CoverImage"];
if (unlink($CoverImageDelete)) { $query1 = mysqli_query($conn, "DELETE FROM posts WHERE PostID='$deleteID'"); if($query1){ $dell=1;}}
} mysqli_query($conn, "DELETE FROM posts WHERE PostID='$deleteID'");}

$sql = "SELECT * FROM items  WHERE PostID='$deleteID'"; 
$result = $conn->query($sql);if ($result->num_rows > 0) {while($row = $result->fetch_assoc()){$folderPath=$row["FilePath"];
if (unlink($folderPath)) {$query2 = mysqli_query( $conn, "DELETE FROM items WHERE PostID='$deleteID'");if($query3){ $dell=2;}}
}}



$query3 = mysqli_query($conn, "DELETE FROM tags WHERE PostID='$deleteID'");if($query3){ $dell=3;}
if ($dell==1||$dell==2||$dell==3) {header("Location:writer.php"); }
}

if (isset($_GET['publish'])) {$publishID=$_GET['publish'];
$query = mysqli_query($conn, "UPDATE posts SET ViewMode='published' WHERE PostID='$publishID'"); if($query){ header("Location:writer.php");}}
?>


<?php
if (isset($_GET['deleteSet'])) {$deleteSetID=$_GET['deleteSet'];
$sql = "SELECT CoverImage FROM posts WHERE UserID='$myID' AND PostID='$deleteSetID' "; 
$result = $conn->query($sql);if ($result->num_rows > 0) {while($row = $result->fetch_assoc()){$CoverImageDelete=$row["CoverImage"];
if (unlink($CoverImageDelete)) {$query1 = mysqli_query($conn, "DELETE FROM posts WHERE PostID='$deleteSetID'");if($query1){ $dell=1;}}
}}

$sql = "SELECT * FROM items  WHERE PostID='$deleteSetID'"; 
$result = $conn->query($sql);if ($result->num_rows > 0) {while($row = $result->fetch_assoc()){
echo $folderPath=$row["FilePath"];
if (unlink($folderPath)) {$query2 = mysqli_query($conn, "DELETE FROM items WHERE PostID='$deleteSetID'");if($query3){ $dell=2;}}
}}

$query3 = mysqli_query($conn, "DELETE FROM tags WHERE PostID='$deleteSetID'");if($query3){ $dell=3;}
if ($dell==1||$dell==2||$dell==3) {header("Location:writer.php"); }
} ?>


</div>






</div>

