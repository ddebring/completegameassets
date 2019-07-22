<?php include 'dbconfig.php';





if (isset($_GET['cat'])=='') {
	 $cat=1;



}elseif(isset($_GET['cat'])!=''){
  $cat=$_GET['cat'];
   $scat=$_GET['cat'];
   $subcat=$_GET['subcat'];
  $showcat=$_GET['subcat'];

if ($subcat=='particlesdecals') { $subcat='particles & decals';}
if ($cat=='soundfx') { $cat='sound fx';}
if ($subcat=='hurtscreams') { $subcat='hurt/screams';}
if ($subcat=='bloodsplatter') { $subcat='blood splatter';}
if ($subcat=='') { $showcat='--Sub-Category--';}
if ($subcat=='05') { $subcat='$0 - $5';}
if ($subcat=='550') { $subcat='$5 - $50';}
if ($subcat=='50p') { $subcat='$50 ABOVE';}
if ($subcat=='assets') { $showcat=''; }
   ?>


<h1 class="red"><?php echo strtoupper($cat); ?>&nbsp;<?php echo strtoupper($subcat); ?></h1>




<table width="75%" class="pc" style="text-align: left;">
<?php
$sql = "SELECT * FROM posts  JOIN user ON posts.UserID=user.UserID WHERE posts.ViewMode='Published' AND posts.Category='$scat' AND posts.SubCategory LIKE '%$showcat%'  ORDER BY posts.Hits DESC LIMIT 12"; 
$i = 0;
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()){

$Hits=$row["Hits"];
$Heading = str_replace('-', ' ', $row["Heading"]);
$Heading = substr($row["Heading"],0,60);
if ($row["price"]==0){	$price='FREE'; }else{ 	$price='$&nbsp;'.$row["price"]; }
if ($Hits>1000&&$Hits<999999) { $HitsK=round($Hits/1000,1); $Hits=$HitsK.'K';}
elseif ($Hits>1000000&&$Hits<999999999) { $HitsK=round($Hits/1000000,1); $Hits=$HitsK.'M';}
elseif ($Hits>1000000000&&$Hits<999999999999) { $HitsK=round($Hits/1000000000,1); $Hits=$HitsK.'B';}
if ($i%4==0) { ?>
<tr><td width="50%" valign="top">
<div class="box shadow2" style="max-width:220px !important;">
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<div style="height: 70px;">
<a class="heads " href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50)); ?></a><br>
<?php echo $row["Hits"];?> Views&middot; <?php echo $row["PublishDate"];?><br>

</div>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div></td>
<?php }else{ ?>
<td width="50%" valign="top">
<div class="box shadow2" style="max-width:220px !important;">
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<div style="height: 70px;">
<a class="heads" href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50));?></a><br>
<?php echo $row["Hits"];?> Views&middot; <?php echo $row["PublishDate"];?>
</div>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div></td>
<?php }?>
<?php
 $i++;
 }}?> 
</tr></table>



<?php
$sql = "SELECT * FROM posts  JOIN user ON posts.UserID=user.UserID WHERE posts.ViewMode='Published' AND posts.Category='$scat' AND posts.SubCategory LIKE '%$showcat%'   ORDER BY posts.Hits DESC LIMIT 12"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()){

$Hits=$row["Hits"];
if ($row["price"]==0){ 	$price='FREE';}else{ $price='$&nbsp;'.$row["price"];}
$Heading = str_replace('-', ' ', $row["Heading"]);
$Heading = substr($row["Heading"],0,120);
if ($Hits>1000&&$Hits<999999) { $HitsK=round($Hits/1000,1); $Hits=$HitsK.'K';}
elseif ($Hits>1000000&&$Hits<999999999) { $HitsK=round($Hits/1000000,1); $Hits=$HitsK.'M';}
elseif ($Hits>1000000000&&$Hits<999999999999) { $HitsK=round($Hits/1000000000,1); $Hits=$HitsK.'B';}
 ?>
<table   class="mobile"  style="text-align: left;"><tr><td>
<div class="box" style="max-width:260px !important;padding-right: 10px">	
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<br>
<a class="heads" href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50));?></a>
<br><?php echo $row["Hits"];?> Views &middot; <?php echo $row["PublishDate"];?>
<br>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div>

