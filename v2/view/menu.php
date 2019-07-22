<h1 class="red">SIMILAR ASSETS</h1>





<?php
$sql = "SELECT * FROM posts  JOIN user ON posts.UserID=user.UserID WHERE posts.ViewMode='Published' AND posts.Category='$thiscat' AND posts.SubCategory='$thissub'   ORDER BY posts.Hits DESC LIMIT 12"; 
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
<table   style="text-align: left;"><tr><td>
<div class="box" style="width:260px !important;padding-right: 10px">	
<a href="../view/<?php echo $row["URL"] ?>"><img src="../<?php echo $row["CoverImage"]; ?>" class="tableTiles shadow"></a>
<br>
<a class="heads" href="../view/<?php echo $row["URL"] ?>"><?php echo strtoupper($Heading);?></a>
<br><?php echo $row["Hits"];?> Views &middot; <?php echo $row["PublishDate"];?>
<br>
<p class="heads"><?php echo $price;?></p>
<a href="profile/<?php echo $UserID ?>" ><?php echo strtoupper($row["Fullname"]); ?></a><br>
</div>
<br>
</td></tr></table>
<?php
 }}?> 


