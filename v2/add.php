<?php
$id= $_GET['plink'];
include 'session.php';
include 'dbconfig.php';
if(isset($_POST["submit"])){
$URL3 =  str_replace(' ', '-', $_POST["title"]);
$URLZ = str_replace('!', '', $URL3); 
$URLY = str_replace(',', '', $URLZ); 
$URL2 = str_replace(';', '', $URLY);
$URL1 = str_replace('.', '', $URL2);
$URL0 = str_replace('?', '', $URL1);
$URL00 = str_replace('\'', '', $URL0);
$URL01 = str_replace('(', '', $URL00);
$URL02 = str_replace(')', '', $URL01);
$URL03 = str_replace('', '', $URL02);
$URL04 = str_replace('/', '', $URL03);
$URL05 = str_replace('+', 'plus', $URL04);
$URL06 = str_replace('@', 'minus', $URL05);
$URL07 = str_replace('*', 'star', $URL06);
$URL08 = str_replace('#', 'hash', $URL07);
$URL = str_replace(':', '', $URL08);
$heading= mysqli_real_escape_string($conn, $_POST["title"]);
$heading = nl2br(htmlentities($_POST["title"], ENT_QUOTES, 'UTF-8'));
$text = nl2br(htmlentities($_POST["body"], ENT_QUOTES, 'UTF-8'));
$chapter=mysqli_real_escape_string($conn, $_POST["chapter"]);
$metaDescription = nl2br(htmlentities($_POST["metaDescription"], ENT_QUOTES, 'UTF-8'));
$metaKeywords = nl2br(htmlentities($_POST["metaKeywords"], ENT_QUOTES, 'UTF-8'));

 $filePath = 'uploads/'.$_FILES['files']['name'];
 $fileLoc = $_FILES['files']['tmp_name'];
move_uploaded_file($fileLoc,$filePath);



$PublishDate=date("d F Y");
    $query = mysqli_query(
    $conn, "INSERT INTO course(files, Chapter,URL,PublishDate,MetaDescription,MetaKeywords, Heading, Body, PostID)VALUES ( '$filePath','$chapter','$URL','$PublishDate','$metaDescription','$metaKeywords','$heading', '$text', '$id')");
    if ($query) {
     header("Location: writer.php");
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Chapters</title>
<link rel="shortcut icon" href="icons/sbLogo.ico" />
<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="text-align: center;color: #333;">
<?php


$sql = "SELECT * FROM posts WHERE PostID='$id'"; 
$result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
    $Heading=$row["Heading"];
    $Syllabus=$row["Syllabus"];

    }
  }


?>


<h1><?php echo $Heading?></h1>
<p><?php echo $Syllabus?></p>

<form name="addChapters" action="" method="post" enctype="multipart/form-data">
  <input type="number" class="textInputs" name="chapter" placeholder="Chapter No."><br>
  <input type="text" class="textInputs" name="title"  placeholder="Title"><br>
  <input type="text" class="textInputs" name="metaDescription"  placeholder="Meta Description"><br>
  <input type="text" class="textInputs" name="metaKeywords"  placeholder="Meta Keywords"><br>
  <label for="file">Submit php file</label>
  <input type="file" name="files"><br>
  <textarea type="text" class="textInputs " style="height:280px;margin-bottom: 10px;border: 1px solid #ddd;" for="addChapters" name="body" placeholder="Write Paragraph"></textarea>
  <input type="submit" name="submit" class="ghostButtons" value="Add Chapter">
</form>


</body>
</html>