</td></tr></table>
<?php
 }}?> 











	<?php






if ($_GET["cat"]=='price') {
$range= $_GET["subcat"];


if ($range=='free') {
	$x=0; $y=0;
}elseif ($range=='05') {
	 $x=0.1;  $y=5;
}elseif ($range=='550') {
	 $x=5.1;  $y=50;
}elseif ($range=='50p') {
	 $x=50.1;  $y=10000;
}

?>




<table width="75%" class="pc" style="text-align: left;">
<?php
$sql = "SELECT * FROM posts  JOIN user ON posts.UserID=user.UserID WHERE posts.ViewMode='Published'  AND posts.price BETWEEN $x AND $y ORDER BY posts.Hits DESC LIMIT 12"; 
$i = 0;
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()){

$Hits=$row["Hits"];
$Heading = str_replace('-', ' ', $row["Heading"]);
$Heading = substr($row["Heading"],0,60);
if ($row["price"]==0){	$price='FREE'; }else{ 	$price='$&nbsp;'.$row["price"]; }
if ($Hits>1000&&$Hits<999999) { $HitsK=round($Hits/1000,1); $Hits=$HitsK.'K';}
elseif ($Hits>1000000&&$Hits<999999999) { $HitsK=round($Hits/1000000,1); $Hits=$HitsK.'M';}
elseif ($Hits>1000000000&&$Hits<999999999999) { $HitsK=round($Hits/1000000000,1); $Hits=$HitsK.'B';}
if ($i%4==0) { ?>
<tr><td width="50%" valign="top">
<div class="box shadow2" style="max-width:220px !important;">
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<div style="height: 70px;">
<a class="heads " href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50)); ?></a><br>
<?php echo $row["Hits"];?> Views&middot; <?php echo $row["PublishDate"];?><br>

</div>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div></td>
<?php }else{ ?>
<td width="50%" valign="top">
<div class="box shadow2" style="max-width:220px !important;">
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<div style="height: 70px;">
<a class="heads" href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50));?></a><br>
<?php echo $row["Hits"];?> Views&middot; <?php echo $row["PublishDate"];?>
</div>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div></td>
<?php }?>
<?php
 $i++;
 }}?> 
</tr></table>



<?php
$sql = "SELECT * FROM posts  JOIN user ON posts.UserID=user.UserID WHERE posts.ViewMode='Published' AND posts.price BETWEEN $x AND $y ORDER BY posts.Hits DESC LIMIT 12"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()){

$Hits=$row["Hits"];
if ($row["price"]==0){ 	$price='FREE';}else{ $price='$&nbsp;'.$row["price"];}
$Heading = str_replace('-', ' ', $row["Heading"]);
$Heading = substr($row["Heading"],0,120);
if ($Hits>1000&&$Hits<999999) { $HitsK=round($Hits/1000,1); $Hits=$HitsK.'K';}
elseif ($Hits>1000000&&$Hits<999999999) { $HitsK=round($Hits/1000000,1); $Hits=$HitsK.'M';}
elseif ($Hits>1000000000&&$Hits<999999999999) { $HitsK=round($Hits/1000000000,1); $Hits=$HitsK.'B';}
 ?>
<table   class="mobile"  style="text-align: left;"><tr><td>
<div class="box" style="max-width:260px !important;padding-right: 10px">	
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<br>
<a class="heads" href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50));?></a>
<br><?php echo $row["Hits"];?> Views &middot; <?php echo $row["PublishDate"];?>
<br>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div>

</td></tr></table>
<?php
 }}?> 









<?php



















}




























}








?>

