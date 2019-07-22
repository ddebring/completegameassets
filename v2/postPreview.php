<?php
include 'session.php';
include 'dbconfig.php';
if(isset($_POST["submit"])){
$URL3 =  str_replace(' ', '-', $_POST["heading"]);
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
$category = $_POST["category"];
$subcategory = $_POST["subcategory"];
$heading= mysqli_real_escape_string($conn, $_POST["heading"]);
$heading = nl2br(htmlentities($_POST["heading"], ENT_QUOTES, 'UTF-8'));
$price = nl2br(htmlentities($_POST["price"], ENT_QUOTES, 'UTF-8'));
$Syllabus= mysqli_real_escape_string($conn, $_POST["syllabus"]);
$text = nl2br(htmlentities($_POST["description"], ENT_QUOTES, 'UTF-8'));
$coverPath = 'uploads/'.rand(1000,1000000)."-".$_FILES['cover']['name'];
 $coverLoc = $_FILES['cover']['tmp_name'];
 $coverSize = $_FILES['cover']['size'];
 $coverType = $_FILES['cover']['type'];

 $filePath = 'uploads/'.rand(1000,1000000)."-".$_FILES['files']['name'];
 $fileLoc = $_FILES['files']['tmp_name'];
move_uploaded_file($fileLoc,$filePath);

 $audioPath = 'uploads/'.rand(1000,1000000)."-".$_FILES['audio']['name'];
 $audioLoc = $_FILES['audio']['tmp_name'];
move_uploaded_file($audioLoc,$audioPath);




$cover1Path = 'uploads/'.rand(1000,1000000)."-".$_FILES['cover1']['name'];
 $cover1Loc = $_FILES['cover1']['tmp_name'];
move_uploaded_file($cover1Loc,$cover1Path);


$cover2Path = 'uploads/'.rand(1000,1000000)."-".$_FILES['cover2']['name'];
 $cover2Loc = $_FILES['cover2']['tmp_name'];
move_uploaded_file($cover2Loc,$cover2Path);


$cover3Path = 'uploads/'.rand(1000,1000000)."-".$_FILES['cover3']['name'];
 $cover3Loc = $_FILES['cover3']['tmp_name'];
move_uploaded_file($cover3Loc,$cover3Path);


$cover4Path = 'uploads/'.rand(1000,1000000)."-".$_FILES['cover4']['name'];
 $cover4Loc = $_FILES['cover4']['tmp_name'];
move_uploaded_file($cover4Loc,$cover4Path);








if ($coverType=='image/jpeg'||$coverType=='image/pjpeg'||$coverType=='image/jpg'||$coverType=='image/png') {move_uploaded_file($coverLoc,$coverPath);} 

$metaDescription = nl2br(htmlentities($_POST["metaDescription"], ENT_QUOTES, 'UTF-8'));
$metaKeywords = nl2br(htmlentities($_POST["metaKeywords"], ENT_QUOTES, 'UTF-8'));
$subcategory = $_POST["subcategory"];
$PublishDate=date("d F Y");
$view='hidden';
    $query = mysqli_query(
    $conn, "INSERT INTO posts(
primg1, primg2, primg3, primg4, price, Audio,
    files,URL,PublishDate,MetaDescription,MetaKeywords, Heading, Category,SubCategory, Description, CoverImage, CoverType, CoverSize, UserID, ViewMode)VALUES ( 
'$cover1Path','$cover2Path','$cover3Path','$cover4Path','$price', '$audioPath',
    '$filePath','$URL','$PublishDate','$metaDescription','$metaKeywords','$heading','$category', '$subcategory','$text', '$coverPath', '$coverType', '$coverSize', '$myID','$view')");
    if ($query) {
      header("Location: writer.php");




}
}

?>