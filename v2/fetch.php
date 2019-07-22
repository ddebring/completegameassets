
<?php
include 'dbconfig.php';

if(isset($_POST["query"])){	
$search = mysqli_real_escape_string($conn, $_POST["query"]);

$query = " SELECT Heading,URL FROM posts WHERE Heading LIKE '%".$search."%' ";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){ 
while($row = mysqli_fetch_array($result)){ 
	
 $URL=$row["URL"];
	 $head=$row["Heading"]
?>
<b><a class="low" href="view/<?php echo $URL; ?>"><?php echo strtoupper($head); ?></a></b><br><?php } }
else{ $flag=1;}


$query = " SELECT Heading,URL FROM course WHERE Heading LIKE '%".$search."%' ";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){ 
while($row = mysqli_fetch_array($result)){ 
	$URL=$row["URL"];
	$head=$row["Heading"]
	?>

<b><a class="low" href="view/<?php echo $URL; ?>"><?php echo strtoupper($head); ?></a></b><br><?php } }
else{ $flag=2;}





if ($flag==1 && $flag == 2) {
		echo '<b class="low">NOTHING FOUND</b>';
}



}
?>