<?php if ($cat==1) {
?>






<table width="75%" class="pc" style="text-align: left;">
<?php
$sql = "SELECT * FROM posts  JOIN user ON posts.UserID=user.UserID WHERE posts.ViewMode='Published' AND posts.Category='2D'  ORDER BY posts.Hits DESC LIMIT 12"; 
$i = 0;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<h1 class='red pc'>POPULAR IN 2D</h1>";
while($row = $result->fetch_assoc()){
$Hits=$row["Hits"];
$Heading = str_replace('-', ' ', $row["Heading"]);
$Heading = substr($row["Heading"],0,60);
if ($row["price"]==0){	$price='FREE'; }else{ 	$price='$&nbsp;'.$row["price"]; }
if ($Hits>1000&&$Hits<999999) { $HitsK=round($Hits/1000,1); $Hits=$HitsK.'K';}
elseif ($Hits>1000000&&$Hits<999999999) { $HitsK=round($Hits/1000000,1); $Hits=$HitsK.'M';}
elseif ($Hits>1000000000&&$Hits<999999999999) { $HitsK=round($Hits/1000000000,1); $Hits=$HitsK.'B';}
if ($i%4==0) { ?>
<tr><td width="50%" valign="top">
<div class="box shadow2" style="max-width:220px !important;">
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<div style="height: 70px;">
<a class="heads " href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50)); ?></a><br>
<?php echo $row["Hits"];?> Views&middot; <?php echo $row["PublishDate"];?><br>

</div>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div></td>
<?php }else{ ?>
<td width="50%" valign="top">
<div class="box shadow2" style="max-width:220px !important;">
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<div style="height: 70px;">
<a class="heads" href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50));?></a><br>
<?php echo $row["Hits"];?> Views&middot; <?php echo $row["PublishDate"];?>
</div>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div></td>
<?php }?>
<?php
 $i++;
 }}?> 
</tr></table>



<?php
$sql = "SELECT * FROM posts  JOIN user ON posts.UserID=user.UserID WHERE posts.ViewMode='Published' AND posts.Category='2D'  ORDER BY posts.Hits DESC LIMIT 12"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<h1 class='red mobile'>POPULAR IN 2D</h1>";
while($row = $result->fetch_assoc()){
$Hits=$row["Hits"];
if ($row["price"]==0){ 	$price='FREE';}else{ $price='$&nbsp;'.$row["price"];}
$Heading = str_replace('-', ' ', $row["Heading"]);
$Heading = substr($row["Heading"],0,120);
if ($Hits>1000&&$Hits<999999) { $HitsK=round($Hits/1000,1); $Hits=$HitsK.'K';}
elseif ($Hits>1000000&&$Hits<999999999) { $HitsK=round($Hits/1000000,1); $Hits=$HitsK.'M';}
elseif ($Hits>1000000000&&$Hits<999999999999) { $HitsK=round($Hits/1000000000,1); $Hits=$HitsK.'B';}
 ?>
<table   class="mobile"  style="text-align: left;"><tr><td>
<div class="box" style="max-width:260px !important;padding-right: 10px">	
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<br>
<a class="heads" href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50));?></a>
<br><?php echo $row["Hits"];?> Views &middot; <?php echo $row["PublishDate"];?>
<br>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div>

</td></tr></table>
<?php
 }}?> 
















<table width="75%" class="pc" style="text-align: left;">
<?php
$sql = "SELECT * FROM posts  JOIN user ON posts.UserID=user.UserID WHERE posts.ViewMode='Published' AND posts.Category='3D'  ORDER BY posts.Hits DESC LIMIT 12"; 
$i = 0;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<h1 class='red pc'>POPULAR IN 3D</h1>";
while($row = $result->fetch_assoc()){
$Hits=$row["Hits"];
$Heading = str_replace('-', ' ', $row["Heading"]);
$Heading = substr($row["Heading"],0,60);
if ($row["price"]==0){	$price='FREE'; }else{ 	$price='$&nbsp;'.$row["price"]; }
if ($Hits>1000&&$Hits<999999) { $HitsK=round($Hits/1000,1); $Hits=$HitsK.'K';}
elseif ($Hits>1000000&&$Hits<999999999) { $HitsK=round($Hits/1000000,1); $Hits=$HitsK.'M';}
elseif ($Hits>1000000000&&$Hits<999999999999) { $HitsK=round($Hits/1000000000,1); $Hits=$HitsK.'B';}
if ($i%4==0) { ?>
<tr><td width="50%" valign="top">
<div class="box shadow2" style="max-width:220px !important;">
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<div style="height: 70px;">
<a class="heads " href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50)); ?></a><br>
<?php echo $row["Hits"];?> Views&middot; <?php echo $row["PublishDate"];?><br>

