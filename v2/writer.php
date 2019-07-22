<?php 
include 'session.php';
if ($ProfilePic=='') {$ProfilePic='logo/login.png';}
if(isset($_POST["ChangePhoto"]))
{ $filePath = 'uploads/'.rand(1000,1000000)."-".$_FILES['file']['name'];
  $file_loc = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileType = $_FILES['file']['type'];
  if(move_uploaded_file($file_loc,$filePath))
  { if ($fileType=='image/jpeg'||$fileType=='image/pjpeg'||$fileType=='image/jpg'||$fileType=='image/png') {
    $query = mysqli_query(
    $conn, "UPDATE user SET ProfilePic='$filePath', ProfilePicType='$fileType', ProfilePicSize='$fileSize' WHERE UserID='$myID'");
    if($query){ header("Location:writer.php");}
  }
 }
}
?>
<!doctype html>
<html>
<head>

  <meta charset="utf-8">
  <title><?php echo $Fullname ?></title>
  <link rel="shortcut icon" href="logo/sbLogo.ico" />
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
  <style>
.ProfilePic{background-image:url("<?php echo $ProfilePic ?>");
height:50px;width:50px;border:2px solid #eee;background-position:top;background-size:cover;border-radius: 50%;}
</style>
</head>

<body>

<table width="100%" >
<td width="25%" class="pc" valign="top"><?php include 'writerSide1.php';?></td>

<td width="70%" class="left-border left-padding" valign="top"> 
<br>
<div class="box" style="margin-left: 20px;padding: 25px;width: 90%;">
<h1 class="red">UPLOAD YOUR ASSETS</h1>
<form class="postWriter" enctype="multipart/form-data" name="postWriter" action="postPreview.php" method="post" style="overflow: auto;text-align: left;">
<input type="text" name="heading" class="textInputs bold" placeholder="Enter Heading/Title" required/><br>
<label for="cover" style="color: #f00;">Add Cover Image (Max Size Limit 2MB)</label><br>
<input type="file" name="cover" required/><br>
<label for="cover" style="color: #f00;">Add Preview Image 1 (Max Size Limit 2MB)</label><br>
<input type="file" name="cover1" required/><br>
<label for="cover" style="color: #f00;">Add Preview Image 2 (Max Size Limit 2MB)</label><br>
<input type="file" name="cover2" required/><br>
<label for="cover" style="color: #f00;">Add Preview Image 3 (Max Size Limit 2MB)</label><br>
<input type="file" name="cover3" required/><br>
<label for="cover" style="color: #f00;">Add Preview Image 4 (Max Size Limit 2MB)</label><br>
<input type="file" name="cover4" required/><br>

<select name="category" class="textInputs" style="margin-top: 10px;">
<option>--Category--</option>
<option value="2D">2D</option>
<option value="3D">3D</option>
<option value="Soundfx">SOUND-FX</option>
<option value="Music">MUSIC</option>
<option value="Packages">PACKAGES</option>
<option value="Fonts">FONTS</option>



</select>
<br>
<select name="subcategory" class="textInputs" style="margin-top: 10px;" required/>
<option>--Sub-Category--</option>
<option>-2D-</option>
<option value="Characters">CHARACTERS</option>
<option value="Environment">ENVIRONMENT</option>
<option value="GUI">GUI</option>
<option value="ParticlesDecals">PARTICLES & DECALS</option>
<option value="Textures">TEXTURES</option>
<option>-3D-</option>
<option value="Characters">CHARACTERS</option>
<option value="Environment">ENVIRONMENT</option>
<option value="Vehicles">VEHICLES</option>
<option value="Items">ITEMS</option>
<option>-SOUND FX-</option>
<option value="FootSteps">FOOT STEPS</option>
<option value="Environment">WEOPANS</option>
<option value="HurtScreams">HURT/SCREAMS</option>
<option value="BloodSplatter">BLOOD SPLATTER</option>
<option value="Explosions">EXPLOSION</option>
<option value="GUI">GUI</option>
<option value="More">MORE</option>
<option>-MUSIC-</option>
<option value="Action">ACTION</option>
<option value="City">CITY</option>
<option value="GUI">GUI</option>
<option value="Dark">DARK</option>
<option value="Fantasy">FANTASY</option>
<option value="Horror">HORROR</option>
</select>


<label for="file">Submit ZIP file</label><br>
<input type="file" name="files" required/><br><br><br>

<label for="audio">Submit Audio Sample</label><br>
<input type="file" name="audio"><br><br><br>
<input type="text" name="price" class="textInputs bold" placeholder="Price (0 for FREE )" required/><br>
<textarea type="text" class="textInputs " style="height:40px;margin-bottom: 5px;" for="postWriter" name="metaDescription" placeholder="Write Meta Description (separate with commas Ex: 2D Multiplayer, War Game Characters, Plane Game GUI)" required/></textarea>
<textarea type="text" class="textInputs " style="height:80px;margin-bottom: 5px;" for="postWriter" name="metaKeywords" placeholder="Write Meta Keywords (separate with commas Ex: 2D, Sound fx, Music, Best Game Assets)" required/></textarea>

<textarea type="text" class="textInputs " style="height:200px;margin-bottom: 10px;" for="postWriter" name="description" placeholder="Write Description" required/></textarea>

  
   <input  type="submit" class="ghostButtons" name="submit" value="SUBMIT ASSET AS DRAFT">
</form>
</div>




</td>
</table>
<br>
<div class="mobile" style="margin-left: 3px;width: 108%;">
<?php include 'writerSide1.php';?>
</div>
</body>
</html>