</div>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div></td>
<?php }else{ ?>
<td width="50%" valign="top">
<div class="box shadow2" style="max-width:220px !important;">
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<div style="height: 70px;">
<a class="heads" href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50));?></a><br>
<?php echo $row["Hits"];?> Views&middot; <?php echo $row["PublishDate"];?>
</div>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div></td>
<?php }?>
<?php
 $i++;
 }}?> 
</tr></table>



<?php
$sql = "SELECT * FROM posts  JOIN user ON posts.UserID=user.UserID WHERE posts.ViewMode='Published' AND posts.Category='3D'  ORDER BY posts.Hits DESC LIMIT 12"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<h1 class='red mobile'>POPULAR IN 3D</h1>";
while($row = $result->fetch_assoc()){
$Hits=$row["Hits"];
if ($row["price"]==0){ 	$price='FREE';}else{ $price='$&nbsp;'.$row["price"];}
$Heading = str_replace('-', ' ', $row["Heading"]);
$Heading = substr($row["Heading"],0,120);
if ($Hits>1000&&$Hits<999999) { $HitsK=round($Hits/1000,1); $Hits=$HitsK.'K';}
elseif ($Hits>1000000&&$Hits<999999999) { $HitsK=round($Hits/1000000,1); $Hits=$HitsK.'M';}
elseif ($Hits>1000000000&&$Hits<999999999999) { $HitsK=round($Hits/1000000000,1); $Hits=$HitsK.'B';}
 ?>
<table   class="mobile"  style="text-align: left;"><tr><td>
<div class="box" style="max-width:260px !important;padding-right: 10px">	
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<br>
<a class="heads" href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50));?></a>
<br><?php echo $row["Hits"];?> Views &middot; <?php echo $row["PublishDate"];?>
<br>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div>

</td></tr></table>
<?php
 }}?> 















<table width="75%" class="pc" style="text-align: left;">
<?php
$sql = "SELECT * FROM posts  JOIN user ON posts.UserID=user.UserID WHERE posts.ViewMode='Published' AND posts.Category='SoundEffects'  ORDER BY posts.Hits DESC LIMIT 12"; 
$i = 0;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<h1 class='red pc'>POPULAR IN SOUND FX</h1>";
while($row = $result->fetch_assoc()){
$Hits=$row["Hits"];
$Heading = str_replace('-', ' ', $row["Heading"]);
$Heading = substr($row["Heading"],0,60);
if ($row["price"]==0){	$price='FREE'; }else{ 	$price='$&nbsp;'.$row["price"]; }
if ($Hits>1000&&$Hits<999999) { $HitsK=round($Hits/1000,1); $Hits=$HitsK.'K';}
elseif ($Hits>1000000&&$Hits<999999999) { $HitsK=round($Hits/1000000,1); $Hits=$HitsK.'M';}
elseif ($Hits>1000000000&&$Hits<999999999999) { $HitsK=round($Hits/1000000000,1); $Hits=$HitsK.'B';}
if ($i%4==0) { ?>
<tr><td width="50%" valign="top">
<div class="box shadow2" style="max-width:220px !important;">
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<div style="height: 70px;">
<a class="heads " href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50)); ?></a><br>
<?php echo $row["Hits"];?> Views&middot; <?php echo $row["PublishDate"];?><br>

</div>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div></td>
<?php }else{ ?>
<td width="50%" valign="top">
<div class="box shadow2" style="max-width:220px !important;">
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<div style="height: 70px;">
<a class="heads" href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50));?></a><br>
<?php echo $row["Hits"];?> Views&middot; <?php echo $row["PublishDate"];?>
</div>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div></td>
<?php }?>
<?php
 $i++;
 }}?> 
</tr></table>



<?php
$sql = "SELECT * FROM posts  JOIN user ON posts.UserID=user.UserID WHERE posts.ViewMode='Published' AND posts.Category='SoundEffects'  ORDER BY posts.Hits DESC LIMIT 12"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<h1 class='red mobile'>POPULAR IN SOUND FX</h1>";
while($row = $result->fetch_assoc()){
$Hits=$row["Hits"];
if ($row["price"]==0){ 	$price='FREE';}else{ $price='$&nbsp;'.$row["price"];}
$Heading = str_replace('-', ' ', $row["Heading"]);
$Heading = substr($row["Heading"],0,120);
if ($Hits>1000&&$Hits<999999) { $HitsK=round($Hits/1000,1); $Hits=$HitsK.'K';}
elseif ($Hits>1000000&&$Hits<999999999) { $HitsK=round($Hits/1000000,1); $Hits=$HitsK.'M';}
elseif ($Hits>1000000000&&$Hits<999999999999) { $HitsK=round($Hits/1000000000,1); $Hits=$HitsK.'B';}
 ?>
<table   class="mobile"  style="text-align: left;"><tr><td>
<div class="box" style="max-width:260px !important;padding-right: 10px">	
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<br>
<a class="heads" href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50));?></a>
<br><?php echo $row["Hits"];?> Views &middot; <?php echo $row["PublishDate"];?>
<br>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div>

</td></tr></table>
<?php
 }}?> 















<table width="75%" class="pc" style="text-align: left;">
<?php
$sql = "SELECT * FROM posts  JOIN user ON posts.UserID=user.UserID WHERE posts.ViewMode='Published' AND posts.Category='Music'  ORDER BY posts.Hits DESC LIMIT 12"; 
$i = 0;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<h1 class='red pc'>POPULAR IN MUSIC</h1>";
while($row = $result->fetch_assoc()){
$Hits=$row["Hits"];
$Heading = str_replace('-', ' ', $row["Heading"]);
$Heading = substr($row["Heading"],0,60);
if ($row["price"]==0){	$price='FREE'; }else{ 	$price='$&nbsp;'.$row["price"]; }
if ($Hits>1000&&$Hits<999999) { $HitsK=round($Hits/1000,1); $Hits=$HitsK.'K';}
elseif ($Hits>1000000&&$Hits<999999999) { $HitsK=round($Hits/1000000,1); $Hits=$HitsK.'M';}
elseif ($Hits>1000000000&&$Hits<999999999999) { $HitsK=round($Hits/1000000000,1); $Hits=$HitsK.'B';}
if ($i%4==0) { ?>
<tr><td width="50%" valign="top">
<div class="box shadow2" style="max-width:220px !important;">
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<div style="height: 70px;">
<a class="heads " href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50)); ?></a><br>
<?php echo $row["Hits"];?> Views&middot; <?php echo $row["PublishDate"];?><br>

</div>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div></td>
<?php }else{ ?>
<td width="50%" valign="top">
<div class="box shadow2" style="max-width:220px !important;">
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<div style="height: 70px;">
<a class="heads" href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50));?></a><br>
<?php echo $row["Hits"];?> Views&middot; <?php echo $row["PublishDate"];?>
</div>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div></td>
<?php }?>
<?php
 $i++;
 }}?> 
</tr></table>



<?php
$sql = "SELECT * FROM posts  JOIN user ON posts.UserID=user.UserID WHERE posts.ViewMode='Published' AND posts.Category='Music'  ORDER BY posts.Hits DESC LIMIT 12"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<h1 class='red mobile'>POPULAR IN MUSIC</h1>";
while($row = $result->fetch_assoc()){
$Hits=$row["Hits"];
if ($row["price"]==0){ 	$price='FREE';}else{ $price='$&nbsp;'.$row["price"];}
$Heading = str_replace('-', ' ', $row["Heading"]);
$Heading = substr($row["Heading"],0,120);
if ($Hits>1000&&$Hits<999999) { $HitsK=round($Hits/1000,1); $Hits=$HitsK.'K';}
elseif ($Hits>1000000&&$Hits<999999999) { $HitsK=round($Hits/1000000,1); $Hits=$HitsK.'M';}
elseif ($Hits>1000000000&&$Hits<999999999999) { $HitsK=round($Hits/1000000000,1); $Hits=$HitsK.'B';}
 ?>
<table   class="mobile"  style="text-align: left;"><tr><td>
<div class="box" style="max-width:260px !important;padding-right: 10px">	
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<br>
<a class="heads" href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50));?></a>
<br><?php echo $row["Hits"];?> Views &middot; <?php echo $row["PublishDate"];?>
<br>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div>

</td></tr></table>
<?php
 }}?> 













<table width="75%" class="pc" style="text-align: left;">
<?php
$sql = "SELECT * FROM posts  JOIN user ON posts.UserID=user.UserID WHERE posts.ViewMode='Published' AND posts.Category='Packages'  ORDER BY posts.Hits DESC LIMIT 12"; 
$i = 0;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<h1 class='red pc'>POPULAR IN PACKAGES</h1>";
while($row = $result->fetch_assoc()){
$Hits=$row["Hits"];
$Heading = str_replace('-', ' ', $row["Heading"]);
$Heading = substr($row["Heading"],0,60);
if ($row["price"]==0){	$price='FREE'; }else{ 	$price='$&nbsp;'.$row["price"]; }
if ($Hits>1000&&$Hits<999999) { $HitsK=round($Hits/1000,1); $Hits=$HitsK.'K';}
elseif ($Hits>1000000&&$Hits<999999999) { $HitsK=round($Hits/1000000,1); $Hits=$HitsK.'M';}
elseif ($Hits>1000000000&&$Hits<999999999999) { $HitsK=round($Hits/1000000000,1); $Hits=$HitsK.'B';}
if ($i%4==0) { ?>
<tr><td width="50%" valign="top">
<div class="box shadow2" style="max-width:220px !important;">
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<div style="height: 70px;">
<a class="heads " href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50)); ?></a><br>
<?php echo $row["Hits"];?> Views&middot; <?php echo $row["PublishDate"];?><br>

</div>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div></td>
<?php }else{ ?>
<td width="50%" valign="top">
<div class="box shadow2" style="max-width:220px !important;">
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<div style="height: 70px;">
<a class="heads" href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50));?></a><br>
<?php echo $row["Hits"];?> Views&middot; <?php echo $row["PublishDate"];?>
</div>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div></td>
<?php }?>
<?php
 $i++;
 }}?> 
</tr></table>



<?php
$sql = "SELECT * FROM posts  JOIN user ON posts.UserID=user.UserID WHERE posts.ViewMode='Published' AND posts.Category='Packages'  ORDER BY posts.Hits DESC LIMIT 12"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<h1 class='red mobile'>POPULAR IN PACKAGES</h1>";
while($row = $result->fetch_assoc()){
$Hits=$row["Hits"];
if ($row["price"]==0){ 	$price='FREE';}else{ $price='$&nbsp;'.$row["price"];}
$Heading = str_replace('-', ' ', $row["Heading"]);
$Heading = substr($row["Heading"],0,120);
if ($Hits>1000&&$Hits<999999) { $HitsK=round($Hits/1000,1); $Hits=$HitsK.'K';}
elseif ($Hits>1000000&&$Hits<999999999) { $HitsK=round($Hits/1000000,1); $Hits=$HitsK.'M';}
elseif ($Hits>1000000000&&$Hits<999999999999) { $HitsK=round($Hits/1000000000,1); $Hits=$HitsK.'B';}
 ?>
<table   class="mobile"  style="text-align: left;"><tr><td>
<div class="box" style="max-width:260px !important;padding-right: 10px">	
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<br>
<a class="heads" href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50));?></a>
<br><?php echo $row["Hits"];?> Views &middot; <?php echo $row["PublishDate"];?>
<br>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div>

</td></tr></table>
<?php
 }}?> 















<table width="75%" class="pc" style="text-align: left;">
<?php
$sql = "SELECT * FROM posts  JOIN user ON posts.UserID=user.UserID WHERE posts.ViewMode='Published' AND posts.Category='Fonts'  ORDER BY posts.Hits DESC LIMIT 12"; 
$i = 0;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<h1 class='red pc'>POPULAR IN FONTS</h1>";
while($row = $result->fetch_assoc()){
$Hits=$row["Hits"];
$Heading = str_replace('-', ' ', $row["Heading"]);
$Heading = substr($row["Heading"],0,60);
if ($row["price"]==0){	$price='FREE'; }else{ 	$price='$&nbsp;'.$row["price"]; }
if ($Hits>1000&&$Hits<999999) { $HitsK=round($Hits/1000,1); $Hits=$HitsK.'K';}
elseif ($Hits>1000000&&$Hits<999999999) { $HitsK=round($Hits/1000000,1); $Hits=$HitsK.'M';}
elseif ($Hits>1000000000&&$Hits<999999999999) { $HitsK=round($Hits/1000000000,1); $Hits=$HitsK.'B';}
if ($i%4==0) { ?>
<tr><td width="50%" valign="top">
<div class="box shadow2" style="max-width:220px !important;">
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<div style="height: 70px;">
<a class="heads " href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50)); ?></a><br>
<?php echo $row["Hits"];?> Views&middot; <?php echo $row["PublishDate"];?><br>

</div>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div></td>
<?php }else{ ?>
<td width="50%" valign="top">
<div class="box shadow2" style="max-width:220px !important;">
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<div style="height: 70px;">
<a class="heads" href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50));?></a><br>
<?php echo $row["Hits"];?> Views&middot; <?php echo $row["PublishDate"];?>
</div>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div></td>
<?php }?>
<?php
 $i++;
 }}?> 
</tr></table>



<?php
$sql = "SELECT * FROM posts  JOIN user ON posts.UserID=user.UserID WHERE posts.ViewMode='Published' AND posts.Category='Fonts'  ORDER BY posts.Hits DESC LIMIT 12"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<h1 class='red mobile'>POPULAR IN FONTS</h1>";
while($row = $result->fetch_assoc()){
$Hits=$row["Hits"];
if ($row["price"]==0){ 	$price='FREE';}else{ $price='$&nbsp;'.$row["price"];}
$Heading = str_replace('-', ' ', $row["Heading"]);
$Heading = substr($row["Heading"],0,120);
if ($Hits>1000&&$Hits<999999) { $HitsK=round($Hits/1000,1); $Hits=$HitsK.'K';}
elseif ($Hits>1000000&&$Hits<999999999) { $HitsK=round($Hits/1000000,1); $Hits=$HitsK.'M';}
elseif ($Hits>1000000000&&$Hits<999999999999) { $HitsK=round($Hits/1000000000,1); $Hits=$HitsK.'B';}
 ?>
<table   class="mobile"  style="text-align: left;"><tr><td>
<div class="box" style="max-width:260px !important;padding-right: 10px">	
<a href="view/<?php echo $row["URL"] ?>"><img src="<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<br>
<a class="heads" href="view/<?php echo $row["URL"] ?>"><?php echo strtoupper(substr($Heading,0,50));?></a>
<br><?php echo $row["Hits"];?> Views &middot; <?php echo $row["PublishDate"];?>
<br>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div>

</td></tr></table>
<?php
 }}?> 















































<?
}
?>